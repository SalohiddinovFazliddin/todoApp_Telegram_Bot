<?php
use App\Router;
$router = new Router();
if ($router->isApiCall()) {
    require 'routers/api.php';
    exit();
} else {
    require 'routers/web.php';
    exit();
}