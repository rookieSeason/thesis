<?php include "../../includes/isf-header.php";

include "checkIfIsf.php";
include "checkIfHaveSched.php";

if (!isset($_SESSION)) {
    session_start();
}
?>

<div class="text-start ms-3">
    <?php
    s_status();
    ?>

</div>

<div class="col-lg-6 pb-4 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
    style="min-height: 65vh; " id="printSched">
    <h4 class="m-3 text-center" style="text-align:center ;">SCHEDULE</h4>
    <hr>

    <div class="form-row justify-content-center w-100">
        <div class=" justify-content-evenly form-row w-100 text-start">
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Date of Orientation</label>
                <input class="form-control" readonly
                    value="<?php echo date('Y-m-d', strtotime($row['orientation_date'])) ?>" type="text">
            </div>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Time of Orientation</label>
                <input class="form-control" readonly
                    value="<?php echo date('h:i A', strtotime($row['orientation_date'])) ?>" type="text">
            </div>

        </div>
        <br>
        <div class=" justify-content-evenly form-row w-100 text-start">
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Date of Relocation</label>
                <input class="form-control" readonly
                    value="<?php echo date('Y-m-d', strtotime($row['relocation_date'])) ?>" type="text">
            </div>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Time of Relocation</label>
                <input class="form-control" readonly
                    value="<?php echo date('h:i A', strtotime($row['relocation_date'])) ?>" type="text">
            </div>

        </div>
        <br>
        <div class=" justify-content-evenly w-100 form-row text-start">
            <div class="form-group col-5 ">
                <label class=" form-label" for="">Relocation Area </label>
                <?php $rname1 = "SELECT * FROM tbl_relocation_area WHERE r_id = '" . $row['r_id'] . "'";
                $dsResult1 = $conn->query($rname1);
                if ($dsResult1->num_rows > 0) {
                    while ($row1 = $dsResult1->fetch_assoc()) :
                ?>
                <input class="form-control" readonly value="<?php echo $row1['r_name'] ?>" type="text">
                <?php
                    endwhile;
                }
                ?>
            </div>
            <div class="form-group col-5 ">
                <label class=" form-label" for="">House Code</label>
                <input class="form-control" readonly value="<?php echo $row['relocation_slot'] ?>" type="text">
            </div>
        </div>
        <br>

        <button class=" btn btn-success mt-3" id="printSchedbtn" onclick="printSchedule()">PRINT A COPY</button>
    </div>
</div>
<script>
function printSchedule() {
    var printscreen = window.open('sample', 'Print', 'left=' + left + ',top=' + top +
        ',width=1000, height=1000');

    var printBtn = document.getElementById('printSchedbtn');
    printBtn.style.visibility = 'hidden';


    // alert("hi " + i4 + i2 + "dsadas " + i3);

    var printContent = document.getElementById('printSched').innerHTML;



    var left = (screen.width - 1000) / 2;
    var top = (screen.height - 1000) / 4;


    //try
    printscreen.document.write(printContent);
    printscreen.document.close();
    printscreen.focus();
    printscreen.print();
    printscreen.close();
    printBtn.style.visibility = 'visible';
}
</script>
<?php include "../../includes/footer.php" ?>