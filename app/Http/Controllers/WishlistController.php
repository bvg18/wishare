<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    public function showMyOnlyWishlist() {
        
        $user = auth()->user();

        $wishlists = $user->wishlists;
        $wishlist = $wishlists->first();//Cuando sólo hay una wishlist por usuario

        $products = $wishlist->products;

        return view('wishlist', ['wishlist' => $wishlist, 'products' => $products]);
    }

    public function showWishlist($id) {
        
        $wishlist = Wishlist::find($id);

        $products = $wishlist->products;

        return view('wishlist', ['wishlist' => $wishlist, 'products' => $products]);
    }

    public function listWishlist($userId) {
        
        $user = User::findOrFail($userId);
        $wishlists = $user->wishlists;

        return view('wishlists', ['user' => $user, 'wishlists' => $wishlists]);
    }

    public function listMyWishlists() {
        
        $user = auth()->user();
        $wishlists = $user->wishlists;

        return view('wishlists', ['user' => $user, 'wishlists' => $wishlists]);
    }

}
