<?php

namespace App\Filament\Resources\CustomerDataEntryResource\Pages;

use App\Filament\Resources\CustomerDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerDataEntry extends EditRecord
{
    protected static string $resource = CustomerDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
