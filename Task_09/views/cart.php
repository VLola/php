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
    <h1>Shopping cart:</h1>
    <div class="div__flex flex-row">
        <?php
        include "../models/Product.php";
        include "../controllers/ProductController.php";


        ?>
    </div>

</div>
</body>
</html>