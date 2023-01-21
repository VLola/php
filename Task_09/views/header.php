<?php
if (!session_id()) @ session_start();
if (!isset($_SESSION['products'])) $_SESSION['products'] = array();
if(isset($_GET['buy'])){
    array_push($_SESSION['products'],$_GET['buy']);
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
                    echo '<a class="nav-link" href="cart.php">Shopping cart ('.count($_SESSION['products']).')</a>';
                ?>
            </li>
        </ul>
    </div>
</nav>