<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require_once dirname(__FILE__).'/models/businesses.php';



$app->post('/business/id/[{id}]', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_business_by_id($args['id']));
});
$app->post('/business/', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_all_businesses($request->getParsedBody()));
});


$app->post('/business/category/subcategories/cat-id/[{id}]', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_business_subcategories_by_category_id($args['id'],$request->getParsedBody()));
});
$app->post('/business/categories/[{id}]', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_businesses_by_category_id($args['id'],$request->getParsedBody()));
});
$app->post('/business/categories', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_all_business_categories($request->getParsedBody()));
});


$app->post('/business/subcategories/[{id}]', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_all_businesses_by_subcategory_id($args['id'],$request->getParsedBody()));
});

$app->post('/business/subcategories', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_all_business_subcategories($request->getParsedBody()));
});
$app->post('/business/cities/[{id}]', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_all_business_cities($args['id'],$request->getParsedBody()));
});

$app->post('/business/cities', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_all_business_cities($request->getParsedBody()));
});
