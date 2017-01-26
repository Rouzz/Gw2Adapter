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
        $return = [];
        foreach ($idList as $id)
        {
            if(!isset(self::$items[$id]))
                self::$items[$id] = new Item(Gw2Api::getItem($id));

            $return[] = self::$items[$id];
        }

        return $return;
    }

    public static function getItemList($offset, $count)
    {
        $return = [];
        $itemList = Gw2Api::getItemList();
        $itemList = array_slice($itemList, $offset, $count);
        foreach ($itemList as $id)
        {
            if(!isset(self::$items[$id]))
                self::$items[$id] = new Item(Gw2Api::getItem($id));

            $return[] = self::$items[$id];
        }

        return $return;
    }
}