<?php include "../../includes/isf-header.php";
include "checkIfIsf.php";
include "checkIfValidated.php";

if (!isset($_SESSION)) {
    session_start();
}


?>
<h4 class="ms-3 text-danger">
    NOTICE:</h4>
<div class="text-start ms-3">
    <?php
    validation_status();
    ?>

</div>
<hr>
<?php if (isset($_SESSION['submitValidationSuccess'])) : ?>
<br>
<div class="alert alert-success alert-dismissible " role="alert">

    <h6 class="text-success">
        <?php
            echo $_SESSION['submitValidationSuccess'];
            unset($_SESSION['submitValidationSuccess']);
            ?>
    </h6>
    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
</div>
<?php endif ?>

<?php if (isset($_SESSION['fileTooBig'])) : ?>
<br>
<div class="alert alert-danger alert-dismissible " role="alert">

    <h6 class="text-danger">
        <?php
            echo $_SESSION['fileTooBig'];
            unset($_SESSION['fileTooBig']);
            ?>
    </h6>
    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
</div>
<?php endif ?>
<div class="col-lg-8 pb-4 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
    style="min-height: 65vh; ">
    <h3 class="text-center p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
        ISF VALIDATION</h3>
    <br>
    <form action="../../php_actions/isf-submit-validation.php" method="POST" enctype="multipart/form-data">
        <div class="form-row col-lg-10 col-md-10 col-12 ms-auto me-auto">
            <div class="form-group w-100 ">
                <label for="" class=" form-label">Type of occupant: <i class="text-danger">*</i></label>
                <select required name="v_occupant_type" class="form-control form-select" id="">
                    <option selected hidden disabled value="">--SELECT--</option>
                    <option value="STRUCTURE OWNER">Structure Owner </option>
                    <option value="CO-OWNER">Co-Owner (contributed in cash/kind on building/buying the
                        structure)</option>
                    <option value="SHARER">Sharer (another family living with the structure owner)</option>
                    <option value="FREE OCCUPANT">Free Occupant (not the owner but living on the structure without rent)
                    </option>
                    <option value="RENTER">Renter</option>
                </select>
            </div>

        </div>
        <br>
        <div class="form-row col-lg-10 col-md-10 col-12 ms-auto me-auto justify-content-between">
            <div class="form-group w-100">
                <label for="" class=" form-label">Length of stay <b>(YEARS)</b>: <i class="text-danger">*</i></label>
                <input type="number" oninput="this.value|=0" min="0" name="v_length_of_stay" required
                    class="form-control" id="">
            </div>
        </div>
        <br>
        <div class="form-row col-lg-10 col-md-10 col-12 ms-auto me-auto justify-content-between">
            <div class="form-group w-100">
                <label for="" class=" form-label">Structure Classification: <i class="text-danger">*</i></label>
                <select required name="v_structure_class" class="form-control form-select" id="">
                    <option selected hidden disabled value="">--SELECT--</option>
                    <option value="SINGLE DETACHED">Single Detached</option>
                    <option value="MULTI-STORY">Multi-story (two or more story house)</option>
                    <option value="APARTMENT TYPE">Apartment Type</option>
                </select>
            </div>
        </div>
        <div class="form-row col-lg-10 col-md-10 col-12 ms-auto me-auto justify-content-between">

            <div class="form-group w-100">
                <label for="" class=" form-label">Structure Type: <i class="text-danger">*</i></label>
                <select required name="v_structure_type" class="form-control form-select" id="">
                    <option selected hidden disabled value="">--SELECT--</option>
                    <option value="LIGHT MATERIAL">Light material (Ex: wood)</option>
                    <option value="MIXED">Mixed (Ex: wood and concrete)</option>
                    <option value="CONCRETE">Concrete</option>
                    <option value="MAKESHIFT HOUSE">Makeshift house (Ex: galvanized roof/yero, tarpaulin)</option>
                </select>
            </div>
        </div>
        <br>
        <div class="form-row col-lg-10 col-md-10 col-12 ms-auto me-auto justify-content-between">
            <div class="form-group w-100">
                <label for="" class=" form-label">1.) Proof of residency on area during <b>2016-2017</b> (Barangay
                    issued
                    documents is not accepted): <i class="text-danger">*</i></label>
                <select required name="v_proof1" class="form-control form-select" id="">
                    <option selected hidden disabled value="">--SELECT--</option>
                    <option value="BIRTH CERTIFICATE">Birth Certificate</option>
                    <option value="DEATH CERTIFICATE">Death Certificate</option>
                    <option value="HEALTH RECORD">Health Record</option>
                    <option value="SCHOOL RECORD">School Record</option>
                    <option value="MONEY TRANSFER RECEIPT">Money transfer receipt</option>
                    <option value="VALID ID ISSUED 2016-2017">Valid ID issued 2016-2017</option>
                </select>
            </div>
            <div class="form-group w-100">
                <input type="file" name="v_proof_file1" required class=" form-control" id="">
            </div>
        </div>
        <br>
        <div class="form-row col-lg-10 col-md-10 col-12 ms-auto me-auto justify-content-between">
            <div class="form-group w-100">
                <label for="" class=" form-label">2.) Proof of residency on area during <b>2016-2017</b> Barangay issued
                    documents is not accepted):</label>
                <select name="v_proof2" class="form-control form-select" id="">
                    <option selected value="">--SELECT--</option>
                    <option value="BIRTH CERTIFICATE">Birth Certificate</option>
                    <option value="DEATH CERTIFICATE">Death Certificate</option>
                    <option value="HEALTH RECORD">Health Record</option>
                    <option value="SCHOOL RECORD">School Record</option>
                    <option value="MONEY TRANSFER RECEIPT">Money transfer receipt</option>
                    <option value="VALID ID ISSUED 2016-2017">Valid ID issued 2016-2017</option>
                </select>
            </div>
            <div class="form-group w-100">
                <input type="file" name="v_proof_file2" class=" form-control" id="">
            </div>
        </div>
        <br>
        <div class="form-row col-lg-10 col-md-10 col-12 ms-auto me-auto justify-content-between">
            <div class="form-group w-100 ">
                <label for="" class="w-100 form-label">Civil Status: <i class="text-danger">*</i></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="partner1" onclick="checkStatus();" required value="Married"
                        type="radio" name="v_civil_status" id="">
                    <label class=" form-check-label" for="">Married</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input solo" value="Single" onclick="checkStatus();" type="radio"
                        name="v_civil_status" id="">
                    <label class=" form-check-label" for="">Single</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="partner2" onclick="checkStatus();" value="Cohabitation"
                        type="radio" name="v_civil_status" id="">
                    <label class=" form-check-label" for="">Cohabitation</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input solo" onclick="checkStatus();" value="Separated" type="radio"
                        name="v_civil_status" id="">
                    <label class=" form-check-label" for="">Separated</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input solo" onclick="checkStatus();" value="Widowed" type="radio"
                        name="v_civil_status" id="">
                    <label class=" form-check-label" for="">Widowed</label>
                </div>
            </div>
        </div>
        <br>
        <div class="form-row col-lg-10 col-md-10 col-12 ms-auto me-auto justify-content-between">
            <div class="form-group w-100" id="ifPartner">
                <label for="" class="w-100 form-label">Name of spouse/wife/partner:</label>
                <input type="text" name="v_partner_name" class=" form-control" id="partner">
            </div>
        </div>
        <div class="form-row m-2 text-center">
            <input type="submit" <?php global $display;
                                    if ($display == false) {
                                        echo "style='pointer-events:none;opacity:0.5;'";
                                    } else {
                                        echo "style='pointer-events:default;opacity:1;'";
                                    } ?> name="submitValidationInfo" value="SUBMIT"
                class="w-50 mt-2 ms-auto me-auto btn btn-success " />
        </div>
    </form>
</div>

<script>
function checkStatus() {
    if (document.getElementById('partner1').checked || document.getElementById('partner2').checked) {
        document.getElementById('ifPartner').style.display = 'block';
        document.getElementById('partner').required = true;
    } else {
        document.getElementById('ifPartner').style.display = 'none';
        document.getElementById('partner').required = false;

    }
}
</script>

<?php include "../../includes/footer.php" ?>