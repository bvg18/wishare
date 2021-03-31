<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;
use App\User;
use App\Category;

class WishlistController extends Controller
{
    /*public function showMyOnlyWishlist() {//Cuando sólo hay una wishlist por usuario
        
        $user = auth()->user();

        $wishlists = $user->wishlists;
        $wishlist = $wishlists->first();

        $products = $wishlist->products;

        return view('wishlist', ['wishlist' => $wishlist, 'products' => $products]);
    }*/

    public function showWishlist($id) {
        
        $wishlist = Wishlist::find($id);

        $products = $wishlist->products;

        $categories = Category::All();

        return view('wishlist', ['wishlist' => $wishlist, 'products' => $products, 'categories' => $categories]);
    }

    public function listWishlist($userId) {
        
        $user = User::findOrFail($userId);
        $wishlists = $user->wishlists;

        return view('wishlists', ['user' => $user, 'wishlists' => $wishlists]);
    }

}
