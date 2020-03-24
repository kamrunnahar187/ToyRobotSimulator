<?php

namespace src;


use InvalidArgumentException;

class CommandUtils
{
    // trim the input parse the input string to array
    public static function parseCommand($input)
    {
        if (self::isNullOrEmptyString($input)) {
            throw new  InvalidArgumentException(sprintf('Invalid Command'));
        }
        return preg_split("/[\s,]+/", str_replace("\n", "", $input));
    }

    public static function isNullOrEmptyString($str)
    {
        return (!isset($str) || $str === '');
    }


}


