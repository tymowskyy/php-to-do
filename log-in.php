<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>To-Do login</title>
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

    <form action="login.php">
        <div id="container">
            <main id="main">
                <h1>Log in</h1>
                <input type="email" name="email" class="form" placeholder="e-mail">
                <input type="password" name="password" class="form" placeholder="password">
                <input type="submit" class="form" value="Log in">
                <p>Don't have an account yet? <a href="sign-up.php">Sign up</a></p>
            </main>
        </div>
    </form>
        
    <?php
    require_once "templates/footer.html";
    ?>

</body>
</html>