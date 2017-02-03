<?php

namespace rvionny\Gw2Adapter\Services;

use rvionny\Gw2Adapter\Model\Character;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 2:19 PM
 */
class CharacterFactory
{
    private static $characters = [];

    public static function getCharacter($name)
    {
        if(!isset(self::$characters[$name]))
            self::$characters[$name] = new Character(Gw2Api::getCharacter($name));

        return self::$characters[$name];
    }

    public static function getCharacterList()
    {
        $return = [];
        $nameList = Gw2Api::getCharacterList();

        foreach ($nameList as $name)
        {
            $return[] = self::getCharacter($name);
        }

        return $return;
    }
}