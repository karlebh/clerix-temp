<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\ExpenseResource;
use Filament\Actions;

class EditExpense extends EditIndexRedirect
{
    protected static string $resource = ExpenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
