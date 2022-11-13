<?php
include "../../php_actions/sign-in.php";
isLoggedIn();

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
    <!-- Website Icon -->
    <link rel="shortcut icon" href="../images/logos/bacoor-logo.png" type="image/x-icon" />
    <!-- font awesome -->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <!--data tables-->
    <link rel="stylesheet" href="../../dataTables/datatable_css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../dataTables/datatable_css/responsive.dataTables.min.css">
    <!-- NOFITY  ALERT CSS -->


    <!-- NOTIFY ALERT JS -->

    <!-- bootstrap js -->
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <style>
    @media print {
        #print {
            display: none;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" style="max-width:100vw ;">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="homeDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class=" fa fa-home "></i> HOME
                        <span class="concern1">
                        </span>
                    </a>
                    <ul class="dropdown-menu" id="dropdown" aria-labelledby="homeDropdown">
                        <li>
                            <hr class="dropdown-divider" />

                        </li>
                        <li>
                            <a id="" class="dropdown-item" href="/thesis/userData/hudrd/hudrd-home.php">DASHBOARD
                            </a>
                        </li>
                        <li>
                            <a id="concern" class="dropdown-item"
                                href="/thesis/userData/hudrd/hudrd-concern.php">CONCERNS
                                <span class="concern"></span>
                            </a>

                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="orderDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class=" fa fa-cart-plus "></i> MANAGE
                        USERS<span class=" notif1">
                        </span>
                    </a>
                    <ul class="dropdown-menu" id="dropdown" aria-labelledby="orderDropdown">
                        <li>
                            <hr class="dropdown-divider" />

                        </li>
                        <li>
                            <a id="aAddHome" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                                    echo "style='display:none'";
                                                } ?> class="dropdown-item"
                                href="/thesis/userData/hudrd/hudrd-add-users.php">ADD
                                USERS </a>
                        </li>
                        <li>
                            <a id="manage3" class="dropdown-item"
                                href="/thesis/userData/hudrd/hudrd-manageApplication.php">MANAGE
                                USER APPLICATIONS<span class=" notif"></span></a>
                        </li>
                        <li>
                            <a id="aManageHome" class="dropdown-item"
                                href="/thesis/userData/hudrd/hudrd-viewUsers.php">VIEW USERS</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a id="aHome" class="nav-link text-white" href="/thesis/userData/hudrd/hudrd-relocationArea.php"><i
                            class=" fa fa-location-arrow "></i> RELOCATION
                        AREAS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="categoryDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class=" fa fa-list "></i> CATEGORY
                        <span class=" requirement1">
                        </span>
                    </a>
                    <ul class="dropdown-menu" id="dropdown" aria-labelledby="categoryDropdown">
                        <li>
                            <hr class="dropdown-divider" />

                        </li>
                        <li>
                            <a id="" class="dropdown-item" href="/thesis/userData/hudrd/hudrd-validation.php">FOR
                                VALIDATION </a>
                        </li>
                        <li>
                            <a id="requirement" class="dropdown-item"
                                href="/thesis/userData/hudrd/hudrd-manageRequirements.php">FOR
                                REQUIREMENT <span class=" requirement"></span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a id="aProducts" class="nav-link text-white" href="/thesis/userData/hudrd/hudrd-schedule.php"><i
                            class=" fa fa-calendar "></i> SCHEDULE </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-white" id="aReport" href="/thesis/userData/hudrd/hudrd-report.php"><i
                            class=" fa fa-file"></i> REPORT</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="reportDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class=" fa fa-file "></i> REPORT
                    </a>
                    <ul class="dropdown-menu" id="dropdown" aria-labelledby="reportDropdown">
                        <li>
                            <hr class="dropdown-divider" />

                        </li>
                        <li>
                            <a id="" class="dropdown-item text-uppercase"
                                href="/thesis/userData/hudrd/hudrd-report-RA.php">
                                Relocation Area </a>
                        </li>
                        <li>
                            <a id="" class="dropdown-item text-uppercase"
                                href="/thesis/userData/hudrd/hudrd-report-Vali.php">
                                Validation</a>
                        </li>
                        <li>
                            <a id="" class="dropdown-item text-uppercase"
                                href="/thesis/userData/hudrd/hudrd-report-Req.php">
                                Requirements </a>
                        </li>
                        <li>
                            <a id="" class="dropdown-item text-uppercase"
                                href="/thesis/userData/hudrd/hudrd-report-Sched.php">
                                Schedule</a>
                        </li>
                        <li>
                            <a id="" class="dropdown-item text-uppercase"
                                href="/thesis/userData/hudrd/hudrd-report-Comp.php">
                                Comprehensive</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="orderDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class=" fa fa-user "></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" id="dropdown" aria-labelledby="orderDropdown">
                        <li class="nav-item">
                            <a class="dropdown-item" id="aAccount" href="/thesis/userData/hudrd/hudrd-settings.php"><i
                                    class=" fa fa-gear "></i>
                                SETTINGS</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" id="aAccount"
                                href="/thesis/userData/hudrd/hudrd-personal-info.php"><i class=" fa fa-user"></i>
                                PERSONAL INFORMATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" id="aAccount" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                                                        echo "style='display:none'";
                                                                    } ?>
                                href="/thesis/userData/hudrd/hudrd-BackupRestore.php"><i class=" fa fa-save"></i>
                                BACKUP</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>


    <!-- NOTIFY ALERT -->