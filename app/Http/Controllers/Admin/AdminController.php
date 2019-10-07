<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //metodo principal
    public function index()
    {
    	//recuperar el total de mensajes de contacto
    	$messages = Message::all();
    	$message = $messages->last();
    	return view('admin.dashboard', compact('messages','message'));
    }
}
