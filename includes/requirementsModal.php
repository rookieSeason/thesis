<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="dropdownMenu1" type="button" data-bs-toggle="dropdown">
        ACTION
    </button>
    <ul class="dropdown-menu" id="" aria-labelledby="dropdownMenu1">
        <li>
            <hr class="dropdown-divider" />
        </li>
        <li>
            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row['req_id']; ?>">
                <i class=" fa fa-file "></i> VIEW</a>
        </li>
        <li <?php if ($row['req_complete'] == '1') {
                echo "class='d-none'";
            } else if ($row['req_complete'] == '1' && $row['req_status'] != 'PENDING') {
                echo "class='d-none'";
            } else if ($row['req_complete'] == '0' && $row['req_status'] != 'PENDING') {
                echo "class='d-none'";
            } ?>>
            <a href="../../php_actions/hudrd-manage-requirements.php?remindEmail=<?php echo $row['email']; ?>" class="dropdown-item">
                <i class=" fa fa-plus-square "></i> REMIND</a>
        </li>
        <li>

            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#checkReqModal<?php echo $row['req_id']; ?>">
                <i class=" fa fa-edit "></i> MANAGE REQUIREMENTS</a>
        </li>
        <li>

            <a type="button" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                    echo "style='pointer-events:none;opacity:0.5;'";
                                } ?> href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['req_id']; ?>" data-bs-dismiss="modal">
                <i class=" fa fa-trash "></i> ARCHIVE</a>
        </li>
    </ul>
</div>


<div class="modal fade" id="viewModal<?php echo $row['req_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between" style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto" style="min-height: 83vh; ">
                    <h2 class="p-3 text-wrap border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                        REQUIREMENTS SUBMITTED BY USER
                        <?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['ename'] ?>
                    </h2>
                    <input type="hidden" id="username<?php echo $row['req_id']; ?>" value="<?php echo $row['user_name']; ?>">
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <h5 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                            VALID ID'S</h5>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Valid ID 1:</label>
                            <div class="input-group">
                                <input class="form-control" id="v1<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_valid_id1'] ?>">
                                <?php if (!empty($row['req_valid_id1'])) {
                                    $v1 = "'v1" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Valid ID 2:</label>
                            <div class="input-group">
                                <input class="form-control" id="v2<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_valid_id2'] ?>">
                                <?php if (!empty($row['req_valid_id2'])) {
                                    $v1 = "'v2" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>

                            </div>
                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <h5 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                            BIRTH CERTIFICATES</h5>
                        <div class="form-group col-10 col-lg-3 col-md-3 ">
                            <label class=" form-label" for="">Household Head's':</label>
                            <div class="input-group">
                                <input class="form-control" id="v3<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_birthcert'] ?>">
                                <?php if (!empty($row['req_birthcert'])) {
                                    $v1 = "'v3" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group col-10 col-lg-3 col-md-3 ">
                            <label class=" form-label" for="">Partner's':</label>
                            <div class="input-group">
                                <input class="form-control" id="v4<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_birthcert_partner'] ?>">
                                <?php if (!empty($row['req_birthcert_partner'])) {
                                    $v1 = "'v4" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group col-10 col-lg-3 col-md-3 ">
                            <label class=" form-label" for="">Family Composition's':</label>
                            <div class="input-group">
                                <input class="form-control" id="v5<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_birthcert_fam'] ?>">
                                <?php if (!empty($row['req_birthcert_fam'])) {
                                    $v1 = "'v5" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <h5 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                        </h5>
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Affidavit of Income or Certificate of Employment:</label>
                            <div class="input-group">
                                <input class="form-control" id="v6<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_income_or_employment'] ?>">
                                <?php if (!empty($row['req_income_or_employment'])) {
                                    $v1 = "'v6" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Family Picture:</label>
                            <div class="input-group">
                                <input class="form-control" id="v7<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_family_pic'] ?>">
                                <?php if (!empty($row['req_family_pic'])) {
                                    $v1 = "'v7" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Affidavit of Cohabitation or Marriage Contract::</label>
                            <div class="input-group">
                                <input class="form-control" id="v8<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_cohab_or_marriage'] ?>">
                                <?php if (!empty($row['req_cohab_or_marriage'])) {
                                    $v1 = "'v8" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>

                        </div>
                    </div>
                    <br <?php if ($row['age'] < 60) {
                            echo "class='d-none'";
                        } ?>>
                    <div class=" justify-content-evenly form-row text-start <?php if ($row['age'] < 60) {
                                                                                echo "d-none";
                                                                            } ?>">
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Affidavit of Transfer (required if overaged only):</label>
                            <div class="input-group">
                                <input class="form-control" id="v9<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_affi_transfer'] ?>">
                                <?php if (!empty($row['req_affi_transfer'])) {
                                    $v1 = "'v9" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-10">
                            <label class=" form-label" for="">NHA Form:</label>
                            <div class="input-group">
                                <input class="form-control" id="v10<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_nha_form'] ?>">
                                <?php if (!empty($row['req_nha_form'])) {
                                    $v1 = "'v10" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row  w-100  justify-content-evenly text-start <?php if ($row['req_status'] == 'PENDING') {
                                                                                        echo "d-none";
                                                                                    } else {
                                                                                        echo "d-inline-flex";
                                                                                    } ?>">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Checked by:</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['req_handler'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Validated on:</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['req_handled_date'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly m-3 w-100 form-row text-start" <?php if ($row['req_status'] == 'PENDING') {
                                                                                            echo "style='display:none';";
                                                                                        } else {
                                                                                            echo "style='display:inline-flex'";
                                                                                        } ?>>
                        <div class="form-group w-75">
                            <label class=" form-label" for="">Remarks:</label>
                            <input class="form-control" readonly type=" text" value="<?php echo $row['req_remark'] ?>">
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- requirement modal -->

<div class="modal fade" id="checkReqModal<?php echo $row['req_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between" style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body row justify-content-evenly p-1">
                <div class="col-lg-7 bg-light col-12 mb-2 mt-2 border border-1 border-dark " style="min-height: 83vh; ">
                    <h2 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary" style="white-space:pre-line ;">
                        REQUIREMENTS SUBMITTED BY USER
                        <?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['ename'] ?>
                    </h2>

                    <div class=" justify-content-evenly text-end">
                        <label class="col-3 
                             text-center text-wrap" style=" font-weight:700">Status: <b class="<?php if ($row['v_status'] == 'PENDING') {
                                                                                                    echo "text-secondary";
                                                                                                } else if ($row['req_status'] == 'DISQUALIFIED') {
                                                                                                    echo "text-danger";
                                                                                                } else {
                                                                                                    echo "text-success";
                                                                                                } ?>"><?php echo $row['req_status'] ?></b>
                        </label>
                    </div>
                    <br>
                    <input type="hidden" id="username<?php echo $row['req_id']; ?>" value="<?php echo $row['user_name']; ?>">
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <h5 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                            VALID IDs</h5>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Valid ID 1:</label>
                            <div class="input-group">
                                <input class="form-control" id="v1<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_valid_id1'] ?>">
                                <?php if (!empty($row['req_valid_id1'])) {
                                    $v1 = "'v1" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Valid ID 2:</label>
                            <div class="input-group">
                                <input class="form-control" id="v2<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_valid_id2'] ?>">
                                <?php if (!empty($row['req_valid_id2'])) {
                                    $v1 = "'v2" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>

                            </div>
                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <h5 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                            BIRTH CERTIFICATES</h5>
                        <div class="form-group col-10 col-lg-3 col-md-3 ">
                            <label class=" form-label" for="">Household Head's':</label>
                            <div class="input-group">
                                <input class="form-control" id="v3<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_birthcert'] ?>">
                                <?php if (!empty($row['req_birthcert'])) {
                                    $v1 = "'v3" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group col-10 col-lg-3 col-md-3 ">
                            <label class=" form-label" for="">Partner's':</label>
                            <div class="input-group">
                                <input class="form-control" id="v4<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_birthcert_partner'] ?>">
                                <?php if (!empty($row['req_birthcert_partner'])) {
                                    $v1 = "'v4" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group col-10 col-lg-3 col-md-3 ">
                            <label class=" form-label" for="">Family Composition's':</label>
                            <div class="input-group">
                                <input class="form-control" id="v5<?php echo $row['req_id']; ?>" readonly type=" text" value="<?php echo $row['req_birthcert_fam'] ?>">
                                <?php if (!empty($row['req_birthcert_fam'])) {
                                    $v1 = "'v5" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <h5 class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary col-11 ms-auto me-auto">
                        </h5>
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Affidavit of Income or Certificate of
                                Employment:</label>
                            <div class="input-group">
                                <input class="form-control" id="v6<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_income_or_employment'] ?>">
                                <?php if (!empty($row['req_income_or_employment'])) {
                                    $v1 = "'v6" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Family Picture:</label>
                            <div class="input-group">
                                <input class="form-control" id="v7<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_family_pic'] ?>">
                                <?php if (!empty($row['req_family_pic'])) {
                                    $v1 = "'v7" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Affidavit of Cohabitation or Marriage
                                Contract::</label>
                            <div class="input-group">
                                <input class="form-control" id="v8<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_cohab_or_marriage'] ?>">
                                <?php if (!empty($row['req_cohab_or_marriage'])) {
                                    $v1 = "'v8" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>

                        </div>
                    </div>
                    <br <?php if ($row['age'] < 60) {
                            echo "class='d-none'";
                        } ?>>
                    <div class=" justify-content-evenly form-row text-start <?php if ($row['age'] < 60) {
                                                                                echo "d-none";
                                                                            } ?>">
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Affidavit of Transfer (required if overaged
                                only):</label>
                            <div class="input-group">
                                <input class="form-control" id="v9<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_affi_transfer'] ?>">
                                <?php if (!empty($row['req_affi_transfer'])) {
                                    $v1 = "'v9" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-10">
                            <label class=" form-label" for="">NHA Form:</label>
                            <div class="input-group">
                                <input class="form-control" id="v10<?php echo $row['req_id']; ?>" readonly type="text" value="<?php echo $row['req_nha_form'] ?>">
                                <?php if (!empty($row['req_nha_form'])) {
                                    $v1 = "'v10" . $row['req_id'] . "'";
                                    $user = "'username" . $row['req_id'] . "'";
                                    echo '<button class="btn btn-primary" onclick="v1(' . $v1 . ',' . $user . ');"> VIEW </button>';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-lg-4 bg-light border border-1 border-dark col-12 mb-2 mt-2 " style="max-height: 70vh; overflow:auto">
                    <div>
                        <h4 class="p-4">REQUIREMENT CHECKLIST</h4>
                        <hr>
                        <table class="text-center table table-bordered table-striped" style="table-layout: fixed;">
                            <tr>
                                <th class="w-50">
                                    <div class="form-check ">
                                        <input type="checkbox" disabled class=" form-check-input" <?php if ($row['req_complete'] == "1") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                                        <label for="">COMPLETE</label>
                                    </div>
                                </th>
                                <th class="w-50">
                                    <div class="form-check">
                                        <input type="checkbox" class=" form-check-input" disabled <?php if ($row['req_complete'] == "0") {
                                                                                                        echo "checked";
                                                                                                    } ?> id="">
                                        <label for="">INCOMPLETE</label>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-check form-row m-2">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_valid_id1']) && !empty($row['req_valid_id2'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">2 VALID GOVERNMENT ID'S (Barangay issued is not accepted)</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-check form-row m-2">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_birthcert'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">BIRTH CERTIFICATE OF HEAD (Account Owner)</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-check form-row m-2">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_birthcert_partner'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">BIRTH CERTIFICATE OF PARTNER (Account Owner)</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-check form-row m-2">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_birthcert_fam'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">BIRTH CERTIFICATE OF FAMILY COMPOSITION (Compiled in a PDF)</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-check form-row m-2">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_income_or_employment'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">AFFIDAVIT OF INCOME (NOTARIZED)/CERTIFICATE OF EMPLOYMENT</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-check form-row m-2">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_family_pic'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">FAMILY PICTURE (With own house as background)</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-check form-row m-2">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_cohab_or_marriage'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">AFFIDAVIT COHABITATION (NOTARIZED)/MARRIAGE CONTRACT </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="<?php if ($row['age'] < 60) {
                                            echo "d-none";
                                        } ?>">
                                <td colspan="2">
                                    <div class="form-check form-row m-2  <?php if ($row['age'] < 60) {
                                                                                echo "d-none";
                                                                            } ?>">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_affi_transfer'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">AFFIDAVIT OF TRANSFER IF OVERAGED</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="form-check form-row m-2">
                                        <input type="checkbox" class=" form-check-input" <?php if (!empty($row['req_nha_form'])) {
                                                                                                echo "checked";
                                                                                            } ?> disabled id="">
                                        <label for="" style="white-space:break-spaces ;">NHA FORM</label>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            if ($row['req_complete'] == 1) {
                                echo "<tr>
                                    <th colspan='2' class='text-center text-success'> SUGGESTION: USER IS QUALIFIED
                                    </th>
                                </tr>";
                            } else {
                                echo "<tr>
                                <th colspan='2' class='text-center text-danger'> SUGGESTION: USER IS   DISQUALIFIED
                                </th>
                            </tr>";
                            }
                            ?>

                            <tr>
                                <td colspan="2" style="background-color: #fff;"></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <div class=" modal-footer  justify-content-end">
                <div class=" w-75 justify-content-end">
                    <div class="justify-content-end text-end">
                        <a href="../../php_actions/hudrd-manage-requirements.php?approveId=<?php echo $row['req_id']; ?>" class=" col-lg-3 col-3 btn btn-success" <?php if ($row['req_status'] === 'QUALIFIED' or $row['req_status'] === 'DISQUALIFIED') {
                                                                                                                                                                        echo "style= 'pointer-events: none;opacity:.5;'";
                                                                                                                                                                    } else if ($row['req_complete'] == 0) {
                                                                                                                                                                        echo "style= 'pointer-events: none;opacity:.5;'";
                                                                                                                                                                    }  ?>>APPROVE</a>
                        <a type="button" href="#" class="col-lg-3 btn btn-danger col-3" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo $row['req_id']; ?>" data-bs-dismiss="modal" <?php if ($row['req_status'] === 'QUALIFIED' or $row['req_status'] === 'DISQUALIFIED') {
                                                                                                                                                                                                        echo "style= 'pointer-events: none;opacity:.5;'";
                                                                                                                                                                                                    }  ?>>REJECT</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- REJECT MODAL -->



<div class="modal fade" id="rejectModal<?php echo $row['req_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between" style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> DISQUALIFY USER REQUIREMENTS</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="../../php_actions/hudrd-manage-requirements.php" method="POST">
                    <div class="row justify-content-center">
                        <label class="text-center">Please state the reason for the disqualification:</label>
                        <div class="m-4 row">
                            <input type="text" required name="req_remarks" class="form-control mb-3">
                            <input type="hidden" name="req_id" value="<?php echo $row['req_id']; ?>">
                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">

                            <input type="submit" name="rejectReq" class="btn col btn-danger w-25" value="YES">

                            <a id="btnCancelRemove" href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#checkReqModal<?php echo $row['req_id']; ?>" class="btn col btn-primary w-25">
                                Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- delete modal -->


<div class="modal fade" id="deleteModal<?php echo $row['req_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between" style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> ARCHIVE RECORD</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="text-center">Are you sure that you want to archive this
                        record??</label>
                    <div class="m-4 row">
                        <a href="../../php_actions/hudrd-manage-requirements.php?deleteID=<?php echo $row['req_id']; ?>&userID=<?php echo $row['user_id']; ?>" class="btn col btn-success w-25">YES</a>

                        <a id="btnCancelRemove" href="#" data-bs-dismiss="modal" class="btn col btn-danger w-25">
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function v1(vID, user) {
        var username = document.getElementById(user).value;
        var proof_name = document.getElementById(vID).value;
        var dir_name = "../../requirement_files/" + username + "/";
        var location = dir_name + proof_name;
        window.open(location);
    }
</script>