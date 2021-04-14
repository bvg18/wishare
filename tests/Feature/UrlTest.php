<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function testURL1()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testURL2()
    {
        $response = $this->get('/user/1');

        $response->assertStatus(302);
    }

    public function testURL3()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

}
