<?php

function see_hello()
{
    return 'hello world';
}

class SimpleTest extends PHPUnit\Framework\TestCase
{
    public function testHelperSeeHello()
    {
        $this->assertEquals(see_hello(), 'hello world');
    }
}
