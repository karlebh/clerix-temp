<?php

namespace App\Filament\Resources\AdjustmentResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\AdjustmentResource;
use Filament\Actions;

class CreateAdjustment extends CreateIndexRedirect
{
    protected static string $resource = AdjustmentResource::class;
}
