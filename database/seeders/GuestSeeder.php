<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guest;
use App\Models\Wedding;
use App\Models\Venue;
use Carbon\Carbon;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon:: now();
        //
        $guests = [
            [
                'user_id' => 1,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'plus1' => 'Jane Doe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'first_name' => 'Emily',
                'last_name' => 'Smith',
                'email' => 'emily.smith@example.com',
                'plus1' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'email' => 'michael.johnson@example.com',
                'plus1' => 'Sarah Johnson',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'first_name' => 'Olivia',
                'last_name' => 'Brown',
                'email' => 'olivia.brown@example.com',
                'plus1' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'first_name' => 'William',
                'last_name' => 'Davis',
                'email' => 'william.davis@example.com',
                'plus1' => 'Emma Davis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'first_name' => 'Sophia',
                'last_name' => 'Martinez',
                'email' => 'sophia.martinez@example.com',
                'plus1' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        foreach ($guests as $guestData) {
            $guest = Guest::create(array_merge($guestData, [
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]));

            
            //randomly selects two guest IDs from the guest table and links them to a venue through a many-to-many relationship, if guests exist.
            $weddings = Wedding::inRandomOrder()->take(2)->pluck('id');
            $guest->weddings()->attach($weddings);

             $venueIds = Venue::inRandomOrder()->take(2)->pluck('id')->toArray();
                $guest->venues()->syncWithoutDetaching($venueIds);
        }
    }
}
