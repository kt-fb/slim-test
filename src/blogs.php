<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require_once dirname(__FILE__).'/models/blogs.php';

$app->post('/blogs/category/[{id}]', function (Request $request, Response $response, array $args) use ($container) {    
    return $response->withJson(get_blog_list_by_cat_id( $args['id'], $request->getParsedBody()));
});

$app->post('/blogs/id/[{id}]', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_blog_by_id($args['id']));
});

$app->post('/blogs/category', function (Request $request, Response $response, array $args) use ($container) {    
    return $response->withJson(get_all_blog_category());
});

$app->post('/blogs/', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_blog_list($request->getParsedBody()));
});






// for get use  $request->postQueryParams() to get array