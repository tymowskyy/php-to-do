<?php
session_start();

if (!isset($_SESSION['logged_id'])) {
    header('Location: log-in.php');
    exit();
}

require_once 'db/connect.php';

$lists = $db->query("SELECT name, COUNT(tasks.task_id) as taskCount FROM lists LEFT OUTER JOIN tasks ON tasks.list_id = lists.list_id WHERE lists.user_id = {$_SESSION['logged_id']} GROUP BY name;")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>To-Do</title>
    <meta name="description" content="Make lists and add items to do!">
    <meta name="keywords" content="todo, to-do, planning, plan">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' href='css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='css/switch.css'>
    <script src="menu.js"></script>
</head>
<body>

    <?php
    require_once "templates/header.html";
    ?>

    <div id="container">
        <div id="menu">
            <header id="active-list">
                <h3 onclick="menu()">list1<h3>
            </header>
            <div id="mask" class="closed-menu">
                <nav>
                    <div id="hiding-menu">
                        <?php
                        foreach ($lists as $list) {
                            echo '<a href="#" class="menu-option"><span class="list">'.$list['name'].'</span><span class="item-count">'.$list['taskCount'].'</span></a>';

                        }
                        ?>

                        <form action="addList.php" method="POST">
                            <div id="add-list">
                                <input type="text" placeholder="New list name" class="no-bg">
                                <button type="submit" class="no-bg">
                                    <span class="icon-hover">
                                        <i class="fi fi-sr-add filled"></i>
                                        <i class="fi fi-rr-add normal"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <main id="main">
            <div id="add-item-outer">
                <form action="addItem.php" method="POST">
                    <div id="add-item">
                        <button type="submit" class="no-bg">
                            <span class="icon-hover">
                                <i class="fi fi-sr-add filled"></i>
                                <i class="fi fi-rr-add normal"></i>
                            </span>
                        </button>
                        <input type="text" placeholder="Add task" class="no-bg">
                    </div>
                </form>
            </div>
            <ul id="items">
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>Lorem</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>ipsum</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>dolor</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>sit</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>amet</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>consectetur</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>adipiscing</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>elit</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>Cras</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>a</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>auctor</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>ipsum</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>elementum</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>hendrerit</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>massa</li>


            </ul>
        </main>
    </div>

    <?php
    require_once "templates/footer.html";
    ?>

</body>
</html>