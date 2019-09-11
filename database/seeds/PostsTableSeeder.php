<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //elminar imagenes del servidor
        Storage::disk('public')->deleteDirectory('posts');
    	//limpiar la tabla antes sde insertar
    	Post::truncate();
    	Category::truncate();
        Tag::truncate();


    	$categoria = new Category;
        //agregar los campos
        $categoria->name = "Category Luz";
        $categoria->save();

        $categoria = new Category;
        //agregar los campos
        $categoria->name = "Category Prom";
        $categoria->save();

        //crear una instancia de post
        $post = new Post;
        //agregar los campos
        $post->title = "Mi primer post";
        $post->url = str_slug("Mi primer post");
        $post->except = "Lo que aparece como vista previa";
        $post->body = "Este es el <b>cuerpo del post</b>, se supone que tiene mas letras que el except";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        //agregar etiqueta
        $post->tags()->attach(Tag::create(['name'=>'Etiqueta 1']));


         $post = new Post;
        //agregar los campos
        $post->title = "Mi segundo post";
        $post->url = str_slug( "Mi segundo post");
        $post->except = "Lo que aparece como vista previa";
        $post->body = "Este es el <b>cuerpo del post</b>, se supone que tiene mas letras que el except";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();

         //agregar etiqueta
        $post->tags()->attach(Tag::create(['name'=>'Etiqueta 2']));

          $post = new Post;
        //agregar los campos
        $post->title = "Mi tercer post";
        $post->url = str_slug("Mi tercer post");
        $post->except = "Lo que aparece como vista previa";
        $post->body = "Este es el <b>cuerpo del post</b>, se supone que tiene mas letras que el except";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();

          $post = new Post;
        //agregar los campos
        $post->title = "Mi cuarto post";
        $post->url = str_slug("Mi cuarto post");
        $post->except = "Lo que aparece como vista previa";
        $post->body = "Este es el <b>cuerpo del post</b>, se supone que tiene mas letras que el except";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();

         //agregar etiqueta
        $post->tags()->attach(Tag::create(['name'=>'Etiqueta 3']));

    }
}
