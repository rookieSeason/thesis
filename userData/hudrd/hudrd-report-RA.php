<?php include "../../includes/header.php";
include "checkIfHudrdStaff.php";

?>

<?php if (isset($_SESSION['noRAfound'])) : ?>
<br>
<div class="alert alert-danger alert-dismissible text-center p-0 mt-3 w-100" role="alert">

    <h7 class="text-danger m-0 text-center">
        <?php
            echo $_SESSION['noRAfound'];
            unset($_SESSION['noRAfound']);
            ?>
    </h7>
    <button type="button" data-bs-dismiss="alert" class="btn-close p-2" style=" font-size:small"></button>
</div>
<?php endif ?>
<div class="col-lg-6 pb-4 bg-light col-11 mb-2 mt-4 border border-1 border-dark ms-auto me-auto"
    style="min-height: 65vh; " id="report-ra">
    <h4 class="m-3 text-center" style="text-align:center ;">RELOCATION AREA SUMMARY REPORT</h4>
    <hr>
    <form method="POST" class="form-row justify-content-center w-100" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class=" justify-content-evenly w-100 form-row text-start">
            <div class="form-group col-10 ">
                <label class=" form-label" for="">Relocation Area <i class="text-danger">*</i></label>
                <select name="r_id" required class="form-control form-select">
                    <?php $dropsql1 = "SELECT * FROM tbl_relocation_area WHERE r_status = 'ONGOING RELOCATION'";
                    $dsResult = $conn->query($dropsql1);
                    if ($dsResult->num_rows > 0) {
                        while ($row1 = $dsResult->fetch_assoc()) {
                            echo "<option value='" . $row1['r_id'] . "'>" . $row1['r_name'] . "</option>";
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
        <?php if (isset($_SESSION['raRangeErr'])) : ?>
        <br>
        <div class="alert alert-danger alert-dismissible text-center p-0 mt-3 w-75" role="alert">

            <h7 class="text-danger m-0 text-center">
                <?php
                    echo $_SESSION['raRangeErr'];
                    unset($_SESSION['raRangeErr']);
                    ?>
            </h7>
            <button type="button" data-bs-dismiss="alert" class="btn-close p-2" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <div class=" justify-content-evenly w-100 form-row text-start">
            <div class="form-group col-5 ">
                <input class="btn btn-success w-100" name="submitRA" type="submit">
            </div>
        </div>
        <br>
    </form>
</div>

<?php
if (isset($_POST['submitRA'])) {
    $r_id = $_POST['r_id'];
    $start = $_POST['startDate'];
    $end = $_POST['endDate'];

    if ($start <= $end) :


        $query = "SELECT r_name, r_location,r_status, r_total_families, r_primary_dev_name,r_primary_dev_contact,r_primary_dev_email, (SELECT COUNT(*) FROM tbl_schedule WHERE s_status='RELOCATED') AS relocated, (SELECT COUNT(*) FROM tbl_schedule WHERE s_status='ALLOCATED') AS allocated FROM tbl_relocation_area INNER JOIN tbl_schedule ON tbl_relocation_area.r_id = tbl_schedule.r_id WHERE tbl_relocation_area.r_id = '$r_id' AND tbl_schedule.relocation_date BETWEEN '$start' AND '$end'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) :
?>
<div id="printReportRA">
    <table cellpadding="15px" border="1" class="d-none table table-bordered table-striped">
        <tr>
            <th colspan="3"
                style="font-size: 200%;text-align:center; letter-spacing: 15px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                RELOCATION AREA SUMMARY REPORT</th>
        </tr>
        <tr>
            <th colspan="3" style="font-size: 130%;text-align:center;border:none ">
                FROM: <?php echo $start ?> TO: <?php echo $end ?></th>
        </tr>
        <tr style="font-size: 120%">
            <th colspan="2">AREA NAME:</th>
            <td><?php echo $row['r_name'] ?></td>
        </tr>
        <tr style="font-size: 120%">
            <th colspan="2">LOCATION:</th>
            <td><?php echo $row['r_location'] ?></td>
        </tr>
        <tr style="font-size: 120%">
            <th colspan="2">AREA STATUS:</th>
            <td><?php echo $row['r_status'] ?></td>
        </tr>
        <tr style="font-size: 120%">
            <th colspan="3" style="text-align:center;">PRIMARY DEVELOPER DETAILS</th>
        </tr>
        <tr style="font-size: 120%; text-align:center;">
            <td>NAME</td>
            <td>CONTACT NUMBER</td>
            <td>EMAIL</td>
        </tr>
        <tr style="font-size: 120%;text-align:center;">
            <td><?php echo $row['r_primary_dev_name'] ?></td>
            <td><?php echo $row['r_primary_dev_contact'] ?></td>
            <td><?php echo $row['r_primary_dev_email'] ?></td>
        </tr>
        <tr style="font-size: 120%">
            <th colspan="2">TOTAL NUMBER OF ISF TO BE RELOCATED:</th>
            <td><?php echo $row['allocated'] ?></td>
        </tr>
        <tr style="font-size: 120%">
            <th colspan="2">TOTAL NUMBER OF ISF RELOCATED:</th>
            <td><?php echo $row['relocated'] ?></td>
        </tr>
        <tr style="font-size: 120%">
            <th colspan="2">TOTAL NUMBER OF ISF ASSIGNED ON THIS AREA:</th>
            <td><?php echo ($row['allocated'] + $row['relocated']) ?></td>
        </tr>

    </table>
</div>
<script>
function printRA() {


    // alert("hi " + i4 + i2 + "dsadas " + i3);
    var printContent = document.getElementById('printReportRA').innerHTML;

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
<?php endwhile;
            echo '<script> printRA(); </script>';
        } else {
            $_SESSION['noRAfound'] = "No such record found";
        }
    else :
        $_SESSION['raRangeErr'] = "Start date must be less than End date";
    endif;
    echo "<meta http-equiv='refresh' content='0'";
}
?>


<?php include "../../includes/footer.php" ?>