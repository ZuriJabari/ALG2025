<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_day_speaker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_day_id')->constrained('event_days')->cascadeOnDelete();
            $table->foreignId('speaker_id')->constrained('speakers')->cascadeOnDelete();
            $table->string('role')->nullable();
            $table->integer('ordering')->default(0);
            $table->timestamps();
            $table->unique(['event_day_id','speaker_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_day_speaker');
    }
};
