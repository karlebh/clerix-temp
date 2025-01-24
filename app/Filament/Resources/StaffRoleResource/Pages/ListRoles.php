<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use App\Models\Role;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon(
                    'heroicon-o-pencil'
                )->form([
                    Forms\Components\TextInput::make('name')
                        ->live()
                        ->afterStateUpdated(fn($state, Set $set) => $set('guard_name', str()->slug($state)))
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('guard_name')
                        ->live()
                        ->readOnly()
                        ->required()
                        ->columnSpanFull(),
                ])->action(function (array $data) {
                    Role::create($data);

                    Notification::make()
                        ->title('Success')
                        ->body('Role successfully created.')
                        ->success()
                        ->send();
                })
        ];
    }
}
