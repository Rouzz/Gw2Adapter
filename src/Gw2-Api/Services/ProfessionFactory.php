<?php

namespace rvionny\Gw2Adapter\Services;

use rvionny\Gw2Adapter\Model\Character;
use rvionny\Gw2Adapter\Model\Profession;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 2:19 PM
 */
class ProfessionFactory
{
    private static $professions = [];

    public static function getProfession($id)
    {
        if(!isset(self::$professions[$id]))
            self::$professions[$id] = new Profession($id);

        return self::$professions[$id];
    }
}