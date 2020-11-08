<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', 'InfoController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'InfoController@post');
Route::get('/generatePublic', 'InfoController@generatePublic');
Route::get('/publicInformation', 'InfoController@publicInformation');
Route::get('/deleteInfo', 'InfoController@deleteInfo')->middleware('can:manage-info');
Route::get('/editInfo', 'InfoController@editInfo')->middleware('can:manage-info');

Route::resource('posts','PostController');

Route::namespace('Admin') -> prefix('admin')->name('admin.') ->middleware('can:manage-users') -> group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/admins', 'AdminController', ['except'=>['index']]);
    Route::resource('/trainers', 'TrainerController', ['except'=>['index']]);
    Route::resource('/clients', 'ClientController', ['except'=>['index']]);

});
