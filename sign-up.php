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
                <h1>Sign up</h1>
                <input type="email" name="email" class="form" placeholder="e-mail">
                <input type="password" name="password" class="form" placeholder="password">
                <input type="password" name="password" class="form" placeholder="repeat password">
                <input type="submit" class="form" value="Sign up">
                <p>Already have an account? <a href="log-in.php">Log in</a></p>
            </main>
        </div>
    </form>
        
    <?php
    require_once "templates/footer.html";
    ?>

</body>
</html>