<?php
use repositories as emodel;
// Routes

$app->get('/', function ($request, $response, $args) {
	$um = new emodel\Empleado();

    return $this->view->render($response, 'listado-empleados.html', [
        'empleados' => $um->GetAll()
    ]);
})->setName('listado');


$app->post('/search', function ($request, $response, $args) {
	$um = new emodel\Empleado();

	$data = $request->getParam('email');
	
    return $this->view->render($response, 'listado-empleados.html', [
        'empleados' => $um->Get($data)
    ]);
})->setName('buscador');


$app->get('/empleado/{id}', function ($request, $response, $args) {
	$um = new emodel\Empleado();

    return $this->view->render($response, 'empleado.html', [
        'empleados' => $um->GetId($args['id'])
    ]);
})->setName('detalle');

?>