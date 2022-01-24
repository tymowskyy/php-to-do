<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>To-Do</title>
    <meta name="description" content="Make lists and add items to do!">
    <meta name="keywords" content="todo, to-do, planning, plan">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' href='css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='css/uicons-solid-rounded.css'>
    <script src="menu.js"></script>
</head>

<body>
    <header id="main-header">
        <div id="logo">
            <img src="logo.png" alt="logo">
        </div>
        <div id="title">
            <h1>
                TO-DO
            </h1>
            <h2>
                Do all you have to do!
            </h2>
            <h3>
                <div id="quote">We Become What We Think About</div>
                <div id="author">- Earl Nightingale</div>
            </h3>
        </div>
        <div id="log-out">
            <a href="logout.php">
                <div id="log-out-button">
                    <i class="fi fi-rr-sign-out"></i>
                </div>
            </a>
        </div>
    </header>

    <div id="container">
        <div id="menu">
            <header id="active-list">
                <h3 onclick="menu()">list1<h3>
            </header>
            <div id="mask" class="closed-menu">
                <nav>
                    <div id="hiding-menu">
                        <a href="#" class="menu-option"><span class="list">list1</span><span class="item-count">3 items</span></a>
                        <a href="#" class="menu-option"><span class="list">laaaaaist2</span><span class="item-count">5 items</span></a>
                        <a href="#" class="menu-option"><span class="list">aaaaaaaalist3</span><span class="item-count">7 items</span></a>
                        <a href="#" class="menu-option"><span class="list">liaaast4</span><span class="item-count">2 items</span></a>
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
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>iaaaatem1</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>itaahfghgfhaaaaem2</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>item3</li>
                <li class="item"><span class="icon-hover"><i class="fi fi-rr-checkbox normal"></i><i class="fi fi-sr-checkbox filled"></i></span>iteam4</li>


            </ul>
        </main>
    </div>
    <footer id="footer">
        <div id="footer_content">Tymoteusz Stępkowsi 2022 &#169; All rights reserved. Uicons by <a href="https://www.flaticon.com/uicons">Flaticon</a></div>
        <div id="footer_contact">tymoteusz.stepkowski@gmail.com</div>
    </footer>
</body>

</html>