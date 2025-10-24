<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->enum('hero_content_type', ['image', 'youtube'])->default('image')->after('hero_image_path');
            $table->string('hero_video_url', 2048)->nullable()->after('hero_content_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['hero_content_type', 'hero_video_url']);
        });
    }
};
