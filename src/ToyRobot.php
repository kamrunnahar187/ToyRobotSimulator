<?php

namespace src;

use InvalidArgumentException;

/**
 * Class ToyRobot
 * @package src
 * Toyrobot class is responsible for basic robot operation, it encapsulate the robots property and behaviour.
 */
class ToyRobot
{
    private $position;
    private $direction;

    public function __construct(Position $position, Direction $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }


    /**
     * Move the robot based on the existing position.
     * @throws InvalidArgumentException if the robot is not placed yet.
     */
    public function move()
    {
        if (!$this->isPlaced()) {
            throw new InvalidArgumentException('Robot is not Placed.');
        }
        $x = $this->position->getX();
        $y = $this->position->getY();

        switch ($this->direction->getDirection()) {
            case "NORTH":
                $y++;
                break;
            case "EAST":
                $x++;
                break;
            case "SOUTH":
                $y--;
                break;
            case "WEST":
                $x--;
                break;
        }
        if (!$this->position->isValidPosition($x, $y)) return;

        $this->position->setX($x);
        $this->position->setY($y);
    }

    public function isPlaced()
    {
        return (!is_null($this->position->getX()) && !is_null($this->position->getY()));
    }

    /**
     * Rotate the robot to left based on the existing position.
     * @throws InvalidArgumentException if the robot is not placed yet.
     */
    public function left()
    {
        $this->rotate(-1);
    }

    public function rotate($leftOrRight)
    {
        // Check that robot is placed before executing command
        if (!$this->isPlaced()) {
            throw new  InvalidArgumentException(sprintf("Robot is not placed. Place the robot first."));
        }
        $newIndex = ($this->direction->getDirectionIndex() + $leftOrRight) < 0 ?
            Direction::DIRECTION_COUNT - 1 :
            ($this->direction->getDirectionIndex() + $leftOrRight) % Direction::DIRECTION_COUNT;
        $this->direction->setDirection(Direction::robotDirection[$newIndex]);
    }

    /**
     * Rotate the robot to right based on the existing position.
     * @throws InvalidArgumentException if the robot is not placed yet.
     */
    public function right()
    {
        $this->rotate(1);
    }

    /**
     * Place the robot to specified position and direction.
     * @throws InvalidArgumentException if the robot is not placed yet.
     */
    public function place($x, $y, $direction)
    {
        // Check if new x,y coordinates within board bounds
        if (!$this->position->isValidPosition($x, $y)) {
            throw new  InvalidArgumentException(sprintf('Invalid coordinates (%d,%d).', $x, $y));
        }

        // Check if supplied direction is valid
        if (!Direction::isValidDirection($direction)) {
            throw new  InvalidArgumentException(sprintf('Invalid Direction (%s).', $direction));
        }
        $this->position->setX($x);
        $this->position->setY($y);
        $this->direction->setDirection($direction);
    }

    /**
     * Return robots current position and direction.
     * @throws InvalidArgumentException if the robot is not placed yet.
     */
    public function report()
    {
        // Check that robot is placed before executing command
        if (!$this->isPlaced()) {
            throw new  InvalidArgumentException(sprintf("Robot is not placed. Place the robot first."));

        }
        return $this->position->getX() . "," . $this->position->getY() . "," . $this->direction->getDirection();

    }


}
