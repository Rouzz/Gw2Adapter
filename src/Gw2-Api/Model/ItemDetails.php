<?php

namespace rvionny\Gw2Adapter\Model;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 3:05 PM
 */
class ItemDetails
{
    protected $type;

    public function __construct($args)
    {
        $this->type = $args['type'];
    }

    public function type()
    {
        return $this->type;
    }
}