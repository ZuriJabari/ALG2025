<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('seat_reservations', function (Blueprint $table) {
            $table->boolean('is_fellow')->default(false)->after('phone');
            $table->enum('fellowship', ['YELP','HUDUMA','The Griot Fellowship'])->nullable()->after('is_fellow');
        });
    }

    public function down(): void
    {
        Schema::table('seat_reservations', function (Blueprint $table) {
            $table->dropColumn(['is_fellow','fellowship']);
        });
    }
};
