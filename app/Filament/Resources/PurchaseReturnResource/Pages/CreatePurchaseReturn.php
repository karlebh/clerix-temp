<?php

namespace App\Filament\Resources\PurchaseReturnResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\PurchaseReturnResource;
use Filament\Actions;

class CreatePurchaseReturn extends CreateIndexRedirect
{
    protected static string $resource = PurchaseReturnResource::class;
}
