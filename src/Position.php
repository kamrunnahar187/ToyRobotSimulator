<?php


namespace src;

/**
 * Class Position
 * @package src
 * Represents robots position.
 */
class Position
{
    private $x, $y, $maxRow, $maxColumn;

    public function __construct($maxRow, $maxColumn)
    {
        $this->maxRow = $maxRow;
        $this->maxColumn = $maxColumn;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function isValidPosition($x, $y)
    {
        return !(
            $x >= $this->maxColumn || $x < 0 ||
            $y >= $this->maxRow || $y < 0
        );
    }
}