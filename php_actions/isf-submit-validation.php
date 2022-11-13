<?php
require "../includes/conn.php";
session_start();

if (isset($_POST['submitValidationInfo'])) {
    $v_occupant_type = $conn->real_escape_string($_POST['v_occupant_type']);
    $v_length_of_stay = $conn->real_escape_string($_POST['v_length_of_stay']);
    $v_structure_class = $conn->real_escape_string($_POST['v_structure_class']);
    $v_structure_type = $conn->real_escape_string($_POST['v_structure_type']);
    $v_proof1 = $conn->real_escape_string($_POST['v_proof1']);
    $v_proof2 = $conn->real_escape_string($_POST['v_proof2']);
    $v_civil_status = $conn->real_escape_string($_POST['v_civil_status']);
    $v_partner_name = $conn->real_escape_string($_POST['v_partner_name']);

    $v_proof_file1 = $_FILES['v_proof_file1'];
    $v_proof1name = $_FILES['v_proof_file1']['name'];
    $v_proof1tmp =  $_FILES['v_proof_file1']['tmp_name'];
    $v_proof1size =  $_FILES['v_proof_file1']['size'];
    $v_proof1_extension = explode('.', $v_proof1name);
    $v_proof1_ext = strtolower(end($v_proof1_extension));

    $v_proof_file2 = $_FILES['v_proof_file2'];
    $v_proof2name = $_FILES['v_proof_file2']['name'];
    $v_proof2tmp =  $_FILES['v_proof_file2']['tmp_name'];
    $v_proof2size =  $_FILES['v_proof_file2']['size'];
    $v_proof2_extension = explode('.', $v_proof2name);
    $v_proof2_ext = strtolower(end($v_proof2_extension));

    if ($v_proof1size < 1000000 && $v_proof2size < 1000000) {


        $username = $_SESSION['username'];
        $getID = $conn->query("SELECT tbl_users.user_id FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE tbl_accounts.user_name = '$username'");
        $user_id;
        if (mysqli_num_rows($getID) == 1) {
            $dir_name = "../validation_files/" . $username . "/";
            if (!is_dir($dir_name)) {
                mkdir($dir_name, 0777, true);
            }

            if (!empty($v_proof1_ext)) {
                $v_proof1_unique = uniqid('proof1', true) . '.' . $v_proof1_ext;
                $fileDestination1 = "$dir_name$v_proof1_unique";
                move_uploaded_file($v_proof1tmp, $fileDestination1);
            }
            if (!empty($v_proof2)) {
                $v_proof2_unique = uniqid('proof2', true) . '.' . $v_proof2_ext;
                $fileDestination2 = "$dir_name$v_proof2_unique";
                move_uploaded_file($v_proof2tmp, $fileDestination2);
            } else {
                $v_proof2_unique = "";
            }

            $value = $getID->fetch_assoc();
            $user_id = $value['user_id'];
            $query = $conn->query("INSERT INTO tbl_validation ( v_occupant_type, v_length_of_stay, v_structure_class, v_structure_type, v_proof1, v_proof_file1, v_proof2, v_proof_file2, v_civil_status, v_partner_name, v_status, v_remark, user_id) VALUES ('$v_occupant_type','$v_length_of_stay','$v_structure_class','$v_structure_type','$v_proof1','$v_proof1_unique','$v_proof2','$v_proof2_unique','$v_civil_status','$v_partner_name','PENDING','','$user_id')");

            if ($query) {
                $_SESSION['nMessage']  = ["Form is successfully uploaded.", "success"];
                header("location: ../userData/isf/isf-validation.php");
            }
        } else {
            echo "user not found";
        }
    } else {
        $_SESSION['nMessage']  = ["File must be 10mb or less!", "error"];
        header("location: ../userData/isf/isf-validation.php");
    }
}