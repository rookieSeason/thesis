<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";
?>

<div class=" bg-primary d-inline-flex w-100 p-2 border border-1 border-secondary text-white"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;">
    <i class="ps-3 fa fa-2x fa-edit "></i>
    <h4 class="ps-3 w-50">FOR VALIDATION LIST</h4>
</div>
<div class="bg-light  me-auto ms-auto border-1 border-secondary border" style="min-height: 72vh;">

    <?php if (isset($_SESSION['deleteValidationSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['deleteValidationSuccess'];
                unset($_SESSION['deleteValidationSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['approveValidSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['approveValidSuccess'];
                unset($_SESSION['approveValidSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['declineValidationSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['declineValidationSuccess'];
                unset($_SESSION['declineValidationSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-3">
        <div class="input-group p-2">
            <input type="text" name="searchKey" id="" class="form-control" value="<?php if (isset($_POST['searchKey'])) {
                                                                                        echo $_POST['searchKey'];
                                                                                    } ?>"
                placeholder="Search Name or Username">
            <input type="text" name="barangay_filter" id="" value="<?php if (isset($_POST['barangay_filter'])) {
                                                                        echo $_POST['barangay_filter'];
                                                                    } ?>" class="form-control"
                placeholder="Search Barangay">
            <select name="v_status_filter" class="form-select" id="">
                <?php
                if (isset($_POST['v_status_filter'])) {
                    if (($_POST['v_status_filter']) == "") {
                        echo '<option class="" value="">--Select Validation Status--</option>';
                    } else {
                        echo '<option class="" hidden selected value="' . $_POST['v_status_filter'] . '">' . $_POST['v_status_filter'] . '</option>';
                        echo '<option class="" value="">--Select Validation Status--</option>';
                    }
                } else {
                    echo '<option class="" value="">--Select Validation Status--</option>';
                }
                ?>
                <option class="" value="PENDING">PENDING</option>
                <option class="" value="QUALIFIED">QUALIFIED</option>
                <option class="" value="DISQUALIFIED">DISQUALIFIED</option>
            </select>
            <input type="submit" name="submitSearch" value="Search" class=" btn btn-primary">
        </div>
    </form>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-responsive nowrap w-100" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Barangay</th>
                        <th>Validation Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../../includes/conn.php';
                    if (isset($_POST['submitSearch'])) {
                        $searchName = $conn->real_escape_string($_POST['searchKey']);
                        $searchBarangay = $conn->real_escape_string($_POST['barangay_filter']);
                        $searchStatus = $conn->real_escape_string($_POST['v_status_filter']);

                        $sql = "SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id ";

                        $condition = array();

                        if (!empty($searchName)) {

                            array_push($condition, "(tbl_users.fname LIKE '%$searchName%' OR tbl_users.lname LIKE '%$searchName%' OR tbl_users.ename LIKE '%$searchName%' OR tbl_users.mname LIKE '%$searchName%' OR CONCAT(tbl_users.fname,' ',tbl_users.lname) LIKE '%$searchName%' OR CONCAT(fname,' ',lname,' ',ename) LIKE '%$searchName%')");
                        }
                        if (!empty($searchBarangay)) {
                            array_push($condition, "tbl_users.barangay LIKE '%$searchBarangay%' ");
                        }
                        if (!empty($searchStatus)) {
                            array_push($condition, "tbl_validation.v_status = '$searchStatus'");
                        }

                        $query = $sql;

                        if (count($condition) > 0) {
                            $query .= " WHERE " . implode(' AND ', $condition);
                        }


                        $result = $conn->query($query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = $result->fetch_assoc()) :
                    ?>
                    <tr>
                        <td><?php echo $row['v_id'] ?></td>
                        <td><?php echo $row['fname'] . " " . $row['lname'] . " " . $row['ename'] ?></td>
                        <td><?php echo $row['barangay'] ?></td>
                        <td><?php echo $row['v_status'] ?></td>
                        <td class="text-center">
                            <?php include "../../includes/validationModal.php" ?>
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

                        $query = $conn->query("SELECT * FROM tbl_users  INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id ");

                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) :
                        ?>
                    <tr>
                        <td><?php echo $row['v_id'] ?></td>
                        <td><?php echo $row['fname'] . " " . $row['lname'] . " " . $row['ename'] ?></td>
                        <td><?php echo $row['barangay'] ?></td>
                        <td><?php echo $row['v_status'] ?></td>
                        <td class="text-center">
                            <?php include "../../includes/validationModal.php" ?>
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

<!-- <script src="../../dataTables/datatable_js/jquery-3.5.1.js"></script> -->
<script src="../../dataTables/datatable_js/jquery.dataTables.min.js"></script>
<script src="../../dataTables/datatable_js/dataTables.responsive.min.js"></script>


<script>
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true,
        orderCellsTop: true,
        fixedHeader: true,
        sDom: 'lrtip',
        "responsive": false,
        "searching": false,
        columnDefs: [{
            orderable: false,
            targets: -1
        }],
    });
    $('.dataTables_scrollBody').css('min-height', '300px');

});
</script>
<?php include '../../includes/footer.php'; ?>