<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function index()
    {
        return view('users/index', ['users' => array()]);
    }

    public function search(Request $request)
    {
        $data = User::where('name', 'LIKE','%'.$request->user.'%')->get();
        return view('users/index', ['users' => $data]);
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        $wishlists = $user->wishlists;
        $count = $wishlists->count();
        $followers= $user->followers;
        $follows=$user->follows;
        $followersC=$followers->count();
        $followsC=$follows->count();
        $myUser = ($user->id == Auth::user()->id);
        $followed = Auth::user()->follows->contains($user);
        return view('users/user', ['user' => $user, 'wishlists' => $wishlists, 'count' => $count,'followers'=>$followers,
        'follows'=>$follows,'followersC'=>$followersC,'followsC'=>$followsC, 'myUser' => $myUser, 'followed' => $followed]);
    }

    public function followUser($idUser)
    {
        $userAuth = Auth::user();
        $userToFollow = User::findOrFail($idUser);
        $userAuth->follows()->attach($userToFollow->id);


        //return back()->withSuccess("Seguiste a {$userToFollow->name}");
        //return view('users/user', ['user' => $userToFollow, 'wishlists' => $wishlists, 'count' => $count]);
        return redirect()->action('UserController@showUser', [$idUser]);
    }

    public function unfollowUser($idUser)
    {
        $userAuth = Auth::user();
        $userToUnfollow = User::findOrFail($idUser);
        $userAuth->follows()->detach($userToUnfollow->id);

        return redirect()->action('UserController@showUser', [$idUser]);
    }

    public function showFollowing($idUser)
    {
        $user = User::findOrFail($idUser);
        $following = $user->follows;

        return view('users/following', ['user' => $user, 'following'=>$following]);
    }

    public function showFollowers($idUser)
    {
        $user = User::findOrFail($idUser);
        $followers= $user->followers;

        return view('users/followers', ['user' => $user, 'followers'=>$followers]);
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
