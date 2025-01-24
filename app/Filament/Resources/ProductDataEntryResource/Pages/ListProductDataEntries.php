<?php

namespace App\Filament\Resources\ProductDataEntryResource\Pages;

use App\Filament\Resources\ProductDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductDataEntries extends ListRecords
{
    protected static string $resource = ProductDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
