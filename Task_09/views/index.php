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

        if(isset($_GET['buy'])){
//            $_SESSION['products'].push($_GET['buy']);
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