<?php

use App\User;
use Illuminate\Database\Seeder;

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
        User::truncate();

        //crear usuario
        $user = new User;
        $user->name="luz mendoza";
        $user->email ="luz@gmail.com";
        $user->password=bcrypt('123123');
        $user->save();

        //crear usuario
        $user = new User;
        $user->name="Joel Salazar";
        $user->email ="joel@gmail.com";
        $user->password=bcrypt('123123');
        $user->save();
    }
}
