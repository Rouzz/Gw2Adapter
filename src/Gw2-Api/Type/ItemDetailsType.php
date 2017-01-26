<?php
namespace rvionny\Gw2Adapter\Type;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class ItemDetailsType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'ItemDetails',
            'description' => 'Details for an Item',
            'fields' => function() {
                return [
                    'type' => Type::string(),
                    'damageType' => Type::string(),
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
