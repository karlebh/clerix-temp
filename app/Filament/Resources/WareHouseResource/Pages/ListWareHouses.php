<?php

namespace App\Filament\Resources\WareHouseResource\Pages;

use App\Filament\Resources\WareHouseResource;
use App\Models\Warehouse;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListWareHouses extends ListRecords
{
    protected static string $resource = WareHouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Create Warehouse')
                ->icon('heroicon-o-pencil')
                ->form([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->columnSpan(3)
                        ->unique(ignoreRecord: true),
                    Forms\Components\RichEditor::make('address')
                        ->required()
                        ->columnSpan(3)
                        ->nullable(),
                    Forms\Components\TextInput::make('stock')
                        ->numeric()
                        ->minValue(1)
                        ->columnSpan(3)
                        ->required()
                ])
                ->action(function (array $data) {
                    $data = array_map(fn($value) => strip_tags($value), $data);
                    Warehouse::create($data);

                    Notification::make()
                        ->title('Warehouse Created')
                        ->success()
                        ->body('The warehouse has been successfully created.')
                        ->send();
                }),
        ];
    }
}
