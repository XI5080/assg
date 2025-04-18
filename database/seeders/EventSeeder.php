<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events')->insert([
            'eventName' => 'Comedy Night',
            'duration' => 150,
            'description' => 'This is the description for the comedy night event.',
            'eventType' => 'Comedy',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Mr Li Talk Show',
            'duration' => 120,
            'description' => 'This is the description for the Mr Li talk show event.',
            'eventType' => 'Talk Show',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Training Workshop',
            'duration' => 60,
            'description' => 'This is the description for the training workshop event.',
            'eventType' => 'Workshop',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Dance Competition',
            'duration' => 180,
            'description' => 'This is the description for the dance competition event.',
            'eventType' => 'Competition',
        ]);
        DB::table('events')->insert([
            'eventName' => 'See You Again',
            'duration' => 140,
            'description' => 'This is the description for the "see you again" event.',
            'eventType' => 'Concert',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Exhibition Fair',
            'duration' => 300,
            'description' => 'This is the description for the exhibition fair event.',
            'eventType' => 'Exhibition',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Food Festival',
            'duration' => 200,
            'description' => 'This is the description for the food festival event.',
            'eventType' => 'Festival',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Gala Dinner',
            'duration' => 160,
            'description' => 'This is the description for the gala dinner event.',
            'eventType' => 'Dinner',
        ]);
        DB::table('events')->insert([
            'eventName' => 'E-Sport Tournament',
            'duration' => 120,
            'description' => 'This is the description for the E-sport tournament event.',
            'eventType' => 'Tournament',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Countdown Concert "Sungai Long"',
            'duration' => 120,
            'description' => 'This is the description for the countdown concert event.',
            'eventType' => 'Concert',
        ]);

    }
}
