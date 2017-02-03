<?php
namespace rvionny\Gw2Adapter\Type;

use rvionny\Gw2Adapter\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class SpecializationType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Specialization',
            'description' => 'A profession specialization',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Types::id(),
                        'resolve' => function($value, $args, $context, ResolveInfo $info) {
                            return $value->{$info->fieldName}();
                        }
                    ],
                    'name' => Types::string(),
                    'elite' => Types::boolean(),
                    'icon' => Types::string(),
                    'minorTraits' => Types::listOf(Types::specTrait()),
                    'majorTraits' => Types::listOf(Types::specTrait()),
                    'isActive' => [
                        'type' => Types::boolean(),
                        'args' => [
                            'gameType' => Types::nonNull(Types::string())
                        ],
                        'resolve' => function($value, $args, $context, ResolveInfo $info) {
                            if(empty($context->character))
                                return null;

                            return $context->character->isActiveSpecialization($value->id(), $args['gameType']);
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
