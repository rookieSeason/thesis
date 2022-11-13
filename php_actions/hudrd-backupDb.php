<?php
include '../includes/conn.php';

if (!isset($_SESSION)) {
    session_start();
}
$_SESSION['nMessage'] = ["Database backup created successfully", "success"];
//ENTER THE RELEVANT INFO BELOW
$mysqlUserName      = "root";
$mysqlPassword      = "";
$mysqlHostName      = "localhost";
$DbName             = "db_relocation";
$backup_dir        = "../backups/";
$backup_name = "dbRelocation_" . rand(1, 11111111) . ".sql";
$backup_dirname = $backup_dir . $backup_name;

$query = $conn->query("INSERT INTO tbl_backups VALUES('','$backup_name','$backup_dirname',CURRENT_TIMESTAMP())");


$output = exec("C:\\xampp\mysql\bin\mysqldump.exe --user={$mysqlUserName} --password={$mysqlPassword} --host={$mysqlHostName} $DbName --hex-blob --result-file={$backup_dirname} 2>&1");