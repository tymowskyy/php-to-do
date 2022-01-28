<?php

session_start();

$data = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['logged_id']) && isset($data['list_id'])) {
    $list = $data['list_id'];

    require_once 'db/connect.php';
    
    $ownerQueryContent = 'SELECT * FROM lists WHERE list_id = :list_id AND user_id = :user_id';
    $ownerQuery = $db->prepare($ownerQueryContent);
    $ownerQuery->bindValue('list_id',  $list, PDO::PARAM_INT);
    $ownerQuery->bindValue('user_id', $_SESSION['logged_id'], PDO::PARAM_INT);
    $ownerQuery->execute();
    if ($ownerQuery->rowCount()) {
        $listsCountQueryContent = 'SELECT * FROM lists WHERE user_id = :user_id';
        $listsCountQuery = $db->prepare($listsCountQueryContent);
        $listsCountQuery->bindValue('user_id', $_SESSION['logged_id'], PDO::PARAM_INT);
        $listsCountQuery->execute();
        if ($listsCountQuery->rowCount() > 1) {
            $deleteListQueryContent = 'DELETE FROM lists WHERE list_id = :list_id';
            $deleteListQuery = $db->prepare($deleteListQueryContent);
            $deleteListQuery->bindValue('list_id',  $list, PDO::PARAM_INT);
            $deleteListQuery->execute();
            if ($list == $_SESSION['current_list'])
                unset($_SESSION['current_list']);
    
            echo '1';
        }
        else {
            echo '-1';
        }
        exit();
    }

}

echo '0';