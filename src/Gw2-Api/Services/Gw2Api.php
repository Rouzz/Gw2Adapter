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
        $content = file_get_contents('https://api.guildwars2.com/v2/items/' . $id);
        return json_decode($content, true);
    }

    public static function getItems($ids)
    {
        $content = file_get_contents('https://api.guildwars2.com/v2/items?ids=' . implode(",", $ids));
        return json_decode($content, true);
    }

    public static function getItemList()
    {
        $content = file_get_contents('https://api.guildwars2.com/v2/items');
        return json_decode($content, true);
    }

    public static function getCharacterList()
    {
        $content = file_get_contents('https://api.guildwars2.com/v2/characters?access_token=5129EB54-8EB1-3941-95FF-BF1826D6309F615A7A1B-52D6-423E-97E7-0450B0C25307');
        return json_decode($content, true);
    }

    public static function getCharacter($name)
    {
        $content = file_get_contents('https://api.guildwars2.com/v2/characters/'.rawurlencode($name).'?access_token=5129EB54-8EB1-3941-95FF-BF1826D6309F615A7A1B-52D6-423E-97E7-0450B0C25307');
        return json_decode($content, true);
    }

    public static function getProfession($name)
    {
        $content = file_get_contents('https://api.guildwars2.com/v2/professions/'.$name);
        return json_decode($content, true);
    }

    public static function getSpecialization($id)
    {
        $content = file_get_contents('https://api.guildwars2.com/v2/specializations/'.$id);
        return json_decode($content, true);
    }

    public static function getTraits($ids)
    {
        $content = file_get_contents('https://api.guildwars2.com/v2/traits/'.implode(",", $ids));
        return json_decode($content, true);
    }
}
