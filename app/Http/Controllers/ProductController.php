<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    public function formNewProduct($idWishlist) 
    {
        $wishlist = Wishlist::findOrFail($idWishlist);
        $categories = Category::All();

        return view('products/create', ['wishlist' => $wishlist, 'categories' => $categories]);
    }


    public function addProductToWishlist($idWishlist, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|min:4|max:30',
            'url' => 'required'
        ]);

        $product = new Product([]);

        $product->name = $request->input('name');
        $product->wishlists_id = $idWishlist;
        $product->description = $request->input('description');
        $product->url = $request->input('url');
        $product->categories_id = $request->input('category');

        if($request->hasFile('image')){//Imagen del producto
            $image = $request->file('image');
            $image->move('img/products/', $image->getClientOriginalName());
            $product['image'] = $image->getClientOriginalName();
        }

        $product->save();
        
        return redirect()->action('WishlistController@showWishlist', [$idWishlist]);
    }

    public function deleteProductOfWishList($idWishlist, $idProduct, Request $request) {
        $wishlist = Wishlist::findOrFail($idWishlist);
        $product = Product::findOrFail($idProduct);
        $product->delete();
        return redirect()->action('WishlistController@showWishlist', [$idWishlist]);       
    }

    public function formCopyProduct($idProduct)
    {
        //$wishlistDelete = Wishlist::find($idWishlistDelete);
        $productToCopy = Product::findOrFail($idProduct);
        $user = Auth::user();
        $wishlists = $user->wishlists;

        return view('products/askCopyProduct', ['productToCopy' => $productToCopy, 'userWishlists' => $wishlists]);
    }

    public function copyProduct($idProduct, Request $request) 
    {

        $request->validate([
            'choose' => 'required',
        ]);

        
        $userId = Auth::id();
        $productToCopy = Product::findOrFail($idProduct);

        if ($request->input('choose') == "-1") {
            $newWishlist = new Wishlist([]);

            $newWishlist->name = $productToCopy->name;
            $newWishlist->users_id = $userId;
            $newWishlist->private=false;
            
            $newWishlist->save();

            $this->copyProductToList($idProduct, $newWishlist->id);
            return redirect()->action('WishlistController@showWishlist', [$newWishlist->id]);
        }
        else {
            $toWishlist = Wishlist::find($request->input('choose'));
            
            $this->copyProductToList($idProduct, $toWishlist->id);
            return redirect()->action('WishlistController@showWishlist', [$toWishlist->id]); 
        }
    }

    public function copyProductToList($idProduct, $idWishlist){

        $productToCopy = Product::findOrFail($idProduct);
        $newProduct = new Product([]);
        
        $newProduct->name = $productToCopy->name;
        $newProduct->wishlists_id = $idWishlist;
        $newProduct->description = $productToCopy->description;
        $newProduct->url = $productToCopy->url;
        $newProduct->categories_id = $productToCopy->categories_id;

        if($productToCopy->image != null){ //Imagen del producto                
            $newProduct->image = $productToCopy->image;
        }

        $newProduct->save();
    }
}
