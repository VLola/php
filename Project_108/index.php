<html>
    <head>
        <title>Task 3</title>
    </head>
    <body>
        <div style="height: 100%; display: flex; flex-direction: column">
            <form style='height: 100%; align-self: center' method='post' action='page-2.php'>
                <?php
                include 'php/script.php';
                ?>
                <p>
                    <button type='submit' name='bSubmit' value='2'>Next</button>
                </p>
            </form>
            <label style='align-self: center; margin-top: auto'>Страница 1</label>
        </div>
    </body>
</html>