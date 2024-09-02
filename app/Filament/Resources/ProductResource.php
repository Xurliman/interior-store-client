<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Filament\Resources\ProductResource\RelationManagers\ProductConfigurationRelationManager;
use App\Models\Product;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

//    protected static ?string $navigationGroup = 'Products';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->required(),
                    Select::make('author_id')
                        ->label('Author')
                        ->relationship('author', 'name')
                        ->required(),
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('price')
                        ->numeric()
                        ->required(),
                    TextInput::make('short_name')
                        ->nullable(),
                    TextInput::make('dimensions')
                        ->nullable(),
                    MarkdownEditor::make('description')
                        ->required()
                        ->maxHeight("267px"),
                    Fieldset::make('Image')
                        ->relationship('image')
                        ->schema([
                            FileUpload::make('path')
                                ->image()
                                ->imageEditor()
                                ->disk('public')
                                ->required()
                            ->columnSpanFull()
                        ])->columnSpan(1),
                    Toggle::make('is_visible')
                        ->default(true),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image.path')
                    ->circular(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('price')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_visible')
                    ->disabled(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ProductConfigurationRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        /** @var User $user */
        return auth()->user()->hasRole('admin');
    }
}
