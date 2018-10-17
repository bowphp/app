<?php

class ApplicationTest extends Bow\Testing\BowTestCase
{
    /**
     * @var string
     */
    protected $base_url = 'http://localhost:5000';

    /**
     * @depends testApplicationInstance
     */
    public function testGetWelcome()
    {
        $response = $this->visit('GET', '/');

        $response->statusCodeMustBe(200)->contentTypeMustBe('text/html');
    }

    /**
     * @depends testApplicationInstance
     * @dataProvider getUsers
     */
    public function testIndex($name)
    {
        $response = $this->visit('GET', '/hello/'.$name);

        $response->statusCodeMustBe(200)->contentTypeMustBe('text/html');

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
