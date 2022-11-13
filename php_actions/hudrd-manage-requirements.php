<?php
include '../includes/conn.php';

if (!isset($_SESSION)) {
    session_start();
}

//start of approve and/or decline

if (isset($_GET['approveId'])) {
    $req_id = $_GET['approveId'];
    $req_handler = $_SESSION['username'];
    $req_handled_date = date('Y-m-d');

    $query = $conn->query("UPDATE tbl_requirements SET req_status = 'QUALIFIED',req_handler = '$req_handler', req_handled_date = '$req_handled_date' WHERE req_id = $req_id");

    if ($query) {
        $query1 = $conn->query("INSERT INTO tbl_schedule(user_id) SELECT user_id FROM tbl_requirements WHERE req_id = $req_id");
        if ($query1) {
            $_SESSION['approveReqSuccess']  = "User requirements approved successfully";
            header("location: ../userData/hudrd/hudrd-manageRequirements.php");
        } else {
            mysqli_error($conn);
        }
    } else {
        header("location: ../userData/hudrd/hudrd-manageRequirements.php");
        mysqli_error($conn);
    }
}

//decline record
if (isset($_POST['rejectReq'])) {
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $email = $conn->real_escape_string($_POST['email']);
    $req_remark = $conn->real_escape_string($_POST['req_remarks']);
    $req_handler = $_SESSION['username'];
    $req_handled_date = date('Y-m-d');


    $query = $conn->query("UPDATE tbl_requirements SET req_status = 'DISQUALIFIED', req_remark = '$req_remark', req_handler = '$req_handler', req_handled_date = '$req_handled_date' WHERE req_id = $req_id");

    if ($query) {
        $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS => http_build_query([
                "recipient" => $email,
                "subject"   => "Requirement Disqualification",
                "body"      =>  "We regret to inform you that you have been disqualified in the housing allocation for the reason of: $req_remark . Please go into the HUDRD office if you want to contest the decision"
            ])
        ]);
        $emailSent = curl_exec($ch);

        $_SESSION['declineReqSuccess']  = "User Requirements rejected successfully";
        header("location: ../userData/hudrd/hudrd-manageRequirements.php");
    } else {
        header("location: ../userData/hudrd/hudrd-manageRequirements.php");
    }
}

//delete record
if (isset($_GET['deleteID'])) {
    $req_id = $_GET['deleteID'];
    $userID = $_GET['userID'];

    $getUser = $conn->query("SELECT tbl_accounts.user_name FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id LEFT OUTER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id WHERE tbl_requirements.req_id = '$req_id' ");
    if (mysqli_num_rows($getUser) == 1) {
        $row =  $getUser->fetch_assoc();
        $username = $row['user_name'];
        $dir_name = "../requirement_files/" . $username;
        if (is_dir($dir_name)) {
            array_map('unlink', glob("$dir_name/*.*"));
            rmdir($dir_name);
        }
    }
    $query = $conn->query("INSERT INTO archived_requirements(
        id ,  req_id ,  req_valid_id1,req_valid_id2, req_birthcert ,  req_birthcert_partner ,  req_birthcert_fam ,  req_income_or_employment ,  req_family_pic ,  req_cohab_or_marriage ,  req_affi_transfer , req_nha_form ,  req_complete,  req_status ,  req_remark , req_handler ,  req_handled_date, user_id ,  v_id) SELECT * FROM tbl_requirements WHERE req_id = $req_id");

    $query1 = $conn->query("DELETE FROM tbl_requirements WHERE req_id = $req_id");

    if ($query1) {
        $query2 = $conn->query("UPDATE tbl_validation SET v_status = 'PENDING' WHERE user_id = $userID");
        $_SESSION['deleteReqSuccess']  = "User record deleted successfully";
        header("location: ../userData/hudrd/hudrd-manageRequirements.php");
    } else {
        header("location: ../userData/hudrd/hudrd-manageRequirements.php");
    }
}

//send reminder

if (isset($_GET['remindEmail'])) {
    $remindEmail = $conn->real_escape_string($_GET['remindEmail']);
    $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POSTFIELDS => http_build_query([
            "recipient" => $remindEmail,
            "subject"   => "Requirement submission reminder",
            "body"      =>  "In order to secure your housing allocation from the NHA, please ensure to submit all of the requirements needed as soon as possible"
        ])
    ]);
    $emailSent = curl_exec($ch);
    if ($emailSent) {
        $_SESSION['remindReqSuccess']  = "Email reminder sent successfully!";
        header("location: ../userData/hudrd/hudrd-manageRequirements.php");
    } else {
        $_SESSION['remindReqFail']  = "Email reminder failed to send. Please check your internet connection";
        header("location: ../userData/hudrd/hudrd-manageRequirements.php");
    }
}