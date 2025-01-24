<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\SupplierResource;
use Filament\Actions;

class CreateSupplier extends CreateIndexRedirect
{
    protected static string $resource = SupplierResource::class;
}
