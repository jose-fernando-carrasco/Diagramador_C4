<?php

namespace App\Http\Controllers;

use App\Events\CommentEvent;
use App\Models\Comment;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'content' => 'required'
        ]);

        $newcomment = new Comment();
        $newcomment->content = $request->content;
        $newcomment->post_id = $request->post_id;
        $newcomment->user_id = auth()->user()->id;
        $newcomment->save();

        /* para enviar a los otro y ya no a mi por que ya lo recibí conb axios */
        broadcast(new CommentEvent($newcomment))->toOthers();
        
        /* return redirect()->route('posts.index'); */
        return $newcomment;
    }
}
