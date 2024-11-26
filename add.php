<?php
require 'DB.php';
$title = $_POST['title'];
$status = $_POST['status'];
//$deu_date = $_POST['deu_date'];

$sql = "INSERT INTO todos(title,status) VALUES (:title,:status)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':status', $status);
//$stmt->bindParam(':deu_date', $deu_date);

$stmt->execute();

header('Location: index.php');