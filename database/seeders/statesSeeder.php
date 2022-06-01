<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statesArray = ['Opérationnel' => '#45E92B',
                        'En maintenance' => '#4579FF',
                        'Détérioration de la performance' => '#F0F34E',
                        'Panne partielle' => '#F4963E',
                        'Panne majeure' => '#F10000',];

        foreach ($statesArray as $state => $color) {
            DB::table('states')->insert(
                ['name' => $state,
                 'color' => $color],
            );
        }
    }
}

