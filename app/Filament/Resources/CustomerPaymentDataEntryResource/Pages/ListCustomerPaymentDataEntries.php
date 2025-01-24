<?php

namespace App\Filament\Resources\CustomerPaymentDataEntryResource\Pages;

use App\Filament\Resources\CustomerPaymentDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomerPaymentDataEntries extends ListRecords
{
    protected static string $resource = CustomerPaymentDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
