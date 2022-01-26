<?php
session_start();
if(isset($_SESSION['logged_id'])) {
    unset($_SESSION['logged_id']);
    header('Location: log-in.php');
}
else {
    header('Location: index.php');
}