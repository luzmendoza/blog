<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //mostrar posts filtrados por categoria
    public function show(Category $category)
    {
    	$filtro = $category;
    	$posts = $category->posts()->paginate(5);
		$categories = Category::all();
	    return view('welcome', compact('posts','categories', 'filtro'));
    }
}
