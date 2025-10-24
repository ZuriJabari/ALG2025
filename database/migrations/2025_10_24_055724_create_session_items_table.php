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
        Schema::dropIfExists('session_items');
        Schema::create('session_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained('event_sessions')->cascadeOnDelete();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('moderator_id')->nullable()->constrained('speakers')->nullOnDelete();
            $table->integer('ordering')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_items');
    }
};
