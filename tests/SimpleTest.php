<?php

function see_hello()
{
    return 'hello world';
}

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
    public function testHelperSeeHello()
    {
        $this->assertEquals(see_hello(), 'hello world');
    }
}
