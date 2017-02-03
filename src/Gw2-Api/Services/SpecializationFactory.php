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
    private static $specializations = [];

    public static function getSpecialization($id)
    {
        if(!isset(self::$specializations[$id]))
            self::$specializations[$id] = new Specialization($id);

        return self::$specializations[$id];
    }

    public static function getSpecializations($idList)
    {
        $specList = Gw2Api::getSpecializations($idList);
        $return = [];
        foreach ($idList as $key => $id)
        {
            if(!isset(self::$specializations[$id]))
                self::$specializations[$id] = new Specialization($specList[$key]);

            $return[] = self::$specializations[$id];
        }

        return $return;
    }
}