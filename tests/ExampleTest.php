<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * Login test.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->visit('/login')
             ->type(env('ADMIN_USER','admin'), 'username')
             ->type(env('ADMIN_PASS','admin'), 'password')
             ->press('Sign in')
             ->seePageIs('/backend');
    }
}
