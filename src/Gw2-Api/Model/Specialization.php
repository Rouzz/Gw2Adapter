<?php

namespace rvionny\Gw2Adapter\Model;

use rvionny\Gw2Adapter\Services\Gw2Api;
use rvionny\Gw2Adapter\Services\TraitFactory;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 3:05 PM
 */
class Specialization
{
    protected $id;
    protected $name;
    protected $elite;
    protected $icon;
    protected $background;
    protected $minorTraits;
    protected $majorTraits;

    protected $loaded;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->elite = $data['elite'];
        $this->icon = $data['icon'];
        $this->background = $data['background'];
        $this->minorTraits = $data['minor_traits'];
        $this->majorTraits = $data['minor_traits'];
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
        $this->minorTraits = TraitFactory::getTraits($this->minorTraits);
        $this->majorTraits = TraitFactory::getTraits($this->majorTraits);

        $this->loaded = true;
    }
}