<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('events')) {
            // Update exact old string to new venue
            DB::table('events')
                ->where('location', 'Victoria Hall, Kampala Sheraton Hotel')
                ->update(['location' => 'Four Points by Sheraton']);

            // Optional: normalize common variants to new venue (idempotent)
            DB::table('events')
                ->whereIn('location', [
                    'Sheraton Kampala Hotel',
                    'Kampala Sheraton Hotel',
                    'Victoria Hall, Sheraton Kampala Hotel',
                ])
                ->update(['location' => 'Four Points by Sheraton']);
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('events')) {
            // Revert only the exact cases we changed above back to the primary old string
            DB::table('events')
                ->where('location', 'Four Points by Sheraton')
                ->update(['location' => 'Victoria Hall, Kampala Sheraton Hotel']);
        }
    }
};
