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
        $c=Category::find(3);

        $product = new Product(
            [
                'name' => 'Fire TV stick',
                'description' => 'Home media entertainment device',
                'url' => 'https://www.amazon.es/dp/B08C1KN5J2/ref=gw_es_desk_mso_smp_shp_sc?pf_rd_r=WV1E6PN5XV60QMN79VJ2&pf_rd_p=6acab520-23c8-4f32-987e-2b48ae2abb5c&pd_rd_r=bfae8858-6be0-49a3-9dd2-bfd7859813f1&pd_rd_w=bkYGz&pd_rd_wg=3yZqP&ref_=pd_gw_unk',
                'image' => 'fireTV_stick.jpg',
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

        $w=Wishlist::find(3);
        $c=Category::find(9);

        $product = new Product(
            [
                'name' => 'Dehumidifier',
                'description' => 'Home invertor dehumidifier',
                'url' => 'https://www.amazon.es/Comfee-mddn-10den7-deshumidificador-color-blanco/dp/B07MQ2MFGC/?_encoding=UTF8&pd_rd_w=sKZr4&pf_rd_p=7cb4f41c-4069-4153-8213-7c4029053920&pf_rd_r=9HE5KCJEX0YNDHA6Y1GP&pd_rd_r=1824e0dd-4a77-4488-8981-3f87b17a0f8d&pd_rd_wg=kl6Ff&ref_=pd_gw_cr_cartx&th=1
',
                'image' => 'Dehumidifier.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );

        $product -> save();

        $w=Wishlist::find(3);
        $c=Category::find(8);

        $product = new Product(
            [
                'name' => 'Static bicycle',
                'description' => 'Home fitness static bicycle',
                'url' => 'https://www.amazon.es/Ultrasport-F-Bike-bicicleta-est%C3%A1tica-dom%C3%A9stico/dp/B003FSTA0U?ref_=ast_sto_dp&th=1&psc=1
',
                'image' => 'Static_bicycle.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );

        $product -> save();

        $w=Wishlist::find(3);
        $c=Category::find(10);

        $product = new Product(
            [
                'name' => 'Toy assault rifle',
                'description' => 'AK47 assault rifle toy',
                'url' => 'https://www.amazon.es/Kalashnikov-airsoft-pistola-madera-202-229/dp/B0010XI8AU/ref=pd_sbs_25?pd_rd_w=nnwqx&pf_rd_p=f9559607-0e83-4976-8590-72740e10e24e&pf_rd_r=F2JZPGZX645963PAC0QA&pd_rd_r=a6476eb5-4281-435e-99f1-910c069f1a1a&pd_rd_wg=4JfiG&pd_rd_i=B0010XI8AU&psc=1
',
                'image' => 'AK47_toy.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );
        $product -> save();

        $w=Wishlist::find(3);
        $c=Category::find(2);

        $product = new Product(
            [
                'name' => 'PC PSU',
                'description' => 'Power supply unit for PC',
                'url' => 'https://www.amazon.es/Corsair-HX1000i-Alimentaci%C3%B3n-Completamente-Platinum/dp/B06VSPMPCC/?_encoding=UTF8&pd_rd_w=CWPwd&pf_rd_p=aab8ece1-5499-4d6a-a6b9-85321f83a8cb&pf_rd_r=1H4MKXR0D66FBY708XFH&pd_rd_r=ce0344e7-c4c6-41c6-b512-51d5e219df0d&pd_rd_wg=lJ3yo&ref_=pd_gw_hl-stp-ce&th=1
',
                'image' => 'PC_PowerSupplyUnit.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );
        $product -> save();


        $w=Wishlist::find(3);
        $c=Category::find(8);

        $product = new Product(
            [
                'name' => 'Dumbbels',
                'description' => 'Dumbbels for fitness',
                'url' => 'https://www.amazon.es/Umi-Essentials-Mancuernas-Neopreno-Revestimiento/dp/B07D52F4TL?ref_=ast_sto_dp&th=1
',
                'image' => 'Dumbbels.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );
        $product -> save();

        $w=Wishlist::find(3);
        $c=Category::find(3);

        $product = new Product(
            [
                'name' => 'Tablet',
                'description' => 'Media tablet',
                'url' => 'https://www.amazon.es/nuevo-tablet-fire-hd-8-pantalla-hd-de-8-pulgadas-32-gb-negro-con-ofertas-especiales/dp/B0839MWX47/ref=lp_11138596031_1_1?th=1
',
                'image' => 'Tablet.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );
        $product -> save();

        $w=Wishlist::find(3);
        $c=Category::find(3);

        $product = new Product(
            [
                'name' => 'Playstation 5',
                'description' => 'Playstation 5 video console',
                'url' => 'https://www.amazon.es/dp/B08KJF2D25/?coliid=I105ZD9IMUNFAQ&colid=1OHQKSI9O28R5&psc=0&ref_=lv_ov_lig_dp_it
',
                'image' => 'Playstation5.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );
        $product -> save();

        $w=Wishlist::find(3);
        $c=Category::find(9);

        $product = new Product(
            [
                'name' => 'Air fryer',
                'description' => 'Air fryer kitchen appliance',
                'url' => 'https://www.amazon.es/AmazonBasics-Multi-Functional-Digital-Adjustable-Temperature/dp/B07W66BR7S/ref=sr_1_36?dchild=1&keywords=AmazonBasics&qid=1618846733&sr=8-36
',
                'image' => 'Airfryer.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );
        $product -> save();


        $w=Wishlist::find(3);
        $c=Category::find(9);

        $product = new Product(
            [
                'name' => 'Oven',
                'description' => 'Oven kitchen appliance',
                'url' => 'https://www.amazon.es/Cecotec-Toast-Horno-Conveccion-Sobremesa/dp/B08TVNJW9H?ref_=Oct_s9_apbd_omg_hd_bw_b2MXdqB&pf_rd_r=BTES1Q1YGEX7B8S4EXZ7&pf_rd_p=801f1063-e111-5287-acd9-3344f04c04e2&pf_rd_s=merchandised-search-10&pf_rd_t=BROWSE&pf_rd_i=2165363031
',
                'image' => 'Oven.jpg',
                'wishlists_id' => $w->id,
                'categories_id' => $c->id,
            ]
        );
        $product -> save();

    }
}
