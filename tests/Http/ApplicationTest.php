<?php

use Bow\Testing\TestCase;

class ApplicationTest extends TestCase
{
    /**
     * The base url for cURL request
     *
     * @var string
     */
    protected $url = 'http://localhost:5000';

    public function testShouldAuthenticateUser()
    {
        $response = $this->visit('GET', '/');

        $response->assertStatus(200)->contentTypeMustBe('text/html');
    }
}
