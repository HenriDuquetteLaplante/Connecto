<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            ['role_id' => 1,
             'email' => 'admin@connecto.com',
             'password' => Hash::make('admin'),
             'first_name' => 'Bob',
             'last_name' => 'Eponge',
             'is_active' => 1,]
        );

        DB::table('users')->insert(
            ['role_id' => 2,
             'email' => 'gestion@connecto.com',
             'password' => Hash::make('gestion'),
             'first_name' => 'Gestionnaire',
             'last_name' => 'Incidents',
             'is_active' => 1,
            ]
        );
    }
}
