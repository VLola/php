<html>
<head>
    <title>Test</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="d-flex w-100 h-100 justify-content-center align-items-center">
    <div class="w-25">
        <div class="card bg-dark text-white" style="border-radius: 1rem;width: 20rem">
            <div class="card-body pt-5 px-5 text-center justify-content-center">


                <div class="position-absolute w-100 px-5">
                    <a class="btn btn-outline-light btn-close bg-light float-end me-5" href="index.php"></a>
                </div>

                <h2 class="fw-bold mb-2 text-uppercase">Account</h2>
                <p class="mb-5" style="opacity: 0.7;">Please enter your email and password!</p>

                <form method="post" action="redirect.php">

                    <div class="form-outline form-white mb-4">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email"/>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
                    </div>

                    <?php
                    if(isset($_GET['checkbox']) && $_GET['checkbox'] == 'on'){
                        echo '<button class="btn btn-outline-light btn-lg w-100" name="register" type="submit">Register</button>';
                    }
                    else{
                        echo '<button class="btn btn-outline-light btn-lg w-100" name="login" type="submit">Login</button>';
                    }
                    ?>
                </form>

                <form method="get" action="login.php">
                    <div class="d-flex justify-content-center mt-4">
                        <div class="form-check form-switch">
                            <?php
                            if(isset($_GET['checkbox']) && $_GET['checkbox'] == 'on'){
                                echo '<input class="form-check-input" type="checkbox" name="checkbox" role="button" onChange="this.form.submit()" checked>';
                                echo '<label class="form-label" for="typeCheckBox">Have an account?</label>';
                            }
                            else{
                                echo '<input class="form-check-input" type="checkbox" name="checkbox" role="button" onChange="this.form.submit()">';
                                echo '<label class="form-label" for="typeCheckBox">Don`t have an account?</label>';
                            }
                            ?>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>