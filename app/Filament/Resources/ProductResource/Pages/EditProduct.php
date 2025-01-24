<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\ProductResource;
use Filament\Actions;

class EditProduct extends EditIndexRedirect
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
