<?php

namespace App\Filament\Resources\SceneResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ViewsRelationManager extends RelationManager
{
    protected static string $relationship = 'views';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Toggle::make('is_default')
                        ->default(false),
                    Toggle::make('is_visible')
                        ->requiredIf('is_default', true)
                        ->default(true),
                    TextInput::make('name')
                        ->required(),
                    MarkdownEditor::make('description')
                        ->required(),
                ])->columns(2),
                Section::make()->schema([
                    Repeater::make('Images')
                        ->hint("Select proper images to corresponding types")
                        ->relationship('images', function (Builder $query) {
                            $query->whereNot('type', 'mask_merged');
                        })
                        ->schema([
                            Forms\Components\Select::make('type')
                                ->options([
                                    'black_bg' => 'Final',
                                    'transparent_bg' => 'Background',
                                    'mask_bg' => 'Table',
                                    'mobile_bg' => 'Mobile'
                                ])->required(),
                            FileUpload::make('path')
                                ->image()
                                ->imageEditor()
                                ->disk('public')
                                ->required()
                        ])->columns(2)
                        ->maxItems(4)
                        ->minItems(3)
                ])->columns(1),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                ImageColumn::make('images.path')
                    ->circular()
                    ->stacked(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_default')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_visible')
                    ->toggleable(false),
            ])
            ->filters([
                //
            ])
            ->headerActions(
                auth()->user()->hasRole('admin') ? [Tables\Actions\CreateAction::make()] : []
            )
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
