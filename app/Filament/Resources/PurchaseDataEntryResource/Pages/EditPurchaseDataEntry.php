<?php

namespace App\Filament\Resources\PurchaseDataEntryResource\Pages;

use App\Filament\Resources\PurchaseDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPurchaseDataEntry extends EditRecord
{
    protected static string $resource = PurchaseDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
