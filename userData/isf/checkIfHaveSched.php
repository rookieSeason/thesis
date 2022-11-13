<?php
$display;
$s_status;
$remarks;
$username = $_SESSION['username'];
$getID = $conn->query("SELECT tbl_users.user_id FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE tbl_accounts.user_name = '$username'");

if (mysqli_num_rows($getID) == 1) {
    global $display;
    $value = $getID->fetch_assoc();
    $user_id = $value['user_id'];
    $checkStatus = $conn->query("SELECT * FROM tbl_schedule WHERE user_id = $user_id");
    if (mysqli_num_rows($checkStatus) == 1) {
        global $display;
        global $s_status;
        global $remarks;

        $row = $checkStatus->fetch_assoc();
        $s_status = $row['s_status'];
        $remarks = $row['sched_remarks'];
        if ($s_status == "NOT ALLOCATED") {
            $display = false;
        } else {
            $display = true;
        }
    } else {
        $display = false;
    }
} else {
    $display = false;
}

function s_status()
{
    global $display;
    global $remarks;

    if ($display == true) {
        global $s_status;
        echo "<h4 class='text-danger'>
        NOTICE:</h4>";
        echo '<h6>SCHEDULE STATUS: ' . $s_status . '</h6>';
        if ($remarks == "") {
            echo '<h6>REMARKS: N/A</h6>';
        } else {
            echo '<h6>REMARKS: ' . $remarks . ' </h6>';
        }
    } else {
    }
}