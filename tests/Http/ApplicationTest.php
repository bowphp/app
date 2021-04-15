<?php

use Bow\Testing\TestCase;

class ApplicationTest extends TestCase
{
    public function test_should_authenticate_user()
    {
        $response = $this->visit('GET', '/');

        $response->assertStatus(200)->assertContentType('text/html');
    }
}
