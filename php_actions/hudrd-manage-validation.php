<?php
include '../includes/conn.php';

if (!isset($_SESSION)) {
    session_start();
}

//start of approve and/or decline

if (isset($_GET['approveId'])) {
    $v_id = $_GET['approveId'];
    $v_handler = $_SESSION['username'];
    $v_handled_date = date('Y-m-d');
    $emailApprove = $_GET['emailApprove'];

    $query = $conn->query("UPDATE tbl_validation SET v_status = 'QUALIFIED',v_handler = '$v_handler', v_handled_date = '$v_handled_date' WHERE v_id = $v_id");

    if ($query) {
        $query1 = $conn->query("INSERT INTO tbl_requirements(user_id,v_id) SELECT user_id,v_id FROM tbl_validation WHERE v_id = $v_id");
        if ($query1) {
            $query2 = $conn->query("UPDATE tbl_requirements SET req_status = 'PENDING' WHERE v_id = $v_id");
            $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_POSTFIELDS => http_build_query([
                    "recipient" => $emailApprove,
                    "subject"   => "Validation Approval",
                    "body"      =>  "We would like to inform you that you have been qualified in the validation stage, please proceed to the requirement tab in the system and submit the requirements needed."
                ])
            ]);
            $emailSent = curl_exec($ch);


            $_SESSION['nMessage']  = ["User validation approved successfully", "success"];
            header("location: ../userData/hudrd/hudrd-validation.php");
        } else {
            mysqli_error($conn);
        }
    } else {
        header("location: ../userData/hudrd/hudrd-validation.php");
        mysqli_error($conn);
    }
}



//decline record
if (isset($_POST['rejectValidation'])) {
    $v_id = $conn->real_escape_string($_POST['v_id']);
    $v_remark = $conn->real_escape_string($_POST['v_remarks']);
    $v_handler = $_SESSION['username'];
    $v_handled_date = date('Y-m-d');
    $email = $conn->real_escape_string($_POST['email']);

    $query = $conn->query("UPDATE tbl_validation SET v_status = 'DISQUALIFIED', v_remark = '$v_remark', v_handler = '$v_handler', v_handled_date = '$v_handled_date' WHERE v_id = $v_id");

    if ($query) {
        $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS => http_build_query([
                "recipient" => $email,
                "subject"   => "Validation Disqualification",
                "body"      =>  "We regret to inform you that you have been disqualified in the housing allocation for the reason of: $v_remark . Please go into the HUDRD office if you want to contest the decision"
            ])
        ]);
        $emailSent = curl_exec($ch);
        $_SESSION['nMessage']  = ["User validation rejected successfully", "success"];
        header("location: ../userData/hudrd/hudrd-validation.php");
    } else {
        header("location: ../userData/hudrd/hudrd-validation.php");
    }
}


// end of approve and/or decline

//delete record
if (isset($_GET['deleteID'])) {
    $user_id = $_GET['deleteID'];

    $getUser = $conn->query("SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id WHERE tbl_validation.user_id = '$user_id' ");
    if (mysqli_num_rows($getUser) == 1) {
        $row =  $getUser->fetch_assoc();
        $username = $row['user_name'];
        $dir_name = "../validation_files/" . $username;
        if (is_dir($dir_name)) {
            array_map('unlink', glob("$dir_name/*.*"));
            rmdir($dir_name);
        }

        if ($row['v_status'] == "QUALIFIED") {

            $dir_name2 = "../requirement_files/" . $username;
            if (is_dir($dir_name2)) {
                array_map('unlink', glob("$dir_name2/*.*"));
                rmdir($dir_name2);
            }
        }
    }

    $query = $conn->query("INSERT INTO archived_validations(v_id, v_occupant_type, v_length_of_stay, v_structure_class, v_structure_type, v_proof1, v_proof_file1, v_proof2, v_proof_file2, v_civil_status, v_partner_name, v_status, v_remark, v_handler, v_handled_date, user_id) SELECT * FROM tbl_validation WHERE user_id = $user_id");

    $query1 = $conn->query("DELETE FROM tbl_validation WHERE user_id = $user_id");

    if ($query1) {
        $_SESSION['nMessage']  = ["User deleted successfully!", "success"];
        header("location: ../userData/hudrd/hudrd-validation.php");
    } else {
        header("location: ../userData/hudrd/hudrd-validation.php");
    }
}