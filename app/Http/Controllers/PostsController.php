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
    	//$post = Post::find($id);
    	$categories = Category::all();
    	return view('posts.show', compact('post','categories'));
    }
}
