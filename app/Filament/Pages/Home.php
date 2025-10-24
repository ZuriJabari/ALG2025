<?php

namespace App\Filament\Pages;

use App\Settings\HomeSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class Home extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Home Settings';

    protected static bool $shouldRegisterNavigation = false;

    protected static string $settings = HomeSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Event Configuration')
                    ->schema([
                        Forms\Components\TextInput::make('current_event_year')
                            ->numeric()
                            ->required()
                            ->default(2025),
                        Forms\Components\TextInput::make('featured_speakers_limit')
                            ->numeric()
                            ->default(4),
                        Forms\Components\TextInput::make('features_limit')
                            ->numeric()
                            ->default(6),
                    ]),
                Forms\Components\Section::make('Call to Action')
                    ->schema([
                        Forms\Components\Textarea::make('cta_text')
                            ->rows(3)
                            ->placeholder('CTA message for the homepage'),
                        Forms\Components\TextInput::make('cta_button_label')
                            ->placeholder('e.g., Register Now'),
                        Forms\Components\TextInput::make('cta_button_url')
                            ->url()
                            ->placeholder('https://...'),
                    ]),
            ]);
    }
}
