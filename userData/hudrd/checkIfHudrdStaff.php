<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['usertype'] != "ADMIN" && $_SESSION['usertype'] != "EMPLOYEE") {
    echo "<script> alert('Access Denied'); </script>";
    echo "<script> window.location.href=' ../isf/isf-home.php' </script>";
}