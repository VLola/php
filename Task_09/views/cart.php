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
    <div class="div__flex flex-row">
        <?php
        include "../models/Product.php";
        include "../controllers/ProductController.php";


        ?>
    </div>

</div>
<script src="../js/bootstrap.js"></script>
</body>
</html>