<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
	    $this->middleware('auth');
    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }

    public function get_comments($post_id){
        $post = Post::find($post_id);
        /* obtenemos cada comentario con su user */
        $comments = $post->comments()->with('user')->get();
        return response()->json([
            'comments' => $comments
        ]);
    }
}
