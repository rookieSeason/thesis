<?php
include "../php_actions/resetPassword.php";

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Password</title>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
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
                    Create new password
                </span>

                <?php if (isset($_SESSION['resetSuccess'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <h6 class="text-success" style="font-size:small;">
                        <?php
                            echo $_SESSION['resetSuccess'];
                            unset($_SESSION['resetSuccess']);
                            ?>
                    </h6>
                    <button type="button" data-bs-dismiss="alert" class="btn-close" aria-label="Close"></button>
                </div>
                <?php endif ?>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" onclick="hideErrorDiv2()" required type="password" name="newpassword"
                        id="newpassword" placeholder="New Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    <div style="margin-top: -50px; float:right;width:40px; cursor:pointer"
                        class=" text-right input-group-append">
                        <span class="border-0 bg-transparent  input-group-text" onclick="password_show_hide4();">
                            <i class=" text-white fa fa-2x fa-eye" id="show_eye4"></i>
                            <i class="text-white fa fa-2x fa-eye-slash dis-none" id="hide_eye4"></i>
                        </span>
                    </div>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" onclick="hideErrorDiv2()" required type="password" name="conpassword"
                        id="conpassword" placeholder=" Confirm Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    <div style="margin-top: -50px; float:right;width:40px; cursor:pointer"
                        class=" text-right input-group-append">
                        <span class=" border-0 bg-transparent input-group-text" onclick="password_show_hide5();">
                            <i class=" text-white fa fa-2x fa-eye" id="show_eye5"></i>
                            <i class="text-white fa fa-2x fa-eye-slash dis-none" id="hide_eye5"></i>
                        </span>
                    </div>
                </div>
                <?php echo display_error2(); ?>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" id="resetPassword" name="btn-resetPass">
                        Submit
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
    function hideErrorDiv2() {

        var errors = document.getElementsByClassName("error");

        for (var i = 0; i < errors.length; i++) {
            errors[i].style.display = "none";
        }
    }
    </script>
    <script>
    function password_show_hide4() {
        var x = document.getElementById("newpassword");
        var show_eye2 = document.getElementById("show_eye4");
        var hide_eye2 = document.getElementById("hide_eye4");
        hide_eye2.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye4.style.display = "none";
            hide_eye4.style.display = "block";
        } else {
            x.type = "password";
            show_eye4.style.display = "block";
            hide_eye4.style.display = "none";
        }
    }

    function password_show_hide5() {
        var x = document.getElementById("conpassword");
        var show_eye5 = document.getElementById("show_eye5");
        var hide_eye5 = document.getElementById("hide_eye5");
        hide_eye5.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye5.style.display = "none";
            hide_eye5.style.display = "block";
        } else {
            x.type = "password";
            show_eye5.style.display = "block";
            hide_eye5.style.display = "none";
        }
    }
    </script>
</body>

</html>