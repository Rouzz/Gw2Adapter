<?php
namespace rvionny\Gw2Adapter\Type;

use rvionny\Gw2Adapter\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class ProfessionType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Profession',
            'description' => 'A character profession',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Types::string(),
                        'resolve' => function($value, $args, $context, ResolveInfo $info) {
                            return $value->{$info->fieldName}();
                        }
                    ],
                    'name' => Types::string(),
                    'icon' => Types::string(),
                    'iconBig' => Types::string(),
                    'specializations' => Types::listOf(Types::int()),
                ];
            },
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                if (method_exists($this, $info->fieldName)) {
                    return $this->{$info->fieldName}($value, $args, $context, $info);
                } else {
                    return $value->{$info->fieldName}();
                }
            }
        ];
        parent::__construct($config);
    }
}
