<?php
namespace rvionny\Gw2Adapter\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use rvionny\Gw2Adapter\Services\ItemFactory;
use rvionny\Gw2Adapter\Types;

class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'item' => [
                    'type' => Types::listOf(Types::item()),
                    'description' => 'Returns item by id or all if no id is given',
                    'args' => [
                        'id' => Types::listOf(Types::id())
                    ]
                ],
                'hello' => Type::string()
            ],
            'resolveField' => function($val, $args, $context, ResolveInfo $info) {
                return $this->{$info->fieldName}($val, $args, $context, $info);
            }
        ];
        parent::__construct($config);
    }

    public function item($rootValue, $args)
    {
        return ItemFactory::getItems($args['id']);
    }

    public function hello()
    {
        return 'Your graphql-php endpoint is ready! Use GraphiQL to browse API';
    }

    public function deprecatedField()
    {
        return 'You can request deprecated field, but it is not displayed in auto-generated documentation by default.';
    }
}
