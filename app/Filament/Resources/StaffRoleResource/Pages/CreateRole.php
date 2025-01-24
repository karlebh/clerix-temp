<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateIndexRedirect
{
    protected static string $resource = RoleResource::class;
}
