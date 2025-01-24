<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\ReportResource;
use Filament\Actions;

class EditReport extends EditIndexRedirect
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
