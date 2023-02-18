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
    <ul class="nav nav-tabs my-3">
        <li class="nav-item">
            <a class="nav-link display-6" href="account.php">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active display-6" aria-current="page" href="purchases.php">Purchases</a>
        </li>
        <li class="nav-item ms-auto">
            <form method='post' action="redirect.php">
                <button type="submit" name="logout" class="btn btn-outline-secondary btn-lg px-5">Exit</button>
            </form>
        </li>
    </ul>
    <div class="d-flex flex-wrap justify-content-center">
            <?php
            include "../models/Purchase.php";
            include "../controllers/PurchaseController.php";


            if(isset($_POST['changePurchase'])){
			$conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");
                if(!$conn->connect_error){
                    $id = $_POST['changePurchase'];
                    $name = "status$id";
                    $status = $_POST[$name];

                    $sql_code = 'UPDATE purchases SET status="'.$status.'" WHERE id="'.$id.'"';
                    $conn->query($sql_code);
                    $conn->close();
                }
            }
            if(isset($_POST['deletePurchase'])){
			$conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");
                if(!$conn->connect_error){
                    $id = $_POST['deletePurchase'];

                    $sql_code = 'DELETE FROM purchases WHERE id="'.$id.'"';
                    $conn->query($sql_code);
                    $conn->close();
                }
            }

			$conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");
            if($conn->connect_error){
                echo "error";
            }
            else{

                $sql_code = "SELECT * FROM `purchases`;";
                if($results = $conn->query($sql_code)) {
                    echo '<table class="table table-striped table-hover d-table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<td>id</td>';
                    echo '<td>email</td>';
                    echo '<td>productId</td>';
                    echo '<td>count</td>';
                    echo '<td>price</td>';
                    echo '<td>full price</td>';
                    echo '<td>status</td>';
                    echo '<td>change</td>';
                    echo '<td>delete</td>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    echo '<form method="post">';
                    foreach ($results as $res){
                        $purchaseController = new PurchaseController();
                        $purchaseController->setPurchase($res["id"],$res["email"],$res["productId"], $res["count"], $res["price"], $res["status"]);
                        $purchaseController->getPurchase();
                    }
                    echo '<form>';
                    echo '</tbody>';
                    echo '</table>';
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