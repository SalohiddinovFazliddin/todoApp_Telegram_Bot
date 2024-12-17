<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

use App\Todo;
use App\Router;



$router = new Router();
$todo= new Todo();

$router->get('/register',fn()=>view('register'));
$router->post('/register',fn()=>require 'controllers/storeUserController.php');

$router->get('/login',fn()=>view('login'));


$router->get('/',fn()=>require 'controllers/homeController.php');

$router->put("/todos/{id}/update",fn($todoId)=>require 'controllers/updateTodosController.php');

$router->get('/todos/{id}/update',fn($todoId)=>require 'controllers/editTodoController.php');


$router->get('/todos',fn()=>require 'controllers/getTodosController.php');


$router->post('/todos',fn()=>require 'controllers/postTodosController.php');


$router->get('/todos/{id}/delete', fn($todoId)=>require 'controllers/deleteTodosController.php');

//$router->post('/todos/{id}/delete', fn($todoId)=>require 'controllers/deleteTodosController.php');



?>

