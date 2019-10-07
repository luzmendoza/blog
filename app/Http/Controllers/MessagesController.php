<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //guardar el mensaje que se envia del formulario de contacto
    public function store(Request $request)
    {
    	
        //validaciones
        $this->validate($request,[
            'name' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        Message::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'status' => 'Nuevo'
        ] );

       if (request()->wantsJson()) {
            return "Mensaje enviado";
        }

    }
}
