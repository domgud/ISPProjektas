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

Route::resource('/shop', 'Shop\ShopController')->middleware(['can:shop-all']);
Route::resource('/cart', 'Shop\CartController')->middleware(['can:shop-all']);
Route::get('/cart/{cart}/delete', 'Shop\CartController@delete')->middleware(['can:shop-all'])->name('cart.delete');

// FIXME: MAKE THIS ACCESSABLE ONLY TO ADMIN!!!
Route::get('/shop/{shop}/delete', 'Shop\ShopController@delete')->middleware(['can:shop-admin'])->name('shop.delete');
