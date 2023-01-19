<html>
<head>
    <title>Test</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet"/>

</head>
<body>
<div class="w-75 m-auto">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-3 justify-content-between" id="navbarTogglerDemo01">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><h3>Home</h3></a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="admin.php"><h4>Login</h4></a>
                </li>
            </ul>
            <form class="d-flex flex-row mt-3 w-50" method='get' action="index.php">
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
    <div class="d-flex flex-wrap justify-content-center">
        <?php
        include "../models/Product.php";
        include "../controllers/ProductController.php";

        $search = "";

        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }

        $conn = new mysqli("localhost", "root", "", "valik");

        if($conn->connect_error){
            echo "error";
        }
        else{

            $sql_code = "SELECT * FROM `products`;";
            if($results = $conn->query($sql_code)) {

                foreach ($results as $res){
                    if($search != ""){
                        if(str_contains(strtolower($res["title"]), strtolower($search))){
                            $noteController = new ProductController();
                            $noteController->setProduct($res["id"],$res["title"], $res["description"], $res["image"], $res["price"]);
                            $noteController->showProduct();
                        }
                    }
                    else{
                        $noteController = new ProductController();
                        $noteController->setProduct($res["id"],$res["title"], $res["description"], $res["image"], $res["price"]);
                        $noteController->showProduct();
                    }
                }
                //clear
                $results->free();
            }
            else {
                echo '<p>Data NOT selected!</p>';
            }


            $conn->close();
        }
        ?>
    </div>

</div>
<script src="../js/bootstrap.js"></script>
</body>
</html>