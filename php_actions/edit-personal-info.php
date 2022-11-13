<?php
include '../includes/conn.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submitHudrdEdit'])) {
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $mname = $conn->real_escape_string($_POST['mname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $ename = $conn->real_escape_string($_POST['ename']);
    $detailed_add = $conn->real_escape_string($_POST['detailed_add']);
    $barangay = $conn->real_escape_string($_POST['barangay']);
    $city = $conn->real_escape_string($_POST['city']);
    $bday = $conn->real_escape_string($_POST['bday']);
    $age = $conn->real_escape_string($_POST['age']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $contact_no = $conn->real_escape_string($_POST['contact_no']);
    $email = $conn->real_escape_string($_POST['email']);
    $job_position = $conn->real_escape_string($_POST['job_position']);
    $job_description = $conn->real_escape_string($_POST['job_description']);
    $hire_date = $conn->real_escape_string($_POST['hire_date']);
    $salary = $conn->real_escape_string($_POST['salary']);

    $f_bday = date('Y-m-d', strtotime($bday));
    $f_hire_date = date('Y-m-d', strtotime($hire_date));

    $query = $conn->query("UPDATE tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id LEFT OUTER JOIN tbl_employees ON tbl_users.user_id = tbl_employees.user_id SET tbl_users.fname = '$fname',tbl_users.mname = '$mname',tbl_users.lname = '$lname',tbl_users.ename = '$ename',tbl_users.detailed_add = '$detailed_add',tbl_users.barangay = '$barangay',tbl_users.city = '$city',tbl_users.gender = '$gender',tbl_users.age = '$age',tbl_users.bday = '$f_bday',tbl_users.contact_no = '$contact_no',tbl_users.email = '$email',tbl_employees.job_position = '$job_position',tbl_employees.job_description = '$job_description',tbl_employees.hire_date = '$f_hire_date',tbl_employees.salary = '$salary' WHERE tbl_users.user_id = $user_id") or die(mysqli_error($conn));

    if ($query) {
        $_SESSION['nMessage']  = ["Personal information updated successfully", "success"];
        header("location: ../userData/hudrd/hudrd-personal-info.php");
    } else {
        echo mysqli_error($conn);
    }
}

//edit isf record

if (isset($_POST['submitIsfEdit'])) {
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $mname = $conn->real_escape_string($_POST['mname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $ename = $conn->real_escape_string($_POST['ename']);
    $detailed_add = $conn->real_escape_string($_POST['detailed_add']);
    $barangay = $conn->real_escape_string($_POST['barangay']);
    $upperBrgy = strtoupper($barangay);
    $city = strtoupper($conn->real_escape_string($_POST['city']));
    $bday = $conn->real_escape_string($_POST['bday']);
    $age = $conn->real_escape_string($_POST['age']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $contact_no = $conn->real_escape_string($_POST['contact_no']);
    $email = $conn->real_escape_string($_POST['email']);

    $f_bday = date('Y-m-d', strtotime($bday));

    $query = $conn->query("UPDATE tbl_users SET fname = '$fname',mname = '$mname',lname = '$lname',ename = '$ename',detailed_add = '$detailed_add',barangay = '$upperBrgy',city = '$city',gender = '$gender',age = '$age',bday = '$f_bday',contact_no = '$contact_no',email = '$email' WHERE user_id = $user_id") or die(mysqli_error($conn));

    if ($query) {
        $_SESSION['nMessage']  = ["Personal information updated successfully", "success"];
        header("location: ../userData/isf/isf-personal-info.php");
    } else {
        echo mysqli_error($conn);
    }
}