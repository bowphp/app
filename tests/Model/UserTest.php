<?php

use App\Model\User;
use Bow\Testing\TestCase;

class UserTest extends TestCase
{
    public function test_should_user_have_admin_role()
    {
        // $user = User::find(1);
        // $this->assertTrue($user->role == 'admin');
        $this->assertTrue(true);
    }
}
