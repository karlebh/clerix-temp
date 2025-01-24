<?php

namespace App\Filament\Resources\SupplierPaymentResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\SupplierPaymentResource;
use Filament\Actions;

class EditSupplierPayment extends EditIndexRedirect
{
    protected static string $resource = SupplierPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
