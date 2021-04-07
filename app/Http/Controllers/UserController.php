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
        return view('users/user', ['user' => $user, 'wishlists' => $wishlists, 'count' => $count]);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required', // No permitimos borrar el nombre
            'description' => '',
            'image' => '',
        ]);

        $user = User::find($id);
        $user->update($data);

        return redirect("/user/{$user->id}");
    }
}
