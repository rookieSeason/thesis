<?php
include '../includes/conn.php';

if (!isset($_SESSION)) {
    session_start();
}



if (isset($_GET['restore_loc'])) {
    $_SESSION['nMessage'] = ["Database backup created successfully", "success"];


    //ENTER THE RELEVANT INFO BELOW
    $mysqlUserName      = "root";
    $mysqlPassword      = "";
    $mysqlHostName      = "localhost";
    $DbName             = "db_relocation";
    $file_location      = $_GET['restore_loc'];

    $output = exec("C:\\xampp\mysql\bin\mysql.exe --user={$mysqlUserName} --password={$mysqlPassword} --host={$mysqlHostName} $DbName < $file_location");
    header("location: ../userData/hudrd/hudrd-BackUpRestore.php");
}
if (isset($_GET['deleteID'])) {
    $id = $_GET['deleteID'];

    $getAddress = $conn->query("SELECT * FROM tbl_backups WHERE id = '$id' ");
    if (mysqli_num_rows($getAddress) == 1) {
        $row =  $getAddress->fetch_assoc();
        $dir_name = $row['file_loc'];
        if (file_exists($dir_name)) {
            unlink($dir_name);
        }
    }
    $query1 = $conn->query("DELETE FROM tbl_backups WHERE id = $id");

    if ($query1) {
        $_SESSION['nMessage']  = ["Backup file deleted successfully", "sucess"];
        header("location: ../userData/hudrd/hudrd-BackUpRestore.php");
    } else {
        $_SESSION['nMessage']  = ["Backup file deleted unsuccessfully", "error"];
        header("location: ../userData/hudrd/hudrd-BackUpRestore.php");
    }
}