<?php

namespace App\Filament\Resources\UnitResource\Pages;

use App\Filament\Resources\UnitResource;
use App\Models\Unit;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListUnits extends ListRecords
{
    protected static string $resource = UnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-pencil')
                ->form([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('quantity')
                        ->numeric()
                        ->minValue(1)
                        ->default(0),
                ])->action(function (array $data) {
                    Unit::create($data);

                    Notification::make()
                        ->title('Success')
                        ->body('Unit has been successfully created.')
                        ->success()
                        ->send();
                }),
        ];
    }
}
