<?php
if (!session_id()) @ session_start();
if (!isset($_SESSION['products'])) $_SESSION['products'] = array();
if (!isset($_SESSION['login'])) $_SESSION['login'] = false;
if(isset($_GET['buy'])){
    if (!in_array($_GET['buy'], $_SESSION['products']))
    {
        array_push($_SESSION['products'],$_GET['buy']);
    }
}
if(isset($_POST["delete"])){
    unset($_SESSION['products'][array_search($_POST["delete"], $_SESSION['products'])]);
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-3 justify-content-between" id="navbarTogglerDemo01">
        <ul class="navbar-nav">
            <li class="nav-item my-auto">
                <a class="nav-link" href="index.php"><h3>Home</h3></a>
            </li>
            <?php
                if($_SESSION['login'] === true){
                    echo '<li class="nav-item my-auto">';
                    echo '<a class="nav-link" href="account.php"><h4>Account</h4></a>';
                    echo '</li>';
                }
                if($_SESSION['login'] === false){

                    echo '<li class="nav-item my-auto">';
                    echo '<a class="nav-link" href="login.php"><h4>Login</h4></a>';
                    echo '</li>';
                }
            ?>
        </ul>
        <?php
        $url = explode('/', $_SERVER["PHP_SELF"]);
        $file = $url[count($url) - 1];
            if($file != "cart.php" && $file != "purchases.php"){
                echo '<form class="d-flex flex-row w-50 m-auto" method="get">';
                echo '<input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search">';
                echo '<button class="btn btn-outline-secondary" type="submit">Search</button>';
                echo '</form>';
            }
        ?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php
                    echo '<a class="nav-link" href="cart.php">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/></svg>';
                    echo '<h4 class="d-inline"> ('.count($_SESSION['products']).')</h4>';
                    echo '</a>';
                ?>
            </li>
        </ul>
    </div>
</nav>