<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Helpers\CreateIndexRedirect;
use App\Filament\Resources\ReportResource;
use Filament\Actions;

class CreateReport extends CreateIndexRedirect
{
    protected static string $resource = ReportResource::class;
}
