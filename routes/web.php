<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PostController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/post', 'PostController@post');
Route::get('/generatePublic', 'PostController@generatePublic');
Route::get('/publicInformation', 'PostController@publicInformation')->name('publicInformation');
Route::get('/deleteInfo', 'PostController@deleteInfo')->middleware('can:manage-info');
//Route::get('/editInfo', 'PostController@edit')->middleware('can:manage-info');
Route::Resource('/viewPost', 'PostController');
Route::resource('posts','PostController');
Route::resource('/editInfo','PostController');

Route::post('/search', 'PostController@search')->name('search');

Route::get('/createPDF', 'PostController@createPDF')->name('createPDF');



Route::namespace('Admin') -> prefix('admin')->name('admin.')-> group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show']]);
    Route::post('/users/search', 'UserController@search')->name('user.search');
});

Route::match(['get', 'post'], '/visit/search', 'Visit\VisitController@search')->middleware(['can:create-visit'])->name('visit.search');
Route::resource('/visit', 'Visit\VisitController')->middleware(['can:create-visit']);
Route::get('/visit/{visit}/delete', 'Visit\VisitController@delete')->middleware(['can:create-visit'])->name('visit.delete');
Route::get('/visit/{visit}/create', 'Visit\VisitController@createVisit')->middleware(['can:create-visit'])->name('visit.createVisit');

Route::resource('/Training', 'Training\TrainingController')->middleware(['can:manage-Training']);
Route::get('/Training/{index}/delete', 'Training\TrainingController@delete') ->middleware(['can:manage-Training']) -> name('Training.delete');
Route::get('/Training/{index}/ataskaita', 'Training\TrainingController@ataskaita') ->middleware(['can:manage-Training']) -> name('Training.ataskaita');

Route::resource('/Sale', 'Training\SaleController')->middleware(['can:manage-Training']);
Route::get('/Sale/{index}/delete', 'Training\SaleController@delete') ->middleware(['can:manage-Training']) -> name('Sale.delete');

Route::get('/cart/{cart}/delete', 'Shop\CartController@delete')->middleware(['can:shop-all'])->name('cart.delete');
Route::get('/{cart}/cartReport', 'Shop\CartController@report')->middleware(['can:shop-all'])->name('cart.report');
Route::get('/cart/{id}/add', 'Shop\CartController@add')->name('cart.add');
Route::resource('/cart', 'Shop\CartController')->middleware(['can:shop-all']);

Route::get('/shop/{shop}/delete', 'Shop\ShopController@deleteShopItem')->middleware(['can:shop-admin'])->name('shop.deletePage');
Route::post('/shop/search', 'Shop\ShopController@search')->name('shop.search');
Route::resource('/shop', 'Shop\ShopController')->middleware(['can:shop-all']);

