<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class problemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problemsArray = [
            'Impossible pour l\'appareil de se connecter aux serveurs de Connecto',
            'Tous mes appareils Connecto affichent un message d\'erreur',
            'L\'application mobile ne charge pas (symbole de chargement en continu)',
            'Les alertes ne fonctionnent plus',
            'Impossible d\'accéder au flux vidéo et/ou l\'historique des enregistrements (Connecto Cam)',
            'Impossible d\'accéder aux services Connecto Pro (message d\'erreur ou symbole de chargement en continu)',
            'Autre'
        ];


        foreach ($problemsArray as $problem) {
            DB::table('problems')->insert([
                'type' => $problem,
                
            ]);
        }
    }
}
