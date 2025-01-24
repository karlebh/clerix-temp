<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\SupplierResource;
use Filament\Actions;

class EditSupplier extends EditIndexRedirect
{
    protected static string $resource = SupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
