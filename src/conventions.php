<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require_once dirname(__FILE__).'/models/conventions.php';

$app->post('/conventions/', function (Request $request, Response $response, array $args) use ($container) {
    return $response->withJson(get_all_conventions());
});
