<?php

use App\Models\User;
use App\Services\UserService;
use Bow\Mail\Mail;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    public function test_can_not_create_the_new_user()
    {
        // Mock the User model
        $user_model_mock = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock();
        $user_model_mock->method('save')->willReturn(null);

        // Parse it to UserService instance
        $user_service = new UserService($user_model_mock);
        $user_not_created = $user_service->create('Franck', 'DAKIA', 'papac@bowphp.com');

        $this->assertNull($user_not_created);
    }

    public function test_create_the_new_user()
    {
        // Mock the User model
        $user_model_mock = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock();
        $user_model_mock->method('save')->willReturn($user_model_mock);

        // Parse it to UserService instance
        $user_service = new UserService($user_model_mock);
        $user_created = $user_service->create('Franck', 'DAKIA', 'papac@bowphp.com');

        $this->assertNotNull($user_created);
        $this->assertEquals($user_created->name, $user_model_mock->name);
        $this->assertEquals($user_created->lastname, $user_model_mock->lastname);
        $this->assertEquals($user_created->email, $user_model_mock->email);
    }
}
