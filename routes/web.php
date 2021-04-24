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

// Parte Privada
// todas las URLs aqui seran solo accesibles una vez iniciado sesion y dependiendo de su rol

Route::middleware('auth')->group (function () {

    // Parte privada para un usuario normal (basico)
    Route::get('/user/{id}', 'UserController@showUser');//Muestra perfil de un usuario
    Route::post('/user/follow/{id}', 'UserController@followUser');//Para seguir a un usuario
    Route::post('/user/unfollow/{id}', 'UserController@unfollowUser');//Para dejar de seguir seguir a un usuario
    Route::get('/user/{id}/following', 'UserController@showFollowing');//Lista usuarios que sigue
    Route::get('/user/{id}/followers', 'UserController@showFollowers');//Lista usuarios que le siguen
    
    Route::get('/profile/update', 'UserController@formUpdate');
    Route::post('/profile/{id}/update', 'UserController@updateUser');

    Route::get('/wishlists/{id}', 'WishlistController@listWishlist');//Para listar wishlists del usuario indicado
    Route::get('/wishlist/{id}', 'WishlistController@showWishlist');//Para mostrar la wishlist
    Route::get('/createwishlist', 'WishlistController@formNewWishlist');//Muestra el formulario de nueva lista
    Route::post('/createwishlist', 'WishlistController@addNewWishlist');//Crea la wishlist con el nombre indicado

    Route::get('/editWishlist/{id}', 'WishlistController@formEditWishlist');//Muestra el formulario para editar wishlsit
    Route::post('/editWishlist', 'WishlistController@editWishlist');//editar wishlist

    Route::get('/product/new/{id}', 'ProductController@formNewProduct');//Muestra el formulario para anyadir producto a wishlist
    Route::post('/product/{idWishlist}', 'ProductController@addProductToWishlist');//Realiza la inserción del producto en la wishlist
    Route::post('/product/{idWishlist}/delete/{idProduct}', 'ProductController@deleteProductOfWishList'); //Realiza el borrado de un producto de una wishlist
    
    //Route::get('/wishlist', 'WishlistController@showMyOnlyWishlist');//En caso de tener sólo una wishlist
});

Route::middleware('admin')->group (function () {

    // Parte privada para un admin (perfil administrador) 
    // "un administrador utilizara el correo admin@wishare.es para iniciar sesion"

});

// Parte Publica 
// todas las URLs aqui seran accesibles por cualquier rol en cualquier momento

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');


