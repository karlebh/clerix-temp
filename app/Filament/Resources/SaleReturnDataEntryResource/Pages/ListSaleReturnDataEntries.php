<?php

namespace App\Filament\Resources\SaleReturnDataEntryResource\Pages;

use App\Filament\Resources\SaleReturnDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSaleReturnDataEntries extends ListRecords
{
    protected static string $resource = SaleReturnDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
