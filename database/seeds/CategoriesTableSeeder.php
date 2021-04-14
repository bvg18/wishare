<?php


use App\Category;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Borrar datos de la tabla products
        DB::table('categories')->delete();

        $c = new Category(
            [
                'name' => 'Default',
                'description' => 'Default category'
            ]
        );
        $c -> save();
        
        
        $c = new Category(
            [
                'name' => 'Papeleria',
                'description' => 'papel y otros objetos de escritorio'
            ]
        );
        $c -> save();

        $c = new Category(
            [
                'name' => 'Electronics',
                'description' => 'different consumer electronics'
            ]
        );
        $c -> save();

        $c = new Category(
            [
                'name' => 'Jewelry',
                'description' => 'rings, bracelets, necklaces'
            ]
        );
        $c -> save();

        $c = new Category(
            [
                'name' => 'Videogames',
                'description' => 'Games for consoles'
            ]
        );
        $c -> save();

        $c = new Category(
            [
                'name' => 'Board games',
                'description' => 'Tabletop games for 2+ players'
            ]
        );
        $c -> save();

        $c = new Category(
            [
                'name' => 'Software',
                'description' => 'Computer software licenses'
            ]
        );
        $c -> save();

        $c = new Category(
            [
                'name' => 'Fitness',
                'description' => 'Sports equipment'
            ]
        );
        $c -> save();
    }
}