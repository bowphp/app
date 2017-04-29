<?php

class ApplicationTest extends \PHPUnit\Framework\TestCase
{
    public function testApplicationInstance()
    {
        // @ permet juste de fixer un bugs du côté lancement session
        $app = @require __DIR__.'/../../public/index.php';
        $this->assertInstanceOf(\Bow\Application\Application::class, $app);
    }
}