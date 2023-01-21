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
        include "../models/Product.php";
        include "../controllers/BuyController.php";

        echo '<form method="post">';

        $sumPrice = 0;
        $conn = new mysqli("localhost", "root", "", "valik");

        if($conn->connect_error){
            echo "error";
        }
        else{
            echo '<div class="d-flex flex-row">';
            echo '<div class="d-flex flex-wrap flex-row">';
            if(count($_SESSION['products']) > 0){
                $ids = $_SESSION['products'];
                $sql_code = 'SELECT * FROM products WHERE id IN (' . implode(',', $ids) . ')';
                if($results = $conn->query($sql_code)) {

                    foreach ($results as $res){
                        $buyController = new BuyController();
                        $buyController->setBuy($res["id"],$res["title"], $res["description"], $res["image"], $res["price"]);
                        if(!isset($_POST['cart'])){
                            $buyController->showBuy();
                            $sumPrice += $buyController->getFullPrice();
                        }
                        else{
                            $buyController->writeToDatabase($_POST['phone']);
                            $_SESSION['products'] = array();
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


            echo '</div>';
            if(count($_SESSION['products']) > 0){
                echo '<div class="d-flex flex-column p-5 m-5 align-items-center">';

                echo '<input class="form-control" type="text" name="phone" maxlength="13" placeholder="Phone">';
                echo '<h4 class="mt-5">'.$sumPrice.' грн.</h4>';
                echo '<button class="btn btn-outline-secondary w-100 px-5 mt-5" name="cart" type="submit">Оформить заказ</button>';
                echo '</div>';
            }

            echo '</div>';
        }

        echo '</form>';
        ?>
</div>
<script src="../js/bootstrap.js"></script>
</body>
</html>