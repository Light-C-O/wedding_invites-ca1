<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wedding;
use Carbon\Carbon;

class WeddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample wedding records into the 'weddings' table
        Wedding::insert([
            [
                'bride_name' => 'Emma Johnson',
                'groom_name' => 'Liam Carter',
                'best_man' => 'Noah Carter',
                'maid_of_honor' => 'Olivia Johnson',
                'wedding_date_time' => Carbon::create(2025, 6, 14, 16, 30, 0),
                'venue_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bride_name' => 'Sophia Martinez',
                'groom_name' => 'Ethan Smith',
                'best_man' => 'Lucas Smith',
                'maid_of_honor' => 'Ava Martinez',
                'wedding_date_time' => Carbon::create(2025, 7, 22, 15, 0, 0),
                'venue_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bride_name' => 'Chloe Anderson',
                'groom_name' => 'Mason Wright',
                'best_man' => 'James Wright',
                'maid_of_honor' => 'Grace Anderson',
                'wedding_date_time' => Carbon::create(2025, 8, 9, 17, 0, 0),
                'venue_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bride_name' => 'Isabella Nguyen',
                'groom_name' => 'Alexander Kim',
                'best_man' => 'Daniel Kim',
                'maid_of_honor' => 'Luna Nguyen',
                'wedding_date_time' => Carbon::create(2025, 9, 5, 18, 30, 0),
                'venue_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bride_name' => 'Mia Roberts',
                'groom_name' => 'Benjamin Davis',
                'best_man' => 'Henry Davis',
                'maid_of_honor' => 'Ella Roberts',
                'wedding_date_time' => Carbon::create(2025, 10, 12, 16, 0, 0),
                'venue_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bride_name' => 'Charlotte Perez',
                'groom_name' => 'William Thompson',
                'best_man' => 'Jack Thompson',
                'maid_of_honor' => 'Amelia Perez',
                'wedding_date_time' => Carbon::create(2025, 12, 20, 14, 0, 0),
                'venue_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
