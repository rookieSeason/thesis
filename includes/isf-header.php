<?php
include "../../php_actions/sign-in.php";
isLoggedIn();
$v_status;
$req_status;
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relocation Management Information System</title>
    <!-- custom css -->
    <link rel="stylesheet" href="../../css/navAndFoot.css">
    <link rel="stylesheet" href="../../css/account.css">
    <link rel="stylesheet" href="../../css/header.css">
    <!-- <link href="../../css/app.css" rel="stylesheet"> -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.5.1.2.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">

    <!-- bootstrap js -->
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <style>
    @media print {
        #print {
            display: none;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
        <button class="navbar-toggler collapsed border-1" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <div class="close-icon py-1">X</div>
        </button>
        <a class="navbar-brand" href="#">
            <span>HUDRD Office</span>
        </a>
        <div class=" collapse navbar-collapse  text-center" id="navbarCollapse">
            <ul class="navbar-nav navbar-nav-scroll ms-auto me-3 text-center">
                <li class="nav-item ">
                    <a id="aHome" class="nav-link text-white" href="/thesis/userData/isf/isf-home.php"><i
                            class=" fa fa-home "></i>
                        HOME</a>
                </li>
                <li class="nav-item ">
                    <a id="aHome" class="nav-link text-white" href="/thesis/userData/isf/isf-validation.php"><i
                            class=" fa fa-tasks "></i> VALIDATION</a>
                </li>
                <li class="nav-item ">
                    <?php
                    $username = $_SESSION['username'];

                    //eto inayos ko yung query hanggang inner join nageerror kasi kapag inaarchived yung sa validation kaya inayos ko
                    $select_query = $conn->query("SELECT * FROM tbl_validation WHERE user_id = '$_SESSION[userID]'");
                    $valid_num = $select_query->num_rows;

                    if ($valid_num > 0) {
                        $tbl_valid = "tbl_validation";
                    } else {
                        $tbl_valid = "archived_validations";
                    }

                    $query = $conn->query("SELECT * FROM tbl_users INNER JOIN " . $tbl_valid . " ON tbl_users.user_id = " . $tbl_valid . ".user_id INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id LEFT JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id LEFT JOIN tbl_schedule ON tbl_users.user_id = tbl_schedule.user_id WHERE tbl_accounts.user_name ='$username'");
                    //end comment - lESTER

                    if ($query) {
                        global $v_status;
                        $row = $query->fetch_assoc();
                        $v_status = $row['v_status'];
                        $req_status = $row['req_status'];
                        $s_status = $row['s_status'];
                    }
                    ?>
                    <a id="aHome" class="nav-link text-white" <?php global $v_status;
                                                                if ($v_status == '' || $v_status == "PENDING" || $v_status == "DISQUALIFIED") {
                                                                    echo "style='pointer-events:none;opacity:0.5;'";
                                                                } else {
                                                                    echo "style='pointer-events:default;opacity:1;'";
                                                                } ?>
                        href="/thesis/userData/isf/isf-requirements.php"><i class=" fa fa-list "></i>
                        REQUIREMENTS </a>
                </li>
                <li class="nav-item">
                    <a id="aProducts" class="nav-link text-white" <?php global $req_status;
                                                                    global $s_status;
                                                                    if ($req_status == '' || $req_status == "PENDING" || $req_status == "DISQUALIFIED" || $s_status == "NOT ALLOCATED") {
                                                                        echo "style='pointer-events:none;opacity:0.5;'";
                                                                    } else {
                                                                        echo "style='pointer-events:default;opacity:1;'";
                                                                    } ?>
                        href="/thesis/userData/isf/isf-schedule.php"><i class=" fa fa-calendar "></i>
                        SCHEDULE </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="orderDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class=" fa fa-user "></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" id="dropdown" aria-labelledby="orderDropdown">
                        <li class="nav-item">
                            <a class="dropdown-item" id="aAccount" href="/thesis/userData/isf/isf-settings.php"><i
                                    class=" fa fa-gear "></i>
                                SETTINGS</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" id="aAccount" href="/thesis/userData/isf/isf-personal-info.php"><i
                                    class=" fa fa-gear "></i>
                                PERSONAL INFORMATION</a>
                        </li>
                        <li class="nav-item">
                            <a href="/thesis/logout.php" class=" dropdown-item logoutbtn"><i class="fa fa-sign-out"></i>
                                LOGOUT</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </nav>