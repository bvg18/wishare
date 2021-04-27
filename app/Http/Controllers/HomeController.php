<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Wishlist;
use App\Product;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productsOrdered = Product::orderBy('created_at','desc')->get();
        $productsOrderedAndFiltered = $productsOrdered->filter(function ($value, $key) {
            return Auth::user()->follows->contains($value->wishlist->user) || Auth::id() == $value->wishlist->user->id;
        });
        
        return view('home', ['prodOrdeded' => $productsOrderedAndFiltered]);
    }
}
