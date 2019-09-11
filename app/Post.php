<?php

namespace App;

use App\Photo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //permitir llenar campos
    protected $fillable = ['title','body', 'iframe','except', 'published_at', 'category_id', 'user_id'];

    //agregar carbon a las fechas
    protected $dates = ['published_at'];

    //generar url amigable ->que busque la url por nombre del campo
    public function getRouteKeyName()
    {
        return 'url';
    }

    //relacion uno a muchos (muchos post, una categoria)
    public function category($value='')
    {
    	//pertenece a..
    	return $this->belongsTo(Category::class);
    }

    //relacion con etiquetas
    public function tags($value='')
    {
    	//pertenece a..
    	return $this->belongsToMany(Tag::class);
    }

    //relacion con fotos
     public function photos()
    {
        //un post tiene muchas fotos
        return $this->hasMany(Photo::class);
    }

    //funcion para la relacion del usuario con los post
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //creacion de un query scope, el cual devuelve datos filtrados que se puede reutilizar
    public function scopePublished($query) //$query = constructor de consultas de laravel
    {
       $query->whereNotNull('published_at') //que la fecha no sea null
                    ->where('published_at', '<=', Carbon::now()) //que la fecha no sea mayor del dia actual
                    ->latest('published_at'); //ordenados por fecha de publicacion
    }

    //validar si esta publico
    public function isPusblised()
    {
        return !is_null($this->published_at) && $this->published_at < today();
    }

    //mutador para el title
    /*public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;

        //validar que no exista otra url igua
        $url = str_slug($title);

        $postDuplicate = Post::where('url', 'LIKE', "{$url}%")->count();
        if ($postDuplicate) {
            $url .= '-' . ++ $postDuplicate;
        }

        $this->attributes['url'] = $url;
    }
    */

    //mutador para el campo fecha de publicacion
    public function setPublishedAtAttribute($published_at)
    {
        if ($published_at != null) {
           $this->attributes['published_at'] =  
                        Carbon::parse($published_at);
        }else{
            $this->attributes['published_at'] =  NULL;
        }
    }

    //mutador para el campo category_id
    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = 
                            Category::find($category) 
                            ? $category 
                            : Category::create(['name' => $category ])->id;
    }

    //metodo para guardar en una tabla pivote
    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag 
                    : Tag::create(['name' => $tag])->id;
        });

        //agregar etiquetas
        return $this->tags()->sync($tagIds);
    }
}
