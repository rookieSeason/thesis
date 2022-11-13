<a type="button" href="#" class="btn btn-success ps-4 pe-4" <?php global $display;
                                                            if ($display == true) {
                                                                echo "style='pointer-events:none;opacity:0.5;'";
                                                            } else {
                                                                echo "style='pointer-events:default;opacity:1;'";
                                                            } ?> data-bs-toggle="modal"
    data-bs-target="#submitReqModal<?php echo $row['req_id']; ?>">
    SUBMIT REQUIREMENTS</a>


<div class="modal fade" id="submitReqModal<?php echo $row['req_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-file"></i> REQUIREMENTS</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="" action="../../php_actions/isf-submit-requirements.php" autocomplete="off"
                    enctype="multipart/form-data">
                    <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                        style="min-height: 83vh; ">
                        <h2
                            class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                            SUBMIT REQUIREMENTS</h2>
                        <br>
                        <input type="hidden" name="req_id" value="<?php echo $row['req_id'] ?>">
                        <input type="hidden" name="age" value="<?php echo $row['age'] ?>">
                        <br>
                        <h5
                            class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                            NON-BARANGAY ISSUED VALID ID'S</h5>
                        <br>
                        <div class="form-row justify-content-evenly">

                            <div class="form-group text-start col-lg-5 col-10">
                                <label for="req_valid_id1" class="form-label">1.) VALID ID:</label>
                                <?php
                                if (!empty($row['req_valid_id1'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_valid_id1" name="valid1"
                                        value="<?php echo $row['req_valid_id1'] ?>">
                                    <button class="btn btn-primary" name="resubmit_valid_id1"> RESUBMIT </button>
                                    <input type="file" value="" class="d-none" name="req_valid_id1">
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_valid_id1">
                                <input type="text" name="valid1" class="d-none" value="">
                                <?php
                                }
                                ?>

                            </div>
                            <div class=" form-group text-start col-lg-5 col-10">
                                <label for="req_valid_id2" class=" form-label">2.) VALID ID:</label>
                                <?php
                                if (!empty($row['req_valid_id2'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_valid_id2" name="valid2"
                                        value="<?php echo $row['req_valid_id2'] ?>">
                                    <button class="btn btn-primary" name="resubmit_valid_id2"> RESUBMIT </button>
                                    <input type="file" value="" class="d-none" name="req_valid_id2">
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control " name="req_valid_id2">
                                <input type="text" name="valid2" class="d-none" value="">
                                <?php
                                }
                                ?>

                            </div>

                        </div>
                        <br>
                        <h5
                            class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                            BIRTH CERTIFICATES</h5>
                        <br>
                        <div class="form-row justify-content-evenly">


                            <div class="form-group text-start  col-lg-3  col-10">

                                <label for="req_birthcert" class=" form-label ">FAMILY HEAD:</label>

                                <?php
                                if (!empty($row['req_birthcert'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_birthcert" name="b1"
                                        value="<?php echo $row['req_birthcert'] ?>">
                                    <button class="btn btn-primary" name="resubmit_birthcert"> RESUBMIT </button>
                                    <input type="file" value="" class="d-none" name="req_birthcert">
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_birthcert">
                                <input type="text" name="b1" class="d-none" value="">
                                <?php
                                }
                                ?>
                            </div>

                            <div class="form-group text-start col-lg-3  col-10">
                                <label for="req_birthcert_partner" class=" form-label">SPOUSE/WIFE/PARTNER:</label>

                                <?php
                                if (!empty($row['req_birthcert_partner'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_birthcert_partner"
                                        name="b2" value="<?php echo $row['req_birthcert_partner'] ?>">
                                    <button class="btn btn-primary" name="resubmit_birthcert_partner"> RESUBMIT
                                    </button>
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_birthcert_partner"
                                    value="<?php echo $row['req_birthcert_partner'] ?>">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group text-start col-lg-3  col-10">
                                <label for="req_birthcert_fam" class=" form-label ">FAMILY
                                    COMPOSITION:</label>

                                <?php
                                if (!empty($row['req_birthcert_fam'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_birthcert_fam" name="b3"
                                        value="<?php echo $row['req_birthcert_fam'] ?>">
                                    <button class="btn btn-primary" name="resubmit_birthcert_fam"> RESUBMIT </button>
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_birthcert_fam"
                                    value="<?php echo $row['req_birthcert_fam'] ?>">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <br>
                        <h5
                            class="border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                        </h5>
                        <div class="form-row m-3 justify-content-evenly">
                            <div class=" form-group text-start col-10">
                                <label for="req_income_or_employment" class=" form-label">AFFIDAVIT OF INCOME
                                    (NOTARIZED)/CERTIFICATE OF
                                    EMPLOYMENT:</label>

                                <?php
                                if (!empty($row['req_income_or_employment'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_income_or_employment"
                                        name="inc_emp" value="<?php echo $row['req_income_or_employment'] ?>">
                                    <button class="btn btn-primary" name="resubmit_income_or_employment"> RESUBMIT
                                    </button>
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_income_or_employment"
                                    value="<?php echo $row['req_income_or_employment'] ?>">
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <br>
                        <h5
                            class="border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                        </h5>
                        <div class="form-row m-3 justify-content-evenly">
                            <div class=" form-group text-start col-10">
                                <label for="req_family_pic" class=" form-label">COMPLETE FAMILY PICTURE (png,jpeg,jpg
                                    extensions allowed)</label>

                                <?php
                                if (!empty($row['req_family_pic'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_family_pic" name="fam"
                                        value="<?php echo $row['req_family_pic'] ?>">
                                    <button class="btn btn-primary" name="resubmit_family_pic"> RESUBMIT </button>
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_family_pic"
                                    value="<?php echo $row['req_family_pic'] ?>">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <br>
                        <h5
                            class="border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                        </h5>
                        <div class="form-row m-3 justify-content-evenly">
                            <div class=" form-group text-start col-10">
                                <label for="req_cohab_or_marriage" class=" form-label">AFFIDAVIT OF COHABITATION
                                    (NOTARIZED)/MARRIAGE CONTRACT:</label>

                                <?php
                                if (!empty($row['req_cohab_or_marriage'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_cohab_or_marriage"
                                        name="co_mar" value="<?php echo $row['req_cohab_or_marriage'] ?>">
                                    <button class="btn btn-primary" name="resubmit_cohab_or_marriage"> RESUBMIT
                                    </button>
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_cohab_or_marriage"
                                    value="<?php echo $row['req_cohab_or_marriage'] ?>">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <br>
                        <h5
                            class="border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto <?php if ($row['age'] < 60) {
                                                                                                                                                        echo "d-none";
                                                                                                                                                    } ?>">
                        </h5>
                        <div class="form-row m-3 justify-content-evenly <?php if ($row['age'] < 60) {
                                                                            echo "d-none";
                                                                        } ?>">
                            <div class=" form-group text-start col-10">
                                <label for="req_affi_transfer" class=" form-label">AFFIDAVIT OF TRANSFER (IF
                                    OVERAGED):</label>

                                <?php
                                if (!empty($row['req_affi_transfer'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_affi_transfer" name="trans"
                                        value="<?php echo $row['req_affi_transfer'] ?>">
                                    <button class="btn btn-primary" name="resubmit_affi_transfer"> RESUBMIT </button>
                                    <input type="file" value="" class="d-none" name="req_affi_transfer">
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_affi_transfer"
                                    value="<?php echo $row['req_affi_transfer'] ?>">
                                <input type="text" value="" class="d-none" name="trans">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <br>
                        <h5
                            class="border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                        </h5>
                        <div class="form-row m-3 justify-content-evenly">
                            <div class=" form-group text-start col-10">
                                <label for="req_nha_form" class=" form-label">NHA FORM:</label>

                                <?php
                                if (!empty($row['req_nha_form'])) {
                                ?>
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" id="req_nha_form" name="nha"
                                        value="<?php echo $row['req_nha_form'] ?>">
                                    <button class="btn btn-primary" name="resubmit_nha_form"> RESUBMIT </button>
                                </div>

                                <?php
                                } else {
                                ?>
                                <input type="file" accept=".pdf" class="form-control" name="req_nha_form"
                                    value="<?php echo $row['req_nha_form'] ?>">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="form-row text-center">
                            <input type="submit" name="submitUpdateReq" value="SUBMIT REQUIREMENTS"
                                class="w-50 mt-2 ms-auto me-auto btn btn-success " />
                        </div>

                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>