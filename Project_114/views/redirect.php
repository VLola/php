<?php

function adminAlert($message) {
    echo "<script>if(!alert('$message')) document.location = 'account.php';</script>";
}

function loginAlert($message) {
    echo "<script>if(!alert('$message')) document.location = 'index.php';</script>";
}

session_start();

if(isset($_POST['logout'])){
    $_SESSION['login'] = false;
    echo "<script>document.location = 'index.php';</script>";
}

if(isset($_POST['register']) && isset($_POST['email']) && isset($_POST['password'])){
    $conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");
    if($conn->connect_error){
        loginAlert("registration error!");
    }
    else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql_code = 'INSERT INTO `users`(`email`, `password`) VALUES ("'.$email.'" , "'.$password.'")';
        try{
            if($conn->query($sql_code)){
                $conn->close();
                loginAlert("registration ok!");
            }
            else{
                $conn->close();
                loginAlert("registration error!");
            }
        }catch(Exception $ex) {
            loginAlert("account exists!");
        }

    }
}

if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])){
    $conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");
    if($conn->connect_error){
        loginAlert("login error!");
    }
    else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql_code = 'SELECT * FROM `users` WHERE `email` = "'.$email.'"';
        if($result = $conn->query($sql_code)){
            while($row = $result->fetch_assoc()) {
                if($row["password"] === $password) $_SESSION['login'] = true;
            }
            $conn->close();
            if($_SESSION['login'] === true){
                loginAlert("login ok!");
            }
            else{
                loginAlert("login error!");
            }
        }
        else{
            $conn->close();
            loginAlert("login error!");
        }

    }
}

if(isset($_POST['add_title']) && isset($_POST['add_description']) && isset($_POST['add_image']) && isset($_POST['add_price'])){
    $conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");
    if($conn->connect_error){
        adminAlert("Error!");
    }
    else{

        $title = $_POST['add_title'];
        $description = $_POST['add_description'];
        $image = $_POST['add_image'];
        $price = $_POST['add_price'];

        $sql_code = 'INSERT INTO `products`(`title`, `description`, `image`, `price`) VALUES ("'.$title.'" , "'.$description.'", "'.$image.'", "'.$price.'")';
        if($conn->query($sql_code)){
            $conn->close();
            adminAlert("Ok!");
        }
        else{
            $conn->close();
            adminAlert("Error!");
        }

    }
}

if(isset($_POST['save']) && isset($_POST['title'])  && isset($_POST['description'])  && isset($_POST['image']) && isset($_POST['price']) ){

    $conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");
    if($conn->connect_error){
        adminAlert("Error!");
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
            adminAlert("Ok!");
        }
        else{
            $conn->close();
            adminAlert("Error!");
        }

    }

}

if(isset($_POST['delete'])){

    $conn = new mysqli("MYSQL8002.site4now.net", "a93859_valik", "qwerty123", "db_a93859_valik");
    if($conn->connect_error){
        adminAlert("Error!");
    }
    else{
        $id = $_POST['delete'];

        $sql_code = 'DELETE FROM products WHERE id="'.$id.'"';

        if($conn->query($sql_code)){
            $conn->close();
            adminAlert("Ok!");
        }
        else{
            $conn->close();
            adminAlert("Error!");
        }
    }
}
