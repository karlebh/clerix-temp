<?php

namespace App\Filament\Resources\WareHouseResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\WareHouseResource;
use Filament\Actions;

class EditWareHouse extends EditIndexRedirect
{
    protected static string $resource = WareHouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
