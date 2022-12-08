<html>
    <head>
        <title>TEST PHP</title>
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        $array = array('#C7BFE6','#B5E51D','#FFF407','#00A3E8','#F27B81','#FFC90D','#C3C3C3','#FF7F26','#D1A4FF','#CA9881');
        echo "<div class='div__header'>";
            for($i = 1; $i <= 10; $i+=1){
                $indexColor = $i - 1;
                echo "<div class='div__center' style='background-color: $array[$indexColor]'>";
                echo "<div class='div__column'>";
                for($j = 1; $j < 10; $j+=1){
                    echo "$i x $j = ";
                    echo $i * $j;
                    echo "<br>";
                }
                echo "</div>";
                echo "</div>";
            }
        echo "</div>";
            ?>
    </body>
</html>