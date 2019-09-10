<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class TagsController extends Controller
{
     //mostrar posts filtrados por categoria
    public function show(Tag $tag)
    {
    	$filtro = $tag;
    	$posts = $tag->posts()->paginate(5);
		$categories = Category::all();
	    return view('welcome', compact('posts','categories', 'filtro'));
    }
}
