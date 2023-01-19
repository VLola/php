<html>
<head>
    <title>Test</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="w-75 m-auto">
    <div class="d-flex justify-content-end">
        <a href="admin.php">Admin</a>
        <a href="cart.php">Shopping cart</a>
    </div>
    <h1>Products:</h1>
    <div class="d-flex flex-wrap justify-content-center">
        <?php
        include "../models/Product.php";
        include "../controllers/ProductController.php";
        $conn = new mysqli("localhost", "root", "", "valik");

        if($conn->connect_error){
            echo "error";
        }
        else{

            $sql_code = "SELECT * FROM `products`;";
            if($results = $conn->query($sql_code)) {

                foreach ($results as $res){
                    $noteController = new ProductController();
                    $noteController->setProduct($res["id"],$res["title"], $res["description"], $res["image"], $res["price"]);
                    $noteController->showProduct();
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
</body>
</html>