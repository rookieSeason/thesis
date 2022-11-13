<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";
?>


<div class="ms-1 d-inline-flex p-2 border border-1 border-secondary text-white bg-primary"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;width: 99.50%;">
    <i class="ps-3 fa fa-2x fa-edit "></i>
    <h4 class="ps-3 w-25"> Relocation Areas</h4>
</div>
<div class=" ms-auto me-auto p-2 border border-1 border-secondary" style="width: 99.60%;">

    <div class="row justify-content-end">

        <br>






        <br>

        <a type="button" href="#"
            class="col-lg-3 col-md-5 col-sm-4  col-7 text-center text-decoration-none me-3 btn btn-primary"
            style="font-weight: 700;" data-bs-toggle="modal" data-bs-target="#addAreaModal"> <i class="fa fa-plus"></i>
            ADD RELOCATION AREA
        </a>
        <div class="modal fade" id="addAreaModal" tabindex="-1" role="dialog" aria-hidden="true"
            data-bs-keyboard="false" data-bs-backdrop="static">
            <div class=" modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header justify-content-between"
                        style=" background:linear-gradient(90deg,#a2beff,#be9cfe); ">
                        <h4 class="modal-title"> <i class="fa fa-plus-circle"></i> ADD RELOCATION AREA</h4>
                        <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="" action="../../php_actions/hudrd-manage-area.php">
                            <div class="form-row justify-content-center">

                                <div class="form-group text-start w-100">
                                    <label for="r_name" class=" form-label ms-5 ps-lg-5">Area Name: <i
                                            class="text-danger">*</i></label>
                                    <input type="text" required class="form-control w-75 ms-auto me-auto" name="r_name"
                                        placeholder="Area Name">
                                </div>
                                <br>
                                <div class="w-75 mt-2 form-row">
                                    <div class="form-group text-start col-6">
                                        <label for="r_primary_dev_contact" class=" form-label">
                                            City: <i class="text-danger">*</i></label>
                                        <select name="addCity" required class="form-control form-select" id="city1"
                                            onchange="populate(this.id,'brgy1');">
                                            <option selected value="">--SELECT--</option>
                                            <option value="ALFONSO">ALFONSO</option>
                                            <option value='AMADEO'>AMADEO</option>
                                            <option value='BACOOR CITY'>BACOOR CITY</option>
                                            <option value='CARMONA'>CARMONA</option>
                                            <option value='CAVITE CITY'>CAVITE CITY</option>
                                            <option value='DASMARIÑAS'>DASMARIÑAS</option>
                                            <option value='GEN. MARIANO ALVAREZ'>GEN. MARIANO ALVAREZ</option>
                                            <option value='GENERAL EMILIO AGUINALDO'>GENERAL EMILIO AGUINALDO</option>
                                            <option value='GENERAL TRIAS'>GENERAL TRIAS</option>
                                            <option value='IMUS CITY'>IMUS CITY</option>
                                            <option value='INDANG'>INDANG</option>
                                            <option value='KAWIT'>KAWIT</option>
                                            <option value='MAGALLANES'>MAGALLANES</option>
                                            <option value='MARAGONDON'>MARAGONDON</option>
                                            <option value='MENDEZ (MENDEZ-NUÑEZ)'>MENDEZ (MENDEZ-NUÑEZ)</option>
                                            <option value='NAIC'>NAIC</option>
                                            <option value='NOVELETA'>NOVELETA</option>
                                            <option value='ROSARIO'>ROSARIO</option>
                                            <option value='SILANG'>SILANG</option>
                                            <option value='TAGAYTAY CITY'>TAGAYTAY CITY</option>
                                            <option value='TANZA'>TANZA</option>
                                            <option value='TERNATE'>TERNATE</option>
                                            <option value='TRECE MARTIRES CITY'>TRECE MARTIRES CITY</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-start col-6">
                                        <label for="" class=" form-label ">
                                            Barangay: <i class="text-danger">*</i></label>
                                        <select name="addBrgy" class="form-control form-select" id="brgy1"></select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="form-row justify-content-center ">

                                <h4 class="w-75 col-12 ms-auto me-auto" style="border-bottom:1px solid gray ;">Primary
                                    Developer Details</h4>
                                <div class="form-group text-start col-12 w-75">
                                    <label for="r_primary_dev_name" class=" form-label ">
                                        Name: <i class="text-danger">*</i></label>
                                    <input type="text" required class="form-control ms-auto me-auto"
                                        name="r_primary_dev_name" placeholder="Primary Developer Name">
                                </div>

                                <div class="w-75 mt-2 form-row">
                                    <div class="form-group text-start col-6">
                                        <label for="r_primary_dev_contact" class=" form-label">
                                            Contact Number: <i class="text-danger">*</i></label>
                                        <input type="text" name="r_primary_dev_contact" pattern="^(09|\+639)\d{9}$"
                                            required title="Number must start with 09/+639 followed by 9 digits"
                                            class="form-control ms-auto me-auto"
                                            placeholder="Primary Developer Contact Number">
                                    </div>
                                    <div class="form-group text-start col-6">
                                        <label for="r_primary_dev_email" class=" form-label ">
                                            Email: <i class="text-danger">*</i></label>
                                        <input type="email" required class="form-control  ms-auto me-auto"
                                            name="r_primary_dev_email" placeholder="Primary Developer Email Address">
                                    </div>
                                </div>

                            </div>

                            <hr class="w-75 ms-auto me-auto">
                            <div class="form-group text-start w-100">
                                <label for="r_status" class=" form-label ms-5 ps-lg-5">Area Status: <i
                                        class="text-danger">*</i></label>
                                <select required name="r_status" id="" class="form-select w-75 ms-auto me-auto">
                                    <option value="" disabled selected hidden>--SELECT--</option>
                                    <option value="ONGOING RELOCATION">ONGOING RELOCATION</option>
                                    <option value="RELOCATION FINISHED">RELOCATION FINISHED</option>
                                </select>
                            </div>
                            <br>



                            <div class="form-row text-center">
                                <input type="submit" name="submitNewArea" value="ADD AREA"
                                    class="w-50 mt-2 ms-auto me-auto btn btn-success " />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <hr>

    <!-- display brands -->
    <div class="bg-light  me-auto ms-auto">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-group p-2">
                <input type="text" name="searchKey" value="<?php if (isset($_POST['searchKey'])) {
                                                                echo $_POST['searchKey'];
                                                            } ?>" id="" class="form-control"
                    placeholder="Search area name">
                <input type="submit" name="submitSearch" value="Search" class=" btn btn-primary w-25">
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <table class=" table table-hover table-responsive word-wrap w-100" id="example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Area Name</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        require_once '../../includes/conn.php';
                        if (isset($_POST['submitSearch'])) {
                            $searchName = $conn->real_escape_string($_POST['searchKey']);


                            $query = "SELECT * FROM tbl_relocation_area WHERE r_name LIKE '%$searchName%' OR r_location LIKE '%$searchName%' OR r_status LIKE '%$searchName%'";

                            $result = $conn->query($query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?php echo $row['r_id'] ?></td>
                            <td><?php echo $row['r_name'] ?></td>
                            <td><?php echo $row['r_location'] ?></td>
                            <td><?php echo $row['r_status'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/relocationAreaModal.php" ?>
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

                            $query = $conn->query("SELECT * FROM tbl_relocation_area");

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) :
                            ?>
                        <tr>
                            <td><?php echo $row['r_id'] ?></td>
                            <td><?php echo $row['r_name'] ?></td>
                            <td><?php echo $row['r_location'] ?></td>
                            <td><?php echo $row['r_status'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/relocationAreaModal.php" ?>
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

<script src="../../js/dropbrgy.js"></script>
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
    });
    $('.dataTables_scrollBody').css('min-height', '300px');

});
</script>
<?php include '../../includes/footer.php'; ?>