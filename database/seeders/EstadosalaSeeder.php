<?php

namespace Database\Seeders;

use App\Models\Estadosala;
use Illuminate\Database\Seeder;

class EstadosalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estadosala::create([
            'name' => 'No Iniciado'
        ]);

        Estadosala::create([
            'name' => 'En Curso'
        ]);

        Estadosala::create([
            'name' => 'Finalizada'
        ]);
    }
}
