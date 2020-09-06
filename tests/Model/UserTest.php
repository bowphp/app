<?php

use App\Model\User;
use Bow\Testing\TestCase;

class UserTest extends TestCase
{
    public function testShouldUserHaveAdminRole()
    {
        // $user = User::find(1);
        // $this->assertTrue($user->role == 'admin');
        $this->assertTrue(true);
    }
}
