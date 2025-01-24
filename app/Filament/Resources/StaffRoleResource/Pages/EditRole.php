<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditIndexRedirect
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
