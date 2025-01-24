<?php

namespace App\Filament\Resources\TransferDataEntryResource\Pages;

use App\Filament\Resources\TransferDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransferDataEntries extends ListRecords
{
    protected static string $resource = TransferDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
