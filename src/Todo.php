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
    public function storeEdit(string $title, string $status, string $dueDate, int $id) {
        $query = "UPDATE todos SET title = :title, status = :status, updated_ad = :due_date WHERE id = :id";
        $this->pdo->prepare($query)->execute([
            ":title" => $title,
            ":due_date" => $dueDate,
            ":status" => $status,
            ":id" => $id
        ]);
    }

public function getAllTodos () {
        $query="SELECT*from todos";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();

}

public function destory (int $id){
    $query = "Delete from todos where id = :id";
    return $this->pdo->prepare($query)->execute([
        ":id" => $id
    ]);
}
public function getTodo (int $id){
    $query = "Select * from todos where id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
        ":id" => $id
    ]);
    return $stmt->fetch();
}


}



//public function complete (int $id) {
//    $query = "UPDATE todos set status='completed', updated_ad=Now() where  id=:id ";
//    return $this->pdo->prepare($query)->execute([
//        ":id" => $id
//    ]);
//}
//public function inProgress(int $id):bool {
//    $query = "UPDATE todos set status='in_progress', updated_ad=Now() where  id=:id ";
//    return $this->pdo->prepare($query)->execute([
//        ":id" => $id
//    ]);
//}
//public function pending(int $id):bool {
//    $query = "UPDATE todos set status='pending', updated_ad=Now() where  id=:id ";
//    return $this->pdo->prepare($query)->execute([
//        ":id" => $id
//    ]);
//}