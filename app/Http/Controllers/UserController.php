<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        return view('user', ['user' => $user, 'wishlists' => $wishlists, 'count' => $count,'followers'=>$followers,
        'follows'=>$follows,'followersC'=>$followersC,'followsC'=>$followsC]);
    }
}
