<?php
namespace rvionny\Gw2Adapter\Type;

use rvionny\Gw2Adapter\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class TraitType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Trait',
            'description' => 'A specialization trait',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Types::id(),
                        'resolve' => function($value, $args, $context, ResolveInfo $info) {
                            return $value->{$info->fieldName}();
                        }
                    ],
                    'name' => Types::string(),
                    'icon' => Types::string(),
                    'description' => Types::string(),
                    'tier' => Types::int(),
                    'slot' => Types::string(),
                    'isActive' => [
                        'type' => Types::boolean(),
                        'args' => [
                            'gameType' => Types::nonNull(Types::string())
                        ],
                        'resolve' => function($value, $args, $context, ResolveInfo $info) {
                            if(empty($context->character))
                                return null;

                            return $context->character->isActiveTrait($value->id(), $args['gameType']);
                        }
                    ]
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
