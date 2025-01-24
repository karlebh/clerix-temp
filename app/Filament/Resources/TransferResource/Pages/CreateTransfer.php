<?php

namespace App\Filament\Resources\TransferResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\TransferResource;
use Filament\Actions;

class CreateTransfer extends CreateIndexRedirect
{
    protected static string $resource = TransferResource::class;
}
