<?php

namespace App;

use App\Photo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //permitir llenar campos
    protected $fillable = ['title','body', 'iframe','except', 'published_at', 'category_id', 'user_id'];

    //agregar carbon a las fechas
    protected $dates = ['published_at'];

    //el metodo with obtiene la relacion que se creo en el modelo post, agilizando las consutlas
    //protected $with = ['category', 'tags', 'owner', 'photos'];

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
         //el metodo with obtiene la relacion que se creo en el modelo post, agilizando las consutlas
       $query->with(['category', 'tags', 'owner', 'photos'])
            ->whereNotNull('published_at') //que la fecha no sea null
            ->where('published_at', '<=', Carbon::now()) //que la fecha no sea mayor del dia actual
            ->latest('published_at'); //ordenados por fecha de publicacion
    }

    //validar si esta publico
    public function isPusblised()
    {
        return !is_null($this->published_at) && $this->published_at < today();
    }

    //recuperar datos por permisos
    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this)) {
            return $query;
        }

        return $query->where('user_id', auth()->id());
    }

    //busqueda de posts ordenados por fecha
    public function scopeByYearAndMonth($query)
    {
        DB::statement("SET lc_time_names = 'es_ES' ");
        return Post::selectRaw('year(published_at) as year')
            ->selectRaw('month(published_at) as month')
            ->selectRaw('monthname(published_at) as monthname')
            ->selectRaw('count(*) posts')
            ->groupBy('year','month','monthname')
            ->orderBy('published_at');
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
