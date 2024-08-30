<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductConfigurationResource\Pages;
use App\Filament\Resources\ProductConfigurationResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductConfiguration;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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

//    protected static ?string $navigationGroup = 'Products';

    protected static ?int $navigationSort = 3;

//    protected static bool $shouldRegisterNavigation = false;

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
                        ->relationship('view', 'description')
                        ->required(),
                ])->columns(2),
                Forms\Components\Section::make()->schema([
                    Repeater::make('Images')
                        ->hint("Choose how should product look in the selected view")
                        ->relationship('images', function (Builder $query) {
                            $query->whereNot('type', 'mask_merged');
                        })
                        ->schema([
                            Forms\Components\Select::make('type')
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
                ])->columns(1),
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
                ToggleColumn::make('is_visible')
                    ->toggleable(false),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductConfigurations::route('/'),
            'create' => Pages\CreateProductConfiguration::route('/create'),
            'edit' => Pages\EditProductConfiguration::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        /** @var User $user */
        return auth()->user()->hasRole('admin');
    }
}
