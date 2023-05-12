<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'A. Kader',
                'email' => 'kader@gmail.com',
                'password' => '12345678',
            ],
        ];

        // Insert data into the database
        User::insert($data);
    }
}
