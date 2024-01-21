<?php

namespace Database\Seeders;

use App\Models\Sala;
use Illuminate\Database\Seeder;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sala::create([
            'asunto' => 'Trabajaremos en el Sprint 0',
            'user_id' => 1,
            'proyecto_id' => 1
        ]);
    }
}
