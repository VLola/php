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
            <a class="nav-link active display-6" aria-current="page" href="purchases.php">Purchses</a>
        </li>
        <li class="nav-item ms-auto">
            <form method='post' action="redirect.php">
                <button type="submit" name="logout" class="btn btn-outline-secondary btn-lg px-5">Exit</button>
            </form>
        </li>
    </ul>
    <div class="d-flex flex-wrap justify-content-center">
        <div class="d-flex flex-wrap justify-content-center">
            <?php
            include "../models/Purchase.php";
            include "../controllers/PurchaseController.php";


            $conn = new mysqli("localhost", "root", "", "valik");

            if($conn->connect_error){
                echo "error";
            }
            else{

                $sql_code = "SELECT * FROM `purchases`;";
                if($results = $conn->query($sql_code)) {

                    foreach ($results as $res){
                        $purchaseController = new PurchaseController();
                    }
                    //clear
                    $results->free();
                }


                $conn->close();
            }
            ?>
        </div>
    </div>

</div>
<script src="../js/bootstrap.js"></script>
</body>
</html>