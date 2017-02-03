<?php

namespace rvionny\Gw2Adapter\Model;

use rvionny\Gw2Adapter\Model\Details\WeaponDetails;
use rvionny\Gw2Adapter\Model\Details\ItemDetails;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 3:05 PM
 */
class SpecTrait
{
    protected $id;
    protected $name;
    protected $icon;
    protected $description;
    protected $tier;
    protected $slot;

    public function __construct($args)
    {
        $this->id = $args['id'];
        $this->name = $args['name'];
        $this->icon = $args['icon'];
        $this->description = $args['description'];
        $this->tier = $args['tier'];
        $this->slot = $args['slot'];
    }

    /**
     * @return mixed
     */
    public function __call($name, $args)
    {
        if(property_exists($this, $name))
            return $this->{$name};
        else
            return null;
    }
}