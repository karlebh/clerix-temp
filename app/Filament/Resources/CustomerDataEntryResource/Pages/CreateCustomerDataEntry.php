<?php

namespace App\Filament\Resources\CustomerDataEntryResource\Pages;

use App\Filament\Resources\CustomerDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerDataEntry extends CreateRecord
{
    protected static string $resource = CustomerDataEntryResource::class;
}
