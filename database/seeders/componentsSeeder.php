<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class componentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $componentArray = ['Connecto Web','Applications mobiles (iOS et Android)', 'Caméra Connecto Cam', 'Thermostat Connecto Temp', 'Ampoule Connecto Light', 'Prise électrique Connecto Power', 'Sonnette Connecto Ring', 'Serrure Connecto Lock', 'Flux vidéo Connecto Cam en temps réel', 'Historique vidéo Connecto Cam', 'Alertes', 'Tableau de bord Connecto Pro'];

        foreach ($componentArray as $component) {
            DB::table('components')->insert(
                ['name' => $component,
                 'state_id' => 1,
                 'created_at' => now(),
                 'updated_at' => now(),]
            );
        }


    }
}


