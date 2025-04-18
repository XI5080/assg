<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'attendee',]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',]);
            
        // Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        
        
        // Attendee user
        User::create([
            'name' => 'Attendee User',
            'email' => 'attendee1@example.com',
            'password' => Hash::make('password'),
            'role' => 'attendee',
        ]);
        
        // Create random users
        User::factory()->count(10)->create(['role' => 'admin']);
        User::factory()->count(20)->create(['role' => 'attendee']);
    }
}