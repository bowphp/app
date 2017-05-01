<?php

class ApplicationTest extends \Bow\Support\Test\BowTestCase
{
    /**
     * @var string
     */
    protected $base_url = 'http://localhost:5000/';

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
        $this->visite('GET', '/')
            ->statusCodeMustBe(200)
            ->contentTypeMustBe('text/html');
    }

    /**
     * @depends testApplicationInstance
     */
    public function testGetJsonForIUsersControllerIndexAction()
    {
        $this->visite('GET', '/json')
            ->statusCodeMustBe(200)
            ->contentTypeMustBeJson();
    }
}