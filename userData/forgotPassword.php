<?php
include "../php_actions/resetPassword.php";

$_SESSION['login_attempt'] = 0;
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.5.1.2.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST">
                <span class="login100-form-logo">
                    <img src="../images/logos/bacoor-logo.png" alt="">
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Forgot Password
                </span>
                <?php if (isset($_SESSION['otpSentFail'])) : ?>
                <br>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <h6 class="text-danger" style="font-size:small;">
                        <?php
                            echo $_SESSION['otpSentFail'];
                            unset($_SESSION['otpSentFail']);
                            ?>
                    </h6>
                    <button type="button" data-bs-dismiss="alert" class="btn-close" aria-label="Close"></button>
                </div>
                <?php endif ?>
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" required autocomplete="username" type="text" name="username"
                        onclick="hideErrorDiv()" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100" data-validate="Enter your email address">
                    <input class="input100" required autocomplete="email" type="email" name="emailCheck"
                        onclick="hideErrorDiv()" placeholder="Enter your email address">
                    <span class="focus-input100" data-placeholder="&#xf15a;"></span>
                </div>
                <?php echo display_error(); ?>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" id="checkEmail" name="btn-checkEmail">
                        Continue
                    </button>
                </div>
                <div class="text-center p-t-30 text-md-center">
                    <a class="txt1" style="text-decoration: underline;" href="multi-user-login.php">
                        Back To Login Page
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
    function hideErrorDiv() {

        var errors = document.getElementsByClassName("error");

        for (var i = 0; i < errors.length; i++) {
            errors[i].style.display = "none";
        }


    }
    </script>
</body>

</html>