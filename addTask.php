<?php

session_start();
if (!isset($_SESSION['logged_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_POST['task']) || !isset($_SESSION['current_list'])) {
    header('Location: index.php');
    exit();
}

if ((strlen($_POST['task']) < 1) || (strlen($_POST['task']) > 100)) {
    $_SESSION['e_task'] = 'Task name must be 1 to 100 characters long!';
}
else {
    require_once 'db/connect.php';
    
    $taskQueryContent = 'INSERT INTO tasks VALUES (NULL, :list_id, :content)';
    $taskQuery = $db->prepare($taskQueryContent);
    $taskQuery->bindValue(':list_id', $_SESSION['current_list'], PDO::PARAM_INT);
    $taskQuery->bindValue('content', $_POST['task'], PDO::PARAM_STR);
    $taskQuery->execute();
}

header('Location: index.php');