<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyecto::create([
            'title' => 'Software de compra y venta',
            'descripcion' => 'Proyecto para desarrollar un software para gestionar las ventas y compras de las herramientas case, asi como para diseñar el software mediante diagramas C4 para trabajar con mi equipo de desarrollo.',
            'user_id' => 1 // Fernando
        ]);

        Proyecto::create([
            'title' => 'Software de Diagramas',
            'descripcion' => 'Proyecto para desarrollar un software para gestionar las ventas y compras de las herramientas case, asi como para diseñar el software mediante diagramas C4 para trabajar con mi equipo de desarrollo.',
            'user_id' => 2 // Fernando
        ]);
    }
}
