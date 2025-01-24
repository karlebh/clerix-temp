<?php

namespace App\Filament\Resources\PurchaseResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\PurchaseResource;
use Filament\Actions;

class CreatePurchase extends CreateIndexRedirect
{
    protected static string $resource = PurchaseResource::class;
}
