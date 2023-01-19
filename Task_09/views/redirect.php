<?php

function alert($message) {
    echo "<script>if(!alert('.$message.')) document.location = 'add-product.php';</script>";
}

if(isset($_POST['add_title']) && isset($_POST['add_description']) && isset($_POST['add_image']) && isset($_POST['add_price'])){
    $conn = new mysqli("localhost", "root", "", "valik");
    if($conn->connect_error){
        alert("Error!");
    }
    else{

        $title = $_POST['add_title'];
        $description = $_POST['add_description'];
        $image = $_POST['add_image'];
        $price = $_POST['add_price'];

        $sql_code = 'INSERT INTO `products`(`title`, `description`, `image`, `price`) VALUES ("'.$title.'" , "'.$description.'", "'.$image.'", "'.$price.'")';
        if($conn->query($sql_code)){
            $conn->close();
            alert("Ok!");
        }
        else{
            $conn->close();
            alert("Error!");
        }

    }
}

if(isset($_POST['save']) && isset($_POST['title'])  && isset($_POST['description'])  && isset($_POST['image']) && isset($_POST['price']) ){

    $conn = new mysqli("localhost", "root", "", "valik");
    if($conn->connect_error){
        alert("Error!");
    }
    else{
        $id = $_POST['save'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $price = $_POST['price'];

        $sql_code = 'UPDATE products SET title="'.$title.'", description="'.$description.'", image="'.$image.'", price="'.$price.'" WHERE id="'.$id.'"';

        if($conn->query($sql_code)){
            $conn->close();
            alert("Ok!");
        }
        else{
            $conn->close();
            alert("Error!");
        }

    }

}

if(isset($_POST['delete'])){

    $conn = new mysqli("localhost", "root", "", "valik");
    if($conn->connect_error){
        alert("Error!");
    }
    else{
        $id = $_POST['delete'];

        $sql_code = 'DELETE FROM products WHERE id="'.$id.'"';

        if($conn->query($sql_code)){
            $conn->close();
            alert("Ok!");
        }
        else{
            $conn->close();
            alert("Error!");
        }

    }

}