<?php

namespace src;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ToyRobotSimulatorTest extends TestCase
{

    public function testExecuteSuccess()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $simulator = new ToyRobotSimulator($robot);
        $simulator->execute("PLACE 0,0,NORTH\n");
        $simulator->execute("move");
        $this->assertEquals("0,1,NORTH", $simulator->execute("REPORT"));

    }

    public function testExecuteFailWhenPlaceCommandIsIncomplete()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $simulator = new ToyRobotSimulator($robot);

        #assert exception
        $this->expectException(InvalidArgumentException::class);
        $simulator->execute("PLACE");

    }

    public function testExecuteFailWhenPlaceCommandPositionIsInvalid()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $simulator = new ToyRobotSimulator($robot);

        #assert exception
        $this->expectException(InvalidArgumentException::class);
        $simulator->execute("PLACE 9 8 NORTH");

    }

    public function testExecuteFailWhenPlaceCommandDirectionIsInvalid()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $simulator = new ToyRobotSimulator($robot);

        #assert exception
        $this->expectException(InvalidArgumentException::class);
        $simulator->execute("PLACE 1 1 UNKNOWN_DIR");

    }

    public function testExecuteFailWhenPlaceCommandIsInvalid()
    {
        $pos = new Position(5, 5);
        $direction = new Direction();
        $robot = new ToyRobot($pos, $direction);
        $simulator = new ToyRobotSimulator($robot);

        #assert exception
        $this->expectException(InvalidArgumentException::class);
        $simulator->execute("UNKNOWN_COMMAND");

    }
}
