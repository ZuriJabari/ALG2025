<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('event_days', function (Blueprint $table) {
            $table->string('date_text')->nullable()->after('date');
        });
    }

    public function down(): void
    {
        Schema::table('event_days', function (Blueprint $table) {
            $table->dropColumn('date_text');
        });
    }
};
