<?php

function see_hello()
{
    return 'hello world';
}

class FixturesTest extends \PHPUnit\Framework\TestCase
{
    public function testHelperSeeHello()
    {
        $this->assertEquals(see_hello(), 'hello world');
    }
}