<?php

namespace App\Filament\Resources\ProductConfigurationResource\Pages;

use App\Filament\Resources\ProductConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductConfiguration extends EditRecord
{
    protected static string $resource = ProductConfigurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
