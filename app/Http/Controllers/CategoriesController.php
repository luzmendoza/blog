<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //mostrar posts filtrados por categoria
    public function show(Category $category)
    {
    	$filtro = $category;
    	$posts = $category->posts()->published()->paginate(5);

    	 //todas estas busquedas son para la barra de un lado con widgets
		$categories = Category::all();
	    $authores = User::latest()->take(4)->get();
        $lastposts = Post::latest('published_at')->take(5)->get();
        //posts agrupados por mes y año
        $archivo = Post::published()->byYearAndMonth()->get();

	    return view('pages.home', compact('posts','categories', 'filtro','authores','lastposts', 'archivo'));
    }
}
