<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductConfigurationResource\Pages;
use App\Filament\Resources\ProductConfigurationResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductConfiguration;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductConfigurationResource extends Resource
{
    protected static ?string $model = ProductConfiguration::class;

    protected static ?string $navigationIcon = 'heroicon-s-adjustments-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Select::make('product_id')
                        ->label('Product')
                        ->relationship('product', 'name')
                        ->required(),
                    Select::make('view_id')
                        ->label('View')
                        ->relationship('view', 'name')
                        ->required(),
                    TextInput::make('btn_class')
                        ->required(),
                    TextInput::make('data_object')
                        ->required(),
                    TextInput::make('class')
                        ->required(),
                    TextInput::make('extra_class')
                        ->nullable(),
                    Toggle::make('is_visible')
                        ->default(true),
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
                TextColumn::make('product.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('btn_class')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('data_object')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_visible')
                    ->toggleable(false),
                TextColumn::make('class')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
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
            RelationManagers\ImageRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductConfigurations::route('/'),
            'create' => Pages\CreateProductConfiguration::route('/create'),
            'edit' => Pages\EditProductConfiguration::route('/{record}/edit'),
        ];
    }
}
