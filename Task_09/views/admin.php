<html>
<head>
    <title>Test</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet"/>
</head>
<body>

<div class="w-75 m-auto">
    <div class="d-flex justify-content-end">
        <a href="index.php">Products</a>
    </div>
    <div class="d-flex">
        <div class="d-flex flex-column">
            <h1>Add Product:</h1>
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
                    <button type="submit" id="button_add" class="btn btn-secondary mt-2">Save</button>
                </div>
            </form>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
            <h1>Change products:</h1>
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
                            $noteController->showChangeProduct();
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
</body>
</html>