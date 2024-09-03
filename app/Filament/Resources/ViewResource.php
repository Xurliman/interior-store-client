<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ViewResource\Pages;
use App\Filament\Resources\ViewResource\RelationManagers;
use App\Models\Image;
use App\Models\Scene;
use App\Models\User;
use App\Models\View;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ViewResource extends Resource
{
    protected static ?string $model = View::class;

    protected static ?string $navigationIcon = 'heroicon-s-viewfinder-circle';

    protected static ?string $navigationGroup = 'Scenes';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Section::make()->schema([
                   Select::make('scene_id')
                       ->label('Scene')
                       ->relationship('scene', 'name')
                       ->required(),
                   TextInput::make('name')
                       ->required(),
                   Toggle::make('is_default')
                       ->label('Default')
                       ->default(false),
                   Toggle::make('is_visible')
                       ->requiredIf('is_default', true)
                       ->default(true),
                   MarkdownEditor::make('description')
                       ->required(),
                   Forms\Components\Section::make()->schema([
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
               ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('images.path')
                    ->circular()
                    ->stacked(),
                TextColumn::make('scene.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                ToggleColumn::make('is_default')
                    ->searchable()
                    ->sortable()
                    ->disabled(),
                ToggleColumn::make('is_visible')
                    ->disabled(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
//            RelationManagers\ProductsRelationManager::class,
//            RelationManagers\ImageRelationManager::class,
            RelationManagers\CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListViews::route('/'),
            'create' => Pages\CreateView::route('/create'),
            'edit' => Pages\EditView::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        /** @var User $user */
        return auth()->user()->hasRole('admin');
    }
}
