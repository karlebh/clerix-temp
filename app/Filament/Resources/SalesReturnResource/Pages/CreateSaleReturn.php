<?php

namespace App\Filament\Resources\SaleReturnResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\SaleReturnResource;
use Filament\Actions;

class CreateSaleReturn extends CreateIndexRedirect
{
    protected static string $resource = SaleReturnResource::class;
}
