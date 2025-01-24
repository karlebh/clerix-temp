<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\CategoryResource;
use Filament\Actions;

class CreateCategory extends CreateIndexRedirect
{
    protected static string $resource = CategoryResource::class;
}
