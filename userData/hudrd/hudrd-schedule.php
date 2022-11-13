<?php include '../../includes/header.php';
include "checkIfHudrdStaff.php";

?>
<div class=" bg-primary d-inline-flex w-100 p-2 border border-1 border-secondary text-white"
    style="border-top-left-radius: 10px;border-top-right-radius:10px;">
    <i class="ps-3 fa fa-2x fa-edit "></i>
    <h4 class="ps-3 w-50"> BARANGAY LIST</h4>
</div>

<div class="bg-light  me-auto ms-auto border-1 border-secondary border" style="min-height: 72vh;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-3">
        <div class="input-group p-2">
            <input type="text" name="searchKey" id="" value="<?php if (isset($_POST['searchKey'])) {
                                                                    echo $_POST['searchKey'];
                                                                } else {
                                                                    echo "";
                                                                } ?>" class="form-control"
                placeholder="Search barangay">
            <input type="submit" name="submitSearch" value="Search" class=" btn btn-primary">
        </div>
    </form>
    <hr>
    <div class="table-responsive" style="min-height: 50vh;">
        <div class=" card w-100">
            <div class="card-body">
                <table class=" table table-hover  table-responsive nowrap" id="example">
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
                            $query = "select * from tbl_users INNER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id WHERE tbl_requirements.req_status = 'QUALIFIED' AND tbl_validation.v_status = 'QUALIFIED' AND tbl_users.barangay LIKE '%$searchName%' group by barangay";

                            $result = $conn->query($query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr>
                            <td><?php echo $row['barangay'] ?></td>
                            <td class="text-center">
                                <a href="hudrd-schedList.php?barangay=<?php echo $row['barangay'] ?>"
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

                            $query = $conn->query("select * from tbl_users INNER JOIN tbl_requirements ON tbl_users.user_id = tbl_requirements.user_id INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id WHERE tbl_requirements.req_status = 'QUALIFIED' AND tbl_validation.v_status = 'QUALIFIED' group by barangay");

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) :
                            ?>
                        <tr>
                            <td><?php echo $row['barangay'] ?></td>
                            <td class="text-center"><a
                                    href="hudrd-schedList.php?barangay=<?php echo $row['barangay'] ?>"
                                    class="btn p-2 m-0 btn-primary w-75">
                                    VIEW
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


<?php include '../../includes/footer.php'; ?>