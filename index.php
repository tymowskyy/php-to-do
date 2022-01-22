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
            <h3>
                <div id="quote">We Become What We Think About</div><div id="author">- Earl Nightingale</div>
            </h3>
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
            <header id="active-list">
                <h3 onclick="menu()">list1<h3>
            </header>
            <div id="mask">
                <nav>
                    <div id="hiding-menu">
                        <a href="#" class="menu-option"><span class="list">list1</span><span class="item-count">3 items</span></a>
                        <a href="#" class="menu-option"><span class="list">list2</span><span class="item-count">5 items</span></a>
                        <a href="#" class="menu-option"><span class="list">list3</span><span class="item-count">7 items</span></a>
                        <a href="#" class="menu-option"><span class="list">list4</span><span class="item-count">2 items</span></a>
                        <form action="addList.php" method="POST">
                        <div id="add-list">
                                <input type="text" placeholder="New list name">
                                <input type="submit" value="+">
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <main id="main">
            <form action="addItem.php" method="POST">
                <div id="add-item">
                    <input type="text" placeholder="New item">
                    <input type="submit" value="Add item">
                </div>
            </form>
            <ul id="items">
                <li>item1</li>
                <li>item2</li>
                <li>item3</li>
                <li>item4</li>
                <li>Wyneść śmieci</li>
                <li>item6</li>
                <li>item7</li>
                <li>item8</li>
                <li>item9</li>
                <li>item10</li>
                <li>item11</li>
                <li>item12</li>
                <li>item13</li>
                <li>item14</li>
                <li>item15</li>
                <li>item16</li>
                <li>item17</li>
                <li>item18</li>
                <li>item19</li>
                <li>item20</li>
                <li>item21</li>
                <li>item22</li>
                <li>item23</li>
                <li>item24</li>
                <li>item25</li>
                <li>item26</li>
                <li>item27</li>
                <li>item28</li>
                <li>item29</li>
                <li>item30</li>
            </ul>
        </main>
    </div>
    <footer id="footer">
        <div id="footer_content">Tymoteusz Stępkowsi 2022 &#169; All rights reserved</div>
        <div id="footer_contact">tymoteusz.stepkowski@gmail.com</div>
    </footer>
</body>

</html>