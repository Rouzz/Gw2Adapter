<?php

namespace rvionny\Gw2Adapter\Model\Details;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 3:05 PM
 */
class WeaponDetails extends ItemDetails
{
    protected $damageType;
    protected $minPower;
    protected $maxPower;

    public function __construct($args)
    {
        parent::__construct($args);
        $this->damageType = $args['damage_type'];
        $this->minPower = $args['min_power'];
        $this->maxPower = $args['max_power'];
    }

    public function damageType()
    {
        return $this->damageType;
    }

    public function minPower()
    {
        return $this->minPower;
    }

    public function maxPower()
    {
        return $this->maxPower;
    }
}
