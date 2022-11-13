<?php
include '../../includes/header.php';
include "checkIfHudrdStaff.php";
if (isset($_GET['barangay'])) {
    $_SESSION['schedBarangay']  = $_GET['barangay'];
}

?>
<div class="bg-primary w-100 d-flex justify-content-end" id="goBack" style="height:9%">
    <button class="btn btn-close m-2 me-4 btn-close-white" onclick="goBack();"></button>
</div>
<script>
function addStyle() {
    var backBtn = document.getElementById("goBack");

    backBtn.style.position = "fixed";
    backBtn.style.top = "0";
    backBtn.style.opacity = "1";
    backBtn.style.zIndex = "10000";
}
</script>
<?php
if (isset($_GET['barangay'])) {
    echo "<script> addStyle(); </script>";
}
?>
<div class="ms-1 d-inline-flex p-2 border border-1 border-secondary text-white bg-primary"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;width: 99.50%;">
    <i class="ps-3 fa fa-2x fa-edit "></i>
    <h4 class="ps-3 w-25"> SCHEDULE LIST</h4>
</div>
<div class=" ms-auto me-auto p-2 border border-1 border-secondary" style="width: 99.60%;">
    <div class="bg-light  me-auto ms-auto border-1 border-secondary border">
        <?php if (isset($_SESSION['addSchedSuccess'])) : ?>
        <br>
        <div class="alert alert-success alert-dismissible " style="width: 99.60%;" role="alert">

            <h6 class="text-success">
                <?php
                    echo $_SESSION['addSchedSuccess'];
                    unset($_SESSION['addSchedSuccess']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <?php if (isset($_SESSION['addSchedFail'])) : ?>
        <br>
        <div class="alert alert-danger alert-dismissible " style="width: 99.60%;" role="alert">

            <h6 class="text-danger">
                <?php
                    echo $_SESSION['addSchedFail'];
                    unset($_SESSION['addSchedFail']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>

        <?php if (isset($_SESSION['EditSchedSuccess'])) : ?>
        <br>
        <div class="alert alert-success alert-dismissible " style="width: 99.60%;" role="alert">

            <h6 class="text-success">
                <?php
                    echo $_SESSION['EditSchedSuccess'];
                    unset($_SESSION['EditSchedSuccess']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <?php if (isset($_SESSION['EditSchedFail'])) : ?>
        <br>
        <div class="alert alert-danger alert-dismissible " style="width: 99.60%;" role="alert">

            <h6 class="text-danger">
                <?php
                    echo $_SESSION['EditSchedFail'];
                    unset($_SESSION['EditSchedFail']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <?php if (isset($_SESSION['markSuccess'])) : ?>
        <br>
        <div class="alert alert-success alert-dismissible " style="width: 99.60%;" role="alert">

            <h6 class="text-success">
                <?php
                    echo $_SESSION['markSuccess'];
                    unset($_SESSION['markSuccess']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <?php if (isset($_SESSION['deleteSchedSuccess'])) : ?>
        <br>
        <div class="alert alert-success alert-dismissible " style="width: 99.60%;" role="alert">

            <h6 class="text-success">
                <?php
                    echo $_SESSION['deleteSchedSuccess'];
                    unset($_SESSION['deleteSchedSuccess']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-group p-2">
                <input type="text" name="searchKey" value="<?php if (isset($_POST['searchKey'])) {
                                                                echo $_POST['searchKey'];
                                                            } ?>" id="" class="form-control"
                    placeholder="Search area name">
                <select name="user_type_filter" class="form-select" id="">
                    <?php
                    if (isset($_POST['user_type_filter'])) {
                        if (($_POST['user_type_filter']) == "") {
                            echo '<option class="" value="">--Select Status Type--</option>';
                        } else {
                            echo '<option class="" hidden selected value="' . $_POST['user_type_filter'] . '">' . $_POST['user_type_filter'] . '</option>';
                            echo '<option class="" value="">--Select Status Type--</option>';
                        }
                    } else {
                        echo '<option class="" value="">--Select Status Type--</option>';
                    }
                    ?>

                    <option class="" value="NOT ALLOCATED">NOT ALLOCATED</option>
                    <option class="" value="ALLOCATED">ALLOCATED</option>
                    <option class="" value="RELOCATED">RELOCATED</option>
                </select>
                <input type="submit" name="submitSearch" value="Search" class=" btn btn-primary w-25">
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <table class=" table table-hover  table-responsive word-wrap w-100" id="example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        require_once '../../includes/conn.php';
                        if (isset($_POST['submitSearch'])) {
                            $searchName = $conn->real_escape_string($_POST['searchKey']);
                            $searchType = $conn->real_escape_string($_POST['user_type_filter']);

                            $brgy = $_SESSION['schedBarangay'];
                            $sql = "select * from tbl_users INNER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id INNER JOIN tbl_schedule ON tbl_users.user_id = tbl_schedule.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id WHERE tbl_requirements.req_status = 'QUALIFIED' AND tbl_validation.v_status = 'QUALIFIED' AND tbl_users.barangay = '$brgy'";

                            $condition = array();

                            if (!empty($searchName)) {

                                array_push($condition, "(tbl_users.fname LIKE '%$searchName%' OR tbl_users.lname LIKE '%$searchName%' OR tbl_users.ename LIKE '%$searchName%' OR CONCAT(fname,' ',lname) LIKE '%$searchName%' OR CONCAT(fname,' ',lname,' ',ename) LIKE '%$searchName%' )");
                            }
                            if (!empty($searchType)) {
                                array_push($condition, "tbl_schedule.s_status = '$searchType'");
                            }

                            $query = $sql;

                            if (count($condition) > 0) {
                                $query .= "AND " . implode(' AND ', $condition);
                            }

                            $result = $conn->query($query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) :

                        ?>
                        <tr>
                            <td><?php echo $row['s_id'] ?></td>
                            <td><?php echo $row['fname'] . " " . $row['lname'] ?></td>
                            <td><?php echo $row['s_status'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/forSchedModal.php" ?>
                            </td>
                        </tr>
                        <?php

                                endwhile;
                            } else {
                                echo '<td colspan="4" class=" text-danger text-center">
            NO RECORDS FOUND
            </td>';
                            }
                            ?>

                        <?php
                        } else {
                            $brgy = $_SESSION['schedBarangay'];
                            $query = $conn->query("select * from tbl_users INNER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id  INNER JOIN tbl_schedule ON tbl_users.user_id = tbl_schedule.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id WHERE tbl_requirements.req_status = 'QUALIFIED' AND tbl_validation.v_status = 'QUALIFIED' AND tbl_users.barangay = '$brgy'");

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) :
                            ?>
                        <tr>
                            <td><?php echo $row['s_id'] ?></td>
                            <td><?php echo $row['fname'] . " " . $row['lname'] ?></td>
                            <td><?php echo $row['s_status'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/forSchedModal.php" ?>
                            </td>

                        </tr>

                        <?php

                                endwhile;
                            } else {
                                echo '<td colspan="4" class=" text-danger text-center">
            NO RECORDS FOUND
            </td>';
                            }
                        }
                        ?>

                    </tbody>


                </table>

            </div>
        </div>
    </div>
</div>
<!-- <script src="../../dataTables/datatable_js/jquery-3.5.1.js"></script> -->
<script src="../../dataTables/datatable_js/jquery.dataTables.min.js"></script>
<script src="../../dataTables/datatable_js/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true,
        "scrollY": '35vh',
        orderCellsTop: true,
        fixedHeader: true,
        sDom: 'lrtip',
        "responsive": false,
        "searching": false,
        columnDefs: [{
            "className": "dt-center",
            targets: "_all"
        }, {
            orderable: false,
            targets: -1
        }],
    });
    $('.dataTables_scrollBody').css('min-height', '300px');

});
</script>

<script>
function goBack() {
    window.location.href = 'hudrd-schedule.php';
}
</script>


<?php include '../../includes/footer.php'; ?>