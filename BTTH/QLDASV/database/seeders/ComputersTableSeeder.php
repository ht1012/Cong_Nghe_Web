<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word, // Tạo tên máy tính ngẫu nhiên
                'model' => $faker->word, // Tạo mô hình ngẫu nhiên
                'operating_system' => $faker->word, // Hệ điều hành ngẫu nhiên
                'processor' => $faker->word, // Bộ xử lý ngẫu nhiên
                'memory' => $faker->numberBetween(4, 100), // Bộ nhớ ngẫu nhiên từ 4GB đến 100GB
                'available' => $faker->boolean, // Trạng thái có sẵn
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
