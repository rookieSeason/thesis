<?php
include "../includes/conn.php";

// for manage user application notification
if (isset($_POST['viewd'])) {
    if ($_POST["viewd"] != 'no') {
        $update_query = $conn->query("UPDATE tbl_registration SET notif_status = 1 WHERE notif_status = 0 ");
    }
    $notif_query = $conn->query("SELECT reg_id FROM tbl_registration WHERE notif_status = 0");

    $count = $notif_query->num_rows;
    $data = array('unseen_notification' => $count);
    echo json_encode($data);
}

// for concern notification - Lester

if (isset($_POST['concerns'])) {

    if ($_POST["concerns"] != 'no') {
        $update_concern_query = $conn->query("UPDATE tbl_concern SET notif_status = 1 WHERE notif_status = 0");
    }
    $notif_concern_query = $conn->query("SELECT f_id FROM tbl_concern WHERE notif_status = 0");

    $concern_count = $notif_concern_query->num_rows;
    $concern_data = array('unseen_notification_concern' => $concern_count);
    echo json_encode($concern_data);
}

//for requirements notification - Lester

if (isset($_POST['requirements'])) {

    if ($_POST["requirements"] != 'no') {
        $update_req_query = $conn->query("UPDATE tbl_requirements SET notif_status = 1 WHERE notif_status = 0");
    }

    $notif_req_query = $conn->query("SELECT req_id FROM tbl_requirements WHERE notif_status = 0");
    $req_count = $notif_req_query->num_rows;
    $req_data = array('unseen_notification_requirement' => $req_count);
    echo json_encode($req_data);
}