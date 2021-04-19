<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use App\Product;
use App\User;
use App\Category;


class WishlistController extends Controller
{

    public function showWishlist($id) {
        
        $wishlist = Wishlist::find($id);

        $products = $wishlist->products;

        $categories = Category::All();

        return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'categories' => $categories]);
    }

    public function listWishlist($userId) {
        
        $user = User::findOrFail($userId);
        $wishlists = $user->wishlists;

        return view('wishlists/wishlists', ['user' => $user, 'wishlists' => $wishlists]);
    }

    public function formNewWishlist() 
    {
        return view('wishlists/createWishlist');
    }

    public function addNewWishlist(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|min:4|max:40',
        ]);

        $wishlist = new Wishlist([]);
        $userId = Auth::id();

        $wishlist->name = $request->input('name');
        $wishlist->users_id = $userId;

        $wishlist->save();

        return redirect()->action('WishlistController@listWishlist', [$userId]);
    }

    public function askAndDeleteWishlist($idWishlistDelete, $idWishlistProducts, $choose) 
    {
        $wishlistDelete = Wishlist::find($idWishlistDelete);
        $wishlistProducts = Wishlist::find($idWishlistProducts);
        $userId = Auth::id();$userId = Auth::id();

        if ($choose == 1) {
            // pasar productos y borrrar wishlist
            // pasar productos
            deleteWishlist($idWishlistDelete);
        }
        else {
            // borrar todo 
            deleteWishlist($idWishlistDelete);
        }

        return redirect()->action('WishlistController@listWishlist', [$userId]);  
    }

    public function deleteWishlist($id) 
    {
        $wishlist = Wishlist::find($id);
        $userId = Auth::id();

        $wishlist->delete();
        return redirect()->action('WishlistController@listWishlist', [$userId]);  
    }

}
