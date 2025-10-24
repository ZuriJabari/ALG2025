<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomeSettings extends Settings
{
    public int $current_event_year = 2025;
    public ?int $featured_speakers_limit = 4;
    public ?int $features_limit = 6;
    public ?string $cta_text = null;
    public ?string $cta_button_label = null;
    public ?string $cta_button_url = null;

    public static function group(): string
    {
        return 'home';
    }
}
