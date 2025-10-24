<?php

namespace App\Filament\Pages;

use App\Settings\SiteSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class Site extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static bool $shouldRegisterNavigation = false;

    protected static string $settings = SiteSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Information')
                    ->schema([
                        Forms\Components\TextInput::make('site_name')
                            ->required()
                            ->default('ALG'),
                        Forms\Components\TextInput::make('primary_color')
                            ->default('#00C2B3'),
                        Forms\Components\TextInput::make('secondary_color')
                            ->default('#FF8C00'),
                    ]),
                Forms\Components\Section::make('Branding')
                    ->schema([
                        Forms\Components\TextInput::make('logo_light')
                            ->label('Logo Light (URL or path)'),
                        Forms\Components\TextInput::make('logo_dark')
                            ->label('Logo Dark (URL or path)'),
                    ]),
                Forms\Components\Section::make('Social Links')
                    ->schema([
                        Forms\Components\TextInput::make('twitter')
                            ->url(),
                        Forms\Components\TextInput::make('linkedin')
                            ->url(),
                        Forms\Components\TextInput::make('youtube')
                            ->url(),
                    ]),
                Forms\Components\Section::make('Footer')
                    ->schema([
                        Forms\Components\Textarea::make('footer_text')
                            ->rows(3),
                    ]),
            ]);
    }
}
