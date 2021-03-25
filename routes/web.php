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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/{id}', 'UserController@showUser');

//Route::get('/wishlist', 'WishlistController@showMyOnlyWishlist');//En caso de tener sólo una wishlist
Route::get('/wishlists/{id}', 'WishlistController@listWishlist');//Para listar wishlists del usuario indicado

Route::get('/wishlist/{id}', 'WishlistController@showWishlist');//Para mostrar la wishlist

Route::get('/product/new/{id}', 'ProductController@formNewProduct');//Muestra el formulario para anyadir producto a wishlist
Route::post('/product/{idWishlist}', 'ProductController@addProductToWishlist');//Realiza la inserción del producto en la wishlist
