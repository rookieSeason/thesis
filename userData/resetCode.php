<?php
include "../php_actions/resetPassword.php";

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
</head>

<body>
    <div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST">
                <span class="login100-form-logo">
                    <img src="../images/logos/bacoor-logo.png" alt="">
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Reset Password
                </span>
                <div style="background:white;margin-bottom:10px;margin-top:-20px" class=" bg-success text-center">
                    <span class=" text-success"> Password reset OTP is sent to your email
                    </span>
                </div>
                <br>

                <div class="wrap-input100" data-validate="Enter reset code">
                    <input class="input100" required type="text" name="resetCode" onclick="hideErrorDiv1()"
                        placeholder="Enter reset code">
                    <span class="focus-input100" data-placeholder="&#xf15a;"></span>
                </div>
                <?php echo display_error1(); ?>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" id="resetButton" name="btn-resetCode">
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
    function hideErrorDiv1() {

        var errors = document.getElementsByClassName("error");

        for (var i = 0; i < errors.length; i++) {
            errors[i].style.display = "none";
        }


    }
    </script>
</body>

</html>