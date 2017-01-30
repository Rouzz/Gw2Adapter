<?php

namespace rvionny\Gw2Adapter\Services;

use rvionny\Gw2Adapter\Model\Item;
use rvionny\Gw2Adapter\Services\Gw2Api;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 2:19 PM
 */
class ItemFactory
{
    private static $items = [];

    public static function getItem($id)
    {
        if(!isset(self::$items[$id]))
            self::$items[$id] = new Item(Gw2Api::getItem($id));

        return self::$items[$id];
    }

    public static function getItems($idList)
    {
        $itemList = Gw2Api::getItems($idList);
        $return = [];
        foreach ($idList as $key => $id)
        {
            if(!isset(self::$items[$id]))
                self::$items[$id] = new Item($itemList[$key]);

            $return[] = self::$items[$id];
        }

        return $return;
    }

    public static function getItemList($offset, $count)
    {
        $return = [];
        $idList = Gw2Api::getItemList();
        $idList = array_slice($idList, $offset, $count);

        $itemList = Gw2Api::getItems($idList);
        foreach ($idList as $key => $id)
        {
            if(!isset(self::$items[$id]))
                self::$items[$id] = new Item($itemList[$key]);

            $return[] = self::$items[$id];
        }

        return $return;
    }
}