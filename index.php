<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require 'bootstrap.php';

require 'src/Todo.php';
require 'helpers.php';
require 'src/Router.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router = new Router();
$todo= new Todo();


$router->put("/todos/{id}/update", function($todoId) use($todo){
//    var_dump($_POST['title']);
    $todo->update($todoId, $_POST['title'], $_POST['status'], $_POST['due_date']);
    redirect('/todos');
});

$router->get('/todos/{id}/update', function($todoId) use($todo){
//    var_dump($_POST['title'], $_POST['status'], $_POST['due_date'], $todoId);
    $getTodo = $todo->getTodo($todoId);
    view('edit',[
        'todo'=>$getTodo
    ]);
});

$router->get('/', function(){
    view('home');
});


$router->get('/todos',function()use($todo){
    $todos = $todo->getAllTodos();
    view('todos',[
        'todos'=>$todos
    ]);
});


$router->post('/todos', function() use($todo) {
    if (!empty(isset($_POST['title'])) and !empty(isset($_POST['due_date']))) {
        $todo->store($_POST['title'], $_POST['due_date']);
        redirect('/todos');
    }
});


$router->get('/todos/{id}/delete', function($todoId) use($todo){
    $todo->destory($todoId);
    redirect('/todos');
});


































