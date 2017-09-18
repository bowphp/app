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
        $this->visit('GET', '/')
            ->statusCodeMustBe(200)
            ->contentTypeMustBe('text/html');
    }
}