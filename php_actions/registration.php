<?php
include '../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {
    $fname = $conn->real_escape_string($_POST['fname']);
    $mname = $conn->real_escape_string($_POST['mname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $ename = $conn->real_escape_string($_POST['ename']);
    $address = $conn->real_escape_string($_POST['address']);
    $barangay = $conn->real_escape_string($_POST['barangay']);
    $upperBrgy = strtoupper($barangay);
    $bday = $conn->real_escape_string($_POST['bday']);
    $age = $conn->real_escape_string($_POST['age']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $sex = $conn->real_escape_string($_POST['sex']);
    $email = $conn->real_escape_string($_POST['email']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);


    $error = 0;

    //error messages...


    if (empty($fname)) {
        $_SESSION['error_message_empty_fname'] = 'First name is required!';
        $error++;
    }

    if (empty($lname)) {
        $_SESSION['error_message_empty_lname'] = 'Last name is required!';
        $error++;
    }
    if (empty($address)) {
        $_SESSION['error_message_empty_address'] = 'Address is required!';
        $error++;
    }
    if (empty($barangay)) {
        $_SESSION['error_message_empty_barangay'] = 'Barangay is required!';
        $error++;
    }
    if (empty($bday)) {
        $_SESSION['error_message_empty_bday'] = 'Birthday is required!';
        $error++;
    }
    if (empty($age)) {
        $_SESSION['error_message_empty_age'] = 'Age is required!';
        $error++;
    }
    if (empty($contact)) {
        $_SESSION['error_message_empty_contact'] = 'Contact Number is required!';
        $error++;
    } else if (!preg_match('/^(09|\+639)\\d{9}$/', $contact)) {
        $_SESSION['error_message_empty_contact'] = 'Number must start with 09/+639 followed by 9 digits';
        $error++;
    }
    if (empty($sex)) {
        $_SESSION['error_message_empty_sex'] = 'Sex is required!';
        $error++;
    }
    if (empty($email)) {
        $_SESSION['error_message_empty_email'] = 'Email is required!';
        $error++;
    }
    if (empty($username)) {
        $_SESSION['error_message_empty_username'] = 'Username is required!';
        $error++;
    }
    $sql = $conn->query("SELECT tbl_accounts.user_name, tbl_registration.username FROM tbl_accounts CROSS JOIN tbl_registration WHERE tbl_accounts.user_name = '$username' OR tbl_registration.username = '$username'");
    $user_numrow = $sql->num_rows;
    if ($user_numrow > 0) {
        $_SESSION['error_message_taken_username'] = 'Username is already taken!';
        $error++;
    }

    if (empty($password)) {
        $_SESSION['error_message_empty_password'] = 'Password is required!';
        $error++;
    }
    if (!preg_match('/^[a-zA-z\d\s\_]{8,}+$/', $password)) {
        $_SESSION['error_message_min_password'] = 'Minimum of 8 characters!';
        $error++;
    }
    if ($password !== $confirm_password) {
        $_SESSION['error_message_confirm_password'] = 'Password and Confirm Password must match!';
        $error++;
    }


    if (empty($_FILES['file']["tmp_name"])) {
        $_SESSION['error_message_empty_image'] = 'Image File si Required!';
        $error++;
    }
    if (!empty($_FILES['file']["tmp_name"])) {
        $imgName  = $_FILES['file']["name"];
        $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
        $extension = ["jpg", "jpeg", "png", "gif"];

        if (!in_array($imgExt, $extension)) {
            $_SESSION['error_empty_img_message'] = 'Image of your Valid ID is required!';
            $error++;
        }
    }


    $_SESSION['field'] = [];
    if ($error > 0) {
        array_push($_SESSION['field'], $fname, $mname, $lname, $address, $barangay, $bday, $age, $contact, $sex, $email, $username, $ename);
        header("location:../userData/isf-regform.php");
    } else {
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        $file = addslashes(file_get_contents($_FILES['file']["tmp_name"]));

        $sql_create = $conn->query("INSERT INTO tbl_registration (first_name, middle_name, last_name,ext_name, address, barangay, birthdate, age, contact_no,email, username, password, image, sex, reg_status,notif_status) VALUES ('$fname','$mname','$lname','$ename','$address','$upperBrgy','$bday','$age','$contact','$email','$username','$hashed_pass','$file','$sex', 'PENDING','0')") or die($conn->error);

        if ($sql_create) {

            echo '<script>localStorage.setItem("notif",["New User has been registered check it now!", "default"]);</script>';

            $_SESSION['success'] = true;
            header("location: ../userData/multi-user-login.php");
        }
    }
}