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

if ((strlen($_POST['list_name']) < 1) || (strlen($_POST['list_name']) > 14)) {
    $_SESSION['e_list'] = 'List name must be 1 to 14 characters long!';
}
else {
    require_once 'db/connect.php';
    
    $addListQueryContent = 'INSERT INTO lists VALUES (NULL, :user_id, :name)';
    $addListQuery = $db->prepare($addListQueryContent);
    $addListQuery->bindValue(':user_id', $_SESSION['logged_id']);
    $addListQuery->bindValue(':name', $_POST['list_name']);
    $addListQuery->execute();
}

header('Location: index.php');