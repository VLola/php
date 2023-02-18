<html>
<head>
    <title>Test</title>
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="div__main">
    <form method='post'>
        <div class="div__flex">
            <input type="text" placeholder="Name" name="add_name" class="input__style">
            <input type="number" placeholder="Price" name="add_price" class="input__style">
            <input type="number" placeholder="Count" name="add_count" class="input__style">
        </div>
        <div class="div__flex">
            <button type="submit" id="button_add" class="button__style">add product</button>
        </div>
    </form>
    <form action='index.php'>
        <div class="div__flex">
            <button type='submit' class="button__style">back</button>
        </div>
    </form>

    <?php
        if(isset($_POST['add_name']) && isset($_POST['add_price']) && isset($_POST['add_count'])){
            $conn = new mysqli("localhost", "root", "", "valik");
            if($conn->connect_error){
                echo "error";
            }
            else{

                $name = $_POST['add_name'];
                $price = $_POST['add_price'];
                $count = $_POST['add_count'];

                $sql_code = 'INSERT INTO `products`(`name`, `price`, `count`) VALUES ("'.$name.'" , "'.$price.'", "'.$count.'")';
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