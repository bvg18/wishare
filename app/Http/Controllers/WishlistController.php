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

        $myList = (Auth::id() == $wishlist->user->id);
        if($myList || !($wishlist->private)){
            return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'myList' => $myList]);
        }
        else{
                 return redirect()->action('UserController@showUser', [$wishlist->user->id]);
        }
    }

    public function listWishlist($userId) {
        
        $user = User::findOrFail($userId);
        //$wishlists = $user->wishlists;
        $myList = (Auth::id() == $userId);

        $wishlists = Wishlist::where('users_id', $userId)->paginate(10);

        return view('wishlists/wishlists', ['user' => $user, 'wishlists' => $wishlists,'myList'=>$myList]);
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
        if($request->input('private')=="true"){
            $wishlist->private=true;
        }
        $wishlist->save();

        return redirect()->action('WishlistController@listWishlist', [$userId]);
    }

    public function formEditWishlist($id)
    {
        $wishlist=Wishlist::find($id);
        return view('wishlists/editWishlist', ['wishlist_id' => $id,'wishlist'=>$wishlist]);
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
        if($request->input('private')=="true"){
            $wishlist->private=true;
        }
        else{
            $wishlist->private=false;
        }
        $wishlist->save();
        $products = Product::where('wishlists_id', $id)->paginate(10);

        $categories = Category::All();

        $myList = (Auth::id() == $wishlist->user->id);
        return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'categories' => $categories, 'myList'=>$myList]);
    }

    public function askWishlistChooseGET($idWishlistDelete) 
    {
        $wishlistDelete = Wishlist::find($idWishlistDelete);
        $user = Auth::user();
        $wishlists = $user->wishlists;

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
            $this->copyProductsToWishlist($wishlistDelete, $toWishlist);
            $this->deleteProducts($wishlistDelete);
            $this->deleteWishlist($idWishlistDelete);
            return redirect()->action('WishlistController@showWishlist', [$toWishlist->id]);  
        }
        else {
            // borrar todo 
            $this->deleteProducts($wishlistDelete);
            $this->deleteWishlist($idWishlistDelete);
            return redirect()->action('WishlistController@listWishlist', [$userId]);  
        }
    }

    public function copyProductsToWishlist($wishlist, $toWishlist)
    {
        $products = $wishlist->products;
        foreach ($products as $p) { 
            
            $product = new Product([]);

            $product->name = $p->name;
            $product->wishlists_id = $toWishlist->id;
            $product->description = $p->description;
            $product->url = $p->url;
            $product->categories_id = $p->categories_id;

            if($p->image != null){ //Imagen del producto                
                $product->image = $p->image;
            }
            $product->save();
        }
    }

    public function deleteProducts($wishlist)
    {
        $products = $wishlist->products;
        
        foreach ($products as $p) { 
            $p->delete();
        }
    }

    public function deleteWishlist($id) 
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
    }
}
