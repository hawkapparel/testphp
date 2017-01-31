<?php
include "vendor/autoload.php";
require __DIR__ . '/../models/empleado.php';
require __DIR__ . '/../repositories/empleado.php';

// Create Slim app
$app = new \Slim\App();

// Fetch DI Container
$container = $app->getContainer();


// Register Twig View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig('./templates', [
        //'cache' => '../cache'
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

// Automatically load router files 
$routers = glob('./routers/*.router.php'); 

foreach ($routers as $router){
	require $router; 
}

// Run app
$app->run();

?>