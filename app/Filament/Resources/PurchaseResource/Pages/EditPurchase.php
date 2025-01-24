<?php

namespace App\Filament\Resources\PurchaseResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\PurchaseResource;
use Filament\Actions;

class EditPurchase extends EditIndexRedirect
{
    protected static string $resource = PurchaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Delete Purchase'),
        ];
    }
}
