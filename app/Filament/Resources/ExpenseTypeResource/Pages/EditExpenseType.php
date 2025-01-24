<?php

namespace App\Filament\Resources\ExpenseTypeResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\ExpenseTypeResource;
use Filament\Actions;

class EditExpenseType extends EditIndexRedirect
{
    protected static string $resource = ExpenseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
