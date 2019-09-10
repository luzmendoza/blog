<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //inicio
    public function home()
    {
    	$posts = Post::published()->paginate(5);
		$categories = Category::all();
	    return view('welcome', compact('posts','categories'));
    }
}
