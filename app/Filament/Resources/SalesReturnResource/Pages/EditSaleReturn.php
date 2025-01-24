<?php

namespace App\Filament\Resources\SaleReturnResource\Pages;

use App\Filament\Helpers\EditIndexRedirect;
use App\Filament\Resources\SaleReturnResource;
use Filament\Actions;

class EditSaleReturn extends EditIndexRedirect
{
    protected static string $resource = SaleReturnResource::class;

    public function getHeading(): string
    {
        return 'Edit ' .  str_ireplace("edit", "", basename(__CLASS__));
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
