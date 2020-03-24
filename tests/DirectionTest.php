<?php

namespace src;

use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{

    public function testIsValidDirection()
    {
        $this->assertTrue(Direction::isValidDirection("NORTH"));
        $this->assertTrue(Direction::isValidDirection("SOUTH"));
        $this->assertTrue(Direction::isValidDirection("EAST"));
        $this->assertTrue(Direction::isValidDirection("WEST"));
        $this->assertFalse(Direction::isValidDirection("WESTN"));
    }


}
