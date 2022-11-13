<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['usertype'] != "ISF") {
    echo "<script> alert('Access Denied'); </script>";
    echo "<script> window.location.href='../hudrd/hudrd-home.php' </script>";
}