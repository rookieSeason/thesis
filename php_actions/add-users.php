<?php
require "../includes/conn.php";
session_start();



if (isset($_POST['submitFile'])) {

    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $extension = explode('.', $name);
    $ext = strtolower(end($extension));

    if (isset($name)) {
        if ($ext == "csv") {
            if (!empty($name)) {
                $file = fopen($_FILES['file']['tmp_name'], "r");

                if ($file) {
                    fgetcsv($file, 10000, ",");

                    while (($csv = fgetcsv($file, 10000, ",")) !== false) {
                        $fname = $csv[0];
                        $mname = $csv[1];
                        $lname = $csv[2];
                        $ename = $csv[3];
                        $detAdd = $csv[4];
                        $brgy = $csv[5];
                        $city = $csv[6];


                        $query1 = "INSERT INTO tbl_users(user_id, fname, mname, lname,ename, detailed_add, barangay, city, user_type)  VALUES ('','$fname','$mname','$lname','$ename','$detAdd','$brgy','$city','ISF')";
                        $result1 = mysqli_query($conn, $query1);
                    }
                    $_SESSION['nMessage']  = ["ISF users successfully added!", "success"];
                    header("location: ../userData/hudrd/hudrd-add-users.php");
                } else {
                    echo "wrong file";
                }
            }
        } else {
            $_SESSION['nMessage']  = ["Wrong file type", "error"];
            header("location: ../userData/hudrd/hudrd-add-users.php");
        }
    }
}

if (isset($_POST['submitNewEmployee'])) {
    $fname = $conn->real_escape_string($_POST['fname']);
    $mname = $conn->real_escape_string($_POST['mname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $ename = $conn->real_escape_string($_POST['ename']);
    $detAdd = $conn->real_escape_string($_POST['detAdd']);
    $brgy = $conn->real_escape_string($_POST['brgy']);
    $city = $conn->real_escape_string($_POST['city']);
    $sex = $conn->real_escape_string($_POST['sex']);
    $age = $conn->real_escape_string($_POST['age']);
    $bday = $conn->real_escape_string($_POST['bday']);
    $f_bday = date('Y-m-d', strtotime($bday));
    $contact = $conn->real_escape_string($_POST['contact']);
    $email = $conn->real_escape_string($_POST['email']);
    $position = $conn->real_escape_string($_POST['position']);
    $description = $conn->real_escape_string($_POST['description']);
    $hire_date = $conn->real_escape_string($_POST['hire_date']);
    $f_hire_date = date('Y-m-d', strtotime($hire_date));
    $salary = $conn->real_escape_string($_POST['salary']);
    $user_type = $conn->real_escape_string($_POST['user_type']);
    $username = $fname . $lname . '_';

    $query1 = $conn->query("INSERT INTO tbl_users VALUES ('','$fname','$mname','$lname','$ename','$detAdd','$brgy','$city','$sex','$age','$f_bday','$contact','$email','$user_type')");

    $last_id = $conn->insert_id;
    $pass = $username . $last_id;
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    $query2 = $conn->query("INSERT INTO tbl_accounts VALUES ('','$username$last_id','$hashed_pass','$last_id')");

    $query3 = $conn->query("INSERT INTO tbl_employees VALUES ('','$position','$description','$f_hire_date','$salary','$last_id' )");

    $_SESSION['success']  = "User successfully created!";
    header("location: ../userData/hudrd/hudrd-add-users.php");
}