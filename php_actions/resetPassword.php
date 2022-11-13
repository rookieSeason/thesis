<?php
require dirname(__DIR__) . '../includes/conn.php';

$error;
$error1;
$error2;
$otp;


if (!isset($_SESSION)) {
    session_start();
}


if (isset($_POST['btn-checkEmail'])) {
    global $error;
    global $otp;
    $email = $conn->real_escape_string($_POST['emailCheck']);
    $username = $conn->real_escape_string($_POST['username']);
    $_SESSION['resetEmail'] = $email;
    $_SESSION['resetUsername'] = $username;
    $checkEmail = $conn->query("SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE email = '$email' AND user_name = '$username' ");

    if (mysqli_num_rows($checkEmail) > 0) {
        $otp = rand(0000000000, 9999999999);
        $_SESSION['resetOtp'] = $otp;
        $createOTP = $conn->query("UPDATE tbl_users SET resetCode ='$otp' WHERE email = '$email'");
        if ($createOTP) {
            $sendOTP = $email;
            $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_POSTFIELDS => http_build_query([
                    "recipient" => $sendOTP,
                    "subject"   => "Password Recovery OTP",
                    "body"      =>  "Your password reset code is: " . $otp . " Please don't show this code to anyone else. If you didn't request for a password reset then please disregard this email."
                ])
            ]);
            $otpSent = curl_exec($ch);
            if ($otpSent) {
                header('location:../userData/resetCode.php');
            } else {
                $_SESSION['otpSentFail']  = "OTP reset code failed to send. Please check your internet connection or try again later";
            }
        } else {
        }
    } else {
        $error = "Email address does not exist";
    }
}

if (isset($_POST['btn-resetCode'])) {
    global $error1;
    global $otp;
    $otp = $_SESSION['resetOtp'];

    $otpEntered = $conn->real_escape_string($_POST['resetCode']);

    if ($otp == $otpEntered) {
        header('location:../userData/createNewPass.php');
    } else {
        $error1 = "Wrong OTP code entered otp is: $otp *for easy copy onleh muna";
    }
}

if (isset($_POST['btn-resetPass'])) {
    global $error2;
    $newpass = $conn->real_escape_string($_POST['newpassword']);
    $conpass = $conn->real_escape_string($_POST['conpassword']);
    $resetterEmail = $_SESSION['resetEmail'];
    $resetterUsername = $_SESSION['resetUsername'];
    $userID = "";
    $passwordHashed = password_hash($newpass, PASSWORD_DEFAULT);

    if ($newpass == $conpass) {
        $sql_get_id = $conn->query("SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE email = '$resetterEmail' AND user_name = '$resetterUsername' ");

        while ($row = mysqli_fetch_array($sql_get_id)) {
            $userID = $row['user_id'];
        }

        $sql_update_password =  $conn->query("UPDATE tbl_accounts SET password = '$passwordHashed' WHERE user_id = '$userID'");

        if ($sql_update_password) {
            $_SESSION['resetSuccess'] = 'Password changed successfully! You may now go back to login page';
        } else {
            $error2 = mysqli_error($conn);
        }
    } else {
        $error2 = "New and Confirm Password does not match";
    }
}

function display_error()
{
    global $error;

    if ($error != "") {
        echo '<div style="background:white;margin-bottom:10px;margin-top:-20px" class=" error text-center">';
        echo '<span class="text-danger">' . $error . '</span>';
        echo '</div>';
    }
}

function display_error1()
{
    global $error1;

    if ($error1 != "") {
        echo '<div style="background:white;margin-bottom:10px;margin-top:-20px" class=" error text-center">';
        echo '<span class="text-danger">' . $error1 . '</span>';
        echo '</div>';
    }
}

function display_error2()
{
    global $error2;

    if ($error2 != "") {
        echo '<div style="background:white;margin-bottom:10px;margin-top:-20px" class=" error text-center">';
        echo '<span class="text-danger">' . $error2 . '</span>';
        echo '</div>';
    }
}