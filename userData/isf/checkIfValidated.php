<?php
$display;
$v_status;
$remarks;
$username = $_SESSION['username'];
$getID = $conn->query("SELECT tbl_users.user_id FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE tbl_accounts.user_name = '$username'");

if (mysqli_num_rows($getID) == 1) {
    global $display;
    $value = $getID->fetch_assoc();
    $user_id = $value['user_id'];
    $checkStatus = $conn->query("SELECT * FROM tbl_validation WHERE user_id = $user_id");
    if (mysqli_num_rows($checkStatus) == 1) {
        global $display;
        global $v_status;
        global $remarks;

        $row = $checkStatus->fetch_assoc();
        $v_status = $row['v_status'];
        $remarks = $row['v_remark'];
        if ($v_status != "") {
            $display = false;
        } else {
            $display = true;
        }
    } else {
        $display = true;
    }
} else {
    $display = false;
}

function validation_status()
{
    global $display;
    global $remarks;

    if ($display == true) {
        echo '<h6><i>This is the first part of the screening process for the housing allocation. Please answer
        <b>honestly</b>.</i></h6>';
    } else {
        global $v_status;
        echo '<h6>VALIDATION STATUS: ' . $v_status . '</h6>';
        if ($remarks == "") {
            echo '<h6>REMARKS: N/A</h6>';
        } else {
            echo '<h6>REMARKS: </h6>' . $remarks;
        }
    }
}