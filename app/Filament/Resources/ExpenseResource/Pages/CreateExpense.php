<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\ExpenseResource;
use Filament\Actions;

class CreateExpense extends CreateIndexRedirect
{
    protected static string $resource = ExpenseResource::class;
}
