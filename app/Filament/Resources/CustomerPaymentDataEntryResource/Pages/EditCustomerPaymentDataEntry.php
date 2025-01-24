<?php

namespace App\Filament\Resources\CustomerPaymentDataEntryResource\Pages;

use App\Filament\Resources\CustomerPaymentDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerPaymentDataEntry extends EditRecord
{
    protected static string $resource = CustomerPaymentDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
