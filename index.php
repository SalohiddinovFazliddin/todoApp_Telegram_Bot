<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
require 'src/Todo.php';
require 'helpers.php';

$todo= new Todo();

if ($uri=='/'){
    $todos=$todo->get();
    view('home',[
    'todos'=>$todos]);

}elseif ($uri=='/store'){
    if (!empty(isset($_POST['title'])) and !empty(isset($_POST['due_date']))) {
        $todo->store($_POST['title'], $_POST['due_date']);
        header('Location: /');
    }

}
elseif ($uri=='/complete'){
    if (!empty($_GET['id'])) {
        $todo->complete($_GET['id']);
        header('Location: /');
        exit();
    }
}
elseif ($uri=='/pending'){
    if (!empty($_GET['id'])) {
        $todo->pending($_GET['id']);
        header('Location: /');
        exit();
    }
}
elseif ($uri=='/in_progress'){
    if (!empty($_GET['id'])) {
        $todo->inProgress($_GET['id']);
        header('Location: /');
        exit();
    }
}