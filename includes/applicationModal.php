<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="dropdownMenu1" type="button" data-bs-toggle="dropdown">
        ACTION
    </button>
    <ul class="dropdown-menu" id="" aria-labelledby="dropdownMenu1">
        <li>
            <hr class="dropdown-divider" />
        </li>
        <li>
            <a type="button" href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#manageModal<?php echo $row['reg_id']; ?>">
                <i class=" fa fa-check-circle "></i> VERIFY</a>
        </li>
        <li>

            <a type="button" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                    echo "style='pointer-events:none;opacity:0.5;'";
                                } ?> href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#deleteModal<?php echo $row['reg_id']; ?>" data-bs-dismiss="modal">
                <i class=" fa fa-trash "></i> ARCHIVE</a>
        </li>
    </ul>
</div>




<div class="modal fade" id="manageModal<?php echo $row['reg_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-file"></i> VIEW ACCOUNT APPLICATION</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="row justify-content-evenly p-1" id=""
                    action="../php_actions/hudrd-manage-reg.php">
                    <div class="col-lg-7 bg-light col-12 mb-2 mt-2 border border-1 border-dark "
                        style="min-height: 83vh; ">
                        <h4 class="p-3">REGISTRATION DETAILS</h4>
                        <hr>
                        <div class="justify-content-evenly text-end">
                            <!-- '<a href onclick="view_reg_image(. $row['reg_id']);">'; -->
                            <?php echo '<a href="#" onclick="view_reg_image(' . $row['reg_id'] . ');">';
                            echo '<img class="col-3" id="reg_img' . $row['reg_id'] . '" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/> </a>'  ?>

                        </div>

                        <div class=" justify-content-evenly text-end">
                            <label class="col-3 
                             text-center text-wrap">Status: <?php echo $row['reg_status'] ?></label>
                        </div>
                        <br>
                        <div class=" form-row text-start">
                            <div class="form-group col-12 ">
                                <label class=" form-label" for="">Full Name</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . ' ' . $row['ext_name'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">House #/Blk/Lot/Subdivision</label>
                                <input class="form-control" readonly type="text" value="<?php echo $row['address'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Barangay</label>
                                <input class="form-control" readonly type="text" value="<?php echo $row['barangay'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start">
                            <div class="form-group col-4 ">
                                <label class=" form-label" for="">Birth date</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['birthdate'] ?>">
                            </div>
                            <div class="form-group col-4 ">
                                <label class=" form-label" for="">Age</label>
                                <input class="form-control" readonly type="text" value="<?php echo $row['age'] ?>">
                            </div>
                            <div class="form-group col-4 ">
                                <label class=" form-label" for="">Sex</label>
                                <input class="form-control" readonly type="text" value="<?php echo $row['sex'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Contact Number</label>
                                <input class="form-control" readonly type="text"
                                    value="<?php echo $row['contact_no'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Email</label>
                                <input class="form-control" readonly type="text" value="<?php echo $row['email'] ?>">
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-4 bg-light border border-1 border-dark col-12 mb-2 mt-2 "
                        style="max-height: 70vh; overflow:auto">
                        <div>
                            <h4 class="p-4">MATCHING DATA IN ISF DATABASE</h4>
                            <hr>
                            <table class="text-center table table-bordered table-striped">

                                <?php
                                $f = $row['first_name'];
                                $m = $row['middle_name'];
                                $l = $row['last_name'];
                                $e = $row['ext_name'];
                                $d = $row['address'];
                                $b = $row['barangay'];

                                $findMatch = "SELECT * FROM tbl_users  WHERE fname = '$f' AND mname = '$m' AND lname ='$l' AND ename = '$e' AND detailed_add LIKE '%$d%' AND barangay = '$b' AND user_type='ISF'";

                                $result1 = $conn->query($findMatch);

                                if (mysqli_num_rows($result1) > 0) {
                                    while ($row1 = $result1->fetch_array()) :
                                ?>
                                <tr>
                                    <th colspan="2" class="text-center "> DETAILS FOUND
                                    </th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo $row1['fname'] . " " . $row1['mname'] . " " . $row1['lname'] . " " . $row1['ename'] ?>
                                    </td>
                                </tr>


                                <tr>
                                    <th>Address</th>

                                    <td><?php echo $row1['detailed_add'] ?></td>

                                </tr>
                                <tr>
                                    <th>Barangay</th>
                                    <td><?php echo $row1['barangay'] ?></td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center text-success"> SUGGESTION: APPROVE APPLICATION
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="background-color: #fff;"></td>
                                </tr>
                                <?php

                                    endwhile;
                                } else {
                                    echo '<tr>
                                    <td colspan="3" class="text-center">
                                    NO RECORDS FOUND 
                                    </td>
                                    </tr>';

                                    echo '<tr>
                                    <th colspan="3" class=" text-danger text-center">
                                    SUGGESTION: DECLINE APPLICATION
                                    </th>
                                    </tr>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class=" modal-footer  justify-content-end">
                <div class=" w-75 justify-content-end">
                    <div class="justify-content-end text-end">
                        <a href="../../php_actions/hudrd-manage-reg.php?approveId=<?php echo $row['reg_id']; ?>"
                            class=" col-lg-3 col-3 btn btn-success"
                            <?php if ($row['reg_status'] === 'APPROVED' or $row['reg_status'] === 'REJECTED') {
                                                                                                                                                                echo "style= 'pointer-events: none;opacity:.5;'";
                                                                                                                                                            }  ?>>APPROVE</a>
                        <a type="button" href="#" class="col-lg-3 btn btn-danger col-3" data-bs-toggle="modal"
                            data-bs-target="#declineModal<?php echo $row['reg_id']; ?>" data-bs-dismiss="modal"
                            <?php if ($row['reg_status'] === 'APPROVED' or $row['reg_status'] === 'REJECTED') {
                                                                                                                                                                                                        echo "style= 'pointer-events: none;opacity:.5;'";
                                                                                                                                                                                                    }  ?>>DECLINE</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>




<div class="modal fade" id="declineModal<?php echo $row['reg_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> DECLINE ACCOUNT APPLICATION</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="text-center">Are you sure that you want to decline the account
                        application?</label>
                    <div class="m-4 row">
                        <a href="../../php_actions/hudrd-manage-reg.php?declineId=<?php echo $row['reg_id']; ?>"
                            class="btn col btn-danger w-25">YES</a>

                        <a id="btnCancelRemove" href="#" data-bs-dismiss="modal" data-bs-toggle="modal"
                            data-bs-target="#manageModal<?php echo $row['reg_id']; ?>" class="btn col btn-primary w-25">
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- delete modal -->


<div class="modal fade" id="deleteModal<?php echo $row['reg_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
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
                        <a href="../../php_actions/hudrd-manage-reg.php?deleteID=<?php echo $row['reg_id']; ?>"
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
function view_reg_image(id) {
    var newId = "reg_img" + id;
    var reg_image = document.getElementById(newId).src;
    var image = new Image();
    image.src = reg_image;

    var w = window.open("");
    w.document.write(image.outerHTML);
    w.document.close();
}
</script>