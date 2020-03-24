<?php

namespace Test;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use src\Direction;
use src\Position;
use src\SquareBoard;
use src\ToyRobot;

class ToyRobotTest extends TestCase
{

    public function testLeft()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $robot->place(3, 3, 'WEST');
        $robot->rotate(-1);
        $this->assertEquals("SOUTH", $direction->getDirection());
    }

    public function testRight()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $robot->place(4, 4, 'WEST');

        $robot->rotate(1);
        $this->assertEquals("NORTH", $direction->getDirection());

    }

    public function testPlaceSuccessfulWithValidInput()
    {
        # create toy robot
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);

        #execute place command
        $robot->place(2, 2, 'NORTH');
        self::assertEquals(2, $pos->getX());
        self::assertEquals(2, $pos->getY());
        self::assertEquals('NORTH', $direction->getDirection());
    }

    public function testPlaceFailWithInvalidInput()
    {
        # create toy robot
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);

        #assert exception
        $this->expectException(InvalidArgumentException::class);
        $robot->place(2, 2, 'NORTHEAST');
    }

    public function testRotate()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $robot->place(2, 2, 'NORTH');
        $robot->rotate(-1);
        $this->assertEquals("WEST", $direction->getDirection());
        $robot->rotate(1);
        $this->assertEquals("NORTH", $direction->getDirection());
    }

    public function testReport()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $robot->place(3, 4, 'SOUTH');
        $robot->move();
        $robot->report();
        $this->assertEquals('3,3,SOUTH', $robot->report());

    }


    public function testIsPlaced()
    {
        # initially is placed is false
        $pos = new Position(5, 5);
        $robot = new ToyRobot($pos, new Direction());
        self::assertFalse($robot->isPlaced());

        # position true when set position
        $pos->setX(2);
        $pos->setY(3);
        $robot = new ToyRobot($pos, new Direction());
        self::assertTrue($robot->isPlaced());

    }

    public function testMove()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);

        #execute place command
        $robot->place(1, 1, 'NORTH');
        $robot->move();
        self::assertEquals(1, $pos->getX());
        self::assertEquals(2, $pos->getY());
        self::assertEquals('NORTH', $direction->getDirection());

    }
}
