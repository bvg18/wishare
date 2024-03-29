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
        $categories = Category::All();

        $products = Product::where('wishlists_id', $id)->paginate(10);

        $myList = (Auth::id() == $wishlist->user->id);
        if($myList || !($wishlist->private)){
            return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'myList' => $myList, 'categories' => $categories]);
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

        $myList = (Auth::id() == $wishlist->user->id);

        $categories = Category::All();

        return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'myList'=>$myList, 'categories' => $categories]);
    }


    //   source  https://stackoverflow.com/questions/55715895/eloquent-detect-multiple-column-duplicate-data
    public function deduplicateWishlistForm($id)
    {
        $wishlist = Wishlist::find($id);
        $products = $wishlist->products()->get();
        $products
            // Group models by sub_id and name
            ->groupBy(function ($item) { return $item->url.'_'.$item->name; })
            // Filter to remove non-duplicates
            ->filter(function ($arr) { return $arr->count()>1; })
            // Process duplicates groups
            ->each(function ($arr) {
                $arr
                    // Sort by id  (so first item will be original)
                    ->sortBy('id')
                    // Remove first (original) item from dupes collection
                    ->splice(1)
                    // Remove duplicated models from DB
                    ->each(function ($model) {
                        $model->delete();
                    });
            });
        return redirect()->action ('WishlistController@showWishlist', [$id]);
    }

    public function sortByCategory($id)
    {
        $wishlist=Wishlist::find($id);
        $products = Product::where('wishlists_id', $id)->orderBy('categories_id')->paginate(10);
        $myList = (Auth::id() == $wishlist->user->id);
        $categories = Category::All();

        return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'myList'=>$myList, 'categories' => $categories]);
    }

    public function filterByCategory($idWishlist, Request $request)
    {
        $wishlist = Wishlist::findOrFail($idWishlist);
        $category = $request->input('category');
        if($category != -1)
        {
            $products = Product::where('wishlists_id', $idWishlist)->where('categories_id', $category)->paginate(10);
            $categories = Category::All();
            $myList = (Auth::id() == $wishlist->user->id);
            if($myList || !($wishlist->private)){
                return view('wishlists/wishlist', ['wishlist' => $wishlist, 'products' => $products, 'myList' => $myList, 'categories' => $categories]);
            }
            else{
                 return redirect()->action('UserController@showUser', [$wishlist->user->id]);
            }
        }
        else 
        {
            return redirect()->action('WishlistController@showWishlist', [$idWishlist]);  
        }

        
    }

    public function askWishlistChooseGET($idWishlistDelete) 
    {
        $wishlistDelete = Wishlist::find($idWishlistDelete);
        //$followersC=$followers->count();
        $user = Auth::user();
        if($wishlistDelete->products->count() > 0)
        {            
            $wishlists = $user->wishlists;
            return view('wishlists/askDeleteWishlist', ['deleteID' => $wishlistDelete, 'wishlists' => $wishlists]);
        }
        else
        {
            $this->deleteWishlist($idWishlistDelete);
            return redirect()->action('WishlistController@listWishlist', [$user->id]);
        }
    }

    public function askWishlistChoosePOST($idWishlistDelete, Request $request) 
    {
        $wishlistDelete = Wishlist::find($idWishlistDelete);

        $request->validate([
            'choose' => 'required',
        ]);

        $toWishlist = Wishlist::find($request->input('choose'));
        $userId = Auth::id();

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

    public function copyWishlistOtherUserGET($copyWishlistId)
    {
        $userId = Auth::id();
        $this->copyWishlistOtherUser($copyWishlistId);
        return redirect()->action('WishlistController@listWishlist', [$userId]);  
    }

    public function copyWishlistOtherUser($copyWishlistId)
    {
        $userId = Auth::id();
        $copyWishlist = Wishlist::find($copyWishlistId);
        $newWishlist = new Wishlist([]);

        $newWishlist->users_id = $userId;
        $newWishlist->name = $copyWishlist->name;
        $newWishlist->description = $copyWishlist->description;
        $newWishlist->save();

        $this->copyProductsToWishlist($copyWishlist, $newWishlist); 
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
