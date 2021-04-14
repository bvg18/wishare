<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlists() {
        return $this->hasMany('App\Wishlist', 'users_id');
    }

    public function followers(){
        return $this->belongsToMany('App\User','user_followers','user_id','follower_id');
    }

    public function follows(){
        return $this->belongsToMany('App\User','user_followers','follower_id','user_id');
    }

//    public function isAdmin() {
//        $us = Auth::user()->email;
//        if ($us == "admin@wishare.es") {
//            return true;
//        }
//        return false;
//    }

    public function isAdmin()
    {
        return $this->email == "admin@wishare.es";
    }

}
