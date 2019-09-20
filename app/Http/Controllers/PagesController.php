<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //inicio
    public function home()
    {
        $query = Post::published();

        if (request('month')) {
            $query->whereMonth('published_at', request('month'));
        }
         if (request('year')) {
            $query->whereYear('published_at', request('year'));
        }

        $posts = $query->paginate();

    	//$posts = Post::published()->paginate();

        //todas estas busquedas son para la barra de un lado con widgets
		$categories = Category::all();
        $authores = User::latest()->take(4)->get();
        $lastposts = Post::latest('published_at')->take(5)->get();
        //posts agrupados por mes y año
        $archivo = Post::published()->byYearAndMonth()->get();

	    return view('pages.home', compact('posts','categories','authores','lastposts', 'archivo'));
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
