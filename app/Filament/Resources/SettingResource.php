<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('company_name')
                        ->required(),
                    Forms\Components\TextInput::make('company_phone')
                        ->required(),
                    Forms\Components\TextInput::make('company_email')
                        ->required(),
                    Forms\Components\TextInput::make('company_url')
                        ->required(),
                    Forms\Components\TextInput::make('currency')
                        ->required(),
                    Forms\Components\TextInput::make('currency_symbol')
                        ->required(),
                    Forms\Components\TextInput::make('timezone')
                        ->required(),
                ])->columns(2),
                Forms\Components\Section::make()->schema([
                    Repeater::make('Images')
                        ->hint("Choose organization logo images")
                        ->relationship('images', function (Builder $query) {
                            $query->whereNot('type', 'mask_merged');
                        })
                        ->schema([
                            Forms\Components\Select::make('type')
                                ->options([
                                    'transparent_bg' => 'Logo',
                                ])->default('transparent_bg')
                                ->required(),
                            FileUpload::make('path')
                                ->image()
                                ->imageEditor()
                                ->disk('public')
                                ->required()
                        ])->columns(2)
                        ->maxItems(1)
                        ->minItems(1),
                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company_name'),
                TextColumn::make('company_phone'),
                TextColumn::make('company_email'),
                TextColumn::make('company_url'),
                TextColumn::make('currency'),
                TextColumn::make('currency_symbol'),
                TextColumn::make('timezone'),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        /** @var User $user */
        return auth()->user()->hasRole('admin');
    }
}
