<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('seat_reservations', function (Blueprint $table) {
            $table->string('attendance_mode', 16)->nullable()->after('fellowship');
            $table->string('attendance_token', 64)->nullable()->unique()->after('attendance_mode');
        });
    }

    public function down(): void
    {
        Schema::table('seat_reservations', function (Blueprint $table) {
            $table->dropColumn(['attendance_mode', 'attendance_token']);
        });
    }
};
