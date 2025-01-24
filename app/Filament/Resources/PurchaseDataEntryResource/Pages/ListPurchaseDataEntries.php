<?php

namespace App\Filament\Resources\PurchaseDataEntryResource\Pages;

use App\Filament\Resources\PurchaseDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPurchaseDataEntries extends ListRecords
{
    protected static string $resource = PurchaseDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
