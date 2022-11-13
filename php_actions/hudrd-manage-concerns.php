<?php
include '../includes/conn.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submitResponse'])) {
    $response = $conn->real_escape_string($_POST['response']);
    $email = $_POST['email'];
    $name = $_POST['name'];
    $f_id = $_POST['f_id'];

    $newMess = "Dear Ms./Mr. $name, \n \n $response \n \n \n HUDRD DEPARTMENT";

    $url = "https://script.google.com/macros/s/AKfycbwh_gDGuo9thyf3mZuY_zg-ej0L3nxhZRdtQZBduYVUJaLEHZqyStg2k4ZALQBaiXIV/exec";

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POSTFIELDS => http_build_query([
            "recipient" => $email,
            "subject"   => "QUERY RESPONSE",
            "body"      =>  $newMess
        ])
    ]);
    $result = curl_exec($ch);
    if ($result) {

        $query = $conn->query("UPDATE tbl_concern SET response = '$response',c_status = 'RESPONDED' WHERE f_id = '$f_id' ");

        if ($query) {
            $_SESSION['nMessage']  = ["Email response sent!", "success"];
            header("location: ../userData/hudrd/hudrd-concern.php");
        } else {
            $_SESSION['nMessage']  = ["Some error occurred. Please check your internet connection and try again later.", "error"];
            header("location: ../userData/hudrd/hudrd-concern.php");
        }
    } else {
        $_SESSION['nMessage']  = ["Email response not sent. Please check your internet connection and try again later.", "error"];
        header("location: ../userData/hudrd/hudrd-concern.php");
    }
}


//delete record
if (isset($_GET['deleteID'])) {
    $f_id = $_GET['deleteID'];

    $query = $conn->query("INSERT INTO archived_concern(f_id, fname, lname, mname, ename, email, cp_num, concern, response, c_status) SELECT * FROM tbl_concern WHERE f_id = $f_id");

    $query1 = $conn->query("DELETE FROM tbl_concern WHERE f_id = $f_id");

    if ($query1) {
        $_SESSION['nMessage']  = ["Feedback/Concern deleted successfully", "success"];
        header("location: ../userData/hudrd/hudrd-concern.php");
    } else {
        echo mysqli_error($conn);
    }
}