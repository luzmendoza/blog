<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersPermissionsController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         //utilizar un metodo del laravel permission
        $user->syncPermissions($request->permissions);//este metodo elimina y vuelve a crear
        return back()->withFlash('Los permisos han sido actualizados');
    }
}
