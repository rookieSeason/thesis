<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";
?>
<?php
$username = $_SESSION['username'];
require_once '../../includes/conn.php';
$query = $conn->query("SELECT tbl_users.user_id,tbl_users.fname,tbl_users.mname,tbl_users.lname,tbl_users.ename,tbl_users.detailed_add,tbl_users.barangay,tbl_users.city,tbl_users.gender,tbl_users.bday,tbl_users.age,tbl_users.contact_no,tbl_users.email,tbl_users.user_type,tbl_accounts.user_name,tbl_employees.job_position,tbl_employees.job_description,tbl_employees.hire_date,tbl_employees.salary FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id LEFT OUTER JOIN tbl_employees ON tbl_users.user_id = tbl_employees.user_id WHERE tbl_accounts.user_name = '$username'");

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) :
?>
<?php if (isset($_SESSION['updateHudrdInfoSuccess'])) : ?>
<br>
<div class="alert alert-success alert-dismissible " role="alert">

    <h6 class="text-success">
        <?php
                    echo $_SESSION['updateHudrdInfoSuccess'];
                    unset($_SESSION['updateHudrdInfoSuccess']);
                    ?>
    </h6>
    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
</div>
<?php endif ?>
<form action="../../php_actions/edit-personal-info.php" method="POST">
    <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
        style="min-height: 83vh; ">
        <h2 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
            EDIT PERSONAL INFORMATION</h2>
        <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">

        <br>

        <div class=" justify-content-evenly form-row text-start">
            <div class="form-group col-5 ">
                <label class=" form-label" for="">First Name <i class="text-danger">*</i></label>
                <input class="form-control" required name="fname" type="text" value="<?php echo $row['fname'] ?>">
            </div>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Middle Name</label>
                <input class="form-control" name="mname" type="text" value="<?php echo $row['mname'] ?>">
            </div>
        </div>
        <br>
        <div class=" justify-content-evenly form-row text-start">
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Last Name <i class="text-danger">*</i></label>
                <input class="form-control" required name="lname" type="text" value="<?php echo $row['lname'] ?>">
            </div>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Name Extension</label>
                <input class="form-control" name="ename" type="text" value="<?php echo $row['ename'] ?>">
            </div>
        </div>
        <br>
        <div class="form-row justify-content-evenly text-start">
            <div class="form-group col-3 ">
                <label class=" form-label" for="">House #/Blk/Lot/Subdivision <i class="text-danger">*</i></label>
                <input class="form-control" required name="detailed_add" type="text"
                    value="<?php echo $row['detailed_add'] ?>">
            </div>
            <div class="form-group col-3 ">
                <label style="overflow: hidden;" class=" form-label" for="">Barangay <i
                        class="text-danger">*</i></label>
                <input class="form-control" required name="barangay" type="text" value="<?php echo $row['barangay'] ?>">
            </div>
            <div class="form-group col-3 ">
                <label class=" form-label" for="">City <i class="text-danger">*</i></label>
                <input class="form-control" required name="city" type="text" value="<?php echo $row['city'] ?>">
            </div>
        </div>
        <br>
        <div class="form-row justify-content-evenly text-start">
            <div class="form-group col-3 ">
                <label class=" form-label" for="">Birth date <i class="text-danger">*</i></label>
                <input class="form-control" required onchange="fnCalculateAge();" id="bday" name="bday" type="date"
                    value="<?php echo $row['bday'] ?>">

            </div>
            <div class="form-group col-3 ">
                <label class=" form-label" for="">Age <i class="text-danger">*</i></label>
                <input class="form-control" readonly id="ageTotal" name="age" type="number"
                    value="<?php echo $row['age'] ?>">
            </div>
            <div class="form-group col-3 ">
                <label class=" form-label" for="">Sex <i class="text-danger">*</i></label>
                <select class="form-control form-select" required name="gender" id="" required>

                    <option <?php if ($row['gender'] == "Female") {
                                        echo "selected";
                                    } ?> value="Female">Female</option>
                    <option <?php if ($row['gender'] == "Male") {
                                        echo "selected";
                                    } ?> value="Male">Male</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row justify-content-evenly text-start">
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Contact Number <i class="text-danger">*</i></label>
                <input class="form-control" required pattern="^(09|\+639)\d{9}$"
                    title="Number must start with 09/+639 followed by 9 digits" name="contact_no" type="text"
                    value="<?php echo $row['contact_no'] ?>">
            </div>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Email <i class="text-danger">*</i></label>
                <input class="form-control" required name="email" type="text" value="<?php echo $row['email'] ?>">
            </div>
        </div>
        <br>
        <div class="form-row justify-content-evenly text-start">
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Job Position <i class="text-danger">*</i></label>
                <input class="form-control" name="job_position" required type="text"
                    value="<?php echo $row['job_position'] ?>">
            </div>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Job Description</label>
                <textarea name="job_description" id="" rows="2"
                    class=" form-control text-start"><?php echo $row['job_description'] ?></textarea>

            </div>
        </div>
        <br>
        <div class="form-row justify-content-evenly text-start" <?php if ($row['user_type'] === "ISF") {
                                                                            echo "style= 'display:none;'";
                                                                        } ?>>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Hire Date <i class="text-danger">*</i></label>
                <input class="form-control" name="hire_date" required type="date"
                    value="<?php echo $row['hire_date'] ?>">
            </div>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Salary <i class="text-danger">*</i></label>
                <input class="form-control" name="salary" required type="number" value="<?php echo $row['salary'] ?>">

            </div>
        </div>
        <br>
        <div class="text-center m-3">
            <input type="submit" class="col-lg-3 btn btn-success col-3 " name="submitHudrdEdit" value="SUBMIT">

        </div>

    </div>

    <?php
    endwhile;
}
    ?>
</form>
<script>
function fnCalculateAge() {

    var userDateinput = document.getElementById("bday").value;

    // convert user input value into date object
    var birthDate = new Date(userDateinput);

    // get difference from current date;
    var difference = Date.now() - birthDate.getTime();

    var ageDate = new Date(difference);
    var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);
    document.getElementById("ageTotal").value = calculatedAge;
}
</script>
<?php include '../../includes/footer.php'; ?>