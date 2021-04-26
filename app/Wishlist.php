<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Wishlist extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'users_id'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function products() {
        return $this->hasMany('App\Product', 'wishlists_id');
    }

    public function productsDelete(){
        return $this->belongsToMany('App\Product','wishlists_id','user_id');
    }
}
