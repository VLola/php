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
            <form method='post'>
                <div class="div__flex">
                    <textarea type="text" placeholder="Title" name="add_title" class="input__style"></textarea>
                    <textarea type="text" placeholder="Description" name="add_description" class="input__style"></textarea>
                    <textarea type="text" placeholder="Image url" name="add_image" class="input__style"></textarea>
                </div>
                <div class="div__flex">
                    <button type="submit" id="button_add" class="button__style">add product</button>
                </div>
            </form>
        </div>
        <div class="div__change-product">
            <h1>Change products:</h1>
            <div class="div__flex">
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
                            $noteController->setProduct($res["id"],$res["title"], $res["description"], $res["image"]);
                            $noteController->showChangeProduct();
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
    </div>

    <?php
        if(isset($_POST['add_title']) && isset($_POST['add_description']) && isset($_POST['add_image'])){
            $conn = new mysqli("localhost", "root", "", "valik");
            if($conn->connect_error){
                echo "error";
            }
            else{

                $title = $_POST['add_title'];
                $description = $_POST['add_description'];
                $image = $_POST['add_image'];

                $sql_code = 'INSERT INTO `products`(`title`, `description`, `image`) VALUES ("'.$title.'" , "'.$description.'", "'.$image.'")';
                if($conn->query($sql_code)){
                    echo "<p>Data added!</p>";
                }
                else{
                    echo "<p>Data not added!</p>";
                }


                $conn->close();
            }
        }


    ?>
</div>
</body>
</html>