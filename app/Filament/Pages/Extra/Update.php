<?php

namespace App\Filament\Pages\Extra;

use Filament\Pages\Page;

class Update extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    protected static ?string $navigationGroup = 'Extra';

    protected static string $view = 'filament.pages.extra.update';
}
