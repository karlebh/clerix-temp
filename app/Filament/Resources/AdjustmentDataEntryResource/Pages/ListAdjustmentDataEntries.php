<?php

namespace App\Filament\Resources\AdjustmentDataEntryResource\Pages;

use App\Filament\Resources\AdjustmentDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdjustmentDataEntries extends ListRecords
{
    protected static string $resource = AdjustmentDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
