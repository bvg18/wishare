<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Wishlist;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Borrar datos de la tabla products
        DB::table('products')->delete();

        $w=Wishlist::find(1);

        //Insertar filas en la tabla users
        $product = Product::create(
            [
                'name' => 'Boli Pentel Azul',
                'description' => 'Bolígrafo Azul Pentel-EnerGel-X',
                'url' => 'https://www.amazon.es/Pentel-EnerGel-X-Bol%C3%ADgrafo-retr%C3%A1ctil-marino/dp/B07SM86Q5H/',
                'image' => 'boli.jpg',
                'wishlists_id' => $w->id,
            ]
        );

        $product -> save();

        $product = Product::create(
            [
                'name' => 'Boli Pentel Rojo',
                'description' => 'Bolígrafo Rojo Pentel-EnerGel-X',
                'url' => 'https://www.amazon.es/Pentel-EnerGel-X-Bol%C3%ADgrafo-retr%C3%A1ctil-marino/dp/B07SM86Q5H/',
                'image' => 'boli.jpg',
                'wishlists_id' => $w->id,
            ]
        );

        $product -> save();
    }
}
