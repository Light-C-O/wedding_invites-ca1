<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Guest::insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'plus1' => 'Jane Doe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Smith',
                'email' => 'emily.smith@example.com',
                'plus1' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'email' => 'michael.johnson@example.com',
                'plus1' => 'Sarah Johnson',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Olivia',
                'last_name' => 'Brown',
                'email' => 'olivia.brown@example.com',
                'plus1' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'William',
                'last_name' => 'Davis',
                'email' => 'william.davis@example.com',
                'plus1' => 'Emma Davis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Sophia',
                'last_name' => 'Martinez',
                'email' => 'sophia.martinez@example.com',
                'plus1' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
