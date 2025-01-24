<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\CustomerResource;
use Filament\Actions;

class CreateCustomer extends CreateIndexRedirect
{
    protected static string $resource = CustomerResource::class;
}
