<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\StaffResource;
use Filament\Actions;

class EditStaff extends EditIndexRedirect
{
    protected static string $resource = StaffResource::class;

    public function getTitle(): string
    {
        return 'Edit New Staff';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
