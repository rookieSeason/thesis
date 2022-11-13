<?php
include '../includes/conn.php';

$reg_details = array();
if (!isset($_SESSION)) {
    session_start();
}

//decline record
if (isset($_GET['declineId'])) {
    $reg_id = $_GET['declineId'];

    $query = $conn->query("UPDATE tbl_registration SET reg_status = 'REJECTED' WHERE reg_id = $reg_id");

    if ($query) {
        $_SESSION['nMessage']  = ["User application declined successfully", "success"];
        header("location: ../userData/hudrd/hudrd-manageApplication.php");
    } else {
        header("location: ../userData/hudrd/hudrd-manageApplication.php");
    }
}


//approve record
if (isset($_GET['approveId'])) {
    global $reg_details;
    $reg_id = $_GET['approveId'];
    $user_id;


    $getRegDetails = $conn->query("SELECT * FROM tbl_registration WHERE reg_id = $reg_id");

    if (mysqli_num_rows($getRegDetails) > 0) {
        while ($row = mysqli_fetch_assoc($getRegDetails)) {

            $reg_details = $row;
        }
    }


    $fname = $conn->real_escape_string($reg_details['first_name']);
    $mname = $conn->real_escape_string($reg_details['middle_name']);
    $lname = $conn->real_escape_string($reg_details['last_name']);
    $ename = $conn->real_escape_string($reg_details['ext_name']);
    $address = $conn->real_escape_string($reg_details['address']);
    $barangay = $conn->real_escape_string($reg_details['barangay']);
    $sex = $conn->real_escape_string($reg_details['sex']);
    $age = $conn->real_escape_string($reg_details['age']);
    $bday = $conn->real_escape_string($reg_details['birthdate']);
    $contact = $conn->real_escape_string($reg_details['contact_no']);
    $email = $conn->real_escape_string($reg_details['email']);
    $username = $conn->real_escape_string($reg_details['username']);
    $password = $conn->real_escape_string($reg_details['password']);



    $getUserID = $conn->query("SELECT user_id FROM tbl_users WHERE fname = '$fname' AND mname ='$mname' AND lname = '$lname' AND ename = '$ename' AND detailed_add = '$address' AND barangay = '$barangay' ");


    if (mysqli_num_rows($getUserID) > 0) {
        while ($row = mysqli_fetch_assoc($getUserID)) {

            $user_id = $row['user_id'];
        }
        $query = $conn->query("UPDATE tbl_registration SET reg_status = 'APPROVED' WHERE reg_id = $reg_id");

        $query1 = $conn->query("UPDATE tbl_users SET gender='$sex',age='$age', bday='$bday', contact_no = '$contact', email ='$email', user_type='ISF' WHERE user_id = $user_id");

        $query2 = $conn->query("INSERT INTO tbl_accounts(acc_id,user_name,password,user_id) VALUES ('','$username','$password','$user_id')");

        if ($query1) {
            if ($query2) {
                $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

                $ch = curl_init($url);
                curl_setopt_array($ch, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_POSTFIELDS => http_build_query([
                        "recipient" => $email,
                        "subject"   => "Account Registration Successful",
                        "body"      =>  "Your account is successfully created."
                    ])
                ]);
                $emailSent = curl_exec($ch);
                $emailNotif;
                if ($emailSent) {
                    $emailNotif = "Email confirmation sent!";
                } else {
                    $emailNotif = "Email confirmation failed to send!";
                }
                $_SESSION['nMessage']  = ["User application successfully approved! " . $emailNotif, "success"];
                header("location: ../userData/hudrd/hudrd-manageApplication.php");
            } else {
            }
        } else {
        }
    } else {
        $_SESSION['nMessage']  = ["No user match found!", "error"];
        header("location: ../userData/hudrd/hudrd-manageApplication.php");
    }
}


//delete record
if (isset($_GET['deleteID'])) {
    $reg_id = $_GET['deleteID'];

    $query = $conn->query("INSERT INTO archived_registration(reg_id, first_name, middle_name, last_name, ext_name, address, barangay, birthdate, age, contact_no, email, username, password, image, sex, reg_status,notif_status)  SELECT * FROM tbl_registration WHERE reg_id = $reg_id");

    $query1 = $conn->query("DELETE FROM tbl_registration WHERE reg_id = $reg_id");

    if ($query1) {
        $_SESSION['nMessage']  = ["User registration details deleted successfully", "success"];
        header("location: ../userData/hudrd/hudrd-manageApplication.php");
    } else {
        header("location: ../userData/hudrd/hudrd-manageApplication.php");
    }
}