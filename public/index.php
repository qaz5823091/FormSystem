<?php

use App\Controllers\TestController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath("/FormSystem");

$app->group('/', function (RouteCollectorProxy $home) {
    $home->get('', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world!");
        return $response;
    });

    $home->get('test', TestController::class.':test')->setName('test');
});

$app->addErrorMiddleware(true, true, true);

$app->run();
