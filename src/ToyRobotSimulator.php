<?php

namespace src;

use InvalidArgumentException;

/**
 * Class ToyRobotSimulator
 * @package src
 * Represents the simulation of ToyRobot.
 */
class ToyRobotSimulator
{
    private $robot;

    public function __construct(ToyRobot $robot)
    {
        $this->robot = $robot;
    }

    /**
     * @param $input input provided by the user.
     * @return place command output(position and direction), null otherwise.
     */
    public function execute($input)
    {
        $commandArray = CommandUtils::parseCommand($input);
        $mainCommand = strtoupper($commandArray[0]);
        switch ($mainCommand) {
            case "PLACE":
                if (count($commandArray) != 4) {
                    throw new InvalidArgumentException(sprintf('Invalid place command'));
                }
                $this->robot->place($commandArray[1], $commandArray[2], strtoupper($commandArray[3]));
                break;
            case "MOVE":
                $this->robot->move();
                break;
            case "LEFT":
                $this->robot->left();
                break;
            case "RIGHT":
                $this->robot->right();
                break;
            case "REPORT":
                return $this->robot->report();
            default:
                throw new  InvalidArgumentException(sprintf('Invalid Command.Please enter valid command.'));

        }

    }

}
