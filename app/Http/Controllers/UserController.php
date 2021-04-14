<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

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

    public function editUser($id)
    {
        $user = User::find($id);
        $this->authorize('update', $user); // Si no se accede al ID del usuario -> error 403
        $user = User::findOrFail($id);
        return view('users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $user = User::find($id);
        $this->authorize('update', $user); // Si no se accede al ID del usuario -> error 403
        $data = request()->validate([
            'name' => 'required', // No permitimos borrar el nombre
            'description' => '',
            'image' => ''
        ]);

        
        $desc = $data['description'];
        $user->description = $desc;
        $user->save();

        if(request('image')){//Imagen del producto
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $data = array_merge(
                $data,
                ['image' => $imagePath]);
        }

        $user->update($data);
        
        return redirect("/user/{$user->id}");
    }
}
