<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            statesSeeder::class,
            componentsSeeder::class,
            rolesSeeder::class,
            usersSeeder::class,
            statusesSeeder::class,
            problemsSeeder::class,
            reportsSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
