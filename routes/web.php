<?php

use App\Post;
use App\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//prueba de email para ver el correo que se enviara
/*Route::get('email', function(){
	return new App\Mail\LoginCredentials(App\User::first(), '123456');
});
*/

Route::get('/', 'pagesController@home')->name('pages.home');
Route::get('nosotros', 'pagesController@about')->name('pages.about');
Route::get('servicios', 'pagesController@services')->name('pages.services');
Route::get('contacto', 'pagesController@contact')->name('pages.contact');

Route::get('blog/{post}', 'postsController@show')->name('posts.show');
Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('etiquetas/{tag}', 'TagsController@show')->name('tags.show');

//rutas de administracion
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
	Route::get('/', 'adminController@index')->name('admin');

	//simplificado de rutas... generando todas las rutas desde una sola y evitando el show, ademas agregando el prefijo de la ruta admin
	Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);

	//rutas de usuarios simplificado
	Route::resource('users', 'UsersController', ['as' => 'admin']);

	Route::resource('roles', 'RolesController', ['except' => 'show','as' => 'admin']);
	Route::resource('permisos', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 
					'as' => 'admin']);

	//restricciones por middleware del paquete laravel permission
	Route::middleware('role:Admin')
		->put('users/{user}/roles', 'UsersRolesController@update')
		->name('admin.users.roles.update');
	Route::middleware('role:Admin')
		->put('users/{user}/permissions', 'UsersPermissionsController@update')
		->name('admin.users.permissions.update');

	//rutas extras para posts
	Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
	Route::delete('posts/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
});


//ruta de login
//Route::auth();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
 Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
 Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
  