<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidents')->insert([
            'status_id' => 1,
            'description' => 'exemple de description',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
