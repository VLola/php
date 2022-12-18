<html>
    <head>
        <title>Task 2</title>
    </head>
    <body>
        <?php
        echo "<form  method='post' action='#'>";
        echo "<input type='text' name='tEmail' placeholder='Email'>";
        echo "<br>";
        echo "<input type='checkbox' name='cSubscribe'>Subscribe</input>";
        echo "<br>";
        echo "<button type='submit'>Send</button>";
        echo "</form>";
        if(isset($_POST['tEmail']) && isset($_POST['cSubscribe'])){
            echo '<div id="userName">Thank you for subscribing</div>';
        }
            ?>
    </body>
</html>