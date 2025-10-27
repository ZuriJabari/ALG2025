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
            ->spa()
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
                $css = 'body.fi-body{background:linear-gradient(180deg,#0b1220,#0b1220 40%,#0f172a)!important}main.fi-simple-main{background:rgba(15,23,42,.95)!important;backdrop-filter:blur(12px)saturate(150%)!important;border:1px solid rgba(148,163,184,.3)!important;box-shadow:0 25px 50px -15px rgba(0,0,0,.7)!important;border-radius:1rem!important}h1.fi-simple-header-heading,div.fi-logo{color:#f3f4f6!important}label.fi-fo-field-wrp-label span,label.fi-fo-field-wrp-label{color:#f3f4f6!important}div.fi-input-wrp{background:rgba(15,23,42,.8)!important;border-color:rgba(148,163,184,.4)!important;box-shadow:inset 0 2px 4px rgba(0,0,0,.3)!important}input.fi-input{background:transparent!important;color:#f3f4f6!important;-webkit-text-fill-color:#f3f4f6!important}input.fi-input::placeholder{color:#9ca3af!important;opacity:1!important}button.fi-btn[type=submit],button[type=submit].fi-ac-btn-action{background:linear-gradient(135deg,#14b8a6 0%,#0ea5e9 100%)!important;color:#fff!important;box-shadow:0 10px 25px -5px rgba(20,184,166,.6)!important;border:none!important}button.fi-btn[type=submit]:hover,button[type=submit].fi-ac-btn-action:hover{transform:translateY(-2px)!important;box-shadow:0 15px 35px -5px rgba(20,184,166,.75)!important}input.fi-checkbox-input{background:rgba(15,23,42,.9)!important;border-color:rgba(148,163,184,.5)!important}';
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
