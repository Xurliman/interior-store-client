<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductConfigurationResource\Pages;
use App\Filament\Resources\ProductConfigurationResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductConfiguration;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
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
                Select::make('product_id')
                    ->label('Product')
                    ->relationship('product', 'name')
                    ->required(),
                TextInput::make('data_mask')
                    ->required(),
                TextInput::make('data_object')
                    ->required(),
                TextInput::make('data_remove')
                    ->required(),
                TextInput::make('class')
                    ->required(),
                TextInput::make('extra_class')
                    ->nullable(),
                FileUpload::make('image_path')
                    ->disk('public')
                    ->directory('product_configurations')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('data_mask')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('data_object')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('data_remove')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('class')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('extra_class')
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
            //
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
