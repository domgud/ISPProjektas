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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin') -> prefix('admin')->name('admin.') ->middleware('can:manage-users') -> group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/admins', 'AdminController', ['except'=>['index']]);
    Route::resource('/trainers', 'TrainerController', ['except'=>['index']]);
    Route::resource('/clients', 'ClientController', ['except'=>['index']]);

});


Route::resource('/visit', 'Visit\VisitController')->middleware(['can:create-visit']);
Route::get('/visit/{visit}/delete', 'Visit\VisitController@delete')->middleware(['can:create-visit'])->name('visit.delete');

Route::resource('/Training', 'Training\TrainingController')->middleware(['can:manage-Training']);
Route::get('/Training/{index}/delete', 'Training\TrainingController@delete') ->middleware(['can:manage-Training']) -> name('Training.delete');
Route::get('/Training/{index}/ataskaita', 'Training\TrainingController@ataskaita') ->middleware(['can:manage-Training']) -> name('Training.ataskaita');
