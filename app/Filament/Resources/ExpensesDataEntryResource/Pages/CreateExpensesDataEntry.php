<?php

namespace App\Filament\Resources\ExpensesDataEntryResource\Pages;

use App\Filament\Resources\ExpensesDataEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExpensesDataEntry extends CreateRecord
{
    protected static string $resource = ExpensesDataEntryResource::class;
}
