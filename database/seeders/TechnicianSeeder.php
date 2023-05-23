<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('technicians')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'age' => $faker->numberBetween(18, 35),
                'experience' => $faker->numberBetween(1, 15),
                'admin_id' => $faker->numberBetween(1, 10),
                'category_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
