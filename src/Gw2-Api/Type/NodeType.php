<?php
namespace rvionny\Gw2Adapter\Type;

use GraphQL\Type\Definition\InterfaceType;
use rvionny\Gw2Adapter\Types;

class NodeType extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'Node',
            'fields' => [
                'id' => Types::id()
            ],
            'resolveType' => [$this, 'resolveNodeType']
        ];
        parent::__construct($config);
    }

    public function resolveNodeType($object)
    {
        return null;
    }
}
