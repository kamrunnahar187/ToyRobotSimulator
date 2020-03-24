<?php

namespace src;

/**
 * Class Position
 * @package src
 * Represents robots direction.
 */
class Direction
{
    const robotDirection = array(
        'NORTH',
        'EAST',
        'SOUTH',
        'WEST'
    );

    const DIRECTION_COUNT = 4;
    private $direction; //  North, East, South and West( 4 direction)

    public static function isValidDirection($direction)
    {
        return in_array($direction, self::robotDirection);
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    public function getDirectionIndex()
    {
        return array_search($this->direction, self::robotDirection);
    }
}