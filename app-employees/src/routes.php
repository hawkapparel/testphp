<?php
use App\Model\EmpleadoModel;
// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


$app->get('/test', function ($req, $res, $args) {
        return $res->getBody()
                   ->write('Hello Users');
});


$app->get('/getAll', function ($req, $res, $args) {
	$em = new EmpleadoModel();

    return $res
       ->withHeader('Content-type', 'application/json')
       ->getBody()
       ->write(
        $em->GetAll()
    );
});