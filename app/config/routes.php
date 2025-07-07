<?php

use app\controllers\DolibarrController;
use flight\Engine;
use flight\net\Router;
// use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$DolibarrController = new DolibarrController();
$router->get('/', [ $DolibarrController, 'homenotJson' ]); 

$router->get('/homeJSON',[$DolibarrController, 'home']);
$router->get('/contact',[$DolibarrController, 'redirectionContact']);
$router->post('/addContact', [$DolibarrController, 'addContact']);
$router->get('/removeContact', [$DolibarrController, 'removeContact']);
$router->post('/editContact', [$DolibarrController, 'editContact']);
$router->get('/ContactToEdit', [$DolibarrController, 'getContactToEdit']);

// $router->get('/hello-world/@name', function($name) {
// 	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
// });

// $router->group('/api', function() use ($router, $app) {
// 	$Api_Example_Controller = new ApiExampleController($app);
// 	$router->get('/users', [ $Api_Example_Controller, 'getUsers' ]);
// 	$router->get('/users/@id:[0-9]', [ $Api_Example_Controller, 'getUser' ]);
// 	$router->post('/users/@id:[0-9]', [ $Api_Example_Controller, 'updateUser' ]);
// });