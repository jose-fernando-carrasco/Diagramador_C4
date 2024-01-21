<?php

namespace Database\Seeders;

use App\Models\Estadoproyecto;
use Illuminate\Database\Seeder;

class EstadoproyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estadoproyecto::create([
            'name' => 'No Iniciado'
        ]);

        Estadoproyecto::create([
            'name' => 'En Desarrollo'
        ]);

        Estadoproyecto::create([
            'name' => 'Terminado'
        ]);
    }
}
