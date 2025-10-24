<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public string $site_name = 'ALG';
    public ?string $logo_light = null;
    public ?string $logo_dark = null;
    public ?string $primary_color = '#00C2B3';
    public ?string $secondary_color = '#FF8C00';
    public ?string $twitter = null;
    public ?string $linkedin = null;
    public ?string $youtube = null;
    public ?string $footer_text = null;

    public static function group(): string
    {
        return 'site';
    }
}
