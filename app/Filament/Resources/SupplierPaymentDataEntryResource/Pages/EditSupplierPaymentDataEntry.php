<?php

namespace App\Filament\Resources\SupplierPaymentDataEntryResource\Pages;

use App\Filament\Resources\SupplierPaymentDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupplierPaymentDataEntry extends EditRecord
{
    protected static string $resource = SupplierPaymentDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
