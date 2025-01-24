<?php

namespace App\Filament\Resources\UnitResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\UnitResource;
use Filament\Actions;

class CreateUnit extends CreateIndexRedirect
{
    protected static string $resource = UnitResource::class;
}
