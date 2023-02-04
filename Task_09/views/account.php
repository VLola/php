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
            <a class="nav-link active display-6" aria-current="page" href="account.php">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link display-6" href="purchases.php">Purchases</a>
        </li>
        <li class="nav-item ms-auto">
            <form method='post' action="redirect.php">
                <button type="submit" name="logout" class="btn btn-outline-secondary btn-lg px-5">Exit</button>
            </form>
        </li>
    </ul>
    <div class="d-flex">
        <div class="sticky-top h-25 w-25">
            <div class="d-flex flex-column">
                <form method='post' action="redirect.php">
                    <div class="d-flex flex-column">
                        <div class="form-group">
                            <label for="add_title">Title:</label>
                            <textarea class="form-control" type="text" name="add_title"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="add_description">Description:</label>
                            <textarea class="form-control" type="text" name="add_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="add_image">Image url:</label>
                            <textarea class="form-control" type="text" name="add_image"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="add_price">Price:</label>
                            <input class="form-control" type="number" name="add_price">
                        </div>
                        <button type="submit" id="button_add" class="btn btn-secondary mt-2">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
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

                                    $noteController = new ProductController();
                                    $noteController->setProduct($res["id"],$res["title"], $res["description"], $res["image"], $res["price"]);
                                    $noteController->showChangeProduct();
                                }
                            }
                            else{
                                $noteController = new ProductController();
                                $noteController->setProduct($res["id"],$res["title"], $res["description"], $res["image"], $res["price"]);
                                $noteController->showChangeProduct();
                            }
                        }
                        //clear
                        $results->free();
                    }
                    else {
                        alert("Error!");
                    }


                    $conn->close();
                }
                ?>
            </div>
        </div>
    </div>

</div>
<script src="../js/bootstrap.js"></script>
</body>
</html>