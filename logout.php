<?php
session_start();
if(isset($_SESSION['logged_id'])) {
    unset($_SESSION['current_list']);
    unset($_SESSION['current_list_name']);
    unset($_SESSION['logged_id']);
    header('Location: login.php');
}
else {
    header('Location: index.php');
}