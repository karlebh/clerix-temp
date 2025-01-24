<?php

namespace App\Filament\Resources\SaleDataEntryResource\Pages;

use App\Filament\Resources\SaleDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSaleDataEntries extends ListRecords
{
    protected static string $resource = SaleDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
