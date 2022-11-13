<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="dropdownMenu1" type="button" data-bs-toggle="dropdown">
        ACTION
    </button>
    <ul class="dropdown-menu" id="" aria-labelledby="dropdownMenu1">
        <li>
            <hr class="dropdown-divider" />
        </li>
        <li>
            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#viewModal<?php echo $row['user_id']; ?>">
                <i class=" fa fa-file "></i> VIEW</a>
        </li>
        <li>

            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#validateModal<?php echo $row['user_id']; ?>">
                <i class=" fa fa-edit "></i> MANAGE VALIDATION</a>
        </li>
        <li>

            <a type="button" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                    echo "style='pointer-events:none;opacity:0.5;'";
                                } ?> href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#deleteModal<?php echo $row['user_id']; ?>" data-bs-dismiss="modal">
                <i class=" fa fa-trash "></i> ARCHIVE</a>
        </li>
    </ul>
</div>



<div class="modal fade" id="viewModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-file"></i> VIEW VALIDATION INFORMATION</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                    style="min-height: 83vh; ">
                    <h2
                        class="p-3 text-wrap border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary ">
                        VALIDATION DETAILS OF USER ID # <?php echo $row['user_id'] ?></h2>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Name</label>
                            <input class="form-control" readonly type="text"
                                value="<?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['ename'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Validation Status</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['v_status'] ?>">
                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Occupant Type</label>
                            <input class="form-control" readonly type="text"
                                value="<?php echo $row['v_occupant_type'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Length of Stay</label>
                            <input class="form-control" readonly type="text"
                                value="<?php echo $row['v_length_of_stay'] . " years" ?>">
                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Structure Classification</label>
                            <input class="form-control" readonly type="text"
                                value="<?php echo $row['v_structure_class'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Structure Type</label>
                            <input class="form-control" readonly type="text"
                                value="<?php echo $row['v_structure_type'] ?>">
                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">(1) Proof of Residency Type</label>
                            <input class="form-control" readonly type=" text" value="<?php echo $row['v_proof1'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">File Name:</label>
                            <div class="input-group">
                                <input class="form-control" id="v_proof1<?php echo $row['user_id'] ?>" readonly
                                    type=" text" value="<?php echo $row['v_proof_file1'] ?>">
                                <button class="btn btn-primary" value="<?php echo $row['user_id'] ?>"
                                    onclick="viewProof1(this.value,'<?php echo $row['user_name']; ?>');">VIEW</button>
                            </div>

                        </div>

                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">(2) Proof of Residency Type</label>
                            <input class="form-control" readonly type=" text" value="<?php echo $row['v_proof2'] ?>">
                        </div>
                        <div class=" form-group col-5 ">
                            <label class=" form-label" for="">File Name:</label>
                            <div class="input-group">
                                <input class="form-control" id="v_proof2<?php echo $row['user_id'] ?>" readonly
                                    type="text" value="<?php echo $row['v_proof_file2'] ?>">
                                <!-- start of button -->
                                <?php
                                if (!empty($row['v_proof2'])) :                                                                                                                            ?>
                                <button class="btn btn-primary" value="<?php echo $row['user_id'] ?>"
                                    onclick="viewProof2(this.value,'<?php echo $row['user_name']; ?>');">VIEW</button>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class=" justify-content-evenly form-row text-start">

                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Civil Status</label>
                            <input class="form-control" readonly type="text"
                                value="<?php echo $row['v_civil_status'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Partner's Name (if applicable):'</label>
                            <input class="form-control" readonly type="text" value="<?php if (!empty($row['v_partner_name'])) {
                                                                                        echo $row['v_partner_name'];
                                                                                    } else {
                                                                                        echo "N/A";
                                                                                    }  ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row  w-100  justify-content-evenly text-start <?php if ($row['v_status'] == 'PENDING') {
                                                                                        echo "d-none";
                                                                                    } else {
                                                                                        echo "d-inline-flex";
                                                                                    } ?>">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Validated by:</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['v_handler'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Validated on:</label>
                            <input class="form-control" readonly type="text"
                                value="<?php echo $row['v_handled_date'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly m-3 w-100 form-row text-start" <?php if ($row['v_status'] == 'PENDING') {
                                                                                            echo "style='display:none';";
                                                                                        } else {
                                                                                            echo "style='display:inline-flex'";
                                                                                        } ?>>
                        <div class="form-group w-75">
                            <label class=" form-label" for="">Remarks:</label>
                            <input class="form-control" readonly type=" text" value="<?php echo $row['v_remark'] ?>">
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- validate modal -->

<div class="modal fade" id="validateModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-file"></i> VALIDATION</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- form dapat nasa baba method="POST"-->
                <div class="row justify-content-evenly p-1" id="">
                    <div class="col-lg-7 bg-light col-12 mb-2 mt-2 border border-1 border-dark "
                        style="min-height: 83vh; ">
                        <h4 class="p-3 text-wrap">VALIDATION INFORMATION OF USER# <?php echo $row['user_id']; ?></h4>
                        <hr>

                        <div class=" justify-content-evenly text-end">
                            <label class="col-3 text-wrap 
                             text-center " style=" font-weight:700">Status: <b
                                    class="<?php if ($row['v_status'] == 'PENDING') {
                                                                                            echo "text-secondary";
                                                                                        } else if ($row['v_status'] == 'DISQUALIFIED') {
                                                                                            echo "text-danger";
                                                                                        } else {
                                                                                            echo "text-success";
                                                                                        } ?>"><?php echo $row['v_status'] ?></b>
                            </label>
                        </div>
                        <br>
                        <div class=" form-row justify-content-evenly text-start">
                            <div class="form-group col-10 ">
                                <label class=" form-label" for="">Full Name</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['ename'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Occupant Type</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['v_occupant_type'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Length of Stay</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['v_length_of_stay'] . " years" ?>">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Structure Classification</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['v_structure_class'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Structure Type</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['v_structure_type'] ?>">
                            </div>

                        </div>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">(1) Proof of Residency Type</label>
                                <input class="form-control" readonly type=" text"
                                    value="<?php echo $row['v_proof1'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">File Name:</label>
                                <div class="input-group">
                                    <input class="form-control" id="v_proof1<?php echo $row['user_id'] ?>" readonly
                                        type=" text" value="<?php echo $row['v_proof_file1'] ?>">
                                    <button class="btn btn-primary" value="<?php echo $row['user_id'] ?>"
                                        onclick="viewProof1(this.value,'<?php echo $row['user_name']; ?>');">VIEW</button>
                                </div>

                            </div>

                        </div>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">(2) Proof of Residency Type</label>
                                <input class="form-control" readonly type=" text"
                                    value="<?php echo $row['v_proof2'] ?>">
                            </div>
                            <div class=" form-group col-5 ">
                                <label class=" form-label" for="">File Name:</label>
                                <div class="input-group">
                                    <input class="form-control" id="v_proof2<?php echo $row['user_id'] ?>" readonly
                                        type="text" value="<?php echo $row['v_proof_file2'] ?>">
                                    <!-- start of button -->
                                    <?php
                                    if (!empty($row['v_proof2'])) :                                                                                                                            ?>
                                    <button class="btn btn-primary" value="<?php echo $row['user_id'] ?>"
                                        onclick="viewProof2(this.value,'<?php echo $row['user_name']; ?>');">VIEW</button>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class=" justify-content-evenly form-row text-start">

                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Civil Status</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['v_civil_status'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Partner's Name (if applicable):'</label>
                                <input class="form-control" readonly type="text" value="<?php if (!empty($row['v_partner_name'])) {
                                                                                            echo $row['v_partner_name'];
                                                                                        } else {
                                                                                            echo "N/A";
                                                                                        }  ?>">
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-4 bg-light border border-1 border-dark col-12 mb-2 mt-2 "
                        style="max-height: 70vh; overflow:auto">
                        <div>
                            <h4 class="p-4">VALIDATION RECOMMENDATION</h4>
                            <hr>
                            <table class="text-center table table-bordered table-striped" style="table-layout: fixed;">
                                <tr>
                                    <th colspan="2" class="text-center ">OCCUPANT TYPE
                                    </th>
                                </tr>
                                <tr>
                                    <th>Recommendation:</th>
                                    <td style="white-space:normal ;">ISF who are renters are automatically
                                        disqualified.</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-start ">USER RESULT:
                                        <?php echo $row['v_occupant_type'] ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center ">CIVIL STATUS
                                    </th>
                                </tr>
                                <tr>
                                    <th>Recommendation:</th>
                                    <td style="white-space:normal ;">ISF who are single are automatically
                                        disqualified.</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-start">USER RESULT: <?php echo $row['v_civil_status'] ?>
                                    </th>
                                </tr>
                                <?php
                                if ($row['v_occupant_type'] == 'RENTER' || $row['v_civil_status'] == 'SINGLE') {
                                    echo "<tr>
                                    <th colspan='2' style='white-space:break-spaces ;' class='text-center text-danger'> SUGGESTION: USER IS   DISQUALIFIED
                                    </th>
                                </tr>";
                                } else {
                                    echo "<tr>
                                    <th colspan='2' style='white-space:break-spaces ;'  class='text-center text-success'> SUGGESTION: USER IS QUALIFIED
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
                <!-- form yung nasa taas na div dapat -->
            </div>
            <div class=" modal-footer  justify-content-end">
                <div class=" w-75 justify-content-end">
                    <div class="justify-content-end text-end">
                        <a href="../../php_actions/hudrd-manage-validation.php?approveId=<?php echo $row['v_id']; ?>&emailApprove=<?php echo $row['email']; ?>"
                            class=" col-lg-3 col-3 btn btn-success"
                            <?php if ($row['v_status'] === 'QUALIFIED' or $row['v_status'] === 'DISQUALIFIED') {
                                                                                                                                                                                                            echo "style= 'pointer-events: none;opacity:.5;'";
                                                                                                                                                                                                        }  ?>>APPROVE</a>
                        <a type="button" href="#" class="col-lg-3 btn btn-danger col-3" data-bs-toggle="modal"
                            data-bs-target="#rejectModal<?php echo $row['v_id']; ?>" data-bs-dismiss="modal"
                            <?php if ($row['v_status'] === 'QUALIFIED' or $row['v_status'] === 'DISQUALIFIED') {
                                                                                                                                                                                                    echo "style= 'pointer-events: none;opacity:.5;'";
                                                                                                                                                                                                }  ?>>REJECT</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- REJECT MODAL -->



<div class="modal fade" id="rejectModal<?php echo $row['v_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> DISQUALIFY USER</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="../../php_actions/hudrd-manage-validation.php" method="POST">
                    <div class="row justify-content-center">
                        <label class="text-center">Please state the reason for the disqualification:</label>
                        <div class="m-4 row">
                            <input type="text" required name="v_remarks" class="form-control mb-3">
                            <input type="hidden" name="v_id" value="<?php echo $row['v_id']; ?>">
                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                            <input type="submit" name="rejectValidation" class="btn col btn-danger w-25" value="YES">

                            <a id="btnCancelRemove" href="#" data-bs-dismiss="modal" data-bs-toggle="modal"
                                data-bs-target="#validateModal<?php echo $row['user_id']; ?>"
                                class="btn col btn-primary w-25">
                                Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- delete modal -->


<div class="modal fade" id="deleteModal<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> ARCHIVE RECORD</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="text-center">Are you sure that you want to archive this
                        record??</label>
                    <div class="m-4 row">
                        <a href="../../php_actions/hudrd-manage-validation.php?deleteID=<?php echo $row['user_id']; ?>"
                            class="btn col btn-success w-25">YES</a>

                        <a id="btnCancelRemove" href="#" data-bs-dismiss="modal" class="btn col btn-danger w-25">
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function viewProof1(id, username) {
    var newId = "v_proof1" + id;
    var proof_name = document.getElementById(newId).value;
    var dir_name = "../../validation_files/" + username;
    var location = dir_name + "/" + proof_name;
    window.open(location);
}

function viewProof2(id, username) {
    var newId = "v_proof2" + id;
    var proof_name = document.getElementById(newId).value;
    var dir_name = "../../validation_files/" + username;
    var location = dir_name + "/" + proof_name;
    window.open(location);
}
</script>