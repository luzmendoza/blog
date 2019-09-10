<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    //obtener todos los post
    public function index()
    {
    	$posts = Post::all();//Post::published()->get();
    	return view('admin.posts.index', compact('posts'));
    }

    //llamar pantalla para crear un post
    /*public function create()
    {
    	$categories = Category::all();
    	$tags = Tag::all();
    	return view('admin.posts.create', compact('categories','tags'));
    }
    */

    public function store(Request $request)
    {
        //validaciones
        $this->validate($request,[
            'title' => 'required',
        ]);

        $post = Post::create(
               $request->only('title')
           );

        return redirect()->route('admin.posts.edit', $post);
    }

     public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    //actualizar un post
    public function update(Post $post, StorePostRequest $request)
    {
        //las validaciones se hicieron en la clase StorePostRequest

        $post->update($request->all());

        //crear etiquetas al vuelo
        $post->syncTags($request->get('tags'));
         
        //regresar a la pagina anterior
        return redirect()->route('admin.posts.edit', $post)->with('flash','La publicación ha sido guardada');
    }

    //eliminar un post y sus relaciones
    public function destroy(Post $post)
    {
        //quitar las etiquetas asignadas al post
        $post->tags()->detach();
        //quitar las fotos asignadas al post

        foreach ($post->photos as $photo) {
            //eliminar de la base de datos
            $photo->delete();
            //eliminar del servidor
            $photoPath = str_replace('storage', 'public', $photo->url);
            Storage::delete($photoPath);
        }
        //eliminar el post
        $post->delete();
        //regresar a la pagina anterior
        return redirect()->route('admin.posts.index')->with('flash','La publicación ha sido eliminada');
    }

    //crear un post
    /*
    public function store(Request $request)
    {
        //dd($request->has('published_at'));  imprime en pantalla la informacion
    	//validaciones
    	$this->validate($request,[
    		'title' => 'required',
    		'body' => 'required',
    		'category' => 'required',
    		'except' => 'required',
    	]);

    	//asignar informacion a guardar
    	$post = new Post;
    	$post->title = $request->title;
        $post->url = str_slug($request->title);
    	$post->except = $request->except;
    	$post->body = $request->body;
        if ($request->get('published_at') != null) {
           $post->published_at = Carbon::parse($request->get('published_at'));
        }else{
            $post->published_at = NULL;
        }
    	//$post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : NULL;
    	$post->category_id = $request->category;
    	//guardar
    	$post->save();

    	//agregar etiquetas
    	$post->tags()->attach($request->tags);
    	//regresar a la pagina anterior
    	return back()->with('flash','Tu publicación ha sido creada');
    }
    */
}
