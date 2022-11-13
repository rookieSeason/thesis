<?php
require "../includes/conn.php";
session_start();

if (isset($_POST['submitUpdateReq'])) {
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $age = $conn->real_escape_string($_POST['age']);
    $valid1 = $conn->real_escape_string($_POST['valid1']);
    $valid2 = $conn->real_escape_string($_POST['valid2']);
    $b1 = $conn->real_escape_string($_POST['b1']);
    $b2 = $conn->real_escape_string($_POST['b2']);
    $b3 = $conn->real_escape_string($_POST['b3']);
    $inc_emp = $conn->real_escape_string($_POST['inc_emp']);
    $fam = $conn->real_escape_string($_POST['fam']);
    $co_mar = $conn->real_escape_string($_POST['co_mar']);
    $trans = $conn->real_escape_string($_POST['trans']);
    $nha = $conn->real_escape_string($_POST['nha']);

    $req_valid_id1 = $_FILES['req_valid_id1'];
    $req_valid_id1name = $_FILES['req_valid_id1']['name'];
    $req_valid_id1tmp =  $_FILES['req_valid_id1']['tmp_name'];
    $req_valid_id1size =  $_FILES['req_valid_id1']['size'];
    $req_valid_id1extension = explode('.', $req_valid_id1name);
    $req_valid_id1_ext = strtolower(end($req_valid_id1extension));

    $req_valid_id2 = $_FILES['req_valid_id2'];
    $req_valid_id2name = $_FILES['req_valid_id2']['name'];
    $req_valid_id2tmp =  $_FILES['req_valid_id2']['tmp_name'];
    $req_valid_id2size =  $_FILES['req_valid_id2']['size'];
    $req_valid_id2extension = explode('.', $req_valid_id2name);
    $req_valid_id2_ext = strtolower(end($req_valid_id2extension));

    $req_birthcert = $_FILES['req_birthcert'];
    $req_birthcert_name = $_FILES['req_birthcert']['name'];
    $req_birthcert_tmp =  $_FILES['req_birthcert']['tmp_name'];
    $req_birthcert_size =  $_FILES['req_birthcert']['size'];
    $req_birthcert_extension = explode('.', $req_birthcert_name);
    $req_birthcert_ext = strtolower(end($req_birthcert_extension));

    $req_birthcert_partner = $_FILES['req_birthcert_partner'];
    $req_birthcert_partner_name = $_FILES['req_birthcert_partner']['name'];
    $req_birthcert_partner_tmp =  $_FILES['req_birthcert_partner']['tmp_name'];
    $req_birthcert_partner_size =  $_FILES['req_birthcert_partner']['size'];
    $req_birthcert_partner_extension = explode('.', $req_birthcert_partner_name);
    $req_birthcert_partner_ext = strtolower(end($req_birthcert_partner_extension));

    $req_birthcert_fam = $_FILES['req_birthcert_fam'];
    $req_birthcert_fam_name = $_FILES['req_birthcert_fam']['name'];
    $req_birthcert_fam_tmp =  $_FILES['req_birthcert_fam']['tmp_name'];
    $req_birthcert_fam_size =  $_FILES['req_birthcert_fam']['size'];
    $req_birthcert_fam_extension = explode('.', $req_birthcert_fam_name);
    $req_birthcert_fam_ext = strtolower(end($req_birthcert_fam_extension));

    $req_income_or_employment = $_FILES['req_income_or_employment'];
    $req_income_or_employment_name = $_FILES['req_income_or_employment']['name'];
    $req_income_or_employment_tmp =  $_FILES['req_income_or_employment']['tmp_name'];
    $req_income_or_income_employment_size =  $_FILES['req_income_or_employment']['size'];
    $req_income_or_employment_extension = explode('.', $req_income_or_employment_name);
    $req_income_or_income_employment_ext = strtolower(end($req_income_or_employment_extension));

    $req_family_pic = $_FILES['req_family_pic'];
    $req_family_pic_name = $_FILES['req_family_pic']['name'];
    $req_family_pic_tmp =  $_FILES['req_family_pic']['tmp_name'];
    $req_family_pic_size =  $_FILES['req_family_pic']['size'];
    $req_family_pic_extension = explode('.', $req_family_pic_name);
    $req_family_pic_ext = strtolower(end($req_family_pic_extension));

    $req_cohab_or_marriage = $_FILES['req_cohab_or_marriage'];
    $req_cohab_or_marriage_name = $_FILES['req_cohab_or_marriage']['name'];
    $req_cohab_or_marriage_tmp =  $_FILES['req_cohab_or_marriage']['tmp_name'];
    $req_cohab_or_marriage_size =  $_FILES['req_cohab_or_marriage']['size'];
    $req_cohab_or_marriage_extension = explode('.', $req_cohab_or_marriage_name);
    $req_cohab_or_marriage_ext = strtolower(end($req_cohab_or_marriage_extension));

    $req_affi_transfer = $_FILES['req_affi_transfer'];
    $req_affi_transfer_name = $_FILES['req_affi_transfer']['name'];
    $req_affi_transfer_tmp =  $_FILES['req_affi_transfer']['tmp_name'];
    $req_affi_transfer_size =  $_FILES['req_affi_transfer']['size'];
    $req_affi_transfer_extension = explode('.', $req_affi_transfer_name);
    $req_affi_transfer_ext = strtolower(end($req_affi_transfer_extension));


    $req_nha_form = $_FILES['req_nha_form'];
    $req_nha_form_name = $_FILES['req_nha_form']['name'];
    $req_nha_form_tmp =  $_FILES['req_nha_form']['tmp_name'];
    $req_nha_form_size =  $_FILES['req_nha_form']['size'];
    $req_nha_form_extension = explode('.', $req_nha_form_name);
    $req_nha_form_ext = strtolower(end($req_nha_form_extension));

    if (
        ($req_valid_id1_ext == "pdf" || $req_valid_id1_ext == "") &&
        ($req_valid_id2_ext == "pdf" || $req_valid_id2_ext == "") &&
        ($req_birthcert_ext == "pdf" || $req_birthcert_ext == "") &&
        ($req_birthcert_partner_ext == "pdf" || $req_birthcert_partner_ext == "") &&
        ($req_birthcert_fam_ext == "pdf" || $req_birthcert_fam_ext == "") &&
        ($req_income_or_income_employment_ext == "pdf" || $req_income_or_income_employment_ext == "") && ($req_family_pic_ext == "pdf" || $req_family_pic_ext == "" || $req_family_pic_ext == "png" || $req_family_pic_ext == "jpeg" || $req_family_pic_ext == "jpg") &&
        ($req_cohab_or_marriage_ext == "pdf" || $req_cohab_or_marriage_ext == "") &&
        ($req_affi_transfer_ext  == "pdf" || $req_affi_transfer_ext  == "") &&
        ($req_nha_form_ext == "pdf" || $req_nha_form_ext == "")
    ) {
        if (
            $req_valid_id1size < 500000 && $req_valid_id2size < 500000 && $req_birthcert_size < 500000 && $req_birthcert_partner_size < 500000 && $req_birthcert_fam_size  < 500000 &&
            $req_income_or_income_employment_size  < 500000 && $req_family_pic_size  < 500000 && $req_cohab_or_marriage_size  < 500000 && $req_affi_transfer_size  < 500000 && $req_nha_form_size < 500000
        ) {

            $completeFiles = 0;
            $username = $_SESSION['username'];
            $getID = $conn->query("SELECT tbl_users.user_id FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE tbl_accounts.user_name = '$username'");
            $user_id;
            if (mysqli_num_rows($getID) == 1) {
                $dir_name = "../requirement_files/" . $username . "/";
                if (!is_dir($dir_name)) {
                    mkdir($dir_name, 0777, true);
                }

                if (!empty($valid1)) {
                    $req_valid_id1_unique = $valid1;
                    $completeFiles++;
                } else if (!empty($req_valid_id1)) {
                    if (file_exists("$dir_name$req_valid_id1name")) {
                        // $req_birthcert_partner_unique = $b1;
                        $req_valid_id1_unique = $valid1;
                    } else {
                        $req_valid_id1_unique = uniqid('validID1-', true) . '.' . $req_valid_id1_ext;
                        $fileDestination1 = "$dir_name$req_valid_id1_unique";
                        move_uploaded_file($req_valid_id1tmp, $fileDestination1);
                        $completeFiles++;
                    }
                } else {
                    $req_valid_id1_unique = "";
                }
                if (!empty($valid2)) {
                    $req_valid_id2_unique = $valid2;
                    $completeFiles++;
                } else if (!empty($req_valid_id2)) {
                    if (file_exists("$dir_name$req_valid_id2name")) {
                        $req_valid_id2_unique = $valid2;
                    } else {
                        $req_valid_id2_unique = uniqid('validID2-', true) . '.' . $req_valid_id2_ext;
                        $fileDestination2 = "$dir_name$req_valid_id2_unique";
                        move_uploaded_file($req_valid_id2tmp, $fileDestination2);
                        $completeFiles++;
                    }
                } else {
                    $req_valid_id2_unique = "";
                }

                if (!empty($b1)) {
                    $req_birthcert_unique = $b1;
                    $completeFiles++;
                } else if (!empty($req_birthcert)) {
                    if (file_exists("$dir_name$req_birthcert_name")) {
                        $req_birthcert_unique = $b1;
                    } else {
                        $req_birthcert_unique = uniqid('birthcert-', true) . '.' . $req_birthcert_ext;
                        $fileDestination3 = "$dir_name$req_birthcert_unique";
                        move_uploaded_file($req_birthcert_tmp, $fileDestination3);
                        $completeFiles++;
                    }
                } else {
                    $req_birthcert_unique = "";
                }

                if (!empty($b2)) {
                    $req_birthcert_partner_unique = $b2;
                    $completeFiles++;
                } else if (!empty($req_birthcert_partner)) {
                    if (file_exists("$dir_name$req_birthcert_partner_name")) {
                        $req_birthcert_partner_unique = $b2;
                    } else {
                        $req_birthcert_partner_unique = uniqid('birthcertPartner-', true) . '.' . $req_birthcert_partner_ext;
                        $fileDestination4 = "$dir_name$req_birthcert_partner_unique";
                        move_uploaded_file($req_birthcert_partner_tmp, $fileDestination4);
                        $completeFiles++;
                    }
                } else {
                    $req_birthcert_partner_unique = "";
                }



                if (!empty($b3)) {
                    $req_birthcert_fam_unique = $b3;
                    $completeFiles++;
                } else if (!empty($req_birthcert_fam)) {
                    if (file_exists("$dir_name$req_birthcert_fam_name")) {
                        $req_birthcert_fam_unique = $b3;
                    } else {
                        $req_birthcert_fam_unique = uniqid('birthcertFam-', true) . '.' . $req_birthcert_fam_ext;
                        $fileDestination5 = "$dir_name$req_birthcert_fam_unique";
                        move_uploaded_file($req_birthcert_fam_tmp, $fileDestination5);
                        $completeFiles++;
                    }
                } else {
                    $req_birthcert_fam_unique = "";
                }

                if (!empty($inc_emp)) {
                    $req_income_or_employment_unique = $inc_emp;
                    $completeFiles++;
                } else if (!empty($req_income_or_employment)) {
                    if (file_exists("$dir_name$req_income_or_employment_name")) {
                        $req_income_or_employment_unique = $inc_emp;
                    } else {
                        $req_income_or_employment_unique = uniqid('incOrEmp-', true) . '.' . $req_income_or_income_employment_ext;
                        $fileDestination6 = "$dir_name$req_income_or_employment_unique";
                        move_uploaded_file($req_income_or_employment_tmp, $fileDestination6);
                        $completeFiles++;
                    }
                } else {
                    $req_income_or_employment_unique = "";
                }


                if (!empty($fam)) {
                    $req_family_pic_unique = $fam;
                    $completeFiles++;
                } else if (!empty($req_family_pic)) {
                    if (file_exists("$dir_name$req_family_pic_name")) {
                        $req_family_pic_unique = $fam;
                    } else {
                        $req_family_pic_unique = uniqid('familyPic-', true) . '.' . $req_family_pic_ext;
                        $fileDestination7 = "$dir_name$req_family_pic_unique";
                        move_uploaded_file($req_family_pic_tmp, $fileDestination7);
                        $completeFiles++;
                    }
                } else {
                    $req_family_pic_unique = "";
                }


                if (!empty($co_mar)) {
                    $req_cohab_or_marriage_unique = $co_mar;
                    $completeFiles++;
                } else if (!empty($req_cohab_or_marriage)) {
                    if (file_exists("$dir_name$req_cohab_or_marriage_name")) {
                        $req_cohab_or_marriage_unique = $co_mar;
                    } else {
                        $req_cohab_or_marriage_unique = uniqid('cohabOrMar-', true) . '.' . $req_cohab_or_marriage_ext;
                        $fileDestination8 = "$dir_name$req_cohab_or_marriage_unique";
                        move_uploaded_file($req_cohab_or_marriage_tmp, $fileDestination8);
                        $completeFiles++;
                    }
                } else {
                    $req_cohab_or_marriage_unique = "";
                }

                if (!empty($trans)) {
                    $req_affi_transfer_unique = $trans;
                    $completeFiles++;
                } else if (!empty($req_affi_transfer)) {
                    if (file_exists("$dir_name$req_affi_transfer_name")) {
                        $req_affi_transfer_unique = $trans;
                    } else {
                        $req_affi_transfer_unique = uniqid('transfer-', true) . '.' . $req_affi_transfer_ext;
                        $fileDestination9 = "$dir_name$req_affi_transfer_unique";
                        move_uploaded_file($req_affi_transfer_tmp, $fileDestination9);
                        $completeFiles++;
                    }
                } else {
                    $req_affi_transfer_unique = "";
                }

                if (!empty($nha)) {
                    $req_nha_form_unique = $nha;
                    $completeFiles++;
                } else if (!empty($req_nha_form)) {
                    if (file_exists("$dir_name$req_nha_form_name")) {
                        $req_nha_form_unique = $nha;
                    } else {
                        $req_nha_form_unique = uniqid('nhaForm-', true) . '.' . $req_nha_form_ext;
                        $fileDestination10 = "$dir_name$req_nha_form_unique";
                        move_uploaded_file($req_nha_form_tmp, $fileDestination10);
                        $completeFiles++;
                    }
                } else {
                    $req_nha_form_unique = "";
                }

                if ($age < 60) {
                    if ($completeFiles == 9) {
                        $req_complete = 1;
                    } else {
                        $req_complete = 0;
                    }
                } else {
                    if ($completeFiles == 10) {
                        $req_complete = 1;
                    } else {
                        $req_complete = 0;
                    }
                }

                $value = $getID->fetch_assoc();

                $user_id = $value['user_id'];

                $query = $conn->query("UPDATE tbl_requirements SET req_valid_id1='$req_valid_id1_unique',req_valid_id2='$req_valid_id2_unique',req_birthcert='$req_birthcert_unique',req_birthcert_partner='$req_birthcert_partner_unique',req_birthcert_fam='$req_birthcert_fam_unique',req_income_or_employment='$req_income_or_employment_unique',req_family_pic='$req_family_pic_unique',req_cohab_or_marriage='$req_cohab_or_marriage_unique',req_affi_transfer='$req_affi_transfer_unique',req_nha_form='$req_nha_form_unique',req_complete='$req_complete', req_status ='PENDING' WHERE req_id = '$req_id'");

                if ($query) {
                    $_SESSION['nMessage']  = ["Files are successfully uploaded!", "success"];
                    header("location: ../userData/isf/isf-requirements.php");
                } else {
                    echo mysqli_error($conn);
                }
            } else {
                echo "user not found";
            }
        } else {
            $_SESSION['nMessage']  = ["All files must be 5mb or less.", "error"];
            header("location: ../userData/isf/isf-requirements.php");
        }
    } else {
        $_SESSION['nMessage']  = ["All files must be .pdf format.", "error"];
        header("location: ../userData/isf/isf-requirements.php");
    }
}

//resubmit files
if (isset($_POST['resubmit_valid_id1'])) {
    $valid1 = $conn->real_escape_string($_POST['valid1']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $valid1;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete1 = $conn->query("UPDATE tbl_requirements SET req_valid_id1 = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $valid1 has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_valid_id2'])) {
    $valid2 = $conn->real_escape_string($_POST['valid2']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $valid2;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete2 = $conn->query("UPDATE tbl_requirements SET req_valid_id2 = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $valid2 has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_birthcert'])) {
    $b1 = $conn->real_escape_string($_POST['b1']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $b1;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete3 = $conn->query("UPDATE tbl_requirements SET req_birthcert = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $b1 has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_birthcert_partner'])) {
    $b2 = $conn->real_escape_string($_POST['b2']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $b2;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete4 = $conn->query("UPDATE tbl_requirements SET req_birthcert_partner = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $b2 has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_birthcert_fam'])) {
    $b3 = $conn->real_escape_string($_POST['b3']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $b3;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete5 = $conn->query("UPDATE tbl_requirements SET req_birthcert_fam = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $b3 has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_income_or_employment'])) {
    $inc_emp = $conn->real_escape_string($_POST['inc_emp']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $inc_emp;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete6 = $conn->query("UPDATE tbl_requirements SET req_income_or_employment = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $inc_emp has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_family_pic'])) {
    $fam = $conn->real_escape_string($_POST['fam']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $fam;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete7 = $conn->query("UPDATE tbl_requirements SET req_family_pic = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $fam has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_cohab_or_marriage'])) {
    $co_mar = $conn->real_escape_string($_POST['co_mar']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $co_mar;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete8 = $conn->query("UPDATE tbl_requirements SET req_cohab_or_marriage = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $co_mar has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_affi_transfer'])) {
    $trans = $conn->real_escape_string($_POST['trans']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $trans;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete9 = $conn->query("UPDATE tbl_requirements SET req_affi_transfer = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $trans has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}

if (isset($_POST['resubmit_nha_form'])) {
    $nha = $conn->real_escape_string($_POST['nha']);
    $req_id = $conn->real_escape_string($_POST['req_id']);
    $username =  $_SESSION['username'];
    $dir_name = "../requirement_files/" . $username . "/";
    $file_dir = $dir_name . $nha;
    if (file_exists("$file_dir")) {
        unlink("$file_dir");
        $delete9 = $conn->query("UPDATE tbl_requirements SET req_nha_form = '', req_status ='PENDING' WHERE req_id = '$req_id'");
        $_SESSION['resub'] = "The file $nha has been deleted. You can now upload the file again";
        header("location: ../userData/isf/isf-requirements.php");
    }
}