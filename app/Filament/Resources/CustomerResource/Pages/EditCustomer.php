<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\CustomerResource;
use Filament\Actions;

class EditCustomer extends EditIndexRedirect
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
