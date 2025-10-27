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
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('url', 500);
            $table->string('page_title', 255)->nullable();
            $table->string('referrer', 500)->nullable();
            $table->string('user_agent', 500)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('country', 2)->nullable();
            $table->string('device_type', 20)->nullable(); // mobile, desktop, tablet
            $table->timestamp('viewed_at');
            $table->index('viewed_at');
            $table->index('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
