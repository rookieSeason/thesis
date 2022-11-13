<?php include "../../includes/isf-header.php";
include "checkIfIsf.php";
if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto" style="min-height: 30vh; ">
    <h3 class="p-3 text-danger border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
        NOTICE:</h3>
    <br>
    <div class="text-center">
        <h6><i>Congratulations on being considered eligible for the relocation program of the Bacoor Local government.
                However, due to limited resources and high demand of housing allocation, it is imperative for us to make
                sure that you are truly qualified for the relocation. Please answer all the forms honestly and pass all
                requirements that you need to submit as stated on this webpage. </i></h6>
    </div>

</div>

<?php
require_once '../../includes/conn.php';
$username = $_SESSION['username'];
$query = $conn->query("SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE tbl_accounts.user_name = '$username'");

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) :
?>
<div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto" style="min-height: 83vh; ">
    <h3 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
        Personal Information of user # <?php echo $row['user_id'] ?></h3>
    <br>
    <div class=" justify-content-evenly form-row text-start">
        <div class="form-group col-5 ">
            <label class=" form-label" for="">Username</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['user_name'] ?>">
        </div>
        <div class="form-group col-5 ">
            <label class=" form-label" for="">User Type</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['user_type'] ?>">
        </div>

    </div>
    <br>
    <div class=" justify-content-evenly form-row text-start">
        <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 ">
            <label class=" form-label" for="">First Name</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['fname'] ?>">
        </div>
        <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 ">
            <label class=" form-label" for="">Middle Name</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['mname'] ?>">
        </div>
        <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 ">
            <label class=" form-label" for="">Last Name</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['lname'] ?>">
        </div>
    </div>
    <br>
    <div class="form-row justify-content-evenly text-start">
        <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 ">
            <label class=" form-label" for="">House #/Blk/Lot/Subdivision</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['detailed_add'] ?>">
        </div>
        <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 ">
            <label style="overflow: hidden;" class=" form-label" for="">Barangay</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['barangay'] ?>">
        </div>
        <div class="form-group col-10 col-sm-10 col-md-3 col-lg-3 ">
            <label class=" form-label" for="">City</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['city'] ?>">
        </div>
    </div>
    <br>
    <div class="form-row justify-content-evenly text-start">
        <div class="form-group col-3 ">
            <label class=" form-label" for="">Birth date</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['bday'] ?>">
        </div>
        <div class="form-group col-3 ">
            <label class=" form-label" for="">Age</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['age'] ?>">
        </div>
        <div class="form-group col-3 ">
            <label class=" form-label" for="">Sex</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['gender'] ?>">
        </div>
    </div>
    <br>
    <div class="form-row justify-content-evenly text-start">
        <div class="form-group col-10 col-sm-5 col-md-5 col-lg-5 ">
            <label class=" form-label" for="">Contact Number</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['contact_no'] ?>">
        </div>
        <div class="form-group col-10 col-sm-5 col-md-5 col-lg-5  ">
            <label class=" form-label" for="">Email</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['email'] ?>">
        </div>
    </div>
    <br>
    <div class="form-row justify-content-evenly text-start" <?php if ($row['user_type'] === "ISF") {
                                                                        echo "style= 'display:none;'";
                                                                    } ?>>
        <div class="form-group col-5 ">
            <label class=" form-label" for="">Job Position</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['job_position'] ?>">
        </div>
        <div class="form-group col-5 ">
            <label class=" form-label" for="">Job Description</label>
            <textarea readonly name="" id="" rows="2"
                class=" form-control text-start"><?php echo $row['job_description'] ?></textarea>

        </div>
    </div>
    <br>
    <div class="form-row justify-content-evenly text-start" <?php if ($row['user_type'] === "ISF") {
                                                                        echo "style= 'display:none;'";
                                                                    } ?>>
        <div class="form-group col-5 ">
            <label class=" form-label" for="">Hire Date</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['hire_date'] ?>">
        </div>
        <div class="form-group col-5 ">
            <label class=" form-label" for="">Salary</label>
            <input class="form-control" readonly type="text" value="<?php echo $row['salary'] ?>">

        </div>
    </div>
    <br>
</div>

<?php
    endwhile;
} else {
    echo '<h3 class=" text-danger text-center">
                    NO RECORDS FOUND
                    </h3>';
}
?>

<?php include "../../includes/footer.php" ?>