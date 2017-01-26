<?php
namespace rvionny\Gw2Adapter;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\NonNull;
use GraphQL\Type\Definition\ListOfType;
use rvionny\Gw2Adapter\Type\ItemDetailsType;
use rvionny\Gw2Adapter\Type\ItemType;
use rvionny\Gw2Adapter\Type\QueryType;
use rvionny\Gw2Adapter\Type\NodeType;

/**
 * Class Types
 *
 * Acts as a registry and factory for your types.
 *
 * As simplistic as possible for the sake of clarity of this example.
 * Your own may be more dynamic (or even code-generated).
 *
 * @package GraphQL\Examples\Blog
 */
class Types
{
    // Object types:
    private static $item;
    private static $query;
    private static $itemDetails;


    // Interface types
    private static $node;

    /**
     * @return NodeType
     */
    public static function node()
    {
        return self::$node ?: (self::$node = new NodeType());
    }

    /**
     * @return ItemType
     */
    public static function item()
    {
        return self::$item ?: (self::$item = new ItemType());
    }

    /**
     * @return ItemDetailsType
     */
    public static function itemDetails()
    {
        return self::$itemDetails ?: (self::$itemDetails = new ItemDetailsType());
    }

    public static function boolean()
    {
        return Type::boolean();
    }

    /**
     * @return \GraphQL\Type\Definition\FloatType
     */
    public static function float()
    {
        return Type::float();
    }

    /**
     * @return \GraphQL\Type\Definition\IDType
     */
    public static function id()
    {
        return Type::id();
    }

    /**
     * @return \GraphQL\Type\Definition\IntType
     */
    public static function int()
    {
        return Type::int();
    }

    /**
     * @return \GraphQL\Type\Definition\StringType
     */
    public static function string()
    {
        return Type::string();
    }

    /**
     * @param Type $type
     * @return ListOfType
     */
    public static function listOf($type)
    {
        return new ListOfType($type);
    }

    /**
     * @param Type $type
     * @return NonNull
     */
    public static function nonNull($type)
    {
        return new NonNull($type);
    }

    /**
     * @return QueryType
     */
    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }
}
