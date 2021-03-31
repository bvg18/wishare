<?php

use Illuminate\Database\Seeder;

use App\Wishlist;
use App\User;
use Illuminate\Support\Facades\DB;

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
                
        $w = new Wishlist (
            [
                'name' => 'Mis Deseos',
                'users_id' => $user->id,
            ]
        );
        $w = new Wishlist (
            [
                'name' => 'Tecnología',
                'users_id' => $user->id,
            ]
        );
        $w -> save();
    }
}