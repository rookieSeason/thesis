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
                data-bs-target="#viewModal<?php echo $row['f_id']; ?>">
                <i class=" fa fa-file "></i> VIEW</a>
        </li>
        <li>

            <a type="button" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                    echo "style='pointer-events:none;opacity:0.5;'";
                                } ?> href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#deleteModal<?php echo $row['f_id']; ?>" data-bs-dismiss="modal">
                <i class=" fa fa-trash "></i> ARCHIVE</a>
        </li>
    </ul>
</div>



<div class="modal fade" id="viewModal<?php echo $row['f_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-lg modal-fullscreen-sm-down modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-pencil"></i> FEEDBACK/CONCERN DETAILS</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="../../php_actions/hudrd-manage-concerns.php" method="POST">
                    <input type="hidden" name="f_id" value="<?php echo $row['f_id'] ?>">
                    <div class="form-row">
                        <div class="form-group text-start w-100 form-floating">

                            <input type="text" id="cName" readonly class="form-control w-100 ms-auto me-auto"
                                style="background:white ;" name="name" placeholder="Sender"
                                value="<?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?>">
                            <label for="cName" class="form-label">Sender:</label>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group text-start w-50 form-floating">
                            <input type="text" id="cEmail" readonly class="form-control w-100 ms-auto me-auto"
                                name="email" style="background:white ;" placeholder="Sender"
                                value="<?php echo $row['email'] ?>">
                            <label for="cEmail" class="form-label">Email:</label>
                        </div>
                        <div class="form-group text-start w-50 form-floating">
                            <input type="text" id="cNum" readonly class="form-control w-100 ms-auto me-auto"
                                name="cpNum" style="background:white ;" placeholder="Sender"
                                value="<?php echo $row['cp_num'] ?>">
                            <label for="cEmail" class="form-label">Phone number:</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group text-start w-100 form-floating">

                            <textarea class="form-control w-100 ms-auto me-auto" readonly name=""
                                style="background:white ;height:80px" id="cMessage"><?php echo $row['concern'] ?>
                        </textarea>
                            <label for="cMessage" class="form-label">Sender Message:</label>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-row">
                        <div class="w-75 text-start">
                            <label for="" class="form-label"><b>RESPONSE: <i class="text-danger">*</i></b></label>
                        </div>
                        <div class="form-group text-start w-100 form-floating">


                            <textarea class="form-control w-100 ms-auto me-auto" required name="response" <?php if ($row['response'] != '') {
                                                                                                                echo 'readonly';
                                                                                                            } ?>
                                style="background:white ;height:80px "
                                id="cResponse"><?php echo $row['response'] ?></textarea>
                            <label for="cResponse" class="form-label">Sender Response:</label>
                        </div>
                    </div>
            </div>

            <div class=" modal-footer  justify-content-end">
                <div class=" w-75 justify-content-end">
                    <div class="justify-content-end text-end">
                        <input type="submit" name="submitResponse" value="SUBMIT" class=" btn btn-primary w-25" <?php if ($row['c_status'] === 'RESPONDED') {
                                                                                                                    echo "style= 'pointer-events: none;opacity:.5;'";
                                                                                                                }  ?>>
                        <a id="btnCancelRemove" href="#" data-bs-dismiss="modal" class="btn col btn-danger w-25">
                            Cancel</a>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



<div class="modal fade" id="deleteModal<?php echo $row['f_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> ARCHIVE FEEDBACK/CONCERN</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="text-center">Are you sure that you want to archive this?</label>
                    <div class="m-4 row">
                        <a href="../../php_actions/hudrd-manage-concerns.php?deleteID=<?php echo $row['f_id']; ?>"
                            class="btn col btn-success w-25">YES</a>

                        <a id="btnCancelRemove" href="#" data-bs-dismiss="modal" class="btn col btn-danger w-25">
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>