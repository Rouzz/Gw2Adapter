<?php

namespace rvionny\Gw2Adapter\Services;

use rvionny\Gw2Adapter\Model\Character;
use rvionny\Gw2Adapter\Model\Profession;
use rvionny\Gw2Adapter\Model\Specialization;
use rvionny\Gw2Adapter\Model\SpecTrait;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 2:19 PM
 */
class TraitFactory
{
    private static $traits = [];

    public static function getTrait($id)
    {
        if(!isset(self::$traits[$id]))
            self::$traits[$id] = new SpecTrait(Gw2Api::getTrait($id));

        return self::$traits[$id];
    }

    public static function getTraits($idList)
    {
        $traitList = Gw2Api::getTraits($idList);
        $return = [];
        foreach ($idList as $key => $id)
        {
            if(!isset(self::$traits[$id]))
                self::$traits[$id] = new SpecTrait($traitList[$key]);

            $return[] = self::$traits[$id];
        }

        return $return;
    }
}