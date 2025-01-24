<?php

namespace App\Filament\Pages\Extra;

use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Artisan;

class Cache extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-stop-circle';

    protected static ?string $navigationGroup = 'Extra';

    protected static string $view = 'filament.pages.extra.cache';

    public function clearCache()
    {
        Artisan::call('optimize:clear');
        Notification::make()
            ->title('Success!')
            ->body('The cache has been cleared successfully.')
            ->success()
            ->send();
    }
}
