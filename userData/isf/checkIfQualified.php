<?php
$display;
$display1;
$req_status;
$s_status;
$remarks;
$username = $_SESSION['username'];
$getID = $conn->query("SELECT tbl_users.user_id FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE tbl_accounts.user_name = '$username'");

if (mysqli_num_rows($getID) == 1) {
    global $display;
    $value = $getID->fetch_assoc();
    $user_id = $value['user_id'];
    $checkStatus = $conn->query("SELECT * FROM tbl_requirements WHERE user_id = $user_id");
    if (mysqli_num_rows($checkStatus) == 1) {
        global $display;
        global $req_status;
        global $remarks;

        $row = $checkStatus->fetch_assoc();
        $req_status = $row['req_status'];
        $remarks = $row['req_remark'];
        if ($req_status == "PENDING") {
            $display = false;
        } else {
            $checks_Status = $conn->query("SELECT * FROM tbl_schedule WHERE user_id = $user_id");
            if (mysqli_num_rows($checks_Status) == 1) {
                global $s_status;
                global $display1;

                $row1 = $checks_Status->fetch_assoc();
                $s_status = $row1['s_status'];
                if ($s_status == "NOT ALLOCATED") {
                    $display1 = true;
                } else {
                    $display1 = false;
                }
            }
            $display = true;
        }
    } else {
        $display = false;
    }
} else {
    $display = false;
}

function req_status()
{
    global $display;
    global $display1;
    global $remarks;

    if ($display == true) {
        global $req_status;
        echo "<h4 class='text-danger'>
        NOTICE:</h4>";
        echo '<h6>REQUIREMENT CHECKING STATUS: ' . $req_status . '</h6>';
        if ($remarks == "") {
            echo '<h6>REMARKS: N/A</h6>';
        } else {
            echo '<h6>REMARKS: ' . $remarks . ' </h6>';
        }
        if ($display1 == true) {
            echo '<h6>SCHEDULE STATUS: PENDING </h6>';
        } else {
        }
    } else {
    }
}