<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductConfigurationRelationManager extends RelationManager
{
    protected static string $relationship = 'productConfiguration';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('btn_class')
                    ->required(),
                TextInput::make('data_object')
                    ->required(),
                TextInput::make('class')
                    ->required(),
                TextInput::make('extra_class')
                    ->nullable(),
                FileUpload::make('image_path')
                    ->disk('public')
                    ->directory('product_configurations')
                    ->nullable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('class')
            ->columns([
                TextColumn::make('btn_class')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('data_object')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('class')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
//                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
