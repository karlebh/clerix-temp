<?php

namespace App\Filament\Resources\ExpenseTypeResource\Pages;

use App\Filament\Resources\ExpenseTypeResource;
use App\Models\ExpenseType;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Filament\Notifications\Notification;

class ListExpenseTypes extends ListRecords
{
    protected static string $resource = ExpenseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-pencil')
                ->form([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->columnSpanFull(),
                ])->action(function (array $data) {

                    ExpenseType::create($data);

                    Notification::make()
                        ->title('Success')
                        ->body('Expense Type successfully created.')
                        ->success()
                        ->send();
                }),
        ];
    }
}
