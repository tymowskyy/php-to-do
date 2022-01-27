<?php
session_start();

if (!isset($_SESSION['logged_id'])) {
    header('Location: log-in.php');
    exit();
}

require_once 'db/connect.php';

if (isset($_GET['list_id'])) {
    $newList = $_GET['list_id'];

    $newListQueryContent = 'SELECT lists.name FROM lists WHERE lists.user_id = :user AND lists.list_id = :list';
    $listQuery = $db->prepare($newListQueryContent);
    $listQuery->bindValue(':user', $_SESSION['logged_id'], PDO::PARAM_INT);
    $listQuery->bindValue(':list', $newList, PDO::PARAM_INT);
    $listQuery->execute();

    if ($listQuery->rowCount()) {
        $_SESSION['current_list'] = $newList;
        $_SESSION['current_list_name'] = $listQuery->fetch()['name'];
    }
    header('Location: index.php');
    exit();
}

$listsQueryContent = "SELECT lists.name, lists.list_id, COUNT(tasks.task_id) as taskCount FROM lists LEFT OUTER JOIN tasks ON tasks.list_id = lists.list_id WHERE lists.user_id = {$_SESSION['logged_id']} GROUP BY name";
$lists = $db->query($listsQueryContent)->fetchAll();

if (!isset($_SESSION['current_list'])) {
    $_SESSION['current_list'] = $lists[0]['list_id'];
    $_SESSION['current_list_name'] = $lists[0]['name'];
}

$tasksQueryContent = "SELECT task_id, content FROM tasks WHERE list_id = {$_SESSION['current_list']}";
$tasks = $db->query($tasksQueryContent)->fetchAll();

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
                <h3 onclick="menu()"><?= $_SESSION['current_list_name'] ?><h3>
            </header>
            <div id="mask" class="closed-menu">
                <nav>
                    <div id="hiding-menu">
                        <?php
                        foreach ($lists as $list) {
                            echo '<a href="?list_id='.$list['list_id'].'" class="menu-option"><span class="list">'.$list['name'].'</span><span class="item-count">'.$list['taskCount'].'</span></a>';
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
                <?php
                foreach ($tasks as $task) {
                    echo '<li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>'.
                    $task['content'].'</li>';
                }
                ?>

            </ul>
        </main>
    </div>

    <?php
    require_once "templates/footer.html";
    ?>

</body>
</html>