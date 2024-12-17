<?php

use JetBrains\PhpStorm\NoReturn;

function view($page, $data = []): void
{
    extract($data);
    require 'views/'.$page. '.php';
}
function redirect(string $url): void
{
    header("Location: $url");
}
#[NoReturn] function apiResponse ($date): void
{
    header('Content-type: application/json');
    echo json_encode($date);
    exit();
}