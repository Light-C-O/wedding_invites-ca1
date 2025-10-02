<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venue;
use Carbon\Carbon;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $currentTimestamp = Carbon:: now();
                Venue::insert([
            [
                'title' => 'Elegant Garden Hall',
                'location' => 'Dublin, Ireland',
                'price' => 2500.00,
                'capacity' => 150,
                'image' => 'images/venues/garden_hall.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Seaside View Venue',
                'location' => 'Galway, Ireland',
                'price' => 3000.00,
                'capacity' => 200,
                'image' => 'images/venues/seaside_view.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Classic Castle Venue',
                'location' => 'Kilkenny, Ireland',
                'price' => 4500.00,
                'capacity' => 180,
                'image' => 'images/venues/castle.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Modern City Loft',
                'location' => 'Cork, Ireland',
                'price' => 2000.00,
                'capacity' => 120,
                'image' => 'images/venues/city_loft.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Rustic Barn Venue',
                'location' => 'Limerick, Ireland',
                'price' => 1800.00,
                'capacity' => 100,
                'image' => 'images/venues/barn.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Mountain Retreat',
                'location' => 'Wicklow, Ireland',
                'price' => 1800.00,
                'capacity' => 400,
                'image' => 'images/venues/mountain_retreat.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
        ]);
    }
}

