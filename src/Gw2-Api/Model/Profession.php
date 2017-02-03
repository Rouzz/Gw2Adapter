<?php

namespace rvionny\Gw2Adapter\Model;

use rvionny\Gw2Adapter\Services\Gw2Api;
use rvionny\Gw2Adapter\Services\SpecializationFactory;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 3:05 PM
 */
class Profession
{
    protected $id;
    protected $name;
    protected $icon;
    protected $iconBig;
    protected $specializations;

    protected $loaded;

    public function __construct($id)
    {
        $this->id = $id;
        $this->specializations = array();
        $this->loaded = false;
    }

    /**
     * @return mixed
     */
    public function __call($name, $args)
    {
        if(!$this->loaded && $name != 'id')
            $this->load();

        if(property_exists($this, $name))
            return $this->{$name};
        else
            return null;
    }

    protected function load()
    {
        $data = Gw2Api::getProfession($this->id);
        $this->name = $data['name'];
        $this->icon = $data['icon'];
        $this->iconBig = $data['icon_big'];

        foreach ($data['specializations'] as $specialization) {
            $this->specializations[] = SpecializationFactory::getSpecialization($specialization);
        }

        $this->loaded = true;
    }
}