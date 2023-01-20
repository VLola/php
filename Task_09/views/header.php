<?php
session_start();
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
        <form class="d-flex flex-row mt-3 w-50" method='get'>
            <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Shopping cart</a>
            </li>
        </ul>
    </div>
</nav>