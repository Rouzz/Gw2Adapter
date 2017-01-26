<?php
namespace rvionny\Gw2Adapter\Type;

use rvionny\Gw2Adapter\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class WeaponDetailsType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'WeaponDetails',
            'description' => 'An item in the game',
            'fields' => function() {
                return [
                    'type' => Types::string(),
                    'damageType' => Types::string()
                ];
            },
            'interfaces' => Types::itemDetails(),
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
