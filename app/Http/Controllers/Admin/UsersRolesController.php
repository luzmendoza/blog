<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersRolesController extends Controller
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
        $user->syncRoles($request->roles);//este metodo elimina y vuelve a crear
        return back()->withFlash('Los roles han sido actualizados');
    }
}
