<?php

namespace App\Providers\Filament;

use App\Filament\Dashboard\Pages\Dashboard;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\SaleResource;
use App\Models\Sale;
use Faker\Core\Color as CoreColor;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Pages\Auth\Register;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Rmsramos\Activitylog\ActivitylogPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            // ->emailVerification()
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => Color::Indigo,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
                'secondary' => Color::Green,
            ])
            ->plugins([
                ActivitylogPlugin::make(),
            ])
            ->brandName('Clearix')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Dashboard::class
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigationGroups([
                NavigationGroup::make('Website')
                    ->items([]),
                NavigationGroup::make()
                    ->label('Manage Sales'),
                NavigationGroup::make()
                    ->label('Manage Purchases'),
                NavigationGroup::make()
                    ->label('Manage Products'),
                NavigationGroup::make()
                    ->label('Manage Warehouses'),
                NavigationGroup::make()
                    ->label('Manage Customers'),
                NavigationGroup::make()
                    ->label('Manage Suppliers'),
                NavigationGroup::make()
                    ->label('Manage Staff'),
                NavigationGroup::make()
                    ->label('Manage Expenses'),
                NavigationGroup::make()
                    ->label('Payment Report'),
                NavigationGroup::make()
                    ->label('Extra'),
                NavigationGroup::make()
                    ->label('Data Entry Report'),
            ]);
    }
}
