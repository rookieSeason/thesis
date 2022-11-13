<?php include "../../includes/isf-header.php";
include "checkIfIsf.php";
include "checkIfQualified.php";

if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="text-start ms-3">
    <?php
    req_status();
    ?>

</div>
<?php if (isset($_SESSION['submitRequirementSuccess'])) : ?>
<br>
<div class="alert alert-success alert-dismissible " role="alert">

    <h6 class="text-success">
        <?php
            echo $_SESSION['submitRequirementSuccess'];
            unset($_SESSION['submitRequirementSuccess']);
            ?>
    </h6>
    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
</div>
<?php endif ?>
<?php if (isset($_SESSION['ReqFileWrongExt'])) : ?>
<br>
<div class="alert alert-danger alert-dismissible " role="alert">

    <h6 class="text-danger">
        <?php
            echo $_SESSION['ReqFileWrongExt'];
            unset($_SESSION['ReqFileWrongExt']);
            ?>
    </h6>
    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
</div>
<?php endif ?>
<?php if (isset($_SESSION['ReqFileTooBig'])) : ?>
<br>
<div class="alert alert-danger alert-dismissible " role="alert">

    <h6 class="text-danger">
        <?php
            echo $_SESSION['ReqFileTooBig'];
            unset($_SESSION['ReqFileTooBig']);
            ?>
    </h6>
    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
</div>
<?php endif ?>

<!-- message for resubmit success -->

<?php if (isset($_SESSION['resub'])) : ?>
<br>
<div class="alert alert-success alert-dismissible " role="alert">

    <h6 class="text-success">
        <?php
            echo $_SESSION['resub'];
            unset($_SESSION['resub']);
            ?>
    </h6>
    <button type="button" data-bs-dismiss="alert" class="btn-close" style=" font-size:small"></button>
</div>
<?php endif ?>

<div class="col-lg-6 pb-4 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
    style="min-height: 65vh; ">
    <h4 class="m-3">REQUIREMENT CHECKLIST (WE ONLY ACCEPT PDF FILES)</h4>
    <hr>
    <!-- CHECKLIST -->
    <?php
    $username = $_SESSION['username'];
    $query = $conn->query("SELECT * FROM tbl_requirements INNER JOIN tbl_users ON tbl_users.user_id = tbl_requirements.user_id INNER JOIN tbl_validation ON tbl_validation.user_id = tbl_requirements.user_id LEFT JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE tbl_accounts.user_name ='$username'");
    if ($query) {

        while ($row = $query->fetch_assoc()) :

    ?>
    <div class=" justify-content-evenly form-row">
        <div class="form-check ">
            <input type="checkbox" disabled class=" form-check-input" <?php if ($row['req_complete'] == "1") {
                                                                                    echo "checked";
                                                                                } ?>>
            <label for="">COMPLETE</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class=" form-check-input" disabled <?php if ($row['req_complete'] == "0") {
                                                                                    echo "checked";
                                                                                } ?> id="">
            <label for="">INCOMPLETE</label>
        </div>
    </div>
    <br>
    <div class="form-check form-row m-2">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_valid_id1']) && !empty($row['req_valid_id2'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">2 VALID GOVERNMENT ID'S (Front and Back. Barangay issued is not accepted)</label>
    </div>
    <div class="form-check form-row m-2">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_birthcert'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">BIRTH CERTIFICATE OF HEAD (Account Owner)</label>
    </div>
    <div class="form-check form-row m-2">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_birthcert_partner'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">BIRTH CERTIFICATE OF PARTNER</label>
    </div>
    <div class="form-check form-row m-2">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_birthcert_fam'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">BIRTH CERTIFICATE OF FAMILY COMPOSITION (Compiled in a PDF)</label>
    </div>
    <div class="form-check form-row m-2">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_income_or_employment'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">AFFIDAVIT OF INCOME (NOTARIZED)/CERTIFICATE OF EMPLOYMENT</label>
    </div>
    <div class="form-check form-row m-2">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_family_pic'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">FAMILY PICTURE (With own house as background; jpg,jpeg,png allowed)</label>
    </div>
    <div class="form-check form-row m-2">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_cohab_or_marriage'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">AFFIDAVIT COHABITATION (NOTARIZED)/MARRIAGE CONTRACT </label>
    </div>
    <div class="form-check form-row m-2  <?php if ($row['age'] < 60) {
                                                        echo "d-none";
                                                    } ?>">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_affi_transfer'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">AFFIDAVIT OF TRANSFER IF OVERAGED</label>
    </div>
    <div class="form-check form-row m-2">
        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_nha_form'])) {
                                                                        echo "checked";
                                                                    } ?> disabled id="">
        <label for="">NHA FORM</label>
    </div>



    <div class="form-row justify-content-center">
        <?php include "../../includes/submitReqModal.php"; ?>
    </div>

</div>

<br>
<div class="col-lg-11 pb-4 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
    style="min-height: 40vh; ">
    <h4 class="m-3">SAMPLE TEMPLATES</h4>
    <hr>

    <div class="table-responsive" style="min-height: 40vh;">
        <table class="text-center table table-bordered table-striped">
            <tr class="text-start">
                <th>AFFIDAVIT OF COHABITATION TEMPLATE</th>
                <td class="text-center"><?php include "../../includes/cohabitationModal.php"; ?></td>
            </tr>
            <tr class="text-start">
                <th>AFFIDAVIT OF INCOME TEMPLATE</th>
                <td class="text-center"><?php include "../../includes/incomeModal.php"; ?></td>
            </tr>
            <tr class="text-start <?php if ($row['age'] < 60) {
                                        echo "d-none";
                                    } ?>">
                <th>AFFIDAVIT OF TRANSFER TEMPLATE</th>
                <td class="text-center"><?php include "../../includes/transferModal.php"; ?></td>
            </tr>
            <tr class="text-start">
                <th>NHA FORM</th>
                <td class="text-center"><?php include "../../includes/nhaModal.php"; ?></td>
            </tr>
        </table>
    </div>
</div>
<?php
        endwhile;
    }
?>
<?php include "../../includes/footer.php" ?>