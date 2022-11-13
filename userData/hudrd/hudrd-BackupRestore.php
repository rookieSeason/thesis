<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";
?>




<div class="ms-1 d-inline-flex p-2 border border-1 border-secondary text-white bg-primary"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;width: 99.50%;">
    <i class="ps-3 fa fa-2x fa-save "></i>
    <h4 class="ps-3 w-25"> Backup and Restore</h4>
</div>
<div class="ms-1  border border-1 border-secondary mb-5" style="width: 99.50%;height:70vh;">
    <?php if (isset($_SESSION['backupSuccess1'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " style="width: 99.50%;" role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['backupSuccess1'];
                unset($_SESSION['backupSuccess1']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['restoreSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " style="width: 99.50%;" role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['restoreSuccess'];
                unset($_SESSION['restoreSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>
    <?php if (isset($_SESSION['deleteBackupSuccess'])) : ?>
    <br>
    <div class="alert alert-success alert-dismissible " style="width: 99.50%;" role="alert">

        <h6 class="text-success">
            <?php
                echo $_SESSION['deleteBackupSuccess'];
                unset($_SESSION['deleteBackupSuccess']);
                ?>
        </h6>
        <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
    </div>
    <?php endif ?>

    <div class="row justify-content-end ms-auto me-auto " style="width: 99.50%;">
        <a href="../../php_actions/hudrd-backupDb.php"
            class="col-lg-3 col-md-5 col-sm-4  col-7 text-center mt-2 text-decoration-none btn btn-primary"
            style="font-weight: 700;margin-right:50px"> <i class="fa fa-save"></i>
            BACKUP DATABASE
        </a>
    </div>

    <hr>

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
                <table class=" table table-hover word-wrap w-100" id="example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Backup Name</th>
                            <th>Backup Date</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        require_once '../../includes/conn.php';
                        if (isset($_POST['submitSearch'])) {
                            $searchName = $conn->real_escape_string($_POST['searchKey']);


                            $query = "SELECT * FROM tbl_backups WHERE id LIKE '%$searchName%' OR file_name LIKE '%$searchName%' OR filedate LIKE '%$searchName%'";

                            $result = $conn->query($query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['file_name'] ?></td>
                            <td><?php echo $row['filedate'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/restoreModal.php" ?>
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

                            $query = $conn->query("SELECT * FROM tbl_backups");

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) :
                            ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['file_name'] ?></td>
                            <td><?php echo $row['filedate'] ?></td>
                            <td class="text-center">
                                <?php include "../../includes/restoreModal.php" ?>
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
<br>

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