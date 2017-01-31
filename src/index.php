<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \GraphQL\GraphQL;
use \GraphQL\Schema;
use rvionny\Gw2Adapter\Types;

#gather query input
var_dump($_SERVER);
if (
    isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false
    ||
    isset($_SERVER['HTTP_CONTENT_TYPE']) && strpos($_SERVER['HTTP_CONTENT_TYPE'], 'application/json') !== false

) {
    $raw = file_get_contents('php://input') ?: '';
    $data = json_decode($raw, true);
} else {
    $data = $_REQUEST;
}
$data += ['query' => null, 'variables' => null];

if (null === $data['query']) {
    $data['query'] = '{hello}';
}

$appContext = new \rvionny\Gw2Adapter\AppContext();

$types = [
    Types::weaponDetails(),
    Types::itemDetails(),
];

$schema = new Schema([
    'query' => Types::query(),
    'types' => $types
]);

$result = GraphQL::execute(
    $schema,
    $data['query'],
    null,
    $appContext,
    (array) $data['variables']
);

echo json_encode($result);