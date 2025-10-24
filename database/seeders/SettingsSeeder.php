<?php

namespace Database\Seeders;

use App\Settings\SiteSettings;
use App\Settings\HomeSettings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $site = app(SiteSettings::class);
        $site->site_name = 'ALG';
        $site->logo_light = '/assets/logo.png';
        $site->logo_dark = '/assets/dark-logo.png';
        $site->primary_color = '#00C2B3';
        $site->secondary_color = '#FF8C00';
        $site->twitter = null;
        $site->linkedin = null;
        $site->youtube = null;
        $site->footer_text = '© 2025 Africa Leadership Group';
        $site->save();

        $home = app(HomeSettings::class);
        $home->current_event_year = 2025;
        $home->featured_speakers_limit = 4;
        $home->features_limit = 6;
        $home->cta_text = null;
        $home->cta_button_label = null;
        $home->cta_button_url = null;
        $home->save();
    }
}
