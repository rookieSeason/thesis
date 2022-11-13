<?php
include '../includes/conn.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submitAddSched'])) {
    $s_handler = $_SESSION['username'];
    $s_handled_date = date('Y-m-d');
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $r_date = $_POST['r_date'];
    $o_date = $_POST['o_date'];
    $r_id = $_POST['r_id'];
    $r_slot = $_POST['r_slot'];
    $r_remarks = $_POST['r_remarks'];
    $brgy = $_SESSION['schedBarangay'];

    $rdate = new DateTime($r_date);
    $rdateOnly = $rdate->format('Y-m-d');
    $rtimeOnly = $rdate->format('h:i A');

    $odate = new DateTime($o_date);
    $odateOnly = $odate->format('Y-m-d');
    $otimeOnly = $odate->format('h:i A');

    // echo "$email date:$rdateOnly time:$rtimeOnly date:$odateOnly time:$otimeOnly" . $_SESSION['schedBarangay'];


    $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POSTFIELDS => http_build_query([
            "recipient" => $email,
            "subject"   => "Relocation Schedule Details",
            "body"      =>  "Congratulations! \n You have passed the screening process for the relocation! \n Please make sure to attend the NHA orientation at the HUDRD office on $odareOnly at $otimeOnly. \n The relocation is scheduled on $rdateOnly at $rtimeOnly. \r Further instructions will be discussed during the orientation so make sure to be there on time."
        ])
    ]);
    $emailSent = curl_exec($ch);
    if ($emailSent) {
        $query = $conn->query("UPDATE  tbl_schedule  SET  schedAllotment_date ='$s_handled_date', relocation_date ='$r_date', relocation_slot ='$r_slot', orientation_date ='$o_date', sched_remarks ='$r_remarks', s_status ='ALLOCATED', r_id ='$r_id', s_handler ='$s_handler' WHERE user_id = '$user_id'");

        if ($query) {
            $_SESSION['addSchedSuccess']  = "Schedule added sucessfully!";
            header("location: ../userData/hudrd/hudrd-schedList.php");
        } else {
            $_SESSION['addSchedFail']  = "Failed to add schedule. Please check your internet connection and try again";
            header("location: ../userData/hudrd/hudrd-schedList.php");
        }
    } else {
        $_SESSION['addSchedFail']  = "Failed to add schedule. Please check your internet connection and try again";
        header("location: ../userData/hudrd/hudrd-schedList.php");
    }
}


if (isset($_POST['submitEditSched'])) {
    $s_handler = $_SESSION['username'];
    $s_handled_date = date('Y-m-d');
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $r_date = $_POST['r_date'];
    $o_date = $_POST['o_date'];
    $r_id = $_POST['r_id'];
    $r_slot = $_POST['r_slot'];
    $s_status = $_POST['s_status'];
    $r_remarks = $_POST['r_remarks'];
    $brgy = $_SESSION['schedBarangay'];

    $rdate = new DateTime($r_date);
    $rdateOnly = $rdate->format('Y-m-d');
    $rtimeOnly = $rdate->format('h:i A');

    $odate = new DateTime($o_date);
    $odateOnly = $odate->format('Y-m-d');
    $otimeOnly = $odate->format('h:i A');


    if ($s_status == "RELOCATED") {
        $equery = $conn->query("UPDATE  tbl_schedule  SET  schedAllotment_date ='$s_handled_date', relocation_date ='$r_date', relocation_slot ='$r_slot', orientation_date ='$o_date', sched_remarks ='$r_remarks', s_status ='$s_status', r_id ='$r_id', s_handler ='$s_handler' WHERE user_id = '$user_id'");
        if ($equery) {
            $_SESSION['nMessage']  = ["Schedule edited sucessfully!", "success"];
            header("location: ../userData/hudrd/hudrd-schedList.php");
        }
    } else {
        $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS => http_build_query([
                "recipient" => $email,
                "subject"   => "Relocation Schedule Details",
                "body"      =>  "Notification: \n This email is sent to inform you that some changes has been made on the given schedule \n The new NHA orientation is on $odareOnly at $otimeOnly and it will be held at the HUDRD as per usual. \n The relocation is now scheduled on $rdateOnly at $rtimeOnly. \r Further instructions will be discussed during the orientation so make sure to be there on time."
            ])
        ]);
        $emailSent = curl_exec($ch);
        if ($emailSent) {
            $query = $conn->query("UPDATE  tbl_schedule  SET  schedAllotment_date ='$s_handled_date', relocation_date ='$r_date', relocation_slot ='$r_slot', orientation_date ='$o_date', sched_remarks ='$r_remarks', s_status ='$s_status', r_id ='$r_id', s_handler ='$s_handler' WHERE user_id = '$user_id'");

            if ($query) {
                $_SESSION['nMessage']  = ["Schedule edited sucessfully!", "success"];
                header("location: ../userData/hudrd/hudrd-schedList.php");
            } else {
                $_SESSION['nMessage']  = ["Failed to edit schedule. Please check your internet connection and try again", "error"];
                header("location: ../userData/hudrd/hudrd-schedList.php");
            }
        } else {
            $_SESSION['nMessage']  = ["Failed to edit schedule. Please check your internet connection and try again", "error"];
            header("location: ../userData/hudrd/hudrd-schedList.php");
        }
    }
}

//mark as relocated
if (isset($_GET['confirmID'])) {
    $user_id = $_GET['confirmID'];

    $query = $query = $conn->query("UPDATE  tbl_schedule  SET  s_status ='RELOCATED' WHERE user_id = '$user_id'");

    if ($query) {
        $_SESSION['markSuccess']  = "User marked as relocated successfully";
        header("location: ../userData/hudrd/hudrd-schedList.php");
    } else {
        echo mysqli_error($conn);
    }
}

//delete record
if (isset($_GET['deleteID'])) {
    $user_id = $_GET['deleteID'];

    $query = $conn->query("INSERT INTO archived_schedule(s_id, schedAllotment_date, relocation_date, relocation_slot, orientation_date, 	sched_remarks, s_status, r_id, s_handler, user_id) SELECT * FROM tbl_schedule WHERE user_id = $user_id");

    $query1 = $conn->query("DELETE FROM tbl_schedule WHERE user_id = $user_id");

    $query2 = $conn->query("UPDATE tbl_requirements SET req_status = 'PENDING' WHERE user_id = $user_id");

    if ($query2) {
        $_SESSION['deleteSchedSuccess']  = "Schedule record deleted successfully";
        header("location: ../userData/hudrd/hudrd-schedList.php");
    } else {
        echo mysqli_error($conn);
    }
}