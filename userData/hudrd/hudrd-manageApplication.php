<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";

?>
<div class="content mb-0 p-1 bg-light border-1  border-dark border me-auto ms-auto justify-content-between"
    style="min-height: 75vh;">
    <div class=" bg-primary d-inline-flex w-100 p-2 border border-1 border-secondary text-white"
        style="border-top-left-radius: 10px;border-top-right-radius:10px;">
        <i class="ps-3 fa fa-2x fa-edit "></i>
        <h4 class="ps-3 w-50"> Manage User Registration Applications</h4>
    </div>
    <div class="col-lg-12 col-12">
        <?php if (isset($_SESSION['deleteRegSuccess'])) : ?>
        <br>
        <div class="alert alert-success alert-dismissible w-100 " role="alert">

            <h6 class="text-success">
                <?php
                    echo $_SESSION['deleteRegSuccess'];
                    unset($_SESSION['deleteRegSuccess']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style="font-size:small;"></button>
        </div>
        <?php endif ?>
        <?php if (isset($_SESSION['noUserMatchFound'])) : ?>
        <br>
        <div class="alert alert-danger alert-dismissible w-100 " role="alert">

            <h6 class="text-danger">
                <?php
                    echo $_SESSION['noUserMatchFound'];
                    unset($_SESSION['noUserMatchFound']);
                    ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style="font-size:small;"></button>
        </div>
        <?php endif ?>

        <?php if (isset($_SESSION['approvalSuccess'])) : ?>
        <br>
        <!-- <div class="alert alert-success alert-dismissible w-100 " role="alert">

            <h6 class="text-success">
                <?php
                // echo $_SESSION['approvalSuccess'];
                // unset($_SESSION['approvalSuccess']);
                ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style="font-size:small;"></button>
        </div> -->
        <?php endif ?>
        <?php if (isset($_SESSION['declineApplicationSuccess'])) : ?>
        <br>
        <!-- <div class="alert alert-success alert-dismissible w-100 " role="alert">

            <h6 class="text-success">
                <?php
                //echo $_SESSION['declineApplicationSuccess'];
                //unset($_SESSION['declineApplicationSuccess']);
                ?>
            </h6>
            <button type="button" data-bs-dismiss="alert" class="btn-close" style="font-size:small;"></button>
        </div> -->
        <?php endif ?>

        <div class="bg-light  me-auto ms-auto border-1 border-secondary border" style="min-height: 72vh;">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-3">
                <div class="input-group p-2">
                    <input type="text" name="searchKey" id="" class="form-control" value="<?php if (isset($_POST['searchKey'])) {
                                                                                                echo $_POST['searchKey'];
                                                                                            } else {
                                                                                                echo "";
                                                                                            } ?>" placeholder="Search">
                    <select name="barangay_filter" class="form-select" id="">
                        <?php
                        if (isset($_POST['barangay_filter'])) {
                            if (($_POST['barangay_filter']) == "") {
                                echo '<option class="" value="">--Select Barangay--</option>';
                            } else {
                                echo '<option class="" hidden value="' . $_POST['barangay_filter'] . '">' . $_POST['barangay_filter'] . '</option>';
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
                    <select name="status_filter" class="form-select" id="">
                        <?php
                        if (isset($_POST['status_filter'])) {
                            if (($_POST['status_filter']) == "") {
                                echo '<option class="" value="">--Select Status--</option>';
                            } else {
                                echo '<option class="" hidden selected value="' . $_POST['status_filter'] . '">' . $_POST['status_filter'] . '</option>';
                                echo '<option class="" value="">--Select Status--</option>';
                            }
                        } else {
                            echo '<option class="" value="">--Select Status--</option>';
                        }
                        ?>

                        <option class="" value="PENDING">PENDING</option>
                        <option class="" value="APPROVED">APPROVED</option>
                        <option class="" value="REJECTED">REJECTED</option>
                    </select>
                    <input type="submit" name="submitSearch" value="Search" class=" btn btn-primary">
                </div>
            </form>
            <hr>
            <!-- dito initially yung table without datatble -->
            <div class="card">

                <div class="card-body">
                    <table class="table table-hover  table-responsive nowrap w-100" id="example">

                        <thead class="">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Barangay</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once '../../includes/conn.php';
                            if (isset($_POST['submitSearch'])) {
                                $searchName = $conn->real_escape_string($_POST['searchKey']);
                                $searchBarangay = $conn->real_escape_string($_POST['barangay_filter']);
                                $searchStatus = $conn->real_escape_string($_POST['status_filter']);

                                $sql = "SELECT * FROM tbl_registration ";

                                $condition = array();

                                if (!empty($searchName)) {

                                    array_push($condition, "(first_name LIKE '%$searchName%' OR last_name LIKE '%$searchName%' OR ext_name LIKE '%$searchName%' OR CONCAT(first_name,' ',last_name) LIKE '%$searchName%' OR CONCAT(first_name,' ',last_name,' ',ext_name) LIKE '%$searchName%')");
                                }
                                if (!empty($searchBarangay)) {
                                    array_push($condition, "barangay = '$searchBarangay'");
                                }
                                if (!empty($searchStatus)) {
                                    array_push($condition, "reg_status = '$searchStatus'");
                                }

                                $query = $sql;

                                if (count($condition) > 0) {
                                    $query .= " WHERE " . implode(' AND ', $condition);
                                }


                                $result = $conn->query($query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = $result->fetch_assoc()) :
                            ?>
                            <tr id="hello">

                                <td><?php echo $row['reg_id'] ?></td>
                                <td><?php echo $row['first_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'] ?>
                                </td>
                                <td><?php echo $row['barangay'] ?></td>
                                <td><?php echo $row['reg_status'] ?></td>
                                <td>
                                    <?php include "../../includes/applicationModal.php" ?>
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

                                $query = $conn->query("SELECT * FROM tbl_registration");

                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_array($query)) :
                                ?>
                            <tr>
                                <td><?php echo $row['reg_id'] ?></td>
                                <td><?php echo $row['first_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'] ?>
                                </td>
                                <td><?php echo $row['barangay'] ?></td>
                                <td><?php echo $row['reg_status'] ?></td>
                                <td class=" text-center">
                                    <?php include "../../includes/applicationModal.php" ?>
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
        "responsive": false,
        "searching": false,
        columnDefs: [{
            "className": "dt-center",
            targets: "_all"
        }, {
            orderable: false,
            select: true,
            targets: -1
        }],
        fixedColumns: true
    });

});
</script>



<?php include '../../includes/footer.php'; ?>