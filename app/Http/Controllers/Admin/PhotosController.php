<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //funcion subir fotos
    public function store(Post $post)
    {
    	//validaciones
    	$this->validate(request(),[
    		'photo' => 'required|image|max:2048', //jpg,png,bmp,gif o svg
    	]);

        //guardar en la base de datos mediante la relacion post
        $post->photos()->create([
            'url' => Storage::url(request()->file('photo')->store('posts','public')),
        ]);
    }

    public function destroy(Photo $photo)
    {
        //eliminar de la base de datos
        $photo->delete();
        //eliminar del servidor
        $photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);

        return back()->with('flash', 'Foto eliminada');
    }
}
