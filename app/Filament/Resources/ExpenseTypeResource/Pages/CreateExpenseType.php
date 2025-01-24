<?php

namespace App\Filament\Resources\ExpenseTypeResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\ExpenseTypeResource;
use Filament\Actions;

class CreateExpenseType extends CreateIndexRedirect
{
    protected static string $resource = ExpenseTypeResource::class;
}
