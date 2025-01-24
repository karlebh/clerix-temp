<?php

namespace App\Filament\Resources\WareHouseResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\WareHouseResource;
use Filament\Actions;

class CreateWareHouse extends CreateIndexRedirect
{
    protected static string $resource = WareHouseResource::class;
}
