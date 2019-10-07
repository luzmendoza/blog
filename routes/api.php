<?php

use Illuminate\Http\Request;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('posts', 'PagesController@home');

Route::get('blog/{post}', 'PostsController@show');

Route::get('categorias/{category}', 'CategoriesController@show');

Route::get('etiquetas/{tag}', 'TagsController@show');

Route::post('messages', 'MessagesController@store');
