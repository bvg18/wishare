<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() 
    {
        return view('products/create');
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

        $product = new \App\Product();
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->url = $data['url'];
        $product->image = 'boli.jpg';
        $product->wishlists_id = $data['wishlist'];
        $product->save();

        dd(request()->all());
        return view('home'); 
    }
}
