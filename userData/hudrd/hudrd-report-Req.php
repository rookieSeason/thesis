<?php include "../../includes/header.php";
include "checkIfHudrdStaff.php";

?>

<?php if (isset($_SESSION['noReqfound'])) : ?>
<br>
<div class="alert alert-danger alert-dismissible text-center p-0 mt-3 w-100" role="alert">

    <h7 class="text-danger m-0 text-center">
        <?php
            echo $_SESSION['noReqfound'];
            unset($_SESSION['noReqfound']);
            ?>
    </h7>
    <button type="button" data-bs-dismiss="alert" class="btn-close p-2" style=" font-size:small"></button>
</div>
<?php endif ?>
<div class="col-lg-6 pb-4 bg-light col-11 mb-2 mt-4 border border-1 border-dark ms-auto me-auto"
    style="min-height: 65vh; " id="report-ra">
    <h4 class="m-3 text-center" style="text-align:center ;">FOR REQUIREMENT ISF SUMMARY REPORT</h4>
    <hr>
    <form method="POST" class="form-row justify-content-center w-100" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class=" justify-content-evenly w-100 form-row text-start">
            <div class="form-group col-10 ">
                <label class=" form-label" for="">Barangay: <i class="text-danger">*</i></label>
                <select name="barangay" required class="form-control form-select">
                    <?php $dropsql1 = "SELECT DISTINCT barangay from tbl_users INNER JOIN tbl_validation ON tbl_users.user_id = tbl_validation.user_id";
                    $dsResult = $conn->query($dropsql1);
                    if ($dsResult->num_rows > 0) {
                        while ($row1 = $dsResult->fetch_assoc()) {
                            echo "<option value='" . $row1['barangay'] . "'>" . $row1['barangay'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class=" justify-content-evenly w-100 form-row text-start">
            <div class="form-group col-10 ">
                <label class=" form-label" for="">From <i class="text-danger">*</i></label>
                <input required class="form-control" name="startDate" type="date">
            </div>
        </div>
        <br>
        <div class=" justify-content-evenly w-100 form-row text-start">
            <div class="form-group col-10 ">
                <label class=" form-label" for="">To <i class="text-danger">*</i></label>
                <input required class="form-control" name="endDate" type="date">
            </div>
        </div>
        <br>
        <?php if (isset($_SESSION['reqRangeErr'])) : ?>
        <br>
        <div class="alert alert-danger alert-dismissible text-center p-0 mt-3 w-75" role="alert">

            <h7 class="text-danger m-0 text-center">
                <?php
                    echo $_SESSION['reqRangeErr'];
                    unset($_SESSION['reqRangeErr']);
                    ?>
            </h7>
            <button type="button" data-bs-dismiss="alert" class="btn-close p-2" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <div class=" justify-content-evenly w-100 form-row text-start">
            <div class="form-group col-5 ">
                <input class="btn btn-success w-100" name="submitrepReq" type="submit">
            </div>
        </div>
        <br>
    </form>
</div>

<?php
if (isset($_POST['submitrepReq'])) {
    $barangay = $_POST['barangay'];
    $start = $_POST['startDate'];
    $end = $_POST['endDate'];
    $totality = 0;
    // echo "<script> alert('" . $start . "')</script>";
    if ($start <= $end) :


        $query = "SELECT req_status, COUNT(req_status) AS totalPerStat,SUM(IF(req_complete = '1',1,0)) AS complete,SUM(IF(req_complete = '0',1,0)) AS incomplete, SUM(COUNT(req_status)) OVER() AS total FROM tbl_requirements INNER JOIN tbl_users ON tbl_requirements.user_id = tbl_users.user_id WHERE tbl_users.barangay = '$barangay' AND tbl_requirements.req_handled_date BETWEEN '$start' AND '$end' GROUP BY req_status";

        $result = mysqli_query($conn, $query);



        if (mysqli_num_rows($result) > 0) {

?>
<div id="printReportReq">
    <table cellpadding="15px" border="1" class=" d-none table table-bordered table-striped">
        <tr>
            <th colspan="3"
                style="font-size: 150%;text-align:center; letter-spacing: 10px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                FOR REQUIREMENT ISF SUMMARY REPORT OF <br><?php echo $barangay ?></th>
        </tr>
        <tr>
            <th colspan="3" style="font-size: 130%;text-align:center;border:none ">
                FROM: <?php echo $start ?> TO: <?php echo $end ?></th>
        </tr>
        <tr style="font-size: 120%">
            <th>Requirement Status</th>
            <th>TOTAL</th>
        </tr>

        <?php
                    while ($row = mysqli_fetch_array($result)) :
                    ?>

        <tr style="font-size: 120%">

            <td><?php echo $row['req_status'] ?></td>
            <td><?php echo $row['totalPerStat'] ?></td>
        </tr>

        <?php
                        $total = $row['total'];
                    endwhile;
                    ?>
        <tr style="font-size: 120%">
            <th colspan="3">Requirement Completion Status</th>
        </tr>
        <?php

                    $query2 = "SELECT DISTINCT SUM(IF(req_complete = '1',1,0)) AS complete,SUM(IF(req_complete = '0',1,0)) AS incomplete FROM tbl_requirements INNER JOIN tbl_users ON tbl_requirements.user_id = tbl_users.user_id WHERE tbl_users.barangay = '$barangay' AND tbl_requirements.req_handled_date BETWEEN '$start' AND '$end'";

                    $result2 = mysqli_query($conn, $query2);

                    while ($row2 = mysqli_fetch_array($result2)) :
                    ?>
        <tr style="font-size: 120%">

            <td>Complete</td>
            <td><?php echo $row2['complete'] ?></td>
        </tr>
        <tr style="font-size: 120%">

            <td>Incomplete</td>
            <td><?php echo $row2['incomplete'] ?></td>
        </tr>


        <?php
                    endwhile;
                    ?>
        <tr style="font-size: 120%">
            <th style="text-align:end;">GRAND TOTAL ISF IN THE REQUIREMENT CATEGORY</th>
            <td><?php echo $total ?></td>
        </tr>
    </table>
    <br>
    <br>
    <?php
                $query1 = "SELECT DISTINCT req_handler,SUM(IF(req_status = 'QUALIFIED',1,0)) AS quali, SUM(IF(req_status = 'DISQUALIFIED',1,0)) AS disquali,SUM(IF(req_status = 'PENDING',1,0)) AS pending,COUNT(req_status) AS totalPerHandler FROM tbl_requirements INNER JOIN tbl_users ON tbl_requirements.user_id = tbl_users.user_id WHERE tbl_users.barangay = '$barangay' AND tbl_requirements.req_handled_date BETWEEN '$start' AND '$end' GROUP BY req_handler";

                $result1 = mysqli_query($conn, $query1);
                ?>
    <table cellpadding="15px" border="1" class="d-none table table-bordered table-striped">
        <tr>
            <th colspan="4"
                style="font-size: 150%;text-align:center; letter-spacing: 10px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                REQUIREMENT PROCESSED SUMMARY REPORT OF EMPLOYEES</th>
        </tr>
        <tr>
            <th colspan="4" style="font-size: 130%;text-align:center;border:none ">
                FROM: <?php echo $start ?> TO: <?php echo $end ?></th>
        </tr>
        <tr style="font-size: 120%">
            <th>Requirement Handler</th>
            <th>QUALIFIED</th>
            <th>DISQUALIFIED</th>
            <th>TOTAL</th>
        </tr>

        <?php
                    while ($row1 = mysqli_fetch_array($result1)) :
                    ?>

        <tr style="font-size: 120%">

            <td><?php echo $row1['req_handler'] ?></td>
            <td><?php echo $row1['quali'] ?></td>
            <td><?php echo $row1['disquali'] ?></td>
            <td><?php echo $row1['totalPerHandler'] ?></td>
        </tr>

        <?php
                        $totality += $row1['totalPerHandler'];
                    endwhile;
                    ?>
        <tr style="font-size: 120%">
            <th colspan="3">GRAND TOTAL ISF REQUIREMENT HANDLED</th>
            <td><?php echo $totality ?></td>
        </tr>
    </table>
</div>
<script>
function printReq() {


    // alert("hi " + i4 + i2 + "dsadas " + i3);
    var printContent = document.getElementById('printReportReq').innerHTML;

    var left = (screen.width - 1000) / 2;
    var top = (screen.height - 1000) / 4;

    var printscreen = window.open('sample', 'Print', 'left=' + left + ',top=' + top +
        ',width=1000, height=1000');

    //try
    printscreen.document.write(printContent);
    printscreen.document.close();
    printscreen.focus();
    printscreen.print();
    printscreen.close();
}
</script>
<?php
            echo '<script> printReq(); </script>';
        } else {
            $_SESSION['noReqfound'] = "No such record found";
        }
    else :
        $_SESSION['reqRangeErr'] = "Start date must be less than End date";
    endif;
    echo "<meta http-equiv='refresh' content='0'";
}
?>


<?php include "../../includes/footer.php" ?>