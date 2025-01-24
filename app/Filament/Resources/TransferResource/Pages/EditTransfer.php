<?php

namespace App\Filament\Resources\TransferResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\TransferResource;
use Filament\Actions;

class EditTransfer extends EditIndexRedirect
{
    protected static string $resource = TransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
