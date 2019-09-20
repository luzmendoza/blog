<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //deshabilitar llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);

         DB::statement('SET FOREIGN_KEY_CHECKS=1');
         
    }
}
