<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
        $user1 = new User(
            [
                'name' => 'admin',
                'email' => 'admin@wishare.es',
                'password' => Hash::make('admin'),
            ]
        );

        $user1 -> save();

        $user2= new User(
            [
                'name' => 'usuario',
                'email' => 'usuario@wishare.es',
                'password' => Hash::make('usuario'),
                'image' => 'jobs.webp'
            ]
        );

        $user2 -> save();

        $user2->follows()->attach($user1->id);

        $user = new User(
            [
                'name' => 'testname',
                'email' => 'testemail@testemail.com',
                'password' => Hash::make('test'),
            ]   
        );

        $user -> save();

        $user2->follows()->attach($user->id);
        $user = new User(
            [
                'name' => 'testuser1',
                'email' => 'testemail1@testemail.com',
                'password' => Hash::make('test'),
            ]
        );

        $user -> save();

        $user = new User(
            [
                'name' => 'testuser2',
                'email' => 'testemail2@testemail.com',
                'password' => Hash::make('test'),
            ]
        );

        $user -> save();

        
    }
}