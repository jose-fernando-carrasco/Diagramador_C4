<?php

namespace Database\Seeders;

use App\Models\Linea;
use Illuminate\Database\Seeder;

class LineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Linea::create(['name' => 'Linea 1'  , 'nro' => 1 , 'sentido' => 0]);
        Linea::create(['name' => 'Linea 1'  , 'nro' => 1 , 'sentido' => 1]);
        Linea::create(['name' => 'Linea 2'  , 'nro' => 2 , 'sentido' => 0]);
        Linea::create(['name' => 'Linea 2'  , 'nro' => 2 , 'sentido' => 1]);
        Linea::create(['name' => 'Linea 5'  , 'nro' => 5 , 'sentido' => 0]);
        Linea::create(['name' => 'Linea 5'  , 'nro' => 5 , 'sentido' => 1]);
        Linea::create(['name' => 'Linea 8'  , 'nro' => 8 , 'sentido' => 0]);
        Linea::create(['name' => 'Linea 8'  , 'nro' => 8 , 'sentido' => 1]);
        Linea::create(['name' => 'Linea 9'  , 'nro' => 9 , 'sentido' => 0]);
        Linea::create(['name' => 'Linea 9'  , 'nro' => 9 , 'sentido' => 1]);
        Linea::create(['name' => 'Linea 10' , 'nro' => 10, 'sentido' => 0]);
        Linea::create(['name' => 'Linea 10' , 'nro' => 10, 'sentido' => 1]);
        Linea::create(['name' => 'Linea 11' , 'nro' => 11, 'sentido' => 0]);
        Linea::create(['name' => 'Linea 11' , 'nro' => 11, 'sentido' => 1]);
        Linea::create(['name' => 'Linea 16' , 'nro' => 16, 'sentido' => 0]);
        Linea::create(['name' => 'Linea 16' , 'nro' => 16, 'sentido' => 1]);
        Linea::create(['name' => 'Linea 17' , 'nro' => 17, 'sentido' => 0]);
        Linea::create(['name' => 'Linea 17' , 'nro' => 17, 'sentido' => 1]);
        Linea::create(['name' => 'Linea 18' , 'nro' => 18, 'sentido' => 0]);
        Linea::create(['name' => 'Linea 18' , 'nro' => 18, 'sentido' => 1]);

    }
}
