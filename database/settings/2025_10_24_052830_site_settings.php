<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.site_name', 'ALG');
        $this->migrator->add('site.logo_light', null);
        $this->migrator->add('site.logo_dark', null);
        $this->migrator->add('site.primary_color', '#00C2B3');
        $this->migrator->add('site.secondary_color', '#FF8C00');
        $this->migrator->add('site.twitter', null);
        $this->migrator->add('site.linkedin', null);
        $this->migrator->add('site.youtube', null);
        $this->migrator->add('site.footer_text', '© '.date('Y').' Africa Leadership Group');
    }
};
