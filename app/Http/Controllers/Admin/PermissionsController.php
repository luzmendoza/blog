<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Permission);
        
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function edit($id)
    {
        $permission = Permission::findById($id);
        $this->authorize('update', $permission);

        return view('admin.permissions.edit', compact('permission'));
    }

	public function update(Request $request, $id)
    {
    	$permission = Permission::findById($id);
    	//validar si tiene permiso
    	$this->authorize('update', $permiso);

    	$data = $request->validate(
	    		['display_name' => 'required'], //validaciones
	    		['display_name.required' => 'El nombre es obligatorio'] //mensajes
	    	);
    	$permission->update($data);
    	return redirect()->route('admin.permisos.edit', $id)->withFlash('El permiso ha sido actualizado');
    }
}
