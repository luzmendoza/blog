<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //dehabilita la proteccion de guardado
    protected $guarded = [];
    
    //generar url amigable ->que busque la url por nombre del campo
    public function getRouteKeyName()
    {
        return 'url';
    }

     //crear la relacion de muchos a muchos (una etiqueta tiene muchos posts y un post tiene muchas etiquetas)
    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }

    //crear un mutador
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }

}
