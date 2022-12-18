<html>
    <head>
        <title>Page 2</title>
    </head>
    <body>
        <div style="height: 100%; display: flex; flex-direction: column">
            <form style='height: 100%; align-self: center' method='post' action='page-3.php'>
                <?php
                include 'php/script.php';
                ?>
                <p>
                    <button type='submit' name='bSubmit' value='3'>Next</button>
                </p>
            </form>
            <label style='align-self: center; margin-top: auto'>Страница 2</label>
        </div>
    </body>
</html>