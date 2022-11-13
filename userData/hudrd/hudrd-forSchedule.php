<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";
?>
<div class="bg-primary w-100 d-flex justify-content-end" style="position:absolute ; top:0; z-index:10000000;height:9%">
    <button class="btn btn-close m-2 me-4 btn-close-white" onclick="goBack();"></button>
</div>

<div class="ms-1 d-inline-flex p-2 border border-1 border-secondary text-white bg-primary"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;width: 99.50%;">
    <i class="ps-3 fa fa-2x fa-edit "></i>
    <h4 class="ps-3 w-25"> Relocation Areas</h4>
</div>
<div class=" ms-auto me-auto p-2 border border-1 border-secondary" style="width: 99.60%;">
    <div class="bg-light  me-auto ms-auto border-1 border-secondary border">

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
                <table class=" table table-hover  table-responsive word-wrap w-100" id="example">
                    <thead>
                        <tr>
                            <th>Barangay</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        require_once '../../includes/conn.php';
                        if (isset($_POST['submitSearch'])) {
                            $searchName = $conn->real_escape_string($_POST['searchKey']);


                            $query = "select * from tbl_users INNER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id WHERE tbl_requirements.req_status = 'PENDING' AND tbl_validation.v_status = 'QUALIFIED' AND tbl_users.barangay LIKE '%$searchName%' group by barangay";

                            $result = $conn->query($query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?php echo $row['barangay'] ?></td>
                            <td class="text-center">
                                <a href="hudrd-schedList.php?<?php echo $row['barangay'] ?>"
                                    class="btn p-2 m-0 btn-primary w-75">
                                    VIEW
                                </a>
                            </td>
                        </tr>
                        <?php

                                endwhile;
                            } else {
                                echo '<td colspan="2" class=" text-danger text-center">
            NO RECORDS FOUND
            </td>';
                            }
                            ?>

                        <?php
                        } else {

                            $query = $conn->query("select * from tbl_users INNER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id WHERE tbl_requirements.req_status = 'PENDING' AND tbl_validation.v_status = 'QUALIFIED' group by barangay");

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) :
                            ?>
                        <tr>
                            <td><?php echo $row['barangay'] ?></td>
                            <td class="text-center">
                                <a href="hudrd-schedList.php?<?php echo $row['barangay'] ?>"
                                    class="btn p-2 m-0 btn-primary w-75">
                                    VIEW
                                </a>
                            </td>

                        </tr>

                        <?php

                                endwhile;
                            } else {
                                echo '<td colspan="2" class=" text-danger text-center">
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
        orderCellsTop: true,
        fixedHeader: true,
        sDom: 'lrtip',
        "responsive": false,
        "searching": false,
        columnDefs: [{
            "className": "dt-left",
            targets: "_all",
        }, {
            orderable: false,
            targets: -1
        }]
    });

});
</script>
<script>
function goBack() {
    window.location.href = 'hudrd-schedule.php';
}
</script>

<?php include '../../includes/footer.php'; ?>