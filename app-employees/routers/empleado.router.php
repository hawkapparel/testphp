<?php
use repositories as emodel;
// Routes

$app->get('/', function ($request, $response, $args) {
	$um = new emodel\Empleado();

    return $this->view->render($response, 'listado-empleados.html', [
        'empleados' => $um->GetAll()
    ]);
})->setName('listado');


/* 
$app->get('/getAll', function ($req, $res, $args) {
    $um = new emodel\Empleado();
    
    return $res
       ->withHeader('Content-type', 'text/xml')
       ->getBody()
       ->write(
        xmlrpc_encode(
            $um->GetAll()
        )
    );
});
*/

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


//Esta ruta sirve para botar un json
$app->get('/pruebaapi', function ($req, $res, $args) {
    $um = new emodel\Empleado();
    
    return $res
       ->withHeader('Content-type', 'application/json')
       ->getBody()
       ->write(
            json_encode(
                $um->GetAll()
            )
    );
});

/*
$app->post('/rangosalarial', function ($request, $response, $args) {
    $um = new emodel\Empleado();

    $min = $request->getParam('min');
    $max = $request->getParam('max');

    return $response
       ->withHeader('Content-type', 'text/xml')
       ->getBody()
       ->write(
        xmlrpc_encode(
            $um->GetSalaryByRange($min, $max)
        )
    );

})->setName('rango');
*/
?>