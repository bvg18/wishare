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

        //$products = $wishlist->products;

        $products = Product::where('wishlists_id', $id)->paginate(10);

        $categories = Category::All();

        return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'categories' => $categories]);
    }

    public function listWishlist($userId) {
        
        $user = User::findOrFail($userId);
        //$wishlists = $user->wishlists;
        $wishlists = Wishlist::where('users_id', $userId)->paginate(10);

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

    public function formEditWishlist($id)
    {
        return view('wishlists/editWishlist', ['wishlist_id' => $id]);
    }

    public function editWishlist(Request $request) {
        $name = $request->input('name');
        $description = $request->input('description');
        $id = $request->input('wishlist_id');
        $wishlist = Wishlist::find($id);
        if($name!=null)
        {
            $wishlist->name=$name;
        }
        $wishlist->description=$description;
        $wishlist->save();
        $products = Product::where('wishlists_id', $id)->paginate(10);

        $categories = Category::All();

        return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'categories' => $categories]);
    }

    public function askWishlistChooseGET($idWishlistDelete) 
    {
        $wishlistDelete = Wishlist::find($idWishlistDelete);
        $userId = Auth::id();
        $wishlists = Wishlist::where('users_id', $userId);

        return view('wishlists/askDeleteWishlist', ['deleteID' => $wishlistDelete, 'wishlists' => $wishlists]);
    }

    public function askWishlistChoosePOST($idWishlistDelete, Request $request) 
    {
        $wishlistDelete = Wishlist::find($idWishlistDelete);

        $request->validate([
            'choose' => 'required',
        ]);

        $toWishlist = Wishlist::find($request->input('choose'));
        $userId = Auth::id();$userId = Auth::id();

        if ($request->input('choose') != "-1") {
            // pasar productos y borrrar wishlist
            //$this->copyProductsToWishlist($wishlistDelete, $toWishlist);
            //$this->deleteProducts($wishlistDelete);
            $this->deleteWishlist($idWishlistDelete);
        }
        else {
            // borrar todo 
            //$this->deleteProducts($wishlistDelete);
            $this->deleteWishlist($idWishlistDelete);
        }

        return redirect()->action('WishlistController@listWishlist', [$userId]);  

        // $wishlist = Wishlist::find($id);
    }

    public function copyProductsToWishlist($wishlist, $toWishlist)
    {
        // copiar de wishlist a toWishlist los productos
        // cambiar solo la columna wishlist o copiar entero y luego borrar
    }

    public function deleteProducts($wishlist)
    {
        $products = $wishlist->products();
        for ($i=0; $i < count($products); $i++) { 
            $product = Product::find($products[$i]->id);
            $product->delete();
        }
    }

    public function deleteWishlist($id) 
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
    }
}
