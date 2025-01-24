<?php

namespace App\Filament\Resources\PurchaseReturnDataEntryResource\Pages;

use App\Filament\Resources\PurchaseReturnDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPurchaseReturnDataEntry extends EditRecord
{
    protected static string $resource = PurchaseReturnDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
