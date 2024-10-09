<?php

namespace Database\Seeders;

use App\Models\Reports;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 150000; $i++) {
            Reports::query()->insert([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'phone' => rand(18, 60),
            ]);
        }
    }
}
