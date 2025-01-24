<?php

namespace App\Filament\Resources\CustomerPaymentResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\CustomerPaymentResource;
use Filament\Actions;

class CreateCustomerPayment extends CreateIndexRedirect
{
    protected static string $resource = CustomerPaymentResource::class;
}
