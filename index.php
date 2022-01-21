<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>To-Do</title>
    <meta name="description" content="Make lists and add items to do!">
    <meta name="keywords" content="todo, to-do, planning, plan">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
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
        </div>
        <div id="log-out">
            <a href="logout.php">
                <div id="log-out-button">
                    log out
                </div>
            </a>
        </div>
    </header>

    <div id="container">
        <div id="menu">
            <header id="active-list"><h3 onclick="menu()">list1<h3></header>
            <div class="mask">
                <nav>
                    <div id="hiding-menu" class="closed-menu">
                        <a href="#" class="menu-option"><span class="list">list1</span><span class="item-count">3 items</span></a>
                        <a href="#" class="menu-option"><span class="list">list2</span><span class="item-count">5 items</span></a>
                        <a href="#" class="menu-option"><span class="list">list3</span><span class="item-count">7 items</span></a>
                        <a href="#" class="menu-option"><span class="list">list4</span><span class="item-count">2 items</span></a>
                        <div id="add-list">
                            <form action="addList.php" method="POST">
                                <input type="text">
                                <input type="submit" value="+">
                            </form>
                        </div> 
                    </div>
                </nav> 
            </div>
        </div>
            <main>
            <div id="items">
                <ul>
                    <li>item1</li>
                    <li>item2</li>
                    <li>item3</li>
                    <li>item4</li>
                </ul>
            </div>
        </main>
    </div>
    <footer id="footer">
        <div id="footer_content">Tymoteusz Stępkowsi 2022 &#169; All rights reserved</div>
        <div id="footer_contact">tymoteusz.stepkowski@gmail.com</div>
    </footer>
</body>
</html>