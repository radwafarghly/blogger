<?php

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
Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/posts',['as'=>'posts.index','uses'=>'PostController@index']);

Route::get('/posts/create',['as'=>'posts.create','uses'=>'PostController@create' ]);

Route::post('/posts/create',['as'=>'posts.store','uses'=>'PostController@store']);
Route::get('post/{id}',['as'=>'posts.show','uses'=>'PostController@show']);


Route::get('/posts/{id}/edit',['as'=>'posts.edit','uses'=>'PostController@edit']);

Route::patch('/posts/{id}',['as'=>'posts.update','uses'=>'PostController@update']);

Route::delete('/posts/{id}/delete',['as'=>'posts.destroy','uses'=>'PostController@destroy']);




//articles

Route::get('/articles',['as'=>'articles.index','uses'=>'ArticleController@index']);

Route::get('/articles/create',['as'=>'articles.create','uses'=>'ArticleController@create' ]);

Route::post('/articles/create',['as'=>'articles.store','uses'=>'ArticleController@store']);
Route::get('articles/{id}',['as'=>'articles.show','uses'=>'ArticleController@show']);


Route::get('/articles/{id}/edit',['as'=>'articles.edit','uses'=>'ArticleController@edit']);

Route::patch('/articles/{id}',['as'=>'articles.update','uses'=>'ArticleController@update']);

Route::delete('/articles/{id}/delete',['as'=>'articles.destroy','uses'=>'ArticleController@destroy']);

//comment


Route::get('/comments/create/{id}',['as'=>'comments.create','uses'=>'CommentController@create' ]);

Route::post('/comments/create/{id}',['as'=>'comments.store','uses'=>'CommentController@store']);