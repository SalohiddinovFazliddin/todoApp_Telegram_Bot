<?php
require  'DB.php';

class Todo
{
    public $pdo;
    public function __construct(){
        $db = new DB();
        $this->pdo = $db->conn;

    }
    public function store (string $title, string $dueDate) {
        $query = "INSERT INTO todos(title, status, due_date, created_at, updated_ad) VALUES (:title, 'pending', :due_date, NOW(), NOW())";
        $this->pdo->prepare($query)->execute([
        ":title" => $title,
        ":due_date" => $dueDate
    ]);
}
public function getAllTodos () {
        $query="SELECT*from todos";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();

}
public function complete (int $id) {
        $query = "UPDATE todos set status='completed', updated_ad=Now() where  id=:id ";
        return $this->pdo->prepare($query)->execute([
            ":id" => $id
        ]);
}
public function inProgress(int $id):bool {
        $query = "UPDATE todos set status='in_progress', updated_ad=Now() where  id=:id ";
        return $this->pdo->prepare($query)->execute([
            ":id" => $id
        ]);
}
public function pending(int $id):bool {
        $query = "UPDATE todos set status='pending', updated_ad=Now() where  id=:id ";
        return $this->pdo->prepare($query)->execute([
            ":id" => $id
        ]);
}
//public function getEdit(int $id, string $title):bool {
//        $query = "UPDATE todos set  title ='' , updated_ad=Now() where  id=:id ";
//        return $this->pdo->prepare($query)->execute([
//            ":id" => $id
//        ]);
//}

}