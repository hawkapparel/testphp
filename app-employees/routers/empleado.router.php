<?php
use repositories as emodel;
// Routes

$app->get('/', function ($request, $response, $args) {
	$um = new emodel\Empleado();

    return $this->view->render($response, 'listado-empleados.html', [
        'empleados' => $um->GetAll()
    ]);
})->setName('listado');


// Define named route
$app->get('/search', function ($request, $response, $args) {
	$um = new emodel\Empleado();

    return $this->view->render($response, 'listado-empleados.html', [
        'empleados' => $um->Get($args['email'])
    ]);
})->setName('buscador');


?>