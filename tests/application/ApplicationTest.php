<?php

class ApplicationTest extends \Bow\Testing\BowTestCase
{
    /**
     * @var string
     */
    protected $base_url = 'http://localhost:5000';

    /**
     * @return mixed
     */
    public function testApplicationInstance()
    {
        // @ permet juste de fixer un bugs du côté lancement session
        $app = @require __DIR__.'/../../public/index.php';

        $this->assertInstanceOf(\Bow\Application\Application::class, $app);

        return $app;
    }

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
    public function testHello($name)
    {
        $response = $this->visit('GET', '/hello/'.$name);

        $response->statusCodeMustBe(200)->contentTypeMustBe('text/html');

        $response->containsText(sprintf('<b>%s</b>', $name));
    }

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
