<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Main database seeder class
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // php artisan db:seed --class:Name
        //Calls class seeders to the tables
        //Commented out to prevent duplicate seeding

            $this->call([
                VenueSeeder::class,
                WeddingSeeder::class,
                AdminSeeder::class,
                GuestSeeder::class,
            ]);
    }
}
