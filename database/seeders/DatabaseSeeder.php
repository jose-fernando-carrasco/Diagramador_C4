<?php

namespace Database\Seeders;

use App\Models\Diagrama;
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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);

        $this->call(EstadoproyectoSeeder::class);
        $this->call(ProyectoSeeder::class);
        $this->call(EstadosalaSeeder::class);
        $this->call(SalaSeeder::class);
        //$this->call(InvitacionsalaSeeder::class);
        Diagrama::create([
            'title' => 'Diagrama1',
            'diagram' => '{"cells": []}',
            'proyecto_id' => 1
        ]);

        $this->call(LineaSeeder::class);
        $this->call(PuntoSeeder::class);

    }
}
