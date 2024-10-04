<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductConfigurationRelationManager extends RelationManager
{
    protected static string $relationship = 'productConfigurations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('view_id')
                        ->label('View')
                        ->relationship('view', 'description')
                        ->required(),
                    Repeater::make('Images')
                        ->hint("Choose how should product look in the selected view")
                        ->relationship('images', function (Builder $query) {
                            $query->whereNot('type', 'mask_merged');
                        })
                        ->schema([
                            Select::make('type')
                                ->options([
                                    'transparent_bg' => 'Transparent Background',
                                    'mask_bg' => 'Mask Background',
                                ])->required(),
                            FileUpload::make('path')
                                ->image()
                                ->imageEditor()
                                ->disk('public')
                                ->required()
                        ])->columns(2)
                        ->maxItems(2)
                        ->minItems(2),
                ])->columns(1)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('class')
            ->columns([
                ImageColumn::make('images.path')
                    ->circular()
                    ->stacked(),
                TextColumn::make('view.scene.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('view.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }
}
