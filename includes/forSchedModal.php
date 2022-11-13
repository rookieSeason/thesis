<script>
function removeStyle() {
    var backBtn = document.getElementById("goBack");

    backBtn.style.opacity = "0";
    backBtn.style.zIndex = "-100000";
}
</script>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="dropdownMenu1" type="button" data-bs-toggle="dropdown">
        ACTION
    </button>
    <ul class="dropdown-menu" id="" aria-labelledby="dropdownMenu1">
        <li>
            <hr class="dropdown-divider" />
        </li>
        <li>
            <a href="#" onclick="removeStyle();" class="dropdown-item" <?php
                                                                        if ($row['s_status'] == 'NOT ALLOCATED') {
                                                                            echo "style='display:none;'";
                                                                        } ?> data-bs-toggle="modal"
                data-bs-target="#viewModal<?php echo $row['user_id']; ?>">
                <i class=" fa fa-file "></i> VIEW</a>
        </li>
        <li>

            <a href="#" onclick="removeStyle();" class="dropdown-item" <?php
                                                                        if ($row['s_status'] != 'NOT ALLOCATED') {
                                                                            echo "style='display:none;'";
                                                                        } ?> data-bs-toggle="modal"
                data-bs-target="#addModal<?php echo $row['user_id']; ?>">
                <i class=" fa fa-plus "></i> ADD SCHEDULE</a>
        </li>
        <li>

            <a href="#" onclick="removeStyle();" class="dropdown-item" <?php
                                                                        if ($row['s_status'] == 'NOT ALLOCATED') {
                                                                            echo "style='display:none;'";
                                                                        } ?> data-bs-toggle="modal"
                data-bs-target="#editModal<?php echo $row['user_id']; ?>">
                <i class=" fa fa-edit "></i> EDIT SCHEDULE</a>
        </li>
        <li>

            <a href="#" onclick="removeStyle();" class="dropdown-item" <?php
                                                                        $today = new DateTime('now');
                                                                        if ($row['s_status'] != 'ALLOCATED' || $today < $row['relocation_date']) {
                                                                            echo "style='display:none;'";
                                                                        } ?> data-bs-toggle="modal"
                data-bs-target="#confirmModal<?php echo $row['user_id']; ?>">
                <i class=" fa fa-check "></i> MARK AS RELOCATED </a>
        </li>
        <li>

            <a type="button" onclick="removeStyle();" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                                            echo "style='pointer-events:none;opacity:0.5;'";
                                                        } ?> href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#deleteModal<?php echo $row['user_id']; ?>" data-bs-dismiss="modal">
                <i class=" fa fa-trash "></i> ARCHIVE</a>
        </li>
    </ul>
</div>


<!-- view modal  -->
<div class="modal fade" id="viewModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style="background:linear-gradient(90deg,#a2beff,#be9cfe);">
                <h4 class="modal-title"> <i class="fa fa-file"></i> VIEW RELOCATION SCHEDULE
                </h4>
                <button id="Button2" class="btn-close" onclick="addStyle();" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- <form action="../../php_actions/hudrd-manageSched.php" method="POST"> -->
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                    style="min-height: 75vh; ">
                    <h2
                        class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                        VIEW SCHEDULE FOR USER ID # <?php echo $row['user_id'] ?></h2>
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                    <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
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
                    <div class=" justify-content-evenly form-row text-start">
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
                    <div class=" justify-content-evenly form-row text-start">
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
                            <input class="form-control" readonly value="<?php echo $row['relocation_slot'] ?>"
                                type="text">
                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Schedule Allotment Date
                            </label>
                            <input class="form-control" readonly value="<?php echo $row['schedAllotment_date'] ?>"
                                type="text">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Handled by:</label>
                            <input class="form-control" readonly value="<?php echo $row['s_handler'] ?>" type="text">
                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Status Type
                            </label>
                            <input class="form-control" readonly value="<?php echo $row['s_status'] ?>" type="text">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Remarks</label>
                            <textarea readonly class="form-control" required
                                rows="2"><?php echo $row['sched_remarks'] ?></textarea>
                        </div>

                    </div>
                    <br>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- add modal -->
<div class="modal fade" id="addModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); ">
                <h4 class="modal-title"> <i class="fa fa-file"></i> ADD RELOCATION SCHEDULE
                </h4>
                <button id="Button2" class="btn-close" onclick="addStyle();" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="../../php_actions/hudrd-manageSched.php" method="POST">
                    <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                        style="min-height: 83vh; ">
                        <h2
                            class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                            ADD SCHEDULE FOR USER ID # <?php echo $row['user_id'] ?></h2>
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                        <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Date of Relocation <i
                                        class="text-danger">*</i></label>
                                <input class="form-control" required name="r_date" type="datetime-local">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Date of Orientation <i
                                        class="text-danger">*</i></label>
                                <input class="form-control" required name="o_date" type="datetime-local">
                            </div>

                        </div>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
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
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">House Code<i class="text-danger">*</i></label>
                                <input class="form-control" name="r_slot" type="text" required>
                            </div>
                        </div>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-10 ">
                                <label class=" form-label" for="">Remarks<i class="text-danger">*</i></label>
                                <textarea name="r_remarks" class="form-control" required rows="1"></textarea>
                            </div>
                        </div>
                        <br>
                    </div>

            </div>
            <div class=" modal-footer  justify-content-end">
                <div class=" w-75 justify-content-end">
                    <div class="justify-content-end text-end">
                        <input type="submit" class="col-lg-3 btn btn-success col-3" name="submitAddSched"
                            value="SUBMIT">

                        </form>
                        <button class=" col-lg-3 btn btn-secondary col-3" onclick="addStyle();"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- edit modal -->
<div class="modal fade" id="editModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); ">
                <h4 class="modal-title"> <i class="fa fa-file"></i> EDIT RELOCATION SCHEDULE
                </h4>
                <button id="Button2" class="btn-close" onclick="addStyle();" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="../../php_actions/hudrd-manageSched.php" method="POST">
                    <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                        style="min-height: 83vh; ">
                        <h2
                            class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                            EDIT SCHEDULE FOR USER ID # <?php echo $row['user_id'] ?></h2>
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                        <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Date of Relocation <i
                                        class="text-danger">*</i></label>
                                <input class="form-control" required name="r_date"
                                    value="<?php echo $row['relocation_date'] ?>" type="datetime-local">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Date of Orientation <i
                                        class="text-danger">*</i></label>
                                <input class="form-control" required name="o_date"
                                    value="<?php echo $row['orientation_date'] ?>" type="datetime-local">
                            </div>

                        </div>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Relocation Area <i class="text-danger">*</i></label>
                                <select name="r_id" required class="form-control form-select">
                                    <?php
                                    $dropsql2 = "SELECT * FROM tbl_relocation_area WHERE r_id = '" . $row['r_id'] . "'";
                                    $dsResult2 = $conn->query($dropsql2);
                                    if ($dsResult2->num_rows > 0) {
                                        while ($row2 = $dsResult2->fetch_assoc()) {
                                            echo "<option hidden value='" . $row2['r_id'] . "'>" . $row2['r_name'] . "</option>";
                                        }
                                    }
                                    $dropsql3 = "SELECT * FROM tbl_relocation_area WHERE r_status = 'ONGOING RELOCATION'";
                                    $dsResult3 = $conn->query($dropsql3);
                                    if ($dsResult3->num_rows > 0) {
                                        while ($row3 = $dsResult3->fetch_assoc()) {
                                            echo "<option value='" . $row3['r_id'] . "'>" . $row3['r_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">House Code <i class="text-danger">*</i></label>
                                <input class="form-control" value="<?php echo $row['relocation_slot'] ?>" name="r_slot"
                                    type="text" required>
                            </div>
                        </div>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Status Type <i class="text-danger">*</i>
                                </label>
                                <select name="s_status" required class="form-control form-select">
                                    <option hidden selected value="<?php echo $row['s_status'] ?>">
                                        <?php echo $row['s_status'] ?>
                                    </option>";
                                    <option class="" value="ALLOCATED">ALLOCATED</option>
                                    <option class="" value="RELOCATED">RELOCATED</option>
                                </select>
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Remarks <i class="text-danger">*</i></label>
                                <textarea name="r_remarks" class="form-control" required
                                    rows="2"><?php echo $row['sched_remarks'] ?></textarea>
                            </div>

                        </div>
                    </div>

            </div>
            <div class=" modal-footer  justify-content-end">
                <div class=" w-75 justify-content-end">
                    <div class="justify-content-end text-end">
                        <input type="submit" class="col-lg-3 btn btn-success col-3" name="submitEditSched"
                            value="SUBMIT">

                        </form>
                        <button class=" col-lg-3 btn btn-secondary col-3" onclick="addStyle();"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- confirm modal  -->

<div class="modal fade" id="confirmModal<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> MARK USER AS RELOCATED</h4>
                <button id="Button2" class="btn-close" onclick="addStyle();" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="text-center">Are you sure that you want to mark this user as relocated?</label>
                    <div class="m-4 row">
                        <a href="../../php_actions/hudrd-manageSched.php?confirmID=<?php echo $row['user_id']; ?>"
                            class="btn col btn-success w-25">YES</a>

                        <a id="btnCancelRemove" href="#" onclick="addStyle();" data-bs-dismiss="modal"
                            class="btn col btn-danger w-25">
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- delete modal  -->

<div class="modal fade" id="deleteModal<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> ARCHIVE SCHEDULE</h4>
                <button id="Button2" class="btn-close" onclick="addStyle();" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="text-center">Are you sure that you want to archive this user's schedule?</label>
                    <div class="m-4 row">
                        <a href="../../php_actions/hudrd-manageSched.php?deleteID=<?php echo $row['user_id']; ?>"
                            class="btn col btn-success w-25">YES</a>

                        <a id="btnCancelRemove" href="#" onclick="addStyle();" data-bs-dismiss="modal"
                            class="btn col btn-danger w-25">
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>