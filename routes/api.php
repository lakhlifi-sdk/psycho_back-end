<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');
Route::post('logout', 'Api\AuthController@logout');
Route::get('getAllUsers', 'Api\AuthController@getAllUsers');
Route::POST('saveUserInfo', 'Api\AuthController@saveUserInfo');


//POST CRUD
Route::post('post/create', 'Api\PostsController@create')->middleware('jwtAuth');
Route::post('post/update/', 'Api\PostsController@update')->middleware('jwtAuth');
Route::post('post/delete/', 'Api\PostsController@delete')->middleware('jwtAuth');
Route::get('posts', 'Api\PostsController@posts')->middleware('jwtAuth');

//COMMENT CRUD
Route::post('comment/create', 'Api\CommentsController@create')->middleware('jwtAuth');
Route::post('comment/update', 'Api\CommentsController@update')->middleware('jwtAuth');
Route::post('comment/delete', 'Api\CommentsController@delete')->middleware('jwtAuth');
Route::get('comments', 'Api\CommentsController@comments')->middleware('jwtAuth');

//LIKE CRUD
Route::POST('post/likes', 'Api\LikesController@like')->middleware('jwtAuth');






