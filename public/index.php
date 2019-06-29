<?php
if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}
/**
 * Definitions and global variables
 */
$CONVENTIONS_CSV = __DIR__ .'/../resources/conventions.csv';
$DB_CONFIG = [
    'driver' => 'mysql',
    'user' => 'sroot',
    'password' => 'sroot@123',
    'host' => 'localhost',
    'dbname' => 'sandeep',
    'charset' => 'utf8mb4'  
];
$DB = require __DIR__ . '/../src/db-driver.php';
$PDO = $DB($DB_CONFIG);


/**
 * Autoload 
 */
require __DIR__ . '/../vendor/autoload.php';
use Slim\Middleware\TokenAuthentication;
session_start();


// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
$dependencies = require __DIR__ . '/../src/dependencies.php';
$dependencies($app);

// Register middleware
$middleware = require __DIR__ . '/../src/middleware.php';
$middleware($app);

// Register routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
    "users" => [
        "root" => "t00r"
    ]
]));


$authenticator = function($request, TokenAuthentication $tokenAuth){
    $token = $tokenAuth->findToken($request);
    $secret = "thisisasecret";    
    if( $token !== $secret ){
        throw new \Exception("Unaasds");
    }
};
$error = function($request, $response, TokenAuthentication $tokenAuth) {
    $output = [];
    $output['error'] = [
        'msg' => $tokenAuth->getResponseMessage(),
        'token' => $tokenAuth->getResponseToken(),
        'status' => 401,
        'error' => true
    ];
    return $response->withJson($output, 401);
};


$app->add(new TokenAuthentication([
    'path' => '/api',
    'authenticator' => $authenticator,
    'header' => 'X-Auth',
    'regex' => '/x-auth\s+(.*)$/i',
    'error' => $error
]));

// Run app
$app->run();
