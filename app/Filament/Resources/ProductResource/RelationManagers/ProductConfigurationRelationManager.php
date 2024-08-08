<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

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

class ProductConfigurationRelationManager extends RelationManager
{
    protected static string $relationship = 'productConfigurations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('view_id')
                    ->label('View')
                    ->relationship('view', 'data_view')
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
                TextColumn::make('data_object')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('class')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_visible')
                    ->toggleable(false)
                    ->sortable()
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
