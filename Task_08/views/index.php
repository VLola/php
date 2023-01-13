<html>
<head>
    <title>Test</title>
    <link href="../css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="div__main">
    <div class="div__menu">
        <a href="add-product.php">Change</a>
    </div>
    <h1>Products:</h1>
    <div class="div__flex flex-row">
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