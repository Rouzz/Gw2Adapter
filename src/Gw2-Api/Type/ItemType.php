<?php
namespace rvionny\Gw2Adapter\Type;

use rvionny\Gw2Adapter\Model\Item;
use rvionny\Gw2Adapter\Services\ItemFactory;
use rvionny\Gw2Adapter\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class ItemType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Item',
            'description' => 'An item in the game',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Types::id(),
                        'resolve' => function($value, $args, $context, ResolveInfo $info) {
                            return $value->{$info->fieldName}();
                        }
                    ],
                    'type' => Types::string(),
                    'rarity' => Types::string(),
                    'vendorValue' => Types::string(),
                    'defaultSkin' => Types::string(),
                    'gameTypes' => Types::listOf(Types::string()),
                    'flags' => Types::listOf(Types::string()),
                    'restrictions' => Types::listOf(Types::string()),
                    'name' => Types::string(),
                    'chatLink' => Types::string(),
                    'icon' => Types::string(),
                    'details' => Types::itemDetails(),
                ];
            },
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                if (method_exists($this, $info->fieldName)) {
                    return $this->{$info->fieldName}($value, $args, $context, $info);
                } elseif (method_exists($value, $info->fieldName)) {
                    return $value->{$info->fieldName}();
                } else {
                    return $value->{$info->fieldName};
                }
            }
        ];
        parent::__construct($config);
    }
}
