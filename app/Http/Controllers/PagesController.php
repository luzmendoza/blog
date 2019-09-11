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
	    return view('pages.home', compact('posts','categories'));
    }
    //regresar la vista acerca de 
    public function about()
    {
	    return view('pages.about');
    }
    //regresar la vista servicios
    public function services()
    {
	    return view('pages.services');
    }
    //regresar la contacto
    public function contact()
    {
	    return view('pages.contact');
    }
}
