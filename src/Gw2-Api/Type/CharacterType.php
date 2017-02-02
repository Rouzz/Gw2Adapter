<?php
namespace rvionny\Gw2Adapter\Type;

use rvionny\Gw2Adapter\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class CharacterType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Character',
            'description' => 'A character',
            'fields' => function() {
                return [
                    'name' => [
                        'type' => Types::string()
                    ],
                    'race' => Types::string(),
                    'gender' => Types::string(),
                    'profession' => Types::string(),
                    'level' => Types::int(),
                    'guild' => Types::string(),
                    'age' => Types::int(),
                    'created' => Types::string(),
                    'deaths' => Types::int(),
                    'title' => Types::int(),
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
