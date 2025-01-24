<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\ProductResource;
use Filament\Actions;

class CreateProduct extends CreateIndexRedirect
{
    protected static string $resource = ProductResource::class;
}
