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
            'eventName' => 'Conference',
            'duration' => 240,
            'description' => 'This is the description for the conference event.',
            'eventType' => 'Conference',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Blood Donation',
            'duration' => 120,
            'description' => 'This is the description for the blood donation event.',
            'eventType' => 'Blood Donation',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Workshop',
            'duration' => 60,
            'description' => 'This is the description for the workshop event.',
            'eventType' => 'Workshop',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Campus Tour',
            'duration' => 180,
            'description' => 'This is the description for the campus tour event.',
            'eventType' => 'Campus Tour',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Orientation',
            'duration' => 240,
            'description' => 'This is the description for the orientation event.',
            'eventType' => 'Orientation',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Career Fair',
            'duration' => 120,
            'description' => 'This is the description for the career fair event.',
            'eventType' => 'Career Fair',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Poster Competition',
            'duration' => 120,
            'description' => 'This is the description for the poster competition event.',
            'eventType' => 'Competition',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Drawing Competition',
            'duration' => 120,
            'description' => 'This is the description for the drawing competition event.',
            'eventType' => 'Competition',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Talk Show',
            'duration' => 100,
            'description' => 'This is the description for the talk show event.',
            'eventType' => 'Talk Show',
        ]);
        DB::table('events')->insert([
            'eventName' => 'Countdown Concert "Sungai Long"',
            'duration' => 120,
            'description' => 'This is the description for the countdown concert event.',
            'eventType' => 'Concert',
        ]);

    }
}
