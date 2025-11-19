<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement("ALTER TABLE seat_reservations MODIFY COLUMN fellowship ENUM('YELP','HUDUMA','The Griot Fellowship','KAS Network','Africa Champions Invite','Member of Faculty','Board/Management','Partner/Affiliate') NULL");
        }
    }

    public function down(): void
    {
        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement("ALTER TABLE seat_reservations MODIFY COLUMN fellowship ENUM('YELP','HUDUMA','The Griot Fellowship') NULL");
        }
    }
};
