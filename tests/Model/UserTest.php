<?php

use App\Model\User;
use Bow\Testing\TestCase;

class UserTest extends TestCase
{
    /**
     * The simple text
     * 
     * @return void
     */
    public function testInstance()
    {
        $user = new User;

        $this->assertInstanceOf(User::class, $user);
    }
}
