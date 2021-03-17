<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    public function listProducts($id) {
        $wishlist = Wishlist::findOrFail($id);

        // falta el array de productos
        /*$products = Product::all();/*->filter(function ($wishlistId, $valor) {
            return $wishlistId == $id;
        });*/
        $products = $wishlist->products;
        //'wishlists_id' => $w->id

        //$list = array[Product] //añadir los porductos que tiene $w

        return view('wishlist', ['wishlist' => $wishlist, 'products' => $products]);
    }
}
