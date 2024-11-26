<?php

     $servername = "localhost";
     $username = "root";
     $password = "1234";
try {
    $conn = new PDO("mysql:host=$servername;dbname=todo_app", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>


