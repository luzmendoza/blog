<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //vaciar la tabla
        Permission::truncate();
        Role::truncate();
        User::truncate();

        //crear roles
        $roleAdmin = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $roleWriter = Role::create(['name' => 'Writer', 'display_name' => 'Escritor']);

        //crear permisos
        $ViewPostPermission = Permission::create(
            ['name' => 'view posts', 'display_name' => 'Ver Posts']);
        $CreatePostPermission = Permission::create(
            ['name' => 'create posts', 'display_name' => 'Crear Posts']);
        $UpdatePostPermission = Permission::create(
            ['name' => 'update posts', 'display_name' => 'Actualizar Posts']);
        $DeletePostPermission = Permission::create(
            ['name' => 'delete posts', 'display_name' => 'Eliminar Posts']);

        $ViewUserPermission = Permission::create(
            ['name' => 'view users', 'display_name' => 'Ver Usuarios']);
        $CreateUserPermission = Permission::create(
            ['name' => 'create users', 'display_name' => 'Crear Usuarios']);
        $UpdateUserPermission = Permission::create(
            ['name' => 'update users', 'display_name' => 'Actualizar Usuarios']);
        $DeleteUserPermission = Permission::create(
            ['name' => 'delete users', 'display_name' => 'Eliminar Usuarios']);

        $ViewRolePermission = Permission::create(
            ['name' => 'view roles', 'display_name' => 'Ver Roles']);
        $CreateRolePermission = Permission::create(
            ['name' => 'create roles', 'display_name' => 'Crear Roles']);
        $UpdateRolePermission = Permission::create(
            ['name' => 'update roles', 'display_name' => 'Actualizar Roles']);
        $DeleteRolePermission = Permission::create(
            ['name' => 'delete roles', 'display_name' => 'Eliminar Roles']);

        $ViewPermission = Permission::create(
            ['name' => 'view permission', 'display_name' => 'Ver Permisos']);
        $UpdatePermission = Permission::create(
            ['name' => 'update permission', 'display_name' => 'Actualizar Permisos']);

        //crear usuario
        $admin = new User;
        $admin->name="luz mendoza";
        $admin->email ="luz@gmail.com";
        $admin->password='123123';
        $admin->save();

        //asignarle role de administrador
        $admin->assignRole($roleAdmin);

        //crear usuario
        $user = new User;
        $user->name="Joel Salazar";
        $user->email ="joel@gmail.com";
        $user->password='123123';
        $user->save();

        $user->assignRole($roleWriter);
        
    }
}
