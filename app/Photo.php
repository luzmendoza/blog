<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    //deshabilitar proteccion contra asignacion masiva
    protected $guarded = [];

}
