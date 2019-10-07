<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //permitir llenar campos
    protected $fillable = ['name','phone', 'email','message','status'];

    //agregar carbon a las fechas
    protected $dates = ['created_at'];

}
