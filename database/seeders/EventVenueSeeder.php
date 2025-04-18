<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventVenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events_venues')->insert([
            'events_id' => 1,
            'venues_id' => 3,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 5,
            'venues_id' => 1,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 3,
            'venues_id' => 6,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 6,
            'venues_id' => 5,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 10,
            'venues_id' => 9,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 7,
            'venues_id' => 2,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 4,
            'venues_id' => 10,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 9,
            'venues_id' => 4,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 2,
            'venues_id' => 7,
        ]);
        DB::table('events_venues')->insert([
            'events_id' => 8,
            'venues_id' => 8,
        ]);
    }
}
