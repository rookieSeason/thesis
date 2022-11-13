<?php include "../../includes/header.php";
include "checkIfHudrdStaff.php";

?>




<?php


if (isset($_SESSION['noCompfound'])) : ?>
<br>
<div class="alert alert-danger alert-dismissible text-center p-0 mt-3 w-100" role="alert">

    <h7 class="text-danger m-0 text-center">
        <?php
            echo $_SESSION['noCompfound'];
            unset($_SESSION['noCompfound']);
            ?>
    </h7>
    <button type="button" data-bs-dismiss="alert" class="btn-close p-2" style=" font-size:small"></button>
</div>
<?php endif ?>

<div class="col-lg-10 pb-4 bg-light col-11 mb-2 mt-4 border border-1 border-dark ms-auto me-auto"
    style="min-height: 65vh; " id="report-ra">
    <h4 class="m-3 text-center" style="text-align:center ;">COMPREHENSIVE SUMMARY REPORT</h4>
    <hr>
    <form method="POST" class="form-row justify-content-center w-100" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class=" justify-content-center w-100 form-row text-start">
            <div class="form-check form-check-inline col-5 col-lg-2 ">
                <input type="checkbox" id="c1" name="checkReloc" value="1" class=" form-check-input">
                <label for="c1" class=" form-check-label">Relocation Area</label>
            </div>
            <div class="form-check form-check-inline col-5 col-lg-2">
                <input type="checkbox" id="c2" name="checkVal" value="1" class=" form-check-input">
                <label for="c2" class=" form-check-label">Validation</label>
            </div>
            <div class="form-check form-check-inline col-5 col-lg-2">
                <input type="checkbox" id="c3" name="checkReq" value="1" class=" form-check-input">
                <label for="c3" class=" form-check-label">For Requirement</label>
            </div>
            <div class="form-check form-check-inline col-5 col-lg-2">
                <input type="checkbox" id="c4" name="checkSched" value="1" class=" form-check-input">
                <label for="c4" class=" form-check-label">Schedule</label>
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
        <?php if (isset($_SESSION['compRangeErr'])) : ?>
        <br>
        <div class="alert alert-danger alert-dismissible text-center p-0 mt-3 w-75" role="alert">

            <h7 class="text-danger m-0 text-center">
                <?php
                    echo $_SESSION['compRangeErr'];
                    unset($_SESSION['compRangeErr']);
                    ?>
            </h7>
            <button type="button" data-bs-dismiss="alert" class="btn-close p-2" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <?php if (isset($_SESSION['notCheckedOnce'])) : ?>
        <br>
        <div class="alert alert-danger alert-dismissible text-center p-0 mt-3 w-75" role="alert">

            <h7 class="text-danger m-0 text-center">
                <?php
                    echo $_SESSION['notCheckedOnce'];
                    unset($_SESSION['notCheckedOnce']);
                    ?>
            </h7>
            <button type="button" data-bs-dismiss="alert" class="btn-close p-2" style=" font-size:small"></button>
        </div>
        <?php endif ?>
        <div class=" justify-content-evenly w-100 form-row text-start">
            <div class="form-group col-5 ">
                <input class="btn btn-success w-100" name="submitrepComp" type="submit">
            </div>
        </div>
        <br>
    </form>
</div>

<?php
if (isset($_POST['submitrepComp'])) {

    $start = $_POST['startDate'];
    $end = $_POST['endDate'];
    if (isset($_POST['checkReloc'])) {
        $c1 = $_POST['checkReloc'];
    } else {
        $c1 = 0;
    }
    if (isset($_POST['checkVal'])) {
        $c2 = $_POST['checkVal'];
    } else {
        $c2 = 0;
    }
    if (isset($_POST['checkReq'])) {
        $c3 = $_POST['checkReq'];
    } else {
        $c3 = 0;
    }
    if (isset($_POST['checkSched'])) {
        $c4 = $_POST['checkSched'];
    } else {
        $c4 = 0;
    }

    $c1Check = 0;
    $c2Check = 0;
    $c3Check = 0;
    $c4Check = 0;

    $totalRA = 0;
    $totalVal = 0;
    $totalReq = 0;
    $totalSched = 0;
    $totalityVal = 0;
    $totalityReq = 0;
    $totalitySched = 0;

    if ($c1 == 1 || $c2 == 1 || $c3 == 1 || $c4 == 1) :
        if ($start <= $end) :

            if ($c1 == 1) :
                $query = "SELECT r_name,r_status,
            (SELECT DISTINCT COUNT(*) FROM tbl_schedule INNER JOIN tbl_relocation_area ON tbl_schedule.r_id = tbl_relocation_area.r_id WHERE s_status='RELOCATED' GROUP BY tbl_schedule.r_id) AS relocated, 
            (SELECT DISTINCT COUNT(*) FROM tbl_schedule INNER JOIN tbl_relocation_area ON tbl_schedule.r_id = tbl_relocation_area.r_id WHERE s_status='ALLOCATED' GROUP BY tbl_schedule.r_id) AS allocated 
            FROM tbl_relocation_area INNER JOIN tbl_schedule ON tbl_relocation_area.r_id = tbl_schedule.r_id WHERE tbl_schedule.relocation_date BETWEEN '$start' AND '$end'";

                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
?>
<div id="printReportRA1">
    <table cellpadding="15px" border="1" class="d-none table table-bordered table-striped">
        <tr>
            <th colspan="4"
                style="font-size: 200%;text-align:center; letter-spacing: 15px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                RELOCATION AREA SUMMARY REPORT</th>
        </tr>
        <tr>
            <th colspan="4" style="font-size: 130%;text-align:center;border:none ">
                FROM: <?php echo $start ?> TO: <?php echo $end ?></th>
        </tr>
        <tr>
            <th>AREA NAME:</th>
            <th>AREA STATUS:</th>
            <th>ISF TO BE RELOCATED:</th>
            <th>ISF RELOCATED:</th>
        </tr>
        <?php
                            while ($row = mysqli_fetch_array($result)) :
                            ?>
        <tr>
            <td><?php echo $row['r_name'] ?></td>
            <td><?php echo $row['r_status'] ?></td>
            <td><?php
                                        if ($row['allocated'] == '' || $row['allocated'] == null) {
                                            echo '0';
                                        } else {
                                            echo $row['allocated'];
                                            $totalRA += $row['allocated'];
                                        }
                                        ?></td>
            <td><?php
                                        if ($row['relocated'] == '' || $row['relocated'] == null) {
                                            echo '0';
                                        } else {
                                            echo $row['relocated'];
                                            $totalRA += $row['relocated'];
                                        } ?></td>
        </tr>
        <?php
                            endwhile;
                            ?>
        <tr>
            <th colspan="3">TOTAL ISFs:</th>
            <td><?php echo $totalRA ?></td>
        </tr>
    </table>
    <br>
    <br>
</div>

<?php
                    $c1Check = 1;
                } else {
                    $_SESSION['noCompfound'] = "No such record found";
                }
            endif;

            //case 2
            if ($c2 == 1) :
                $query1 = "SELECT v_status, COUNT(v_status) AS totalPerStat, SUM(COUNT(v_status)) OVER() AS total FROM tbl_validation INNER JOIN tbl_users ON tbl_validation.user_id = tbl_users.user_id WHERE tbl_validation.v_handled_date BETWEEN '$start' AND '$end' GROUP BY v_status";

                $result1 = mysqli_query($conn, $query1);



                if (mysqli_num_rows($result1) > 0) {
                ?>
<div id="printReportVal1">
    <table cellpadding="15px" border="1" class=" d-none table table-bordered table-striped">
        <tr>
            <th colspan="3"
                style="font-size: 200%;text-align:center; letter-spacing: 10px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                VALIDATED ISF SUMMARY REPORT</th>
        </tr>
        <tr>
            <th colspan="3" style="font-size: 130%;text-align:center;border:none ">
                FROM: <?php echo $start ?> TO: <?php echo $end ?></th>
        </tr>
        <tr style="font-size: 120%">
            <th>Validation Status</th>
            <th>TOTAL</th>
        </tr>

        <?php
                            while ($row1 = mysqli_fetch_array($result1)) :
                            ?>

        <tr style="font-size: 120%">

            <td><?php echo $row1['v_status'] ?></td>
            <td><?php echo $row1['totalPerStat'] ?></td>
        </tr>

        <?php
                                $totalVal = $row1['total'];
                            endwhile;
                            ?>
        <tr style="font-size: 120%">
            <th>GRAND TOTAL ISF VALIDATED</th>
            <td><?php echo $totalVal ?></td>
        </tr>
    </table>
    <br>
    <br>
    <?php
                        $query2 = "SELECT DISTINCT v_handler,SUM(IF(v_status = 'QUALIFIED',1,0)) AS quali, SUM(IF(v_status = 'DISQUALIFIED',1,0)) AS disquali,SUM(IF(v_status = 'PENDING',1,0)) AS pending,COUNT(v_status) AS totalPerHandler FROM tbl_validation INNER JOIN tbl_users ON tbl_validation.user_id = tbl_users.user_id WHERE tbl_validation.v_handled_date BETWEEN '$start' AND '$end' GROUP BY v_handler";

                        $result2 = mysqli_query($conn, $query2);
                        ?>
    <table cellpadding="15px" border="1" class="d-none table table-bordered table-striped">
        <tr>
            <th colspan="5"
                style="font-size: 200%;text-align:center; letter-spacing: 10px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                VALIDATED SUMMARY REPORT OF EMPLOYEES</th>
        </tr>
        <tr>
            <th colspan="5" style="font-size: 130%;text-align:center;border:none ">
                FROM: <?php echo $start ?> TO: <?php echo $end ?></th>
        </tr>
        <tr>
            <th>Validation Handler</th>
            <th>QUALIFIED</th>
            <th>DISQUALIFIED</th>
            <th>PENDING</th>
            <th>TOTAL</th>
        </tr>

        <?php
                            while ($row2 = mysqli_fetch_array($result2)) :
                            ?>

        <tr>

            <td><?php echo $row2['v_handler'] ?></td>
            <td><?php echo $row2['quali'] ?></td>
            <td><?php echo $row2['disquali'] ?></td>
            <td><?php echo $row2['pending'] ?></td>
            <td><?php echo $row2['totalPerHandler'] ?></td>
        </tr>
        <?php
                                $totalityVal += $row2['totalPerHandler'];
                            endwhile;
                            ?>
        <tr>
            <th colspan="4">GRAND TOTAL ISF VALIDATED</th>
            <td><?php echo $totalityVal ?></td>
        </tr>
    </table>
    <br><br>
</div>

<?php
                    $c2Check = 1;
                } else {
                    $_SESSION['noValfound'] = "No such record found";
                }
            endif;

            //case 3

            if ($c3 == 1) :
                $query3 = "SELECT req_status, COUNT(req_status) AS totalPerStat,SUM(IF(req_complete = '1',1,0)) AS complete,SUM(IF(req_complete = '0',1,0)) AS incomplete, SUM(COUNT(req_status)) OVER() AS total FROM tbl_requirements INNER JOIN tbl_users ON tbl_requirements.user_id = tbl_users.user_id WHERE tbl_requirements.req_handled_date BETWEEN '$start' AND '$end' GROUP BY req_status";

                $result3 = mysqli_query($conn, $query3);



                if (mysqli_num_rows($result3) > 0) {
                ?>
<div id="printReportReq1">
    <table cellpadding="15px" border="1" class=" d-none table table-bordered table-striped">
        <tr>
            <th colspan="3"
                style="font-size: 150%;text-align:center; letter-spacing: 10px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                FOR REQUIREMENT ISF SUMMARY REPORT</th>
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
                            while ($row3 = mysqli_fetch_array($result3)) :
                            ?>

        <tr style="font-size: 120%">

            <td><?php echo $row3['req_status'] ?></td>
            <td><?php echo $row3['totalPerStat'] ?></td>
        </tr>

        <?php
                                $totalReq = $row3['total'];
                            endwhile;
                            ?>
        <tr style="font-size: 120%">
            <th colspan="3">Requirement Completion Status</th>
        </tr>
        <?php

                            $query4 = "SELECT DISTINCT SUM(IF(req_complete = '1',1,0)) AS complete,SUM(IF(req_complete = '0',1,0)) AS incomplete FROM tbl_requirements INNER JOIN tbl_users ON tbl_requirements.user_id = tbl_users.user_id WHERE  tbl_requirements.req_handled_date BETWEEN '$start' AND '$end'";

                            $result4 = mysqli_query($conn, $query4);

                            while ($row4 = mysqli_fetch_array($result4)) :
                            ?>
        <tr style="font-size: 120%">

            <td>Complete</td>
            <td><?php echo $row4['complete'] ?></td>
        </tr>
        <tr style="font-size: 120%">

            <td>Incomplete</td>
            <td><?php echo $row4['incomplete'] ?></td>
        </tr>


        <?php
                            endwhile;
                            ?>
        <tr style="font-size: 120%">
            <th style="text-align:end;">GRAND TOTAL ISF IN THE REQUIREMENT CATEGORY</th>
            <td><?php echo $totalReq ?></td>
        </tr>
    </table>
    <br>
    <br>
    <?php
                        $query5 = "SELECT DISTINCT req_handler,SUM(IF(req_status = 'QUALIFIED',1,0)) AS quali, SUM(IF(req_status = 'DISQUALIFIED',1,0)) AS disquali,SUM(IF(req_status = 'PENDING',1,0)) AS pending,COUNT(req_status) AS totalPerHandler FROM tbl_requirements INNER JOIN tbl_users ON tbl_requirements.user_id = tbl_users.user_id WHERE tbl_requirements.req_handled_date BETWEEN '$start' AND '$end' GROUP BY req_handler";

                        $result5 = mysqli_query($conn, $query5);
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
                            while ($row5 = mysqli_fetch_array($result5)) :
                            ?>

        <tr style="font-size: 120%">

            <td><?php echo $row5['req_handler'] ?></td>
            <td><?php echo $row5['quali'] ?></td>
            <td><?php echo $row5['disquali'] ?></td>
            <td><?php echo $row5['totalPerHandler'] ?></td>
        </tr>

        <?php
                                $totalityReq += $row5['totalPerHandler'];
                            endwhile;
                            ?>
        <tr style="font-size: 120%">
            <th colspan="3">GRAND TOTAL ISF REQUIREMENT HANDLED</th>
            <td><?php echo $totalityReq ?></td>
        </tr>
    </table>
    <br><br>
</div>
<?php
                    $c3Check = 1;
                } else {
                    $_SESSION['noReqfound'] = "No such record found";
                }
            endif;

            //case 4
            if ($c4 == 1) :
                $query6 = "SELECT s_status, COUNT(s_status) AS totalPerStat, SUM(COUNT(s_status)) OVER() AS total FROM tbl_schedule INNER JOIN tbl_users ON tbl_schedule.user_id = tbl_users.user_id WHERE tbl_schedule.schedAllotment_date BETWEEN '$start' AND '$end' GROUP BY s_status;";

                $result6 = mysqli_query($conn, $query6);

                if (mysqli_num_rows($result6) > 0) {

                ?><div id="printReportSched1">
    <table cellpadding="15px" border="1" class="d-none table table-bordered table-striped">
        <tr>
            <th colspan="3"
                style="font-size: 200%;text-align:center; letter-spacing: 15px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                SCHEDULE SUMMARY REPORT</th>
        </tr>
        <tr>
            <th colspan="3" style="font-size: 130%;text-align:center;border:none ">
                FROM: <?php echo $start ?> TO: <?php echo $end ?></th>
        </tr>
        <tr style="font-size: 120%">
            <th>Schedule Status</th>
            <th>TOTAL</th>
        </tr>
        <?php
                            while ($row6 = mysqli_fetch_array($result6)) :
                            ?>
        <tr style="font-size: 120%">

            <td><?php echo $row6['s_status'] ?></td>
            <td><?php echo $row6['totalPerStat'] ?></td>
        </tr>
        <?php
                                $totalSched = $row6['total'];
                            endwhile;
                            ?>

        <tr style="font-size: 120%">
            <th>GRAND TOTAL OF ISF IN SCHEDULE CATEGORY</th>
            <td><?php echo $totalSched ?></td>
        </tr>
    </table>
    <br>
    <br>
    <?php
                        $query7 = "SELECT DISTINCT s_handler,SUM(IF(s_status = 'NOT ALLOCATED',1,0)) AS notAlloc, SUM(IF(s_status = 'ALLOCATED',1,0)) AS allocated,SUM(IF(s_status = 'RELOCATED',1,0)) AS relocated,COUNT(s_status) AS totalPerHandler FROM tbl_schedule INNER JOIN tbl_users ON tbl_schedule.user_id = tbl_users.user_id WHERE tbl_schedule.schedAllotment_date BETWEEN '$start' AND '$end' GROUP BY s_handler";

                        $result7 = mysqli_query($conn, $query7);
                        ?>
    <table cellpadding="15px" border="1" class="d-none table table-bordered table-striped">
        <tr>
            <th colspan="5"
                style="font-size: 200%;text-align:center; letter-spacing: 10px; border-top-right-radius: 30px;border-top-left-radius: 30px;border-bottom:none">
                SCHEDULE SUMMARY REPORT OF EMPLOYEES</th>
        </tr>
        <tr>
            <th colspan="5" style="font-size: 130%;text-align:center;border:none ">
                FROM: <?php echo $start ?> TO: <?php echo $end ?></th>
        </tr>
        <tr style="font-size: 120%">
            <th>Schedule Handler</th>
            <th>NOT ALLOCATED</th>
            <th>ALLOCATED</th>
            <th>RELOCATED</th>
            <th>TOTAL</th>
        </tr>

        <?php
                            while ($row7 = mysqli_fetch_array($result7)) :
                            ?>

        <tr style="font-size: 120%">

            <td><?php echo $row7['s_handler'] ?></td>
            <td><?php echo $row7['notAlloc'] ?></td>
            <td><?php echo $row7['allocated'] ?></td>
            <td><?php echo $row7['relocated'] ?></td>
            <td><?php echo $row7['totalPerHandler'] ?></td>
        </tr>
        <?php
                                $totalitySched += $row7['totalPerHandler'];
                            endwhile;
                            ?>
        <tr style="font-size: 120%">
            <th colspan="4">GRAND TOTAL OF ISF IN SCHEDULE CATEGORY</th>
            <td><?php echo $totalitySched ?></td>
        </tr>
    </table>
    <br><br>
</div>
<?php
                    $c4Check = 1;
                } else {
                    $_SESSION['noSchedfound'] = "No such record found";
                }
            endif;
        else :
            $_SESSION['compRangeErr'] = "Start date must be less than End date";
        endif;
        if ($c1Check == 1) {
            $_SESSION['c1Check'] = "printReportRA1";
        }
        if ($c2Check == 1) {
            $_SESSION['c2Check'] = "printReportVal1";
        }
        if ($c3Check == 1) {
            $_SESSION['c3Check'] = "printReportReq1";
        }
        if ($c4Check == 1) {
            $_SESSION['c4Check'] = "printReportSched1";
        }

        ?>
<script>
function printRepComp() {


    var c1 = "<?php
                            if (isset($_SESSION['c1Check'])) {
                                echo $_SESSION['c1Check'];
                                unset($_SESSION['c1Check']);
                            } else {
                                echo "";
                                unset($_SESSION['c1Check']);
                            }

                            ?>";

    var c2 = "<?php
                            if (isset($_SESSION['c2Check'])) {
                                echo $_SESSION['c2Check'];
                                unset($_SESSION['c2Check']);
                            } else {
                                echo "";
                                unset($_SESSION['c2Check']);
                            }
                            ?>";

    var c3 = "<?php
                            if (isset($_SESSION['c3Check'])) {
                                echo $_SESSION['c3Check'];
                                unset($_SESSION['c3Check']);
                            } else {
                                echo "";
                                unset($_SESSION['c3Check']);
                            }
                            ?>";
    var c4 = "<?php
                            if (isset($_SESSION['c4Check'])) {
                                echo $_SESSION['c4Check'];
                                unset($_SESSION['c4Check']);
                            } else {
                                echo "";
                                unset($_SESSION['c4Check']);
                            }
                            ?>";



    var combinedDiv = document.createElement('div');
    // alert("hi " + c1 + "dsadas ");
    if (c1 != "") {
        var content1 = document.getElementById('printReportRA1').innerHTML;
        combinedDiv.innerHTML += content1 + " ";
    }
    if (c2 != "") {
        var content2 = document.getElementById('printReportVal1').innerHTML;
        combinedDiv.innerHTML += content2 + " ";
    }
    if (c3 != "") {
        var content3 = document.getElementById('printReportReq1').innerHTML;
        combinedDiv.innerHTML += content3 + " ";
    }
    if (c4 != "") {
        var content4 = document.getElementById('printReportSched1').innerHTML;
        combinedDiv.innerHTML += content4 + " ";
    }
    // combinedDiv.id = "combinedDivnew";
    var printContent = combinedDiv.innerHTML;
    var left = (screen.width - 1000) / 2;
    var top = (screen.height - 1000) / 4;



    //try
    if (printContent != "") {
        var printscreen = window.open('sample', 'Print', 'left=' + left + ',top=' + top +
            ',width=1000, height=1000');
        printscreen.document.write(printContent);
        printscreen.document.close();
        printscreen.focus();
        printscreen.print();
        printscreen.close();
    }

}
</script>
<?php

        echo "<script> printRepComp(); </script>";


        //end ng start end if
        echo "<meta http-equiv='refresh' content='0'";
    elseif ($c1 == 0 && $c2 == 0 && $c3 == 0 && $c4 == 0) :
        $_SESSION['notCheckedOnce'] = "Please check atleast one checkbox";
        echo "<meta http-equiv='refresh' content='0'";

    endif;
}
?>


<?php include "../../includes/footer.php" ?>