<?php

use Bow\Testing\TestCase;

class ApplicationTest extends TestCase
{
    public function test_should_show_the_welcome_page()
    {
        $response = $this->visit('GET', '/');

        $response->assertStatus(200)->assertContentType('text/html');
    }
}
