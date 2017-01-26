<?php
namespace rvionny\Gw2Adapter\Type;

use GraphQL\Type\Definition\InterfaceType;
use rvionny\Gw2Adapter\Model\WeaponDetails;
use rvionny\Gw2Adapter\Types;

class ItemDetailsInterface extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'ItemDetailsInterface',
            'fields' => [
                'type' => Types::string()
            ],
            'resolveType' => [$this, 'resolveNodeType']
        ];
        parent::__construct($config);
    }

    public function resolveNodeType($object)
    {
        if ($object instanceof WeaponDetails) {
            return Types::weaponDetails();
        }

        return Types::itemDetails();
    }
}
