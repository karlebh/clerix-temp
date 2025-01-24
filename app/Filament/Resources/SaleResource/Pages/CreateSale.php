<?php

namespace App\Filament\Resources\SaleResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\SaleResource;
use Filament\Actions;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CreateSale extends CreateIndexRedirect
{
    protected static string $resource = SaleResource::class;
}
