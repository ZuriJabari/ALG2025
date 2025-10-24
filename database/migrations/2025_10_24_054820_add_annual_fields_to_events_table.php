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
            $table->unsignedSmallInteger('year')->after('id')->index();
            $table->string('slug')->after('year')->unique();
            $table->enum('status', ['upcoming', 'past'])->default('upcoming')->after('is_featured')->index();
            $table->longText('description')->nullable()->after('subtitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['year', 'slug', 'status', 'description']);
        });
    }
};
