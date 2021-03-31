<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Wishlist;
use App\Product;

class ProductController extends Controller
{

    public function formNewProduct($idWishlist) 
    {
        $wishlist = Wishlist::findOrFail($idWishlist);

        return view('products/create', ['wishlist' => $wishlist]);
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

        if($request->hasFile('image')){//Imagen del producto
            $image = $request->file('image');
            $image->move('img/products/', $image->getClientOriginalName());
            $product['image'] = $image->getClientOriginalName();
        }

        //$categoria = Categoria::find($request->input('categoria'));
        //$pieza->categoria()->associate($categoria);
        
        $product->save();
        
        return redirect()->action('WishlistController@showWishlist', [$idWishlist]);
    }
}
