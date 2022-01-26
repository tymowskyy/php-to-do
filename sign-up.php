<?php

session_start();

if (isset($_POST['email'])) {
    $ok = true;

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (empty($email)) {
        $ok = false;
        $_SESSION['e_email'] == 'Please enter a valid e-mail!';
    }

    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    if ($pass1 != $pass2) {
        $ok = false;
        $_SESSION['e_password'] = 'Given passwords are not the same!';
    }
    if ((strlen($pass1) < 8) || (strlen($pass1) > 20)) {
        $ok = false;
        $_SESSION['e_password'] = 'Password must be 8 to 20 characters long!';
    }

    require_once 'db/connect.php';

    $emailQuerry = $db->prepare('SELECT * from users WHERE email = :email');
    $emailQuerry->bindValue(':email', $email, PDO::PARAM_STR);
    $emailQuerry->execute();

    if($emailQuerry->rowCount()) {
        $ok = false;
        $_SESSION['e_email'] = "Account with given e-mail already exist";
    }

    if ($ok) {
        $password_hash = password_hash($pass1, PASSWORD_DEFAULT);

        $query = $db->prepare('INSERT INTO users VALUES (NULL, :email, :password)');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password_hash, PDO::PARAM_STR);
        $query->execute();

        header('Location: welcome.php');
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
    <title>To-Do sign-up</title>
    <meta name="description" content="Make lists and add items to do!">
    <meta name="keywords" content="todo, to-do, planning, plan">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' href='css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='css/switch.css'>
    <link rel='stylesheet' href='css/form.css'>
    <script src="menu.js"></script>
</head>
<body style="min-height: 100vh;">

    <?php
    require_once "templates/header.html";
    ?>

    <form action="sign-up.php" method="POST">
        <div id="container">
            <main id="main">
                <h1>Sign up</h1>
                <input type="email" name="email" class="form" placeholder="e-mail" <?php
                if (isset($_SESSION['g_email'])) {
                    echo 'value="'.$_SESSION['g_email'].'"';
                    unset($_SESSION['g_email']);
                }
                ?>>
                <?php
                if(isset($_SESSION['e_email'])) {
                    echo '<p class="error">'.$_SESSION['e_email'].'</p>';
                    unset($_SESSION['e_email']);
                }
                ?>
                <input type="password" name="password1" class="form" placeholder="password">
                <?php
                if(isset($_SESSION['e_password'])) {
                    echo '<p class="error">'.$_SESSION['e_password'].'</p>';
                    unset($_SESSION['e_password']);
                }
                ?>
                <input type="password" name="password2" class="form" placeholder="repeat password">
                <input type="submit" class="form" value="Sign up">
                <p>Already have an account? <a href="log-in.php" class="form">Log in</a></p>
            </main>
        </div>
    </form>
        
    <?php
    require_once "templates/footer.html";
    ?>

</body>
</html>