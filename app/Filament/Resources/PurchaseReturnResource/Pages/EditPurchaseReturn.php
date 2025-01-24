<?php

namespace App\Filament\Resources\PurchaseReturnResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\PurchaseReturnResource;
use Filament\Actions;

class EditPurchaseReturn extends EditIndexRedirect
{
    protected static string $resource = PurchaseReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Delete Purchase Return'),
        ];
    }
}
