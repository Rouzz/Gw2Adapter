<?php

namespace rvionny\Gw2Adapter\Model;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 3:05 PM
 */
class WeaponDetails extends ItemDetails
{
    protected $type;
    protected $damageType;

    public function __construct($args)
    {
        parent::__construct($args);
        $this->damageType = $args['damage_type'];
    }

    public function type()
    {
        return $this->type;
    }

    public function damageType()
    {
        return $this->damageType;
    }
}