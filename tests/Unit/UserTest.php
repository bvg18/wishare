<?php

namespace Tests\Unit;

use Illuminate\Database\Capsule\Manager as DB;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testIsAdmin1()
    {
        $test = new User();
        $test->email='test_email';
        $this->assertFalse($test->isAdmin());
    }

    public function testIsAdmin2()
    {
        $test = new User();
        $test->email='admin@wishare.es';
        $this->assertTrue($test->isAdmin());
    }

    public function testIsAdmin3()
    {
        $test = new User();
        $test->email=null;
        $this->assertFalse($test->isAdmin());
    }
//    public function testIsAdmin4()
//    {
//        $test = new User();
//        $test->email='test_email';
//        $this->assertFalse($test->isAdmin());
//    }
//
//    public function testIsAdmin5()
//    {
//        $test = new User();
//        $test->email='admin@wishare.es';
//        $this->assertTrue($test->isAdmin());
//    }
//
//    public function testIsAdmin6()
//    {
//        $test = new User();
//        $test->email=null;
//        $this->assertFalse($test->isAdmin());
//    }

}
