<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
require 'src/Todo.php';
require 'helpers.php';
require 'src/Router.php';

$router = new Router();
$todo= new Todo();

$router->get('/', function(){
    echo '<a href="/todos">Todos</a>';
});


$router->get('/todos',function()use($todo){
    $todos = $todo->getAllTodos();
    view('home',[
        'todos'=>$todos
    ]);
});

$router->post('/todos', function() use($todo) {
    if (!empty(isset($_POST['title'])) and !empty(isset($_POST['due_date']))) {
        $todo->store($_POST['title'], $_POST['due_date']);
        header('Location: /todos');
    }
});

$router->get('/complete', function()use($todo){
    if (!empty($_GET['id'])) {
        $todo->complete($_GET['id']);
        header('Location: /todos');
        exit();
    }
});
$router->get('/pending', function()use($todo){
    if (!empty($_GET['id'])) {
        $todo->pending($_GET['id']);
        header('Location: /todos');
        exit();
    }
});
$router->get('/in_progress', function()use($todo){
    if (!empty($_GET['id'])) {
        $todo->inProgress($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

































//if ($uri=='/'){
//    $todos=$todo->get();
//    view('home',[
//    'todos'=>$todos]);
//
//}elseif ($uri=='/store'){
//    if (!empty(isset($_POST['title'])) and !empty(isset($_POST['due_date']))) {
//        $todo->store($_POST['title'], $_POST['due_date']);
//        header('Location: /');
//    }
//
//}
//elseif ($uri=='/complete'){
//    if (!empty($_GET['id'])) {
//        $todo->complete($_GET['id']);
//        header('Location: /');
//        exit();
//    }
//}
//elseif ($uri=='/pending'){
//    if (!empty($_GET['id'])) {
//        $todo->pending($_GET['id']);
//        header('Location: /');
//        exit();
//    }
//}
//elseif ($uri=='/in_progress'){
//    if (!empty($_GET['id'])) {
//        $todo->inProgress($_GET['id']);
//        header('Location: /');
//        exit();
//    }
//}