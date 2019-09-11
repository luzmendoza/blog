<?php

namespace App\Http\Controllers;

use App\Post;
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
    		//$post = Post::find($id);
	    	$categories = Category::all();
	    	return view('posts.show', compact('post','categories'));
    	}


    	abort(404);
    }
}
