<?php

function alert($message) {
    echo "<script>if(!alert('.$message.')) document.location = 'add-product.php';</script>";
}

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
            alert("Ok!");
        }
        else{
            alert("Error!");
        }


        $conn->close();
    }
}

if(isset($_POST['save']) && isset($_POST['title'])  && isset($_POST['description'])  && isset($_POST['image']) ){

    $conn = new mysqli("localhost", "root", "", "valik");
    if($conn->connect_error){
        echo "error";
    }
    else{
        $id = $_POST['save'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        $sql_code = 'UPDATE products SET title="'.$title.'", description="'.$description.'", image="'.$image.'" WHERE id="'.$id.'"';

        if($conn->query($sql_code)){
            alert("Ok!");
        }
        else{
            alert("Error!");
        }


        $conn->close();
    }

}