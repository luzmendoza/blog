<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRolesRequest;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Role);
        //
        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $role = new Role);

         return view('admin.roles.create',[
            'role' => $role,
            'permissions' => Permission::all(), 
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create', new Role);
        //crear rol
        $role = Role::create($request->validated());
        //asignar permisos
        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }
        //regresar
        return redirect()->route('admin.roles.index')->withFlash('El rol fue creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all(), 
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        $this->authorize('update', $role);
        //editar rol
        $role->update($request->validated());

        //eliminar los permisos existentes
        $role->permissions()->detach();
        //asignar permisos
        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }
        //regresar
        return redirect()->route('admin.roles.edit', $role)->withFlash('El rol fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //validar que no se elimine el administrador
        $this->authorize('delete', $role);
        //elimina si esta autorizado
        $role->delete();
        return redirect()->route('admin.roles.index')->withFlash('El rol fue eliminado correctamente');
    }
}
