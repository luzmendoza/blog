<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    //obtener todos los post
    public function index()
    {
        //devuelve los posts del usuario autenticado
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
    }


     public function show(Message $message)
    {
        //$this->authorize('view', $message);
        //regrsar la vista
        return view('admin.messages.show', compact('message','messages'));
    }


    public function update(Message $message, Request $request)
    {
        //las validaciones se hicieron en la clase StorePostRequest

        //validar el acceso mediante politicas (policy)
        //$this->authorize('update', $post);

        $message->update(['status' => $request->status] );
         
        //regresar a la pagina anterior
        return redirect()->route('admin.messages.index')->with('flash','El mensaje fue actualizado');
    }

     public function destroy(Message $message)
    {
    	//validar el acceso mediante politicas (policy)
        //$this->authorize('delete', $post);
        //eliminar el post
        $message->delete();
        //regresar a la pagina anterior
        return redirect()->route('admin.messages.index')->with('flash','El mensaje ha sido eliminado');
    }
}
