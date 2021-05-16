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
    Route::get('/wishlist/{id}/delete', 'WishlistController@askWishlistChooseGET');//Borrar wishlist con el nombre id
    Route::post('/wishlist/{id}/delete', 'WishlistController@askWishlistChoosePOST');//Borrar wishlist con el nombre id
    Route::get('/wishlist/{id}/copy', 'WishlistController@copyWishlistOtherUserGET');//Copia una wishlist GET
    Route::post('/wishlist/{id}/copy', 'WishlistController@copyWishlistOtherUser');//Copia una wishlist

    Route::get('/createwishlist', 'WishlistController@formNewWishlist');//Muestra el formulario de nueva lista
    Route::post('/createwishlist', 'WishlistController@addNewWishlist');//Crea la wishlist con el nombre indicado

    Route::get('/editWishlist/{id}', 'WishlistController@formEditWishlist');//Muestra el formulario para editar wishlsit
    Route::post('/editWishlist', 'WishlistController@editWishlist');//editar wishlist

    Route::get('/wishlist_sorted/{id}', 'WishlistController@sortByCategory');//Para mostrar la wishlist ordenada
    Route::post('/wishlist_filtered/{id}', 'WishlistController@filterByCategory');//Para mostrar la wishlist filtrada

    Route::get('/deduplicateWishlist/{id}', 'WishlistController@deduplicateWishlistForm');//Muestra el formulario para deduplicar


    Route::get('/product/new/{id}', 'ProductController@formNewProduct');//Muestra el formulario para anyadir producto a wishlist
    Route::post('/product/{idWishlist}', 'ProductController@addProductToWishlist');//Realiza la inserción del producto en la wishlist
    Route::post('/product/{idWishlist}/delete/{idProduct}', 'ProductController@deleteProductOfWishList'); //Realiza el borrado de un producto de una wishlist
    Route::get('/product/listtocopy/{id}', 'ProductController@formCopyProduct');;//Muestra el formulario para elegir la lista a copiar
    Route::post('/product/copy/{id}', 'ProductController@copyProduct');//Copia el producto en la lista indicada
    
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    

});

Route::middleware('admin')->group (function () {

    // Parte privada para un admin (perfil administrador) 
    // "un administrador utilizara el correo admin@wishare.es para iniciar sesion"

});

// Parte Publica 
// todas las URLs aqui seran accesibles por cualquier rol en cualquier momento

Auth::routes();
Route::get('/about', function (){
    return view('about');
})->name('about');
//Route::get('/', 'HomeController@index');
//Route::get('/home', 'HomeController@index')->name('home');


