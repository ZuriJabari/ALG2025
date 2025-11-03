<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('page_views')) {
            Schema::create('page_views', function (Blueprint $table) {
                $table->id();
                $table->string('url', 2048);
                $table->string('page_title')->nullable();
                $table->string('referrer', 2048)->nullable();
                $table->text('user_agent')->nullable();
                $table->string('ip_address', 64)->nullable();
                $table->string('country', 128)->nullable();
                $table->string('device_type', 32)->nullable();
                $table->timestamp('viewed_at')->index();
                $table->timestamps();
                $table->index(['ip_address', 'viewed_at']);
                $table->index(['device_type', 'viewed_at']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
