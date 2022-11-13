<?php
session_start();

$_SESSION['login_attempt'] = 0;

if (!empty($_SESSION['field'])) {
    foreach ($_SESSION['field'] as $key => $value) {
        ${'field' . $key} = $value;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Saurav">
    <link href="../css/bootstrap.min.4.5.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="shortcut icon" href="../images/bacoor-icon.ico" type="image/x-icon" />
    <title>HUDRD Registration for ISF</title>
</head>

<body class="bg-light" onload="hideErrorDiv()">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../images/logos/bacoor-logo.png" alt="" width="75" height="75">
            <h2>Registration for Informal Settler Families</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="../php_actions/registration.php" method="POST" enctype="multipart/form-data">
                    <div class=" form-row">
                        <div class="form-group col-lg-3 col-6">
                            <label>First Name <i class="text-danger">*</i></label>
                            <input type="text"
                                class="form-control <?php echo (isset($_SESSION['error_message_empty_fname'])) ? "is-invalid" : ""; ?>"
                                name="fname" placeholder="Enter your first name"
                                value="<?php echo (!empty($field0)) ? $field0 : "" ?>">
                            <div class="invalid-feedback text-danger">
                                <?php
                                echo (isset($_SESSION['error_message_empty_fname'])) ? $_SESSION['error_message_empty_fname'] : "";
                                unset($_SESSION['error_message_empty_fname']);
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-6">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="mname" placeholder="Enter your middle name"
                                value="<?php echo (!empty($field1)) ? $field1 : "" ?>">

                        </div>

                        <div class="form-group col-lg-3 col-6">
                            <label>Last Name <i class="text-danger">*</i></label>
                            <input type="text"
                                class="form-control <?php echo (isset($_SESSION['error_message_empty_lname'])) ? "is-invalid" : ""; ?>"
                                name="lname" placeholder="Enter your last name"
                                value="<?php echo (!empty($field2)) ? $field2 : "" ?>">
                            <div class="invalid-feedback text-danger">
                                <?php
                                echo (isset($_SESSION['error_message_empty_lname'])) ? $_SESSION['error_message_empty_lname'] : "";
                                unset($_SESSION['error_message_empty_lname']);
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-lg-3 col-6">
                            <label>Name Extension </label>
                            <input type="text" class="form-control" name="ename" placeholder="Enter your name extension"
                                value="<?php echo (!empty($field11)) ? $field11 : "" ?>">
                        </div>

                    </div>
                    <div class=" form-row ">
                        <div class="form-group col-6">
                            <label>Address <i class="text-danger">*</i></label>
                            <input type="text"
                                class="form-control <?php echo (isset($_SESSION['error_message_empty_address'])) ? "is-invalid" : ""; ?>"
                                name="address" placeholder="House #/Block/Lot/Subdivision"
                                value="<?php echo (!empty($field3)) ? $field3 : "" ?>">
                            <div class="invalid-feedback text-danger">
                                <?php
                                echo (isset($_SESSION['error_message_empty_address'])) ? $_SESSION['error_message_empty_address'] : "";
                                unset($_SESSION['error_message_empty_address']);
                                ?>
                            </div>

                        </div>
                        <div class="form-group col-6 ">
                            <label>Barangay <i class="text-danger">*</i></label>

                            <select
                                class="form-control <?php echo (isset($_SESSION['error_message_empty_barangay'])) ? "is-invalid" : ""; ?>"
                                name="barangay" id="">
                                <option selected hidden value="<?php echo (!empty($field4)) ? $field4 : "" ?>">

                                    <?php echo (!empty($field4)) ? $field4 : "--SELECT--" ?>
                                </option>
                                <option value="Alima">Alima </option>
                                <option value="Aniban I">Aniban I</option>
                                <option value="Aniban II">Aniban II</option>
                                <option value="Aniban III">Aniban III</option>
                                <option value="Aniban IV">Aniban IV</option>
                                <option value="Aniban V">Aniban V</option>
                                <option value="Banalo">Banalo</option>
                                <option value="Bayanan">Bayanan</option>
                                <option value="Campo Santo">Campo Santo</option>
                                <option value="Daang Bukid">Daang Bukid</option>

                                <option value="Digman">Digman </option>
                                <option value="Dulong Bayan">Dulong Bayan</option>
                                <option value="Habay I">Habay I</option>
                                <option value="Habay II">Habay II</option>
                                <option value="Kaingin">Kaingin</option>
                                <option value="Ligas I">Ligas I</option>
                                <option value="Ligas II">Ligas II</option>
                                <option value="Ligas III">Ligas III</option>
                                <option value="Mabolo I">Mabolo I</option>
                                <option value="Mabolo II">Mabolo II</option>

                                <option value="Mabolo III">Mabolo III </option>
                                <option value="Maliksi I">Maliksi I</option>
                                <option value="Maliksi II">Maliksi II</option>
                                <option value="Maliksi III">Maliksi III</option>
                                <option value="Mambog I">Mambog I</option>
                                <option value="Mambog II">Mambog II</option>
                                <option value="Mambog III">Mambog III</option>
                                <option value="Mambog IV">Mambog IV</option>
                                <option value="Mambog V">Mambog V</option>
                                <option value="Molino I">Molino I</option>

                                <option value="Molino II">Molino II </option>
                                <option value="Molino III">Molino III</option>
                                <option value="Molino IV">Molino IV</option>
                                <option value="Molino V">Molino V</option>
                                <option value="Molino VI">Molino VI</option>
                                <option value="Molino VII">Molino VII</option>
                                <option value="Niog I">Niog I</option>
                                <option value="Niog II">Niog II</option>
                                <option value="Niog III">Niog III</option>
                                <option value="P.F. Espiritu I (Panapaan)">P.F. Espiritu I (Panapaan)</option>

                                <option value="P.F. Espiritu II">P.F. Espiritu II</option>
                                <option value="P.F. Espiritu III">P.F. Espiritu III</option>
                                <option value="P.F. Espiritu IV">P.F. Espiritu IV</option>
                                <option value="P.F. Espiritu V">P.F. Espiritu V</option>
                                <option value="P.F. Espiritu VI">P.F. Espiritu VI</option>
                                <option value="P.F. Espiritu VII">P.F. Espiritu VII</option>
                                <option value="P.F. Espiritu VIII">P.F. Espiritu VIII</option>
                                <option value="Queens Row Central">Queens Row Central</option>
                                <option value="Queens Row East">Queens Row East</option>
                                <option value="Queens Row West">Queens Row West</option>

                                <option value="Real I">Real I</option>
                                <option value="Real II">Real II</option>
                                <option value="Salinas I">Salinas I</option>
                                <option value="Salinas II">Salinas II</option>
                                <option value="Salinas III">Salinas III</option>
                                <option value="Salinas IV">Salinas IV</option>
                                <option value="San Nicolas I">San Nicolas I</option>
                                <option value="San Nicolas II">San Nicolas II</option>
                                <option value="San Nicolas III">San Nicolas III
                                </option>
                                <option value="Sineguelasan">Sineguelasan</option>



                                <option value="Tabing Dagat">Tabing Dagat</option>
                                <option value="Talaba I">Talaba I</option>
                                <option value="Talaba II">Talaba II</option>
                                <option value="Talaba III">Talaba III</option>
                                <option value="Talaba IV">Talaba IV</option>
                                <option value="Talaba V">Talaba V</option>
                                <option value="Talaba VI">Talaba VI</option>
                                <option value="Talaba VII">Talaba VII</option>
                                <option value="Zapote I">Zapote I</option>
                                <option value="Zapote II">Zapote II</option>

                                <option value="Zapote III">Zapote III</option>
                                <option value="Zapote IV">Zapote IV</option>
                                <option value="Zapote V">Zapote V</option>
                            </select>
                            <div class="invalid-feedback text-danger">
                                <?php
                                echo (isset($_SESSION['error_message_empty_barangay'])) ? $_SESSION['error_message_empty_barangay'] : "";
                                unset($_SESSION['error_message_empty_barangay']);
                                ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3 form-group">
                <label>Birthday <i class="text-danger">*</i></label>
                <input oninvalid="setCustomValidity('You must be 18 years old or above ')" type="date" min="1922-12-31"
                    max="<?php $tday = date('Y-m-d', strtotime('18 years ago'));
                                                                                                                                echo $tday; ?>"
                    id="bdate" onchange="fnCalculateAge()"
                    class="form-control d-block w-100 <?php echo (isset($_SESSION['error_message_empty_bday'])) ? "is-invalid" : ""; ?>"
                    name="bday" placeholder="Birthday" value="<?php echo (!empty($field5)) ? $field5 : "" ?>">
                <div class="invalid-feedback text-danger">
                    <?php
                    echo (isset($_SESSION['error_message_empty_bday'])) ? $_SESSION['error_message_empty_bday'] : "";
                    unset($_SESSION['error_message_empty_bday']);
                    ?>
                </div>
            </div>
            <div class="col-md-3 mb-3 form-group">
                <label>Age <i class="text-danger">*</i></label>
                <input type="text"
                    class="form-control d-block w-100 <?php echo (isset($_SESSION['error_message_empty_age'])) ? "is-invalid" : ""; ?>"
                    name="age" placeholder="Age" readonly id="ageTotal"
                    value="<?php echo (!empty($field6)) ? $field6 : "" ?>">
                <div class="invalid-feedback text-danger">
                    <?php
                    echo (isset($_SESSION['error_message_empty_age'])) ? $_SESSION['error_message_empty_age'] : "";
                    unset($_SESSION['error_message_empty_age']);
                    ?>

                </div>
            </div>
            <div class="col-md-3 mb-3 form-group">
                <label>Contact Number <i class="text-danger">*</i></label>
                <input type="text"
                    class="form-control d-block w-100 <?php echo (isset($_SESSION['error_message_empty_contact'])) ? "is-invalid" : ""; ?>"
                    name="contact" placeholder="09********" value="<?php echo (!empty($field7)) ? $field7 : "" ?>">
                <div class="invalid-feedback text-danger">
                    <?php
                    echo (isset($_SESSION['error_message_empty_contact'])) ? $_SESSION['error_message_empty_contact'] : "";
                    unset($_SESSION['error_message_empty_contact']);
                    ?>
                </div>
            </div>
            <div class="col-md-3 mb-3 form-group">
                <label>Sex <i class="text-danger">*</i></label>
                <select
                    class="custom-select d-block w-100 <?php echo (isset($_SESSION['error_message_empty_sex'])) ? "is-invalid" : ""; ?>"
                    name="sex">
                    <option selected hidden value="<?php echo (!empty($field8)) ? $field8 : "" ?>">
                        <?php echo (!empty($field8)) ? $field8 : "Choose.." ?>
                    </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <div class="invalid-feedback text-danger">
                    <?php
                    echo (isset($_SESSION['error_message_empty_sex'])) ? $_SESSION['error_message_empty_sex'] : "";
                    unset($_SESSION['error_message_empty_sex']);
                    ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Email Address <i class="text-danger">*</i></label>
                    <input type="text"
                        class="form-control <?php echo (isset($_SESSION['error_message_empty_email'])) ? "is-invalid" : ""; ?>"
                        name="email" placeholder="Enter your email address"
                        value="<?php echo (!empty($field9)) ? $field9 : "" ?>">
                    <div class="invalid-feedback text-danger">
                        <?php
                        echo (isset($_SESSION['error_message_empty_email'])) ? $_SESSION['error_message_empty_email'] : "";
                        unset($_SESSION['error_message_empty_email']);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username <i class="text-danger">*</i></label>
                    <input type="text"
                        class="form-control <?php echo (isset($_SESSION['error_message_empty_username']) || isset($_SESSION['error_message_taken_username'])) ? "is-invalid" : ""; ?>"
                        name="username" placeholder="Enter your username"
                        value="<?php echo (!empty($field10)) ? $field10 : "" ?>">
                    <div class="invalid-feedback text-danger">
                        <?php
                        if (isset($_SESSION['error_message_empty_username'])) {
                            echo $_SESSION['error_message_empty_username'];
                        } elseif ($_SESSION['error_message_taken_username']) {
                            echo $_SESSION['error_message_taken_username'];
                        }
                        unset($_SESSION['error_message_empty_username']);
                        unset($_SESSION['error_message_taken_username']);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Password <i class="text-danger">*</i></label>
                    <input type="password" id="password1"
                        class="form-control <?php echo (isset($_SESSION['error_message_empty_password']) || isset($_SESSION['error_message_min_password'])) ? "is-invalid" : ""; ?>"
                        name="password" placeholder="Enter your password (minimum 8 characters)">
                    <div style="margin-top: -35px; margin-right:10px; float:right;width:40px; cursor:pointer; "
                        class=" text-right">
                        <span class="" onclick="password_show_hide1();">
                            <i class=" text-black fa fa-2x  fa-eye" id="show_eye1"></i>
                            <i class="text-black fa fa-2x fa-eye-slash d-none" id="hide_eye1"></i>
                        </span>
                    </div>
                    <div class="invalid-feedback text-danger">
                        <?php
                        if (isset($_SESSION['error_message_empty_password'])) {
                            echo  $_SESSION['error_message_empty_password'];
                        } elseif (isset($_SESSION['error_message_min_password'])) {
                            echo $_SESSION['error_message_min_password'];
                        };
                        unset($_SESSION['error_message_empty_password']);
                        unset($_SESSION['error_message_min_password']);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Confirm Password <i class="text-danger">*</i></label>
                    <input type="password" id="password2"
                        class="form-control <?php echo (isset($_SESSION['error_message_confirm_password'])) ? "is-invalid" : ""; ?>"
                        name="confirm_password" placeholder="Enter your confirm password">
                    <div style="margin-top: -35px; margin-right:10px; float:right;width:40px; cursor:pointer; "
                        class=" text-right">
                        <span class="" onclick="password_show_hide2();">
                            <i class=" text-black fa fa-2x  fa-eye" id="show_eye2"></i>
                            <i class="text-black fa fa-2x fa-eye-slash d-none" id="hide_eye2"></i>
                        </span>
                    </div>
                    <div class="invalid-feedback text-danger">
                        <?php
                        echo (isset($_SESSION['error_message_confirm_password'])) ? $_SESSION['error_message_confirm_password'] : "";
                        unset($_SESSION['error_message_confirm_password']);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Upload your image of your Valid ID here! <i class="text-danger">*</i></label>
                    <br>
                    <input type="file" name="file" accept="image/*"
                        class=" mb-2 form-control <?php echo (isset($_SESSION['error_message_empty_image']) || isset($_SESSION['error_empty_img_message'])) ? "is-invalid" : ""; ?>">
                    <div class="invalid-feedback text-danger">
                        <?php
                        if (isset($_SESSION['error_message_empty_image'])) {
                            echo $_SESSION['error_message_empty_image'];
                        } elseif (isset($_SESSION['error_empty_img_message'])) {
                            echo   $_SESSION['error_empty_img_message'];
                        };
                        unset($_SESSION['error_empty_img_message']);
                        unset($_SESSION['error_message_empty_image']);
                        ?>
                    </div>

                </div>

            </div>
            <div class="col-md-12 p-2">
                <div class="form-check-inline form-check w-100">
                    <input type="checkbox" required value="agree" style="transform:scale(1.5);"
                        class="form-check-input m-3">
                    <label for="" class="form-check-label" style="font-size:small"><i>In submitting this form I agree
                            to my details being used for the purposes of
                            applying for housing allocation. The information will only be accessed by necessary
                            government employees. I understand that my data will be held securely and will not be
                            distributed to third parties. I understand that when this information is no longer required
                            for this purpose, official HUDRD procedure will be followed to dispose of my data
                        </i></label>
                </div>
            </div>
        </div>
        <button type="submit" name="submit"
            class="btn btn-primary btn-lg btn-block w-100 form-group mt-3">Register</button>

        <div class="txt1 text-center" style="margin-bottom: 25px; font-weight: bold;">
            <label>
                Already have an account? <a href="multi-user-login.php" style="text-decoration-color:black">Login</a>
            </label>
        </div>
        </form>

    </div>
    <?php unset($_SESSION['field']); ?>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2022-2023 <a href="/thesis/index.php">Bacoor Housing Urban Development and Resettlement
                Department</a></p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
    </div>
    </div>
    <script>
    function password_show_hide1() {
        var x = document.getElementById("password1");
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
        var x = document.getElementById("password2");
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
    </script>

    <script>
    function fnCalculateAge() {

        var userDateinput = document.getElementById("bdate").value;


        // convert user input value into date object
        var birthDate = new Date(userDateinput);

        // get difference from current date;
        var difference = Date.now() - birthDate.getTime();

        var ageDate = new Date(difference);
        var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);
        document.getElementById("ageTotal").value = calculatedAge;
    }

    function hideErrorDiv() {
        setTimeout(function() {
            var errors = document.getElementsByClassName("invalid-feedback");
            var formControl = document.getElementsByClassName("form-control");
            var customSelect = document.getElementsByClassName("custom-select");
            for (var i = 0; i < errors.length; i++) {
                errors[i].classList.add('d-none');

            }
            for (var i = 0; i < formControl.length; i++) {
                formControl[i].classList.remove('is-invalid');
            }
            for (var i = 0; i < customSelect.length; i++) {
                customSelect[i].classList.remove('is-invalid');
            }

        }, 15000)
    }
    </script>


</body>

</html>