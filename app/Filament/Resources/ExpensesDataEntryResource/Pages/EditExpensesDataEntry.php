<?php

namespace App\Filament\Resources\ExpensesDataEntryResource\Pages;

use App\Filament\Resources\ExpensesDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpensesDataEntry extends EditRecord
{
    protected static string $resource = ExpensesDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
