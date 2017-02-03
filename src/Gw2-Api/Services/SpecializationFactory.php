<?php

namespace rvionny\Gw2Adapter\Services;

use rvionny\Gw2Adapter\Model\Character;
use rvionny\Gw2Adapter\Model\Profession;
use rvionny\Gw2Adapter\Model\Specialization;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 2:19 PM
 */
class SpecializationFactory
{
    private static $professions = [];

    public static function getSpecialization($id)
    {
        if(!isset(self::$professions[$id]))
            self::$professions[$id] = new Specialization($id);

        return self::$professions[$id];
    }
}