<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
require 'src/Todo.php';
require 'helpers.php';
require 'src/Router.php';

$router = new Router();
$todo= new Todo();

$router->get('/', function(){
    view('home');
});


//$router->get('/edit', function(){
//    view('edit');
//});



$router->get('/todos',function()use($todo){
    $todos = $todo->getAllTodos();
    view('todos',[
        'todos'=>$todos
    ]);
});


$router->post('/todos', function() use($todo) {

    if (!empty(isset($_POST['title'])) and !empty(isset($_POST['due_date']))) {
        $todo->store($_POST['title'], $_POST['due_date']);
        header('Location: /todos');
    }
});

$router->post("/todosedit/{id}", function($todoId) use($todo) {
    if (!empty($_POST['title']) && !empty($_POST['due_date']) && !empty($_POST['status'])) {
        $todo->storeEdit($_POST['title'], $_POST['status'], $_POST['due_date'], $todoId);
        header('Location: /todos');
        exit();
    }
});



$router->get('/todos/{id}/delete', function($todoId) use($todo){
        $todo->destory($todoId);
        redirect('/todos');
});

$router->get('/todos/{id}/edit', function($todoId) use($todo){
        $getTodo = $todo->getTodo($todoId);
        view('edit',[
            'todo'=>$getTodo
        ]);
});
//
//$router->get('/todosedit/{id}', function($todoId) use($todo){
//        $getTodo = $todo->getTodo($todoId);
//        view('edit',[
//            'todo'=>$getTodo
//        ]);
//});

































