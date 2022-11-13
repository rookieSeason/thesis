<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";

?>
<div class="w-100">
    <div class="container border1 w-100 mt-3">
        <h1 class="text-center pt-3">USER MANAGEMENT</h1>
        <br>


        <?php if (isset($_SESSION['success-add-isf'])) : ?>
        <br>
        <div class="alert alert-success alert-dismissible " role="alert">

            <h6 class="text-success">
                <?php
                    echo $_SESSION['success-add-isf'];
                    unset($_SESSION['success-add-isf']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <?php if (isset($_SESSION['error-ext'])) : ?>
        <br>
        <div class="alert alert-danger alert-dismissible " role="alert">

            <h6 class="text-danger">
                <?php
                    echo $_SESSION['error-ext'];
                    unset($_SESSION['error-ext']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <div class=" bg-secondary w-100 border-3">
            <form action="../../php_actions/add-users.php" method="POST" enctype="multipart/form-data" class="w-100">
                <div class="w-100 text-white text-center p-2">
                    <h3 class="pt-0 text-white text-start">ADD ISF USERS</h3>
                    <div class="bg-light w-100">
                        <hr><br>
                        <div class="text-start w-50 ms-auto me-auto">
                            <label class="form-label text-black" for="file">Upload CSV File: <i
                                    class="text-danger">*</i></label>
                        </div>

                        <input type="file" required accept=".csv"
                            class="w-50 btn bg-secondary text-white pb-2 form-control" name="file">
                        <br><br>
                        <input type="submit" class=" btn btn-success w-50 mb-3" name="submitFile" value="SUBMIT FILE">
                    </div>
                </div>

            </form>
        </div>

        <br><br>
        <?php if (isset($_SESSION['success'])) : ?>
        <br>
        <div class="alert alert-success alert-dismissible " role="alert">

            <h6 class="text-success">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <div class=" bg-secondary w-100 border-3">
            <form method="POST" action="../../php_actions/add-users.php" class="w-100">
                <div class="w-100 text-center p-2">
                    <h3 class="pt-0 text-white text-start">ADD EMPLOYEE</h2>

                        <div class="bg-light w-100 ">


                            <br>
                            <br>
                            <div class="form-row">
                                <h5 class="col-12 text-start ms-5 "> EMPLOYEE NAME <i class="text-danger">*</i></label>
                                </h5>
                                <span class="border-bottom border-3 col-11 mb-3 ms-auto me-auto"></span>
                                <div class="form-group col-lg-3 col-6">
                                    <input type="text" name="fname" required placeholder="First Name *"
                                        class="form-control w-75 ms-auto me-auto ">
                                </div>
                                <div class="form-group col-lg-3 col-6">
                                    <input type="text" name="mname" placeholder="Middle Name"
                                        class="form-control   w-75 ms-auto me-auto">
                                </div>
                                <div class="form-group col-lg-3 col-6">
                                    <input type="text" name="lname" required placeholder="Last Name *"
                                        class="form-control   w-75 ms-auto me-auto">
                                </div>
                                <div class="form-group col-lg-3 col-6">
                                    <input type="text" name="ename" placeholder="Name Extension"
                                        class="form-control   w-75 ms-auto me-auto">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <h5 class="col-12 text-start ms-5 "> EMPLOYEE ADDRESS <i class="text-danger">*</i></h5>
                                <span class="border-bottom border-3 col-11 mb-3 ms-auto me-auto"></span>
                                <div class="form-group col-4">
                                    <input type="text" name="detAdd" required
                                        placeholder="House #, Blk, Lot, Street, Subdivision"
                                        class="form-control  w-75 ms-auto me-auto">
                                </div>
                                <div class="form-group col-4">
                                    <input type="text" name="brgy" required placeholder="Barangay"
                                        class="form-control   w-75 ms-auto me-auto">
                                </div>
                                <div class="form-group col-4">
                                    <input type="text" name="city" required placeholder="City"
                                        class="form-control  w-75 ms-auto me-auto">
                                </div>
                            </div>
                            <br>
                            <div class="form-row text-start justify-content-around">
                                <span class="border-bottom border-3 col-11 mb-3 ms-auto me-auto"></span>
                                <div class="form-group col-3">
                                    <label for="sex" class=" form-label w-75 ms-auto me-auto">Sex <i
                                            class="text-danger">*</i></label>

                                </div>
                                <div class="form-group col-3">
                                    <label for="bday" class=" form-label  w-75 ms-auto me-auto">Birthday <i
                                            class="text-danger">*</i></label>
                                </div>
                                <div class="form-group col-3">
                                    <label for="age" class=" form-label  w-75 ms-auto me-auto">Age <i
                                            class="text-danger">*</i></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <select class="form-control form-select w-75 ms-auto me-auto" name="sex" id=""
                                        required>
                                        <option value="" selected disabled hidden>--SELECT--</option>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                    </select>

                                </div>
                                <div class="form-group col-4">
                                    <input type="date" onchange="fnCalculateAge()" id="bday" name="bday" required
                                        class="form-control w-75 ms-auto me-auto">
                                </div>
                                <div class="form-group col-4">
                                    <input type="text" name="age" readonly required id="ageTotal"
                                        class="form-control w-75 ms-auto me-auto">
                                </div>
                            </div>
                            <br>
                            <div class="form-row text-start">
                                <span class="border-bottom border-3 col-11 mb-3 ms-auto me-auto"></span>
                                <div class="form-group col-6 row justify-content-around">
                                    <label for="contact" class=" col-form-label col-8">Contact <i
                                            class="text-danger">*</i>
                                    </label>
                                    <div class="col-8">
                                        <input type="text" name="contact" pattern="^(09|\+639)\d{9}$" required
                                            title="Number must start with 09/+639 followed by 9 digits"
                                            class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-6 row justify-content-evenly">
                                    <label for="email" class=" col-form-label col-8">Email <i class="text-danger">*</i>
                                    </label>
                                    <div class=" col-8">
                                        <input type="email" name="email" required class="form-control">
                                    </div>
                                </div>
                                <span class="border-bottom border-3 col-11 mt-4 ms-auto me-auto"></span>

                            </div>

                            <br>
                            <div class="form-group row justify-content-evenly">


                                <label for="position" class=" col-form-label col-2">Job Position <i
                                        class="text-danger">*</i>
                                </label>
                                <div class=" col-8">
                                    <input type="text" name="position" required class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row justify-content-evenly">
                                <label for="description" class=" col-form-label col-2">Job Description</label>
                                <div class=" col-8">
                                    <textarea name="description" class=" form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="form-row text-start">
                                <span class="border-bottom border-3 col-11 mb-3 ms-auto me-auto"></span>
                                <div class="form-group col-6 row justify-content-around">
                                    <label for="contact" class=" col-form-label col-8">Hire Date <i
                                            class="text-danger">*</i>
                                    </label>
                                    <div class="col-8">
                                        <input type="date" name="hire_date" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-6 row justify-content-evenly">
                                    <label for="email" class=" col-form-label col-8">Salary <i class="text-danger">*</i>
                                    </label>
                                    <div class=" col-8">
                                        <input type="number" required name="salary" step="0.1" class="form-control">
                                    </div>
                                </div>
                                <span class="border-bottom border-3 col-11 mt-4 ms-auto me-auto"></span>

                            </div>


                            <br>
                            <div class="form-group row justify-content-evenly">
                                <label for="user_type" class=" col-form-label col-2">User Type <i
                                        class="text-danger">*</i>
                                </label>
                                <div class=" col-8">
                                    <select name="user_type" required class="form-control form-select">
                                        <option value="EMPLOYEE">EMPLOYEE</option>
                                        <option value="ADMIN">ADMIN</option>

                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <input type="submit" class=" btn btn-success w-50 mb-3" name="submitNewEmployee"
                                value="ADD EMPLOYEE">
                        </div>
                </div>

            </form>
        </div>
    </div>


</div>

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