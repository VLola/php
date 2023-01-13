<html>
<head>
    <title>Test</title>
    <link href="../css/style.css" rel="stylesheet"/>
</head>
<body>

<div class="div__main">
    <div class="div__menu">
        <a href="index.php">Products</a>
    </div>
    <div class="div__content">
        <div class="div__add-product">
            <h1>Add Product:</h1>
            <form method='post' action="redirect.php">
                <div class="div__flex">
                    <label for="add_title">Title:</label>
                    <textarea type="text" name="add_title" class="input__style"></textarea>
                    <label for="add_description">Description:</label>
                    <textarea type="text" name="add_description" class="input__style"></textarea>
                    <label for="add_image">Image url:</label>
                    <textarea type="text" name="add_image" class="input__style"></textarea>
                    <label for="add_price">Price:</label>
                    <input type="number" name="add_price" class="input__style"></input>
                </div>
                <div class="div__flex">
                    <button type="submit" id="button_add" class="button__style">Click</button>
                </div>
            </form>
        </div>
        <div class="div__change-product">
            <h1>Change products:</h1>
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