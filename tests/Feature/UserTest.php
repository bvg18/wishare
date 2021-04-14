<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\User;


class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testUserMail1()
    {
        $mail = "testemail@testemail.com";
        $user = DB::table('users')->where('name', 'testname')->first();
        $mail2 = $user->email;
        $this -> assertEquals($mail, $mail2);
    }

    public function testUserMail2()
    {
        $mail = "wrongmail@testemail.com";
        $user = DB::table('users')->where('name', 'testname')->first();
        $mail2 = $user->email;
        $this -> assertNotEquals($mail, $mail2);
    }


}
