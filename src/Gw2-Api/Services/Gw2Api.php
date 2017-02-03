<?php

namespace rvionny\Gw2Adapter\Services;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 2:22 PM
 */
class Gw2Api
{
    public static function getItem($id)
    {
//        echo "CALL TO API";
        return self::makeCall('https://api.guildwars2.com/v2/items/' . $id);
    }

    public static function getItems($ids)
    {
        return self::makeCall('https://api.guildwars2.com/v2/items?ids=' . implode(",", $ids));
    }

    public static function getItemList()
    {
        return self::makeCall('https://api.guildwars2.com/v2/items');
    }

    public static function getCharacterList()
    {
        return self::makeCall('https://api.guildwars2.com/v2/characters?access_token=5129EB54-8EB1-3941-95FF-BF1826D6309F615A7A1B-52D6-423E-97E7-0450B0C25307');
    }

    public static function getCharacter($name)
    {
        return self::makeCall('https://api.guildwars2.com/v2/characters/'.rawurlencode($name).'?access_token=5129EB54-8EB1-3941-95FF-BF1826D6309F615A7A1B-52D6-423E-97E7-0450B0C25307');
    }

    public static function getProfession($name)
    {
        return self::makeCall('https://api.guildwars2.com/v2/professions/'.$name);
    }

    public static function getSpecialization($id)
    {
        return self::makeCall('https://api.guildwars2.com/v2/specializations/'.$id);
    }

    public static function getSpecializations($ids)
    {
        return self::makeCall('https://api.guildwars2.com/v2/specializations?ids='.implode(",", $ids));
    }

    public static function getTrait($id)
    {
        return self::makeCall('https://api.guildwars2.com/v2/traits/'.$id);
    }

    public static function getTraits($ids)
    {
        return self::makeCall('https://api.guildwars2.com/v2/traits?ids='.implode(",", $ids));
    }

    private static function makeCall($url)
    {
        error_log("API call");
        return json_decode(file_get_contents($url), true);
    }
}
