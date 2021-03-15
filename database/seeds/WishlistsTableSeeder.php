<?php

use Illuminate\Database\Seeder;

use App\Wishlist;
use App\User;

class WishlistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Borrar datos de la tabla products
        DB::table('wishlists')->delete();

        //Insertar filas en la tabla users
        $user=User::find(2);
                
        $w = Wishlist::create(
            [
                'name' => 'Mis Deseos',
                'users_id' => $user->id,
            ]
        );
        $w -> save();
    }
}