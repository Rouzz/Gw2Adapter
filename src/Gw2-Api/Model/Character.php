<?php

namespace rvionny\Gw2Adapter\Model;

use rvionny\Gw2Adapter\Services\ProfessionFactory;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 3:05 PM
 */
class Character
{
    protected $name;
    protected $race;
    protected $gender;
    protected $profession;
    protected $level;
    protected $guild;
    protected $age;
    protected $created;
    protected $deaths;
    protected $title;
    protected $equipment;

    public function __construct($args)
    {
        $this->name = $args['name'];
        $this->race = $args['race'];
        $this->gender = $args['gender'];
        $this->profession = ProfessionFactory::getProfession($args['profession']);
        $this->level = $args['level'];
        $this->guild = $args['guild'];
        $this->age = $args['age'];
        $this->created = $args['created'];
        $this->deaths = $args['deaths'];
        $this->title = @$args['title'];
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