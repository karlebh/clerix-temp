<?php

namespace App\Filament\Resources\SupplierPaymentDataEntryResource\Pages;

use App\Filament\Resources\SupplierPaymentDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSupplierPaymentDataEntries extends ListRecords
{
    protected static string $resource = SupplierPaymentDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
