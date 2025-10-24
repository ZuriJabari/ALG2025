<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            return; // SQLite doesn't support MODIFY/ENUM; skip for dev
        }
        DB::statement("ALTER TABLE heroes MODIFY content_type ENUM('image', 'video') DEFAULT 'image'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            return;
        }
        DB::statement("ALTER TABLE heroes MODIFY content_type ENUM('image', 'youtube') DEFAULT 'image'");
    }
};
