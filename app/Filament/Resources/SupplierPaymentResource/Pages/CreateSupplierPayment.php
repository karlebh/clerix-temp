<?php

namespace App\Filament\Resources\SupplierPaymentResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\SupplierPaymentResource;
use Filament\Actions;

class CreateSupplierPayment extends CreateIndexRedirect
{
    protected static string $resource = SupplierPaymentResource::class;
}
