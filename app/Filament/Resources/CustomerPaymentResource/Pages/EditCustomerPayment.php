<?php

namespace App\Filament\Resources\CustomerPaymentResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\CustomerPaymentResource;
use Filament\Actions;
use Filament\Forms\Form;

class EditCustomerPayment extends EditIndexRedirect
{
    protected static string $resource = CustomerPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
