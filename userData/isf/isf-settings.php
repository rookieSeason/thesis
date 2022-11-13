<?php include "../../includes/isf-header.php";
include "checkIfIsf.php";
?>

<link rel="icon" type="image/png" href="../../images/bacoor-icon.ico" />

<link rel="stylesheet" type="text/css" href="../../fonts/iconic/css/material-design-iconic-font.min.css">


<link rel="stylesheet" type="text/css" href="../../css/util.css">
<link rel="stylesheet" type="text/css" href="../../css/main.css">


<div class="limiter ">
    <div class="container-login100" style="background: url(../../uploads/city-bg.jpg); margin-top:-20px;">
        <div class="wrap-login100" style="width:75vw;">
            <form class="login100-form validate-form" action="../../php_actions/acc-settings.php" method="POST">


                <span class="login100-form-title text-white"
                    style="font-weight:900; text-shadow:0px 0px 5px white; font-size:200%">
                    Edit Account Information
                </span>
                <br><br>
                <?php if (isset($_SESSION['message_change_user_success'])) : ?>
                <br>
                <div class="alert alert-success alert-dismissible " role="alert">

                    <h6 class="text-success">
                        <?php
                            echo $_SESSION['message_change_user_success'];
                            unset($_SESSION['message_change_user_success']);
                            ?>
                    </h6>
                    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
                </div>
                <?php endif ?>

                <?php if (isset($_SESSION['message_change_password'])) : ?>
                <br>
                <div class="alert alert-success alert-dismissible " role="alert">

                    <h6 class="text-success">
                        <?php
                            echo $_SESSION['message_change_password'];
                            unset($_SESSION['message_change_password']);
                            ?>
                    </h6>
                    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
                </div>
                <?php endif ?>
                <h5 class="text-white">Change Username</h5><br>
                <div class=" wrap-input100 validate-input text-black" data-validate="Enter username">

                    <input class="input100" type="text" name="username" onclick="hideErrorDiv();" placeholder="Username"
                        value="<?php echo $_SESSION['username'] ?>">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <?php
                if (!empty($_SESSION['errors1'])) : ?>
                <div style="background:white;" class="error mb-3 text-center">
                    <?php
                        foreach ($_SESSION['errors1'] as $key => $value) {
                            if ($value != "") {
                                echo '<span class="text-danger">' . $value . '</span>';
                            }
                        }
                        ?>

                </div>
                <?php endif;
                unset($_SESSION['errors1']);
                ?>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn me-auto" type="submit" name="user_edit">
                        Save Changes
                    </button>
                </div>
                <br><br>


                <h5 class="text-white">Change Password</h5><br>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" onclick="hideErrorDiv()" type="password" name="password" id="oldpass"
                        placeholder="Current Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    <div style="margin-top: -50px; float:right;width:40px; cursor:pointer"
                        class=" text-right input-group-append">
                        <span class="border-0 bg-transparent  input-group-text" onclick="password_show_hide1();">
                            <i class=" text-white fa fa-2x fa-eye" id="show_eye1"></i>
                            <i class="text-white fa fa-2x fa-eye-slash dis-none" id="hide_eye1"></i>
                        </span>
                    </div>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" onclick="hideErrorDiv()" type="password" name="newpass" id="newpass"
                        placeholder="New Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    <div style="margin-top: -50px; float:right;width:40px; cursor:pointer"
                        class=" text-right input-group-append">
                        <span class="border-0 bg-transparent  input-group-text" onclick="password_show_hide2();">
                            <i class=" text-white fa fa-2x fa-eye" id="show_eye2"></i>
                            <i class="text-white fa fa-2x fa-eye-slash dis-none" id="hide_eye2"></i>
                        </span>
                    </div>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" onclick="hideErrorDiv()" type="password" name="conpass" id="conpass"
                        placeholder=" Confirm Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    <div style="margin-top: -50px; float:right;width:40px; cursor:pointer"
                        class=" text-right input-group-append">
                        <span class=" border-0 bg-transparent input-group-text" onclick="password_show_hide3();">
                            <i class=" text-white fa fa-2x fa-eye" id="show_eye3"></i>
                            <i class="text-white fa fa-2x fa-eye-slash dis-none" id="hide_eye3"></i>
                        </span>
                    </div>
                </div>
                <?php
                if (!empty($_SESSION['errors2'])) : ?>
                <div style="background:white;" class="error mb-3 text-center">
                    <?php
                        foreach ($_SESSION['errors2'] as $key => $value) {
                            if ($value != "") {
                                echo '<span class="text-danger">' . $value . '</span>';
                            }
                        }
                        ?>

                </div>
                <?php endif;
                unset($_SESSION['errors2']);
                ?>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn me-auto" type="submit" name="pass_edit">
                        Save Changes
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
function password_show_hide1() {
    var x = document.getElementById("oldpass");
    var show_eye1 = document.getElementById("show_eye1");
    var hide_eye1 = document.getElementById("hide_eye1");
    hide_eye1.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye1.style.display = "none";
        hide_eye1.style.display = "block";
    } else {
        x.type = "password";
        show_eye1.style.display = "block";
        hide_eye1.style.display = "none";
    }
}

function password_show_hide2() {
    var x = document.getElementById("newpass");
    var show_eye2 = document.getElementById("show_eye2");
    var hide_eye2 = document.getElementById("hide_eye2");
    hide_eye2.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye2.style.display = "none";
        hide_eye2.style.display = "block";
    } else {
        x.type = "password";
        show_eye2.style.display = "block";
        hide_eye2.style.display = "none";
    }
}

function password_show_hide3() {
    var x = document.getElementById("conpass");
    var show_eye2 = document.getElementById("show_eye3");
    var hide_eye2 = document.getElementById("hide_eye3");
    hide_eye2.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye2.style.display = "none";
        hide_eye2.style.display = "block";
    } else {
        x.type = "password";
        show_eye2.style.display = "block";
        hide_eye2.style.display = "none";
    }
}
</script>

<script>
function hideErrorDiv() {

    var errors = document.getElementsByClassName("error");

    for (var i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";
    }
}
</script>

<?php include '../../includes/footer.php'; ?>