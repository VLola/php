<html>
    <head>
        <title>Page 3</title>
    </head>
    <body>
        <div style="height: 100%; display: flex; flex-direction: column">
            <form style='height: 100%; align-self: center' method='post' action='page-4.php'>
                <?php
                include 'php/script.php';
                ?>
                <p>
                    <button type='submit' name='bSubmit' value='4'>Finish</button>
                </p>
            </form>
            <label style='align-self: center; margin-top: auto'>Страница 3</label>
        </div>
    </body>
</html>