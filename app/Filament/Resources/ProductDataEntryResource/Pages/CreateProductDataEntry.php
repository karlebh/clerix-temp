<?php

namespace App\Filament\Resources\ProductDataEntryResource\Pages;

use App\Filament\Resources\ProductDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductDataEntry extends CreateRecord
{
    protected static string $resource = ProductDataEntryResource::class;
}
