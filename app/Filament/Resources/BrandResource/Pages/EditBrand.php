<?php

namespace App\Filament\Resources\BrandResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\BrandResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrand extends EditIndexRedirect
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
