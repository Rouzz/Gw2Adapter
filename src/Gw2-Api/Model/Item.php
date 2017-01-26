<?php

namespace rvionny\Gw2Adapter\Model;

/**
 * Created by PhpStorm.
 * User: rvionny
 * Date: 1/24/17
 * Time: 3:05 PM
 */
class Item
{
    protected $id;
    protected $name;
    protected $type;
    protected $level;
    protected $rarity;
    protected $vendorValue;
    protected $defaultSkin;
    protected $gameTypes;
    protected $flags;
    protected $restrictions;
    protected $chatLink;
    protected $icon;
    protected $details;

    public function __construct($args)
    {
        $this->id = (int) $args['id'];
        $this->name = $args['name'];
        $this->type = $args['type'];
        $this->level = $args['level'];
        $this->rarity = $args['rarity'];
        $this->vendorValue = $args['vendor_value'];
        $this->defaultSkin = $args['default_skin'];
        $this->gameTypes = $args['game_types'];
        $this->flags = $args['flags'];
        $this->restrictions = $args['restrictions'];
        $this->chatLink = $args['chat_link'];
        $this->icon = $args['icon'];
        $this->details = new ItemDetails($args['details']);
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function level()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function rarity()
    {
        return $this->rarity;
    }

    /**
     * @return mixed
     */
    public function vendorValue()
    {
        return $this->vendorValue;
    }

    /**
     * @return mixed
     */
    public function defaultSkin()
    {
        return $this->defaultSkin;
    }

    /**
     * @return mixed
     */
    public function gameTypes()
    {
        return $this->gameTypes;
    }

    /**
     * @return mixed
     */
    public function flags()
    {
        return $this->flags;
    }

    /**
     * @return mixed
     */
    public function restrictions()
    {
        return $this->restrictions;
    }

    /**
     * @return mixed
     */
    public function chatLink()
    {
        return $this->chatLink;
    }

    /**
     * @return mixed
     */
    public function icon()
    {
        return $this->icon;
    }

    /**
     * @return mixed
     */
    public function details()
    {
        return $this->details;
    }
}