<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    public function listProducts($id) {
        $w = Wishlist::findOrFail($id);

        // falta el array de productos
        // $w

        //$list = array[Product] //añadir los porductos que tiene $w

        return view('wishlist', ['name' => $w->name/*, 'list' => $list*/]);
    }
}
