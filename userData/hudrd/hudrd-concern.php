<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";
?>
<div class="ms-1 d-inline-flex p-2 border border-1 border-secondary text-white bg-primary"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;width: 99.50%;">
    <i class="ps-3 fa fa-2x fa-edit "></i>
    <h4 class="ps-3 w-25"> Feedback and Concerns</h4>
</div>
<div class=" ms-auto me-auto p-2 border border-1 border-secondary" style="width: 99.60%;">

    <?php if (isset($_SESSION['deleteConcernSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " style="width: 99.60%;" role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['deleteConcernSuccess'];
                unset($_SESSION['deleteConcernSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <div class="bg-light  me-auto ms-auto border-1 border-secondary border">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-group p-2">
                <input type="text" name="searchKey" value="<?php if (isset($_POST['searchKey'])) {
                                                                echo $_POST['searchKey'];
                                                            } ?>" id="" class="form-control" placeholder="Search">
                <input type="submit" name="submitSearch" value="Search" class=" btn btn-primary w-25">
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <table class=" table table-hover word-wrap w-100" id="example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sender</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        require_once '../../includes/conn.php';
                        if (isset($_POST['submitSearch'])) {
                            $searchName = $conn->real_escape_string($_POST['searchKey']);


                            $query = "SELECT * FROM tbl_concern WHERE f_id LIKE '%$searchName%' OR fname LIKE '%$searchName%' OR  lname LIKE '%$searchName%' OR  ename LIKE '%$searchName%' OR  mname LIKE '%$searchName%' OR CONCAT( fname,' ', lname) LIKE '%$searchName%' OR CONCAT(fname,' ',lname,' ',ename) LIKE '%$searchName%' OR c_status LIKE '%$searchName%'";

                            $result = $conn->query($query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?php echo $row['f_id'] ?></td>
                            <td><?php echo $row['fname'] . " " . $row['ename'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['c_status'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/concernModal.php" ?>
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

                            $query = $conn->query("SELECT * FROM tbl_concern");

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) :
                            ?>
                        <tr>
                            <td><?php echo $row['f_id'] ?></td>
                            <td><?php echo $row['fname'] . " " . $row['ename'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['c_status'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/concernModal.php" ?>
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