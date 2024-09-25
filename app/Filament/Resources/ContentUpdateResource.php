<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentUpdateResource\Pages;
use App\Filament\Resources\ContentUpdateResource\RelationManagers;
use App\Models\ContentUpdate;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ContentUpdateResource extends Resource
{
    protected static ?string $model = ContentUpdate::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('path')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('version')
                    ->maxLength(255),
                MarkdownEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('update_installed_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('update_installed_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('path')
                    ->limit(50)
                    ->markdown(),
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
            'index' => Pages\ListContentUpdates::route('/'),
            'create' => Pages\CreateContentUpdate::route('/create'),
            'edit' => Pages\EditContentUpdate::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
//        /** @var User $user */
//        return auth()->user()->hasRole('admin');
    }
}
