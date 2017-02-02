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
    protected $facts;
    protected $traitedFacts;
    protected $skills;

    public function __construct($args)
    {
        $this->id = $args['id'];
        $this->name = $args['name'];
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }
}