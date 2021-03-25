<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Wishlist;
use App\Product;

class ProductController extends Controller
{
    public function create() 
    {
        return view('products/create');
    }

    public function formNewProduct($idWishlist) 
    {
        $wishlist = Wishlist::findOrFail($idWishlist);

        return view('products/create', ['wishlist' => $wishlist]);
    }

    

    public function store()
    {
        $data = request()->validate([
            'wishlist' => ['required', 'int'],
            'name' => 'required',
            'description' => 'required',
            'url' => 'required'
        ]);
            /*
        \App\Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'url' => $data['url'],
            'image' => 'boli.jpg',
            'wishlists_id' => $data['wishlist']
        ]);*/

        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->url = $data['url'];
        $product->image = 'boli.jpg';
        $product->wishlists_id = $data['wishlist'];
        $product->save();

        dd(request()->all());
        return view('home'); 
    }

    public function addProductToWishlist($idWishlist, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|min:4|max:30',
            //'wishlist' => ['required', 'int'],
            //'description' => 'required',
            'url' => 'required'
        ]);

        $product = new Product([]);

        $product['name'] = $request->input('name');
        $product['wishlists_id'] = $idWishlist;
        $product['description'] = $request->input('description');
        $product['url'] = $request->input('url');

        if($request->hasFile('image')){//Imagen del producto
            $image = $request->file('image');
            //Storage::disk('local')->put('img/products/ ', $image);
            //$image->move('img/products/', $image->getClientOriginalName());
            //$extension = $request->image->extension();
            //$file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
            //$image->storeAs('/img/products/', $image->getClientOriginalName(), 'public');
            //Storage::put('file.jpg', $image);
            $request->file('image')->storeAs(
                '/public/img', $request->input('name')
            );

            $product['image'] = $image->getClientOriginalName();
        }

        //$categoria = Categoria::find($request->input('categoria'));
        //$pieza->categoria()->associate($categoria);
        
        $product->save();
        
        return redirect()->action('WishlistController@showWishlist', [$idWishlist]);
    }
}
