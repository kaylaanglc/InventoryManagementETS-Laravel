<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the data you want to seed manually
        $data = [
            ['item_type' => 'Electronics'],
            ['item_type' => 'Apparel'],
            ['item_type' => 'Food and Beverages'],
            // Add more manual data as needed
        ];

        // Insert the manual data into the "item_type" table
        DB::table('item_type')->insert($data);

        // Use Faker to generate and insert additional data
        $faker = Faker::create();

        foreach (range(1, 2) as $index) {
            DB::table('item_type')->insert([
                'item_type' => $faker->word,
            ]);
        }
    }
}
