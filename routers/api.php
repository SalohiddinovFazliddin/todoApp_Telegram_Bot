<?php
use App\Router;
use App\Todo;
$todo = new Todo();
$router = new Router();

$router->get('/api/todos',function () use($todo){
    header('Content-Type: application/json');
    apiResponse($todo->getAllTodos());
});

$router->get('/api/todos/{id}',function ($todoId) use($todo){
   header('Content-Type: application/json');
   apiResponse($todo->getTodo($todoId));
});

$router->post('/api/todos/{id}',function ($todoId) use($todo){
    $todo->store($_POST['title'], $_POST['dueDate'], 23);
    apiResponse([
        "ok" => true,
        'message' => "Todo created successfully"
    ]);
});

$router->put('/api/todos/{id}',function ($todoId) use($todo){
    $todo->update($todoId,$_POST['title'],$_POST['status'], $_POST['dueDate']);
    apiResponse([
        "ok" => true,
        'message' => "Todo created successfully"
    ]);
});

$router->delete('/api/todos/{id}',function ($todoId) use($todo){
    $todo->destory($todoId);
    apiResponse([
        "ok" => true,
        'message' => "Todo created successfully"
    ]);
});

