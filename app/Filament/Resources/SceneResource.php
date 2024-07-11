<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SceneResource\Pages;
use App\Filament\Resources\SceneResource\RelationManagers;
use App\Models\Scene;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SceneResource extends Resource
{
    protected static ?string $model = Scene::class;

    protected static ?string $navigationIcon = 'heroicon-s-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('slug')
                        ->required(),
                    TextInput::make('img_class')
                        ->required(),
                    FileUpload::make('srcset_img')
                        ->disk('public')
                        ->directory('scenes')
                        ->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('img_class')
                    ->searchable()
                    ->sortable()
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
            RelationManagers\ViewsRelationManager::class,
            RelationManagers\ImageRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScenes::route('/'),
            'create' => Pages\CreateScene::route('/create'),
            'edit' => Pages\EditScene::route('/{record}/edit'),
        ];
    }
}
