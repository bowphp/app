<?php

use Bow\Testing\TestCase;

class ApplicationTest extends TestCase
{
    public function test_show_the_welcome_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200)->assertContentType('text/html');
    }

    public function test_cannot_show_the_not_found_page()
    {
        $response = $this->get('/not-found-page');

        $response->assertStatus(404)->assertContentType('text/html');
    }
}
