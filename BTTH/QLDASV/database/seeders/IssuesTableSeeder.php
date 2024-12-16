<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 10),
                'reported_by' => $faker->name,
                'reported_date' => now(),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In progress', 'Resolvaed']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
