<?php
require dirname(__DIR__) . '../includes/conn.php';

if (!isset($_SESSION)) {
	session_start();
}
$errors   = array();


if (isset($_POST['btn-login'])) {
	global $errors;

	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['pass']);
	$checkPass = "";

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}


	if (count($errors) == 0) {

		$checkUsername = $conn->query("SELECT * FROM tbl_accounts WHERE user_name = '$username'");

		if ($checkUsername) {
			while ($rowUser = mysqli_fetch_assoc($checkUsername)) {
				$checkPass = $rowUser['password'];
			}

			if (password_verify($password, $checkPass)) {
				$password_hashed = password_hash($password, PASSWORD_DEFAULT);

				$query = $conn->query("SELECT tbl_accounts.acc_id,tbl_accounts.user_name, tbl_users.user_type,tbl_users.barangay FROM tbl_accounts INNER JOIN tbl_users ON tbl_accounts.user_id=tbl_users.user_id WHERE user_name='$username'");




				if (mysqli_num_rows($query) == 1) {

					$value = $query->fetch_assoc();
					// eto dinagdag ko para makuha yung user id username kasi yung nageget sa query nento
					$_SESSION['userID'] = $value['user_id'];

					$logged_in_user = $value['user_name'];
					$logged_in_user_type = $value['user_type'];
					$barangay = $value['barangay'];
					$_SESSION['usertype'] = $logged_in_user_type;
					$_SESSION['username'] = $logged_in_user;
					$_SESSION['barangay'] = $barangay;
					$i = 0;
					unset($_SESSION['login_attempt']);
					if ($logged_in_user_type == "ADMIN" || $logged_in_user_type == "EMPLOYEE") {
						header('location:../userData/hudrd/hudrd-home.php');
					} else {
						header('location:../userData/isf/isf-home.php');
					}
				} else {
					array_push($errors, "Wrong username/password combination");
					$_SESSION['login_attempt'] += 1;
				}
			} else {
				array_push($errors, "Wrong username/password combination");
				$_SESSION['login_attempt'] += 1;
			}
		} else {
			array_push($errors, "Wrong username/password combination");
			$_SESSION['login_attempt'] += 1;
		}
	}
}



function display_error()
{
	global $errors;

	if (count($errors) > 0) {
		echo '<div style="background:white;margin-bottom:20px;margin-top:-20px" class=" error text-center">';
		foreach ($errors as $error) {
			echo '<span class="text-danger">' . $error . '</span>';
		}
		echo '</div>';
	}
}

function isLoggedIn()
{

	if (!isset($_SESSION['username'])) {
		echo "<script> alert('You must log in first'); window.location.href='../multi-user-login.php' </script>";
	}
}