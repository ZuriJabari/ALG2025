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
        Schema::table('heroes', function (Blueprint $table) {
            $table->enum('content_type', ['image', 'youtube'])->default('image')->after('ordering');
            $table->string('video_url', 2048)->nullable()->after('content_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->dropColumn(['content_type', 'video_url']);
        });
    }
};
