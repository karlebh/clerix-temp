<?php

namespace App\Filament\Resources\ExpensesDataEntryResource\Pages;

use App\Filament\Resources\ExpensesDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExpensesDataEntries extends ListRecords
{
    protected static string $resource = ExpensesDataEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
