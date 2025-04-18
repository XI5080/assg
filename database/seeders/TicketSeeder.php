<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //testuser
        DB::table('tickets')->insert([
            'name' => 'testuser',
            'events_id' => 1,
            'date' => '2025-01-01',
            'time' => '10:00:00',
            'pax' => '2',
            'venues_id' => 1,
        ]);
        DB::table('tickets')->insert([
            'name' => 'testuser',
            'events_id' => 2,
            'date' => '2025-01-02',
            'time' => '15:00:00',
            'pax' => '3',
            'venues_id' => 1,
        ]);
        DB::table('tickets')->insert([
            'name' => 'testuser',
            'events_id' => 3,
            'date' => '2025-01-03',
            'time' => '17:00:00',
            'pax' => '2',
            'venues_id' => 5,
        ]);
        DB::table('tickets')->insert([
            'name' => 'testuser',
            'events_id' => 6,
            'date' => '2025-01-04',
            'time' => '18:00:00',
            'pax' => '1',
            'venues_id' => 5,
        ]);
        DB::table('tickets')->insert([
            'name' => 'testuser',
            'events_id' => 10,
            'date' => '2025-01-05',
            'time' => '20:00:00',
            'pax' => '4',
            'venues_id' => 9,
        ]);

        //admin
        DB::table('tickets')->insert([
            'name' => 'admin',
            'events_id' => 7,
            'date' => '2025-01-06',
            'time' => '12:00:00',
            'pax' => '3',
            'venues_id' => 1,
        ]);
        DB::table('tickets')->insert([
            'name' => 'admin',
            'events_id' => 4,
            'date' => '2025-01-07',
            'time' => '9:00:00',
            'pax' => '2',
            'venues_id' => 8,
        ]);
        DB::table('tickets')->insert([
            'name' => 'admin',
            'events_id' => 9,
            'date' => '2025-01-08',
            'time' => '16:00:00',
            'pax' => '1',
            'venues_id' => 4,
        ]);
        DB::table('tickets')->insert([
            'name' => 'admin',
            'events_id' => 5,
            'date' => '2025-01-09',
            'time' => '12:00:00',
            'pax' => '6',
            'venues_id' => 7,
        ]);
        DB::table('tickets')->insert([
            'name' => 'admin',
            'events_id' => 8,
            'date' => '2025-01-10',
            'time' => '17:00:00',
            'pax' => '10',
            'venues_id' => 8,
        ]);
        
    }
}
