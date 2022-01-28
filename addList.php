<?php

session_start();
if (!isset($_SESSION['logged_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_POST['list_name'])) {
    header('Location: index.php');
    exit();
}

if ((strlen($_POST['list_name']) < 1) || (strlen($_POST['list_name']) > 50)) {
    $_SESSION['e_list'] = 'List name must be 1 to 50 characters long!';
}
else {
    if ($_POST['list_name'] != filter_var($_POST['list_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
        $_SESSION['e_list'] = 'List name must consist of letters and numbers!';
    }
    else {
        require_once 'db/connect.php';
        
        $addListQueryContent = 'INSERT INTO lists VALUES (NULL, :user_id, :name, current_timestamp())';
        $addListQuery = $db->prepare($addListQueryContent);
        $addListQuery->bindValue(':user_id', $_SESSION['logged_id']);
        $addListQuery->bindValue(':name', $_POST['list_name']);
        $addListQuery->execute();
    }
}

header('Location: index.php');