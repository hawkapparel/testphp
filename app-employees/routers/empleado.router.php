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

$app->post('/rangosalarial/{min}/{max}', function ($request, $response, $args) {
    $um = new emodel\Empleado();

    return $response
       ->withHeader('Content-type', 'application/json')
       ->getBody()
       ->write(
        json_encode(
            $um->GetSalaryByRange($args['min'], $args['max'])
        )
    );

})->setName('rango');

?>