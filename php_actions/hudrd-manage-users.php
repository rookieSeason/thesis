<?php
include '../includes/conn.php';

if (!isset($_SESSION)) {
    session_start();
}

//edit hudrd record
if (isset($_POST['submitEditEmployee'])) {
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $user_type = $conn->real_escape_string($_POST['user_type']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $mname = $conn->real_escape_string($_POST['mname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $ename = $conn->real_escape_string($_POST['ename']);
    $detailed_add = $conn->real_escape_string($_POST['detailed_add']);
    $barangay1 = $conn->real_escape_string($_POST['barangay1']);
    $city = $conn->real_escape_string($_POST['city']);
    $bday = $conn->real_escape_string($_POST['bday']);
    $age = $conn->real_escape_string($_POST['age']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $contact_no = $conn->real_escape_string($_POST['contact_no']);
    $email = $conn->real_escape_string($_POST['email']);
    $job_position = $conn->real_escape_string($_POST['job_position']);
    $job_description = $conn->real_escape_string($_POST['job_description']);
    $hire_date = $conn->real_escape_string($_POST['hire_date']);
    $salary = $conn->real_escape_string($_POST['salary']);

    $f_bday = date('Y-m-d', strtotime($bday));
    $f_hire_date = date('Y-m-d', strtotime($hire_date));

    $query = $conn->query("UPDATE tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id LEFT OUTER JOIN tbl_employees ON tbl_users.user_id = tbl_employees.user_id SET tbl_users.fname = '$fname',tbl_users.mname = '$mname',tbl_users.lname = '$lname',tbl_users.ename = '$ename',tbl_users.detailed_add = '$detailed_add',tbl_users.barangay = '$barangay1',tbl_users.city = '$city',tbl_users.gender = '$gender',tbl_users.age = '$age',tbl_users.bday = '$f_bday',tbl_users.contact_no = '$contact_no',tbl_users.email = '$email',tbl_users.user_type = '$user_type',tbl_employees.job_position = '$job_position',tbl_employees.job_description = '$job_description',tbl_employees.hire_date = '$f_hire_date',tbl_employees.salary = '$salary' WHERE tbl_users.user_id = $user_id") or die(mysqli_error($conn));

    if ($query) {
        $_SESSION['nMessage']  = ["User information updated successfully", "success"];
        header("location: ../userData/hudrd/hudrd-viewUsers.php");
    } else {
        echo mysqli_error($conn);
    }
}

//edit isf record

if (isset($_POST['submitEditUser'])) {
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $user_type = $conn->real_escape_string($_POST['user_type']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $mname = $conn->real_escape_string($_POST['mname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $ename = $conn->real_escape_string($_POST['ename']);
    $detailed_add = $conn->real_escape_string($_POST['detailed_add']);
    $barangay2 = $conn->real_escape_string($_POST['barangay2']);
    $upperBrgy = strtoupper($barangay2);
    $city = $conn->real_escape_string($_POST['city']);
    $bday = $conn->real_escape_string($_POST['bday']);
    $age = $conn->real_escape_string($_POST['age']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $contact_no = $conn->real_escape_string($_POST['contact_no']);
    $email = $conn->real_escape_string($_POST['email']);

    $f_bday = date('Y-m-d', strtotime($bday));

    $query = $conn->query("UPDATE tbl_users SET fname = '$fname',mname = '$mname',lname = '$lname',ename = '$ename',detailed_add = '$detailed_add',barangay = '$upperBrgy',city = '$city',gender = '$gender',age = '$age',bday = '$f_bday',contact_no = '$contact_no',email = '$email',user_type = '$user_type' WHERE user_id = $user_id") or die(mysqli_error($conn));

    if ($query) {
        $_SESSION['nMessage']  = ["User information updated successfully", "success"];
        header("location: ../userData/hudrd/hudrd-viewUsers.php");
    } else {
        echo mysqli_error($conn);
    }
}

//delete record
if (isset($_GET['deleteID'])) {
    $user_id = $_GET['deleteID'];

    $getUser = $conn->query("SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id WHERE tbl_validation.user_id = '$user_id' ");
    if (mysqli_num_rows($getUser) == 1) {
        $row =  $getUser->fetch_assoc();
        $username = $row['user_name'];
        $dir_name = "../validation_files/" . $username;
        if (is_dir($dir_name)) {
            array_map('unlink', glob("$dir_name/*.*"));
            rmdir($dir_name);
        }

        if ($row['v_status'] == "QUALIFIED") {

            $dir_name2 = "../requirement_files/" . $username;
            if (is_dir($dir_name2)) {
                array_map('unlink', glob("$dir_name2/*.*"));
                rmdir($dir_name2);
            }
        }
    }

    $query = $conn->query("INSERT INTO archived_users(fname, mname, lname,ename, detailed_add, barangay, city, gender, age, bday, contact_no, email, user_type, job_position, job_description, hire_date, salary, user_name, password, user_id) SELECT tbl_users.fname,tbl_users.mname,tbl_users.lname,tbl_users.ename,tbl_users.detailed_add,tbl_users.barangay,tbl_users.city,tbl_users.gender,tbl_users.age,tbl_users.bday,tbl_users.contact_no,tbl_users.email,tbl_users.user_type,tbl_employees.job_position,tbl_employees.job_description,tbl_employees.hire_date,tbl_employees.salary,tbl_accounts.user_name, tbl_accounts.password,tbl_users.user_id FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id LEFT OUTER JOIN tbl_employees ON tbl_users.user_id = tbl_employees.user_id WHERE tbl_users.user_id = $user_id");

    $query1 = $conn->query("DELETE FROM tbl_users WHERE user_id = $user_id");

    if ($query1) {
        $_SESSION['nMessage']  = ["User deleted successfully", "success"];
        header("location: ../userData/hudrd/hudrd-viewUsers.php");
    } else {
        header("location: ../userData/hudrd/hudrd-viewUsers.php");
    }
}