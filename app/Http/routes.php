<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource('tag', 'TagController');
Route::resource('articlePicture', 'ArticlePictureController');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('blog', ['as' => 'blog', 'uses' => 'BlogController@index']);

Route::get('blog/tag/{tag}', 'BlogController@tag')
		->where(['tag' => '[\w\s\p{P}]+']);

Route::get('blog/article/{title}', 'BlogController@title')
		->where(['title' => '[\w\s\p{P}]+']);

Route::get('blog/user/{user}', 'BlogController@user')
		->where(['user' => '[\w\s\p{P}]+']);

Route::get('blog/create', 'BlogController@create');
Route::post('articles',
		['as' => 'article.create', 'uses' => 'ArticlesController@store']);

Route::get('blog/delete', 'BlogController@delete');
Route::delete('articles/{id}',
		['as' => 'article.delete', 'uses' => 'ArticlesController@destroy'])
		->where(['id' => '[0-9]+']);
Route::put('articles/{id}',
		['as' => 'article.update', 'uses' => 'ArticlesController@update'])
		->where(['id' => '[0-9]+']);
