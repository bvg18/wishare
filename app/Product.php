<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'url', 'image'
    ];

    public function wishlist() {
        return $this->belongsTo('App\Wishlist', 'wishlists_id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'categories_id');
    }
}
