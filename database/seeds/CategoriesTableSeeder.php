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
    }
}