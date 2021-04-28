<?php

namespace Database\Seeders;

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
        \App\Models\Promotores::factory(3)->create();
        \App\Models\Recintos::factory(3)->create();
        \App\Models\Conciertos::factory(3)->create();
        \App\Models\Grupos::factory(20)->create();
        \App\Models\Medios::factory(20)->create();
        \App\Models\Grupos_Conciertos::factory(20)->create();
        \App\Models\Grupos_Medios::factory(20)->create();
    }
}
