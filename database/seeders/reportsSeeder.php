<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class reportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        foreach (range(1,10) as $index) {
            DB::table('reports')->insert([
                'component_id' => rand(1, 12),
                'problem_id' => rand(1, 5),
                'description' => $faker->text($maxNbChars = 50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
