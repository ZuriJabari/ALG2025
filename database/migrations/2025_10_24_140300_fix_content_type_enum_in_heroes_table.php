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
        // Drop and recreate the enum column with correct values
        DB::statement("ALTER TABLE heroes MODIFY content_type ENUM('image', 'video') DEFAULT 'image'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE heroes MODIFY content_type ENUM('image', 'youtube') DEFAULT 'image'");
    }
};
