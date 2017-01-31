<?php
use repositories as emodel;
// Routes

$app->get('/', function ($request, $response, $args) {
	$um = new emodel\Empleado();

    return $this->view->render($response, 'listado-empleados.html', [
        'empleados' => $um->GetAll()
    ]);
})->setName('listado');


$app->get('/search', function ($request, $response, $args) {
	$um = new emodel\Empleado();
	//$paramValue = $this->request()->post('email');
	$value = $app->request->params('email');

    return $this->view->render($response, 'listado-empleados.html', [
        'empleados' => $um->Get($value)
    ]);
})->setName('buscador');
/*
$app->get('/search',  function () use ($app) {
          $paramValue = $app->request()->params('paramName');
});
*/

$app->get('/empleado/{id}', function ($request, $response, $args) {
	$um = new emodel\Empleado();

    return $this->view->render($response, 'empleado.html', [
        'empleados' => $um->GetId($args['id'])
    ]);
})->setName('detalle');

?>