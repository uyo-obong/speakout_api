<?php

namespace Tests\Feature;

use Jiggle\Modules\Account\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }


    /**
     * Verify user test
     */
    public function testVeryUser(){


        $response = $this->get('api/v1/account/verify/1904509285');


        $response->assertStatus(200);
    }
}
