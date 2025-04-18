<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('venues')->insert([
            'location' => 'MPH',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall1',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall2',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall3',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall4',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall5',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall6',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall7',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall8',
        ]);
        DB::table('venues')->insert([
            'location' => 'Hall9',
        ]);
    }
}
