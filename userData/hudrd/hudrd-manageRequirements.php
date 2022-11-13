<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";
?>

<div class=" bg-primary d-inline-flex w-100 p-2 border border-1 border-secondary text-white"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;">
    <i class="ps-3 fa fa-2x fa-edit "></i>
    <h4 class="ps-3 w-50"> FOR REQUIREMENTS LIST</h4>
</div>
<div class="bg-light  me-auto ms-auto border-1 border-secondary border" style="min-height: 72vh;">

    <?php if (isset($_SESSION['deleteReqSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['deleteReqSuccess'];
                unset($_SESSION['deleteReqSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['declineReqSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['declineReqSuccess'];
                unset($_SESSION['declineReqSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['approveReqSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['approveReqSuccess'];
                unset($_SESSION['approveReqSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?><?php if (isset($_SESSION['remindReqSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " role="alert">

        <h6 class="text-success">
            <?php
                            echo $_SESSION['remindReqSuccess'];
                            unset($_SESSION['remindReqSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['remindReqFail'])) : ?>
    <br>
    <div class="alert alert-danger alert-dismissible " role="alert">

        <h6 class="text-danger">
            <?php
                echo $_SESSION['remindReqFail'];
                unset($_SESSION['remindReqFail']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-3">
        <div class="input-group p-2">
            <input type="text" name="searchKey" id="" value="<?php if (isset($_POST['searchKey'])) {
                                                                    echo $_POST['searchKey'];
                                                                } else {
                                                                    echo "";
                                                                } ?>" class="form-control" placeholder="Search name">
            <select name="barangay_filter" class="form-select" id="">
                <?php
                if (isset($_POST['barangay_filter'])) {
                    if (($_POST['barangay_filter']) == "") {
                        echo '<option class="" value="">--Select Barangay--</option>';
                    } else {
                        echo '<option class="" hidden selected value="' . $_POST['barangay_filter'] . '">' . $_POST['barangay_filter'] . '</option>';
                        echo '<option class="" value="">--Select Barangay--</option>';
                    }
                } else {
                    echo '<option class="" value="">--Select Barangay--</option>';
                }
                ?>
                <option value="Alima">Alima </option>
                <option value="Aniban I">Aniban I</option>
                <option value="Aniban II">Aniban II</option>
                <option value="Aniban III">Aniban III</option>
                <option value="Aniban IV">Aniban IV</option>
                <option value="Aniban V">Aniban V</option>
                <option value="Banalo">Banalo</option>
                <option value="Bayanan">Bayanan</option>
                <option value="Campo Santo">Campo Santo</option>
                <option value="Daang Bukid">Daang Bukid</option>

                <option value="Digman">Digman </option>
                <option value="Dulong Bayan">Dulong Bayan</option>
                <option value="Habay I">Habay I</option>
                <option value="Habay II">Habay II</option>
                <option value="Kaingin">Kaingin</option>
                <option value="Ligas I">Ligas I</option>
                <option value="Ligas II">Ligas II</option>
                <option value="Ligas III">Ligas III</option>
                <option value="Mabolo I">Mabolo I</option>
                <option value="Mabolo II">Mabolo II</option>

                <option value="Mabolo III">Mabolo III </option>
                <option value="Maliksi I">Maliksi I</option>
                <option value="Maliksi II">Maliksi II</option>
                <option value="Maliksi III">Maliksi III</option>
                <option value="Mambog I">Mambog I</option>
                <option value="Mambog II">Mambog II</option>
                <option value="Mambog III">Mambog III</option>
                <option value="Mambog IV">Mambog IV</option>
                <option value="Mambog V">Mambog V</option>
                <option value="Molino I">Molino I</option>

                <option value="Molino II">Molino II </option>
                <option value="Molino III">Molino III</option>
                <option value="Molino IV">Molino IV</option>
                <option value="Molino V">Molino V</option>
                <option value="Molino VI">Molino VI</option>
                <option value="Molino VII">Molino VII</option>
                <option value="Niog I">Niog I</option>
                <option value="Niog II">Niog II</option>
                <option value="Niog III">Niog III</option>
                <option value="P.F. Espiritu I (Panapaan)">P.F. Espiritu I (Panapaan)</option>

                <option value="P.F. Espiritu II">P.F. Espiritu II</option>
                <option value="P.F. Espiritu III">P.F. Espiritu III</option>
                <option value="P.F. Espiritu IV">P.F. Espiritu IV</option>
                <option value="P.F. Espiritu V">P.F. Espiritu V</option>
                <option value="P.F. Espiritu VI">P.F. Espiritu VI</option>
                <option value="P.F. Espiritu VII">P.F. Espiritu VII</option>
                <option value="P.F. Espiritu VIII">P.F. Espiritu VIII</option>
                <option value="Queens Row Central">Queens Row Central</option>
                <option value="Queens Row East">Queens Row East</option>
                <option value="Queens Row West">Queens Row West</option>

                <option value="Real I">Real I</option>
                <option value="Real II">Real II</option>
                <option value="Salinas I">Salinas I</option>
                <option value="Salinas II">Salinas II</option>
                <option value="Salinas III">Salinas III</option>
                <option value="Salinas IV">Salinas IV</option>
                <option value="San Nicolas I">San Nicolas I</option>
                <option value="San Nicolas II">San Nicolas II</option>
                <option value="San Nicolas III">San Nicolas III</option>
                <option value="Sineguelasan">Sineguelasan</option>



                <option value="Tabing Dagat">Tabing Dagat</option>
                <option value="Talaba I">Talaba I</option>
                <option value="Talaba II">Talaba II</option>
                <option value="Talaba III">Talaba III</option>
                <option value="Talaba IV">Talaba IV</option>
                <option value="Talaba V">Talaba V</option>
                <option value="Talaba VI">Talaba VI</option>
                <option value="Talaba VII">Talaba VII</option>
                <option value="Zapote I">Zapote I</option>
                <option value="Zapote II">Zapote II</option>

                <option value="Zapote III">Zapote III</option>
                <option value="Zapote IV">Zapote IV</option>
                <option value="Zapote V">Zapote V</option>
            </select>
            <select name="completion_type_filter" class="form-select" id="">
                <?php
                if (isset($_POST['completion_type_filter'])) {
                    if (($_POST['completion_type_filter']) == "") {
                        echo '<option class="" value="">--Select Completion Type--</option>';
                    } else {
                        if ($_POST['completion_type_filter'] == '0') {
                            echo '<option class="" hidden selected value="' . $_POST['completion_type_filter'] . '">INCOMPLETE</option>';
                            echo '<option class="" value="">--Select Completion Type--</option>';
                        } else {
                            echo '<option class="" hidden selected value="' . $_POST['completion_type_filter'] . '"> COMPLETE</option>';
                            echo '<option class="" value="">--Select Completion Type--</option>';
                        }
                    }
                } else {
                    echo '<option class="" value="">--Select Completion Type--</option>';
                }
                ?>
                <option class="" value="1">COMPLETE</option>
                <option class="" value="0">INCOMPLETE</option>
            </select>
            <select name="req_type_filter" class="form-select" id="">
                <?php
                if (isset($_POST['req_type_filter'])) {
                    if (($_POST['req_type_filter']) == "") {
                        echo '<option class="" value="">--Select Status Type--</option>';
                    } else {
                        echo '<option class="" hidden selected value="' . $_POST['req_type_filter'] . '">' . $_POST['req_type_filter'] . '</option>';
                        echo '<option class="" value="">--Select Status Type--</option>';
                    }
                } else {
                    echo '<option class="" value="">--Select Status Type--</option>';
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
    <div class="table-responsive" style="min-height: 50vh;">
        <div class="card">
            <div class="card-body">
                <table class=" table table-hover nowrap w-100" id="example">
                    <thead>
                        <tr>
                            <th>Validation Date</th>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Completion Type</th>
                            <th>Status Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../includes/conn.php';
                        if (isset($_POST['submitSearch'])) {
                            $searchName = $conn->real_escape_string($_POST['searchKey']);
                            $searchBarangay = $conn->real_escape_string($_POST['barangay_filter']);
                            $searchType = $conn->real_escape_string($_POST['completion_type_filter']);
                            $searchType2 = $conn->real_escape_string($_POST['req_type_filter']);
                            $sql = "SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id INNER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id";

                            $condition = array();

                            if (!empty($searchName)) {

                                array_push($condition, "(tbl_users.fname LIKE '%$searchName%' OR tbl_users.lname LIKE '%$searchName%' OR tbl_accounts.user_name LIKE '%$searchName%' OR CONCAT(tbl_users.fname,' ',tbl_users.lname) LIKE '%$searchName%' OR CONCAT(tbl_users.fname,' ',tbl_users.mname,' ',tbl_users.lname) LIKE '%$searchName%' OR CONCAT(fname,' ',lname,' ',ename) LIKE '%$searchName%')");
                            }
                            if (!empty($searchBarangay)) {
                                array_push($condition, "tbl_users.barangay LIKE '%$searchBarangay%' ");
                            }
                            if ($searchType == '1') {
                                array_push($condition, "tbl_requirements.req_complete = '$searchType'");
                            } else if ($searchType == '0') {
                                array_push($condition, "tbl_requirements.req_complete = '$searchType'");
                            }
                            if (!empty($searchType2)) {
                                array_push($condition, "tbl_requirements.req_status = '$searchType2'");
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
                            <td><?php echo $row['v_handled_date'] ?></td>
                            <td><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['ename'] ?>
                            </td>
                            <td><?php echo $row['barangay'] ?></td>
                            <td><?php if ($row['req_complete'] == 1) {
                                                echo "COMPLETE";
                                            } else {
                                                echo "INCOMPLETE";
                                            } ?></td>
                            <td>
                                <?php echo $row['req_status'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/requirementsModal.php" ?>
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

                            $query = $conn->query("SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id INNER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id");

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) :
                            ?>
                        <tr>
                            <td><?php echo $row['v_handled_date'] ?></td>
                            <td><?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['ename'] ?>
                            </td>
                            <td><?php echo $row['barangay'] ?></td>
                            <td><?php if ($row['req_complete'] == '1') {
                                                echo "COMPLETE";
                                            } else {
                                                echo "INCOMPLETE";
                                            } ?></td>
                            <td><?php echo $row['req_status'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/requirementsModal.php" ?>
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
</div>
<!-- <script src="../../dataTables/datatable_js/jquery-3.5.1.js"></script> -->
<script src="../../dataTables/datatable_js/jquery.dataTables.min.js"></script>
<script src="../../dataTables/datatable_js/dataTables.responsive.min.js"></script>


<script>
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true,
        "scrollY": '30vh',
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