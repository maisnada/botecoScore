<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/../config/routes.php';

$caminho = rtrim($_SERVER['PATH_INFO'], '/');

if (!array_key_exists($caminho, $routes)) {

    http_response_code(404);

    exit();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$classControladora = $routes[$caminho];

/**@var ContainerInterface $container */
//$container = require __DIR__ . '/../config/dependencies.php';

/**@var RequestHandlerInterface $controlador */
//$controlador = $container->get($classControladora);

$controlador = new $classControladora();

/**@var ResponseInterface $response */
$response = $controlador->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
