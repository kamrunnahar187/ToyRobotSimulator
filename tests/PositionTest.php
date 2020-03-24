<?php

namespace src;

use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{

    public function testIsValidPosition()
    {
        $pos = new Position(5, 5);
        self::assertTrue($pos->isValidPosition(0, 0));
        self::assertTrue($pos->isValidPosition(4, 3));
        self::assertFalse($pos->isValidPosition(5, 5));
        self::assertFalse($pos->isValidPosition(-1, -1));
    }
}
