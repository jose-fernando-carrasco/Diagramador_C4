<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'content' => 'Me gusta su autito',
            'post_id' => 1,
            'user_id' => 1 /* Fernando */
        ]);

        Comment::create([
            'content' => 'Precio por favor',
            'post_id' => 1,
            'user_id' => 2 /* Daniela */
        ]);

    }
}
