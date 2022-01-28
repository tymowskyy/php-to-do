<?php

session_start();

$data = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['logged_id']) && isset($data['task_id'])) {
    $task = $data['task_id'];

    require_once 'db/connect.php';
    
    $ownerQueryContent = 'SELECT * FROM tasks WHERE task_id = :task_id AND list_id = :list_id';
    $ownerQuery = $db->prepare($ownerQueryContent);
    $ownerQuery->bindValue('task_id',  $task, PDO::PARAM_INT);
    $ownerQuery->bindValue('list_id', $_SESSION['current_list'], PDO::PARAM_INT);
    $ownerQuery->execute();
    if ($ownerQuery->rowCount()) {
        $deleteTaskQueryContent = 'DELETE FROM tasks WHERE task_id = :task_id';
        $deleteTaskQuery = $db->prepare($deleteTaskQueryContent);
        $deleteTaskQuery->bindValue('task_id',  $task, PDO::PARAM_INT);
        $deleteTaskQuery->execute();

        $updateTimeQueryContent = 'UPDATE lists SET last_edit = current_timestamp() WHERE list_id = :list_id';
        $updateTimeQuery = $db->prepare($updateTimeQueryContent);
        $updateTimeQuery->bindValue(':list_id', $_SESSION['current_list'], PDO::PARAM_INT);
        $updateTimeQuery->execute();

        echo '1';
        exit();
    }

}

echo '0';