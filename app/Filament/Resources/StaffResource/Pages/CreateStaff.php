<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\StaffResource;
use Filament\Actions;

class CreateStaff extends CreateIndexRedirect
{
    protected static string $resource = StaffResource::class;

    public function getTitle(): string
    {
        return 'Add New Staff';
    }
}
