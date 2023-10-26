<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItemConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the data you want to seed manually
        $data = [
            ['item_condition' => 'New'],
            ['item_condition' => 'Damaged'],
            ['item_condition' => 'Defective'],
            // Add more manual data as needed
        ];

        // Insert the manual data into the "item_condition" table
        DB::table('item_condition')->insert($data);

        // Use Faker to generate and insert additional data
        $faker = Faker::create();

        foreach (range(1, 2) as $index) {
            DB::table('item_condition')->insert([
                'item_condition' => $faker->word,
            ]);
        }
    }
}
