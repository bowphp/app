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

    /**
     * Test hello url
     *
     * @dataProvider getUsers
     * @param $name
     */
    public function testIndex($name)
    {
        $response = $this->visit('GET', '/hello/'.$name);

        $response->assertStatus(200)->contentTypeMustBe('text/html');

        $response->containsText(sprintf('<b>%s</b>', $name));
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return [
            ['Franck'],
            ['Abou'],
            ['Houssen'],
            ['Hassane']
        ];
    }
}
