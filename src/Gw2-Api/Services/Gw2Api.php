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

    public static function getItemList()
    {

    }
}