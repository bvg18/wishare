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
        $user1 = User::create(
            [
                'name' => 'admin',
                'email' => 'admin@wishare.es',
                'password' => Hash::make('admin'),
            ]
        );

        $user1 -> save();

        $user2= User::create(
            [
                'name' => 'usuario',
                'email' => 'usuario@wishare.es',
                'password' => Hash::make('usuario'),
            ]
        );

        $user2 -> save();

        $user2->follows()->attach($user1->id);

        
    }
}