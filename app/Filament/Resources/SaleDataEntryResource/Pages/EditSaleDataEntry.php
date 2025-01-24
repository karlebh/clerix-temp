<?php

namespace App\Filament\Resources\SaleDataEntryResource\Pages;

use App\Filament\Resources\SaleDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSaleDataEntry extends EditRecord
{
    protected static string $resource = SaleDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
