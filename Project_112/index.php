<html>
<head>
    <title>Test</title>
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="div__main">
    <form action='add-product.php'>
        <div class="div__flex">
            <button type='submit' id="button_add" class="button__style">Add product</button>
        </div>
    </form>

    <form action='index.php' method="get">
        <div class="div__flex">
            <input placeholder="Name" id="search_name" name="search_name" class="input__style">
            <button type="submit" id="button_search" class="button__style">Search</button>
        </div>
    </form>

    <form action='index.php' method="post">
        <div class="div__flex">
            <?php

            $conn = new mysqli("localhost", "root", "", "valik");
            if(isset($_POST['bSubmit'])){
                if($conn->connect_error){
                    echo "error delete";
                }
                else{
                    $del='DELETE FROM products WHERE id='.(int)$_POST['bSubmit'];
                    $results = $conn->query($del);
                    if(!$results){
                        echo '<p>Data NOT deleted!</p>';
                    }
                }
            }

            $searchName = "";

            if(isset($_GET['search_name'])){
                $searchName = $_GET['search_name'];
            }

            if($conn->connect_error){
                echo "error";
            }
            else{

                $sql_code = "SELECT * FROM `products`;";
                if($results = $conn->query($sql_code)) {

                    echo '<table border="1" id="table_products">';
                    echo '<tr>';
                    echo '<td>';
                    echo  'name';
                    echo '</td>';
                    echo '<td>';
                    echo  'price';
                    echo '</td>';
                    echo '<td>';
                    echo  'count';
                    echo '</td>';
                    echo '<td>';
                    echo  'delete';
                    echo '</td>';
                    echo '</tr>';
                    foreach ($results as $res){
                        if($res["name"] == $searchName){
                            echo '<tr class="tr_green">';
                        }
                        else{
                            echo '<tr>';
                        }
                        echo '<td>';
                        echo  $res["name"];
                        echo '</td>';
                        echo '<td>';
                        echo  $res["price"];
                        echo '</td>';
                        echo '<td>';
                        echo  $res["count"];
                        echo '</td>';
                        echo '<td>';
                        echo  "<button type='submit' name='bSubmit' value='{$res["id"]}'>X</button>";
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
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
    </form>


<!--    <script>-->
<!--        document.addEventListener('DOMContentLoaded', function (dom){-->
<!---->
<!--            document.getElementById("button_search").onclick = function (e){-->
<!--                let found = false;-->
<!--                let val = document.getElementById("search_name").value;-->
<!---->
<!--                let table = document.getElementById("table_products");-->
<!--                let tr = table.getElementsByTagName("tr");-->
<!--                for (let i = 0; i < tr.length; i++) {-->
<!--                    let td = tr[i].getElementsByTagName("td");-->
<!--                    for (let j = 0; j < td.length; j++) {-->
<!--                        if(td[j].innerHTML === val){-->
<!--                            found = true;-->
<!--                        }-->
<!--                    }-->
<!--                    if (found) {-->
<!--                        tr[i].style.backgroundColor = "red";-->
<!--                        found = false;-->
<!--                    } else {-->
<!--                        tr[i].style.backgroundColor = "white";-->
<!--                    }-->
<!--                }-->
<!--            }-->
<!--        });-->
<!--    </script>-->
</div>
</body>
</html>