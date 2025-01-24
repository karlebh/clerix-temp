<?php

namespace App\Filament\Resources\CustomerPaymentDataEntryResource\Pages;

use App\Filament\Resources\CustomerPaymentDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerPaymentDataEntry extends CreateRecord
{
    protected static string $resource = CustomerPaymentDataEntryResource::class;
}
