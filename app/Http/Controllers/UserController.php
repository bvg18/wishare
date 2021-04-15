<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        $wishlists = $user->wishlists;
        $count = $wishlists->count();
        $followers= $user->followers;
        $follows=$user->follows;
        $followersC=$followers->count();
        $followsC=$follows->count();
        return view('users/user', ['user' => $user, 'wishlists' => $wishlists, 'count' => $count,'followers'=>$followers,
        'follows'=>$follows,'followersC'=>$followersC,'followsC'=>$followsC]);
    }

    public function followUser($id){
        $user = User::find($id);
        $user->follows()->attach(auth()->user()->id);

        return back()->withSuccess("Seguiste a {$user->name}");
        return view('users/user', ['user' => $user, 'wishlists' => $wishlists, 'count' => $count]);
    }

    public function formUpdate(/*$id*/)
    {
        $user = Auth::user();
        return view('users/formUpdate', ['user' => $user]);
    }

    
    public function updateUser($idUser, Request $request)
    {
        $user = User::findOrFail($idUser);
        $request->validate([
            'name' => 'required|min:4|max:30'//, // No permitimos borrar el nombre
            //'description' => '',
            //'image' => ''
        ]);
        $user->name = $request->input('name');
        $user->description = $request->input('description');
        if($request->hasFile('image')){//Imagen del producto
            $image = $request->file('image');
            $image->move('img/users/', $image->getClientOriginalName());
            $user['image'] = $image->getClientOriginalName();
        }
        $user->save();

        return redirect()->action('UserController@showUser', [$idUser]);
    }

}
