<?php

namespace App\Filament\Resources\BrandResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\BrandResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBrand extends CreateIndexRedirect
{
    protected static string $resource = BrandResource::class;
}
