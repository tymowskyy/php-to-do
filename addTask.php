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
    $_SESSION['e_task'] = 'Task must be 1 to 100 characters long!';
}
else {
    if ($_POST['task'] != filter_var($_POST['task'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
        $_SESSION['e_task'] = 'Task must consist of letters and numbers!';
    }
    else {
        require_once 'db/connect.php';
        
        $taskQueryContent = 'INSERT INTO tasks VALUES (NULL, :list_id, :content)';
        $taskQuery = $db->prepare($taskQueryContent);
        $taskQuery->bindValue(':list_id', $_SESSION['current_list'], PDO::PARAM_INT);
        $taskQuery->bindValue('content', $_POST['task'], PDO::PARAM_STR);
        $taskQuery->execute();
        
        $updateTimeQueryContent = 'UPDATE lists SET last_edit = current_timestamp() WHERE list_id = :list_id';
        $updateTimeQuery = $db->prepare($updateTimeQueryContent);
        $updateTimeQuery->bindValue(':list_id', $_SESSION['current_list'], PDO::PARAM_INT);
        $updateTimeQuery->execute();
    }
}

header('Location: index.php');