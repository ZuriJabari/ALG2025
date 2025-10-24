<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('home.current_event_year', 2025);
        $this->migrator->add('home.featured_speakers_limit', 4);
        $this->migrator->add('home.features_limit', 6);
        $this->migrator->add('home.cta_text', null);
        $this->migrator->add('home.cta_button_label', null);
        $this->migrator->add('home.cta_button_url', null);
    }
};
