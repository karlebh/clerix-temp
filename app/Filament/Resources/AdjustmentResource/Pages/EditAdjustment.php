<?php

namespace App\Filament\Resources\AdjustmentResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\AdjustmentResource;
use Filament\Actions;

class EditAdjustment extends EditIndexRedirect
{
    protected static string $resource = AdjustmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
