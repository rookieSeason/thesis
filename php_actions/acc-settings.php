<?php
require dirname(__DIR__) . '../includes/conn.php';

if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['errors1'] = [];
$_SESSION['errors2'] = [];


if (isset($_POST['user_edit'])) {
    $sessionuser = $_SESSION['username'];
    $username = $conn->real_escape_string($_POST['username']);

    if (empty($username)) {
        array_push($_SESSION['errors1'], "Username is required");
        if ($_SESSION['usertype'] == "ISF") {
            header("location:../userData/isf/isf-settings.php");
        } else {
            header("location:../userData/hudrd/hudrd-settings.php");
        }
    } else {
        $checkUserList = $conn->query("SELECT tbl_accounts.user_name, tbl_registration.username FROM tbl_accounts CROSS JOIN tbl_registration WHERE tbl_accounts.user_name = '$username' OR tbl_registration.username = '$username'");

        if (mysqli_num_rows($checkUserList) > 0) {
            array_push($_SESSION['errors1'], "Username is already taken!");
            if ($_SESSION['usertype'] == "ISF") {
                header("location:../userData/isf/isf-settings.php");
            } else {
                header("location:../userData/hudrd/hudrd-settings.php");
            }
        } else {
            $sql_change_username = $conn->query("UPDATE tbl_accounts SET user_name = '$username' WHERE user_name = '$sessionuser'");
            $_SESSION['username'] = $username;
            $_SESSION['nMessage'] = ["Username changed successfully!", "success"];
            if ($_SESSION['usertype'] == "ISF") {
                header("location:../userData/isf/isf-settings.php");
            } else {
                header("location:../userData/hudrd/hudrd-settings.php");
            }
        }
    }
}



if (isset($_POST['pass_edit'])) {
    $sessionuser = $_SESSION['username'];
    $password = $conn->real_escape_string($_POST['password']);
    $newpass = $conn->real_escape_string($_POST['newpass']);
    $conpass = $conn->real_escape_string($_POST['conpass']);

    $passwordHashed = password_hash($newpass, PASSWORD_DEFAULT);

    if (empty($password) || empty($newpass) || empty($conpass)) {
        array_push($_SESSION['errors2'], "Please fill up all fields");
        if ($_SESSION['usertype'] == "ISF") {
            header("location:../userData/isf/isf-settings.php");
        } else {
            header("location:../userData/hudrd/hudrd-settings.php");
        }
    } else {
        if ($newpass == $conpass) {
            $sql_checked_pass = $conn->query("SELECT * FROM tbl_accounts WHERE user_name = '$sessionuser'");

            while ($row = mysqli_fetch_array($sql_checked_pass)) {
                $old_password = $row['password'];
            }
            if (password_verify($password, $old_password)) {
                $sql_update_password =  $conn->query("UPDATE tbl_accounts SET password = '$passwordHashed' WHERE user_name = '$sessionuser'");

                if ($sql_update_password) {
                    $_SESSION['message_change_password'] = 'Password changed successfully';
                    if ($_SESSION['usertype'] == "ISF") {
                        header("location:../userData/isf/isf-settings.php");
                    } else {
                        header("location:../userData/hudrd/hudrd-settings.php");
                    }
                } else {
                    echo mysqli_error($conn);
                }
            } else {
                array_push($_SESSION['errors2'], "Old Password is Incorrect");
                if ($_SESSION['usertype'] == "ISF") {
                    header("location:../userData/isf/isf-settings.php");
                } else {
                    header("location:../userData/hudrd/hudrd-settings.php");
                }
            }
        } else {
            array_push($_SESSION['errors2'], "New and Confirm Password does not match");
            if ($_SESSION['usertype'] == "ISF") {
                header("location:../userData/isf/isf-settings.php");
            } else {
                header("location:../userData/hudrd/hudrd-settings.php");
            }
        }
    }
}