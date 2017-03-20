<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'controllers/employees.php';
require 'functions/functions.php';

$app = new \Slim\App;

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('templates', [
        'cache' => 'templates/cache'
    ]);
    
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

# http://localhost:8080/employees
$app->get('/employees', function (Request $request, Response $response) {	
	$employee = new Employee();
	$result = $employee->getAll();
    return $this->view->render($response, 'inicio.html', [
        'employees' => $result
    ]);
});

# http://localhost:8080/employees/574daa3731aafea412b01231
$app->get('/employees/{id}', function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$employee = new Employee();
	$result = $employee->getById($id);
    return $this->view->render($response, 'detalle.html', [
        'employee' => $result, 'id' => $id
    ]);
});

# http://localhost:8080/searchs/employee?email=deanramirez@fanfare.com
$app->get('/searchs/employee', function (Request $request, Response $response) {
	$email = $request->getParam('email');
	$employee = new Employee();
	$result = $employee->getByEmail($email);
    return $this->view->render($response, 'buscar.html', [
        'employee' => $result
    ]);
});

# http://localhost:8080/searchs/salary?min=1000&max=1500
$app->get('/searchs/salary', function (Request $request, Response $response) {
	$min = $request->getParam('min');
	$max = $request->getParam('max');
	$employee = new Employee();
	$result = $employee->getBySalary($min, $max);
	$xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><Salaries></Salaries>");
	$node = $xml->addChild('request');

	array_to_xml($result, $node);

	$response = $response->withHeader('Content-type', 'text/xml');
    $response->getBody()->write($xml->asXML());
    return $response;
});

$app->run();
