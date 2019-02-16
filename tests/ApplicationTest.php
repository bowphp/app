<?php

class ApplicationTest extends Bow\Testing\BowTestCase
{
    /**
     * @var string
     */
    protected $base_url = 'http://localhost:5000';

    /**
     * Test Welcome page
     */
    public function testGetWelcome()
    {
        $response = $this->visit('GET', '/');

        $response->assertStatus(200)->contentTypeMustBe('text/html');
    }
}
