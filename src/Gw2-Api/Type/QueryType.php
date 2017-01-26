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
                    'description' => 'Returns item by id',
                    'args' => [
                        'id' => Types::listOf(Types::id())
                    ]
                ],
                'items' => [
                    'type' => Types::listOf(Types::item()),
                    'description' => 'Returns all items',
                    'args' => [
                        'offset' => [
                            'type' => Types::int(),
                            'defaultValue' => 0
                        ],
                        'count' => [
                            'type' => Types::int(),
                            'defaultValue' => 10
                        ]
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

    public function items($rootValue, $args)
    {
        return ItemFactory::getItemList($args['offset'], $args['count']);
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
