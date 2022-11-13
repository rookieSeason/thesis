<?php
include '../includes/conn.php';
session_start();

if (isset($_POST['submitNewArea'])) {
    $r_name = $conn->real_escape_string($_POST['r_name']);
    $r1 = $conn->real_escape_string($_POST['addBrgy']) . ", ";
    $r2 = $conn->real_escape_string($_POST['addCity']) . ", ";
    $r3 = "CAVITE";
    $r_location = strtoupper($r1 . $r2 . $r3);
    $r_primary_dev_name = $conn->real_escape_string($_POST['r_primary_dev_name']);
    $r_primary_dev_contact = $conn->real_escape_string($_POST['r_primary_dev_contact']);
    $r_primary_dev_email = $conn->real_escape_string($_POST['r_primary_dev_email']);
    $r_status = $conn->real_escape_string($_POST['r_status']);

    $query = $conn->query("INSERT INTO tbl_relocation_area VALUES ('','$r_name','$r_location','$r_primary_dev_name','$r_primary_dev_contact','$r_primary_dev_email','','$r_status')");

    if ($query) {
        $_SESSION['nMessage']  = ["Relocation Area successfully added!", "success"];
        header("location: ../userData/hudrd/hudrd-relocationArea.php");
    } else {
        echo mysqli_error($conn);
    }
}

if (isset($_POST['submitUpdateArea'])) {
    $r_id = $conn->real_escape_string($_POST['r_id']);
    $r_name = $conn->real_escape_string($_POST['r_name']);
    $r1 = $conn->real_escape_string($_POST['editBrgy']) . ", ";
    $r2 = $conn->real_escape_string($_POST['editCity']) . ", ";
    $r3 = "CAVITE";
    $r_location = strtoupper($r1 . $r2 . $r3);
    $r_primary_dev_name = $conn->real_escape_string($_POST['r_primary_dev_name']);
    $r_primary_dev_contact = $conn->real_escape_string($_POST['r_primary_dev_contact']);
    $r_primary_dev_email = $conn->real_escape_string($_POST['r_primary_dev_email']);
    $r_total_families = $conn->real_escape_string($_POST['r_total_families']);
    $r_status = $conn->real_escape_string($_POST['r_status']);

    $query = $conn->query("UPDATE tbl_relocation_area SET r_name = '$r_name', r_location='$r_location', r_primary_dev_name='$r_primary_dev_name', r_primary_dev_contact='$r_primary_dev_contact', r_primary_dev_email='$r_primary_dev_email',r_total_families='$r_total_families',r_status='$r_status' WHERE r_id='$r_id'");

    $_SESSION['nMessage']  = ["Relocation Area details successfully updated!", "success"];
    header("location: ../userData/hudrd/hudrd-relocationArea.php");
}

//delete record
if (isset($_GET['deleteID'])) {
    $r_id = $_GET['deleteID'];

    $query = $conn->query("INSERT INTO archived_relocation_area(r_id, r_name, r_location, r_primary_dev_name, r_primary_dev_contact, r_primary_dev_email, r_total_families, r_status) SELECT * FROM tbl_relocation_area WHERE r_id = $r_id");

    $query1 = $conn->query("DELETE FROM tbl_relocation_area WHERE r_id = $r_id");

    if ($query1) {
        $_SESSION['nMessage']  = ["Relocation Area deleted successfully", "success"];
        header("location: ../userData/hudrd/hudrd-relocationArea.php");
    } else {
        echo mysqli_error($conn);
    }
}