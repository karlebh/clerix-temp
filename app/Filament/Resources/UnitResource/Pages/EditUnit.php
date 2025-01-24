<?php

namespace App\Filament\Resources\UnitResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\UnitResource;
use Filament\Actions;

class EditUnit extends EditIndexRedirect
{
    protected static string $resource = UnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
