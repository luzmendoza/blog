<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //metodo show
    public function show(Post $post)
    {
    	//valida si esta autenticado para verlo desde la pagina de administracion
    	//o si esta publicado para verlo aunque no este autenticado
    	if ($post->isPusblised() || auth()->check()) {

            $data = [
                'post' => $post->load('owner', 'category','tags','photos'),
                'categories' => Category::all(),
                'authores' => User::latest()->take(4)->get(),
                'lastposts' => Post::latest('published_at')->take(5)->get(),
                'archivo' => Post::published()->byYearAndMonth()->get()
            ];

            //validar si regresa una vista o un json
            if (request()->wantsJson()) {
                return $data;
            }

	    	//return view('posts.show', compact('post','categories','authores','lastposts','archivo'));
            return view('posts.show',  $data );
    	}

    	abort(404);
    }
}
