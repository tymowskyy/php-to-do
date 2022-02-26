<?php

session_start();

if (isset($_SESSION['logged_id'])) {
    header('Location: todo');
    exit();
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    require_once 'db/connect.php';
    $LoginQueryContent = 'SELECT user_id, password FROM users WHERE email = :email';
    $LoginQuery = $db->prepare($LoginQueryContent);
    $LoginQuery->bindValue(':email', $email, PDO::PARAM_STR);
    $LoginQuery->execute();

    $user = $LoginQuery->fetch();
    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['logged_id'] = $user['user_id'];
        header('Location: todo');
        exit();
    }
    else {
        $_SESSION['g_email'] = $email;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>To-Do log in</title>
    <meta name="description" content="Make lists and add items to do!">
    <meta name="keywords" content="todo, to-do, planning, plan">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' href='css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='css/switch.css'>
    <link rel='stylesheet' href='css/form.css'>
    <script src="js/toggle.js"></script>
</head>
<body style="min-height: 100vh;">

    <?php
    require_once "templates/header.html";
    ?>

    <form action="login" method="POST">
        <div id="container">
            <main id="main">
                <h1>Log in</h1>
                <?= isset($_SESSION['g_email']) ? '<p class="error">Incorrect e-mail or password!</p>' : ''?>
                <input type="email" name="email" class="form" placeholder="e-mail" <?php
                if (isset($_SESSION['g_email'])) {
                    echo 'value="'.$_SESSION['g_email'].'"';
                    unset($_SESSION['g_email']);
                }
                ?>>
                <input type="password" name="password" class="form" placeholder="password">
                <input type="submit" class="form" value="Log in">
                <p>Don't have an account yet? <a href="signup" class="form">Sign up</a></p>
            </main>
        </div>
    </form>
    <script src="js/setTheme.js"></script>
    <?php
    require_once "templates/footer.html";
    ?>

</body>
</html>