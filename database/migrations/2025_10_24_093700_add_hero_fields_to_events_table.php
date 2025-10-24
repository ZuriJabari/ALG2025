<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('hero_title')->nullable()->after('subtitle');
            $table->text('hero_description')->nullable()->after('hero_title');
            $table->string('hero_cta_label')->nullable()->after('hero_description');
            $table->string('hero_cta_url')->nullable()->after('hero_cta_label');
            $table->string('hero_image_path')->nullable()->after('hero_cta_url');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title',
                'hero_description',
                'hero_cta_label',
                'hero_cta_url',
                'hero_image_path',
            ]);
        });
    }
};
