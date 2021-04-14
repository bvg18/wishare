<?php


use Illuminate\Database\Seeder;

use App\Product;
use App\Wishlist;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

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
        $c=Category::find(1);


        //Insertar filas en la tabla users
        $product = new Product(
            [
                'name' => 'Boli Pentel Azul',
                'description' => 'Bolígrafo Azul Pentel-EnerGel-X',
                'url' => 'https://www.amazon.es/Pentel-EnerGel-X-Bol%C3%ADgrafo-retr%C3%A1ctil-marino/dp/B07SM86Q5H/',
                'image' => 'boli.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );

        $product -> save();

        $product = new Product(
            [
                'name' => 'Boli Pentel Rojo',
                'description' => 'Bolígrafo Rojo Pentel-EnerGel-X',
                'url' => 'https://www.amazon.es/Pentel-EnerGel-X-Bol%C3%ADgrafo-retr%C3%A1ctil-marino/dp/B07SM86Q5H/',
                'image' => 'boli.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );

        $product -> save();


        $w=Wishlist::find(3);
        $c=Category::find(3);

        $product = new Product(
            [
                'name' => 'Mobile phone',
                'description' => ' Xiaomi Poco X3 Pro',
                'url' => 'https://www.amazon.es/POCO-Pro-Smartphone-DotDisplay-Snapdragon/dp/B08YJFSHFM?ref_=Oct_s9_apbd_onr_hd_bw_b11DnK3&pf_rd_r=RPBAWEJAXW55X257YJ7H&pf_rd_p=8caf2fd0-3c8c-539f-b0b5-f16aa55b19f9&pf_rd_s=merchandised-search-10&pf_rd_t=BROWSE&pf_rd_i=934197031',
                'image' => 'Phone.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );

        $product -> save();

        $w=Wishlist::find(3);
        $c=Category::find(5);

        $product = new Product(
            [
                'name' => 'Video game',
                'description' => 'Outriders',
                'url' => 'https://www.amazon.es/Outriders-PlayStation-5-Importaci%C3%B3n-alemana/dp/B08LG28S6K/ref=sr_1_14?dchild=1&keywords=playstation+5&qid=1618410171&sr=8-14
',
                'image' => 'Videogame.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );

        $product -> save();

        $w=Wishlist::find(4);
        $c=Category::find(6);

        $product = new Product(
            [
                'name' => 'Board game',
                'description' => 'Monopoly',
                'url' => 'https://www.amazon.es/Monopoly-C1009105-Madrid-Hasbro/dp/B071Z7LGR3/ref=sr_1_5?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=monopoly&qid=1618411238&sr=8-5
',
                'image' => 'Board_game.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );

        $product -> save();
    }
}
