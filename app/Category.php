<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //dehabilita la proteccion de guardado
    protected $guarded = [];
    
    //generar url amigable ->que busque la url por nombre del campo
    public function getRouteKeyName()
    {
        return 'url';
    }

    //crear la relacion de uno a muchos (una categoria tiene muchos posts)
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

    //crear un accesor
   /* public function getNameAttribute($name)
    {
        return str_slug($name);
    }*/
    //crear un mutador
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
    
}
