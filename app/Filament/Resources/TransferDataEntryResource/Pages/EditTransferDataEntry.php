<?php

namespace App\Filament\Resources\TransferDataEntryResource\Pages;

use App\Filament\Resources\TransferDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransferDataEntry extends EditRecord
{
    protected static string $resource = TransferDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
