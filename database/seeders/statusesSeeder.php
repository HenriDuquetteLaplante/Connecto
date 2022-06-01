<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusesArray = ['Isolée', 'En cours de résolution', 'Résolu'];

        foreach ($statusesArray as $status) {
            DB::table('statuses')->insert(
                ['status' => $status]
            );
        }
    }
}
