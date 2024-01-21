<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Auto Nuevo',
            'content' => 'Vendo mi hermoso auto 4x4',
            'user_id' => 1 /* Fernando */
        ]);
    }
}
