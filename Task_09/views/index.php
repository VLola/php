<html>
<head>
    <title>Test</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet"/>

</head>
<body>
<div class="w-75 m-auto">
    <?php
        include "./header.php";
    ?>
    <div class="d-flex flex-wrap justify-content-center">
        <?php
        include "../models/Product.php";
        include "../controllers/ProductController.php";

        $search = "";

        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }

        $conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");

        if($conn->connect_error){
            echo "error";
        }
        else{

            $sql_code = "SELECT * FROM `products`;";
            if($results = $conn->query($sql_code)) {

                foreach ($results as $res){
                    if($search != ""){
                        if(str_contains(strtolower($res["title"]), strtolower($search))){
                            $productController = new ProductController();
                            $productController->setProduct($res["id"],$res["title"], $res["description"], $res["image"], $res["price"]);
                            $productController->showProduct();
                        }
                    }
                    else{
                        $productController = new ProductController();
                        $productController->setProduct($res["id"],$res["title"], $res["description"], $res["image"], $res["price"]);
                        $productController->showProduct();
                    }
                }
                //clear
                $results->free();
            }

            $conn->close();
        }
        ?>
    </div>

</div>
<script src="../js/bootstrap.js"></script>
</body>
</html>