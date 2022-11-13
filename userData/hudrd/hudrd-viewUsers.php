<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";
?>

<div class=" bg-primary d-inline-flex w-100 p-2 border border-1 border-secondary text-white"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;">
    <i class="ps-3 fa fa-2x fa-edit "></i>
    <h4 class="ps-3 w-50"> VIEW USER LIST</h4>
</div>
<div class="bg-light  me-auto ms-auto border-1 border-secondary border" style="min-height: 72vh;">

    <?php if (isset($_SESSION['deleteUserSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['deleteUserSuccess'];
                unset($_SESSION['deleteUserSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['updateUserDetailSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['updateUserDetailSuccess'];
                unset($_SESSION['updateUserDetailSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-3">
        <div class="input-group p-2">
            <input type="text" name="searchKey" id="" class="form-control" placeholder="Search Name or Username"
                value="<?php if (isset($_POST['searchKey'])) {
                                                                                                                            echo $_POST['searchKey'];
                                                                                                                        } ?>">
            <input type="text" name="barangay_filter" value="<?php if (isset($_POST['barangay_filter'])) {
                                                                    echo $_POST['barangay_filter'];
                                                                } ?>" id="" class="form-control"
                placeholder="Search Barangay">
            <select name="user_type_filter" class="form-select" id="">
                <?php
                if (isset($_POST['user_type_filter'])) {
                    if (($_POST['user_type_filter']) == "") {
                        echo '<option class="" value="">--Select User Type--</option>';
                    } else {
                        echo '<option class="" hidden selected value="' . $_POST['user_type_filter'] . '">' . $_POST['user_type_filter'] . '</option>';
                        echo '<option class="" value="">--Select User Type--</option>';
                    }
                } else {
                    echo '<option class="" value="">--Select User Type--</option>';
                }
                ?>

                <option class="" value="ADMIN">ADMIN</option>
                <option class="" value="EMPLOYEE">EMPLOYEE</option>
                <option class="" value="ISF">ISF</option>
            </select>
            <input type="submit" name="submitSearch" value="Search" class=" btn btn-primary">
        </div>
    </form>
    <hr>
    <!-- dito initially yung div  -->
    <div class="card">
        <div class="card-body ">
            <table class=" table table-hover table-striped  table-responsive nowrap w-100" id="example">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Barangay</th>
                        <th>User Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../../includes/conn.php';
                    if (isset($_POST['submitSearch'])) {
                        $searchName = $conn->real_escape_string($_POST['searchKey']);
                        $searchBarangay = $conn->real_escape_string($_POST['barangay_filter']);
                        $searchType = $conn->real_escape_string($_POST['user_type_filter']);

                        $sql = "SELECT tbl_users.user_id,tbl_users.fname,tbl_users.mname,tbl_users.lname,tbl_users.ename,tbl_users.detailed_add,tbl_users.barangay,tbl_users.city,tbl_users.gender,tbl_users.bday,tbl_users.age,tbl_users.contact_no,tbl_users.email,tbl_users.user_type,tbl_accounts.user_name,tbl_employees.job_position,tbl_employees.job_description,tbl_employees.hire_date,tbl_employees.salary FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id LEFT OUTER JOIN tbl_employees ON tbl_users.user_id = tbl_employees.user_id";

                        $condition = array();

                        if (!empty($searchName)) {

                            array_push($condition, "(tbl_users.fname LIKE '%$searchName%' OR tbl_users.lname LIKE '%$searchName%' OR tbl_users.ename LIKE '%$searchName%' OR tbl_accounts.user_name LIKE '%$searchName%' OR CONCAT(fname,' ',lname) LIKE '%$searchName%' OR CONCAT(fname,' ',lname,' ',ename) LIKE '%$searchName%' )");
                        }
                        if (!empty($searchBarangay)) {
                            array_push($condition, "tbl_users.barangay LIKE '%$searchBarangay%' ");
                        }
                        if (!empty($searchType)) {
                            array_push($condition, "tbl_users.user_type = '$searchType'");
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
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['fname'] . " " . $row['lname'] . " " . $row['ename'] ?></td>
                        <td><?php echo $row['detailed_add'] ?></td>
                        <td><?php echo $row['barangay'] ?></td>
                        <td><?php echo $row['user_type'] ?></td>
                        <td class="text-center">
                            <?php include "../../includes/viewUserListModal.php" ?>
                        </td>
                    </tr>
                    <?php

                            endwhile;
                        } else {
                            echo '<td colspan="5" class=" text-danger text-center">
                    NO RECORDS FOUND
                    </td>';
                        }
                        ?>

                    <?php
                    } else {

                        $query = $conn->query("SELECT tbl_users.user_id,tbl_users.fname,tbl_users.mname,tbl_users.lname,tbl_users.ename,tbl_users.detailed_add,tbl_users.barangay,tbl_users.city,tbl_users.gender,tbl_users.bday,tbl_users.age,tbl_users.contact_no,tbl_users.email,tbl_users.user_type,tbl_accounts.user_name,tbl_employees.job_position,tbl_employees.job_description,tbl_employees.hire_date,tbl_employees.salary FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id LEFT OUTER JOIN tbl_employees ON tbl_users.user_id = tbl_employees.user_id");

                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) :
                        ?>
                    <tr>
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['fname'] . " " . $row['lname'] . " " . $row['ename'] ?></td>
                        <td><?php echo $row['detailed_add'] ?></td>
                        <td><?php echo $row['barangay'] ?></td>
                        <td><?php echo $row['user_type'] ?></td>
                        <td class="text-center">
                            <?php include "../../includes/viewUserListModal.php" ?>
                        </td>

                    </tr>

                    <?php

                            endwhile;
                        } else {
                            echo '<td colspan="5" class=" text-danger text-center">
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
            "className": "dt-center",
            targets: "_all"
        }, {
            orderable: false,
            targets: -1
        }],
        fixedColumns: true,
    });
    $('.dataTables_scrollBody').css('min-height', '300px');
});
</script>
<?php include '../../includes/footer.php'; ?>