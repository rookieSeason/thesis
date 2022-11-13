<?php
include "../php_actions/sign-in.php";

if (isset($_SESSION['login_attempt'])) {
} else {
    $_SESSION['login_attempt'] = 0;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/bacoor-icon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!--===============================================================================================-->
</head>

<body onload="login_attempt_error();">

    <div class="limiter">
        <div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-logo">
                        <img src="../images/logos/bacoor-logo.png" alt="">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" autocomplete="username" type="text" name="username"
                            onclick="hideErrorDiv()" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" onclick="hideErrorDiv()" type="password" name="pass" id="pass"
                            placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        <div style="margin-top: -35px; float:right;width:40px; cursor:pointer"
                            class=" text-right input-group-append">
                            <span class="input-group-text" onclick="password_show_hide();">
                                <i class=" text-white fa fa-2x fa-eye" id="show_eye"></i>
                                <i class="text-white fa fa-2x fa-eye-slash dis-none" id="hide_eye"></i>
                            </span>
                        </div>
                    </div>
                    <?php echo display_error(); ?>
                    <!-- <div id="attempt_msg" style="background:white;" class=" text-danger text-center">
                    </div> -->
                    <div class="txt1" style="margin-bottom: 25px; font-weight: bold; margin-top:-20px">
                        <label>
                            <a id="forgetPasswordLink" href="forgotPassword.php">Forgot Password?</a>
                        </label>
                        <br>
                        <label>
                            Don't have an account yet? <a href="isf-regform.php">Register</a>
                        </label>

                    </div>

                    <br>
                    <div class="container-login100-form-btn">


                        <button class="login100-form-btn" type="submit" id="checkLogin" name="btn-login">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-30 text-md-center">
                        <a class="txt1" style="text-decoration: underline;" href="../index.php">
                            Back To Home
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/main.js"></script>

    <script>
    //remove this when forget password is functional
    function login_attempt_error() {
        var attempt = <?php echo $_SESSION['login_attempt'];  ?>;
        var checkLogin = document.getElementById("checkLogin");
        if (attempt > 2) {
            // var timeleft = 10;
            // var timer = setInterval(function() {
            //     if (timeleft <= 0) {
            //         clearInterval(timer);
            //         checkLogin.style.pointerEvents = "auto";
            //         checkLogin.style.opacity = "1";
            //         document.getElementById("attempt_msg").style.display = "none";

            //     } else {
            //         document.getElementById("attempt_msg").style.display = "block";
            //         document.getElementById("attempt_msg").innerHTML = timeleft + " seconds remaining";
            //         checkLogin.style.pointerEvents = "none";
            //         checkLogin.style.opacity = "0.5";
            //     }
            //     timeleft -= 1;
            // }, 1000);
            document.getElementById("forgetPasswordLink").style.color = "yellow";

        } else {
            // document.getElementById("attempt_msg").style.display = "none";
            document.getElementById("forgetPasswordLink").style.color = "none";
        }

    }

    function password_show_hide() {
        var x = document.getElementById("pass");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("dis-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
    </script>
    <?php
    if (isset($_SESSION['success'])) {
        echo '<script>alert("Registered Successfully. Please wait 2-3 days for account approval");</script>';
    }
    unset($_SESSION['success']);

    ?>

    <script>
    function hideErrorDiv() {

        var errors = document.getElementsByClassName("error");
        for (var i = 0; i < errors.length; i++) {
            errors[i].style.display = "none";
        }


    }
    </script>
    <script>
    console.log(localStorage.setItem('notif', "Hi"));
    </script>

</body>

</html>