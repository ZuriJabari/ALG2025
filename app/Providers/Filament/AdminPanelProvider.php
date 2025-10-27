<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\SiteStatsWidget;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(app_path('Filament/Resources'), 'App\\Filament\\Resources')
            ->discoverPages(app_path('Filament/Pages'), 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->renderHook('panels::head.end', function (): string {
                // Analytics
                $out = view('partials.analytics')->render();
                // Hardcoded minimal fallback styles for Filament auth when panel assets are blocked
                $css = '.fi-body{background:linear-gradient(180deg,#0b1220,#0b1220 40%,#0f172a)!important} .fi-simple-main{background:rgba(15,23,42,.92)!important;backdrop-filter:saturate(140%) blur(6px)!important;border:1px solid rgba(148,163,184,.25)!important;box-shadow:0 20px 40px -20px rgba(0,0,0,.6)!important} .fi-simple-header-heading,.fi-logo{color:#e5e7eb!important} .fi-input-wrp{background:rgba(11,18,32,.95)!important;border:1px solid rgba(148,163,184,.3)!important} .fi-input{background:transparent!important;color:#e5e7eb!important} .fi-input::placeholder{color:#94a3b8!important} .fi-fo-field-wrp-label{color:#e5e7eb!important} .fi-btn[type=submit]{background:linear-gradient(90deg,#14b8a6,#0ea5e9)!important;box-shadow:0 10px 18px -8px rgba(20,184,166,.55)!important;transition:transform .2s,box-shadow .2s!important} .fi-btn[type=submit]:hover{transform:translateY(-1px)!important;box-shadow:0 16px 28px -12px rgba(20,184,166,.65)!important}';
                $out .= "\n<style>\n{$css}\n</style>\n";
                return $out;
            })
            ->discoverWidgets(app_path('Filament/Widgets'), 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
                SiteStatsWidget::class,
            ])
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
            ]);
    }
}
