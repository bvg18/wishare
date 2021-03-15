<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Borrar datos de la tabla users
        DB::table('users')->delete();

        //Insertar filas en la tabla users
        $user = User::create(
            [
                'name' => 'admin',
                'email' => 'admin@wishare.es',
                'password' => Hash::make('admin'),
            ]
        );

        $user -> save();

        $user = User::create(
            [
                'name' => 'usuario',
                'email' => 'usuario@wishare.es',
                'password' => Hash::make('usuario'),
            ]
        );

        $user -> save();
    }
}