<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //pagina con vue
    public function spa()
    {
        return view('pages.spa');
    }

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

         $data = [
                'posts' => $posts ,
                 'categories' => Category::all(),
                 'authores' => User::latest()->take(4)->get(),
                 'lastposts' => Post::latest('published_at')->take(5)->get(),
                 'archivo' => Post::published()->byYearAndMonth()->get()//posts agrupados por mes y año
            ];


        if (request()->wantsJson()) {
           return $data;
        }

	    return view('pages.home', $data);
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
