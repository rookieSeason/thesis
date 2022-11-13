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
                data-bs-target="#viewModal<?php echo $row['r_id']; ?>">
                <i class=" fa fa-file "></i> VIEW</a>
        </li>
        <li>

            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#editModal<?php echo $row['r_id']; ?>">
                <i class=" fa fa-edit "></i> EDIT</a>
        </li>
        <li>

            <a type="button" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                    echo "style='pointer-events:none;opacity:0.5;'";
                                } ?> href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#deleteModal<?php echo $row['r_id']; ?>" data-bs-dismiss="modal">
                <i class=" fa fa-trash "></i> ARCHIVE</a>
        </li>
    </ul>
</div>

<div class="modal fade" id="viewModal<?php echo $row['r_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-file"></i> VIEW RELOCATION AREA</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                    style="min-height: 83vh; ">
                    <h2
                        class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                        DETAILS OF RELOCATION AREA # <?php echo $row['r_id'] ?></h2>
                    <br>
                    <div class="form-row">

                        <div class="form-group text-start w-100">
                            <div class="w-75 ms-auto me-auto">
                                <label for="r_name" class="form-label">Area Name:</label>
                            </div>
                            <input type="text" readonly class="form-control w-75 ms-auto me-auto" name="r_name"
                                placeholder="Area Name" value="<?php echo $row['r_name'] ?>">
                        </div>
                        <br>
                        <div class=" form-group text-start w-100">
                            <div class="w-75 ms-auto me-auto">
                                <label for="r_location" class=" form-label">Location:</label>
                            </div>
                            <input type="text" readonly class="form-control w-75 ms-auto me-auto" name="r_location"
                                placeholder="Area Name"
                                value="<?php echo "BARANGAY " . $row['r_location'] . ", NAIC, CAVITE" ?>">
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class=" form-row justify-content-center ">

                        <h4 class=" w-75 text-start col-12 ms-auto me-auto" style="border-bottom:1px solid gray ;">
                            Primary
                            Developer Details</h4>
                        <div class="form-group text-start col-12 w-75">

                            <label for="r_primary_dev_name" class=" form-label ">
                                Name:</label>
                            <input type="text" readonly class="form-control ms-auto me-auto" name="r_primary_dev_name"
                                placeholder="Primary Developer Name" value="<?php echo $row['r_primary_dev_name'] ?>">
                        </div>

                        <div class="w-75 mt-2 form-row">
                            <div class="form-group text-start col-6">
                                <label for="r_primary_dev_contact" class=" form-label">
                                    Contact Number:</label>
                                <input type="text" readonly class="form-control ms-auto me-auto"
                                    name="r_primary_dev_contact" placeholder="Primary Developer Contact Number"
                                    value="<?php echo $row['r_primary_dev_contact'] ?>">
                            </div>
                            <div class="form-group text-start col-6">
                                <label for="r_primary_dev_email" class=" form-label ">
                                    Email:</label>
                                <input type="email" readonly class="form-control  ms-auto me-auto"
                                    name="r_primary_dev_email" placeholder="Primary Developer Email Address"
                                    value="<?php echo $row['r_primary_dev_email'] ?>">
                            </div>
                        </div>

                    </div>

                    <hr class="w-75 ms-auto me-auto">
                    <div class="form-group text-start w-100">
                        <div class=" form-group text-start w-100">
                            <div class="w-75 ms-auto me-auto">
                                <label for="r_total_families" class=" form-label">Total number of relocated ISF in
                                    area:</label>
                            </div>
                            <input type="text" readonly class="form-control w-75 ms-auto me-auto"
                                name="r_total_families" value="<?php echo $row['r_total_families'] ?>">
                        </div>

                        <div class="w-75 ms-auto me-auto">
                            <label for="r_status" class=" form-label">Area Status:</label>
                        </div>
                        <select disabled name="r_status" id="" class="form-select w-75 ms-auto me-auto">
                            <option <?php if ($row['r_status'] == "ONGOING RELOCATION") {
                                        echo "selected";
                                    } ?> value="ONGOING RELOCATION">ONGOING RELOCATION</option>
                            <option <?php if ($row['r_status'] == "RELOCATION FINISHED") {
                                        echo "selected";
                                    } ?> value="RELOCATION FINISHED">RELOCATION FINISHED</option>
                        </select>


                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal<?php echo $row['r_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-file"></i> EDIT RELOCATION AREA</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="" action="../../php_actions/hudrd-manage-area.php" autocomplete="off">
                    <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                        style="min-height: 83vh; ">
                        <h2
                            class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                            DETAILS OF RELOCATION AREA # <?php echo $row['r_id'] ?></h2>
                        <input type="hidden" name="r_id" value="<?php echo $row['r_id'] ?>">
                        <br>
                        <div class="form-row justify-content-center">

                            <div class="form-group text-start w-100">
                                <div class="w-75 ms-auto me-auto">
                                    <label for="r_name" class="form-label">Area Name: <i
                                            class="text-danger">*</i></label>
                                </div>
                                <input type="text" required class="form-control w-75 ms-auto me-auto" name="r_name"
                                    placeholder="Area Name" value="<?php echo $row['r_name'] ?>">
                            </div>
                            <br>
                            <div class=" form-row text-start w-75">
                                <?php

                                ?>
                                <div class="form-group text-start col-6">
                                    <label for="r_primary_dev_contact" class=" form-label">
                                        City: <i class="text-danger">*</i></label>
                                    <select name="editCity" required class="form-control form-select"
                                        id="city2<?php echo $row['r_id'] ?>"
                                        onchange="populate(this.id,'brgy2<?php echo $row['r_id'] ?>');">
                                        <option <?php $location_value =  $row['r_location'];
                                                $city_value = explode(',', $location_value);
                                                ?> hidden value="<?php echo  $city_value[1]; ?>">
                                            <?php echo  $city_value[1]; ?></option>
                                        <option value="ALFONSO">ALFONSO</option>
                                        <option value="AMADEO">AMADEO</option>
                                        <option value='BACOOR CITY'>BACOOR CITY</option>
                                        <option value='CARMONA'>CARMONA</option>
                                        <option value='CAVITE CITY'>CAVITE CITY</option>
                                        <option value='DASMARIÑAS'>DASMARIÑAS</option>
                                        <option value='GEN. MARIANO ALVAREZ'>GEN. MARIANO ALVAREZ</option>
                                        <option value='GENERAL EMILIO AGUINALDO'>GENERAL EMILIO AGUINALDO</option>
                                        <option value='GENERAL TRIAS'>GENERAL TRIAS</option>
                                        <option value='IMUS CITY'>IMUS CITY</option>
                                        <option value='INDANG'>INDANG</option>
                                        <option value='KAWIT'>KAWIT</option>
                                        <option value='MAGALLANES'>MAGALLANES</option>
                                        <option value='MARAGONDON'>MARAGONDON</option>
                                        <option value='MENDEZ (MENDEZ-NUÑEZ)'>MENDEZ (MENDEZ-NUÑEZ)</option>
                                        <option value='NAIC'>NAIC</option>
                                        <option value='NOVELETA'>NOVELETA</option>
                                        <option value='ROSARIO'>ROSARIO</option>
                                        <option value='SILANG'>SILANG</option>
                                        <option value='TAGAYTAY CITY'>TAGAYTAY CITY</option>
                                        <option value='TANZA'>TANZA</option>
                                        <option value='TERNATE'>TERNATE</option>
                                        <option value='TRECE MARTIRES CITY'>TRECE MARTIRES CITY</option>
                                    </select>
                                </div>
                                <div class="form-group text-start col-6">
                                    <label for="" class=" form-label ">
                                        Barangay: <i class="text-danger">*</i></label>
                                    <select name="editBrgy" class="form-control form-select"
                                        id="brgy2<?php echo $row['r_id'] ?>">
                                        <option <?php $location_value =  $row['r_location'];
                                                $brgy_value = explode(',', $location_value);
                                                ?> hidden value="<?php echo  $brgy_value[0]; ?>">
                                            <?php echo  $brgy_value[0]; ?></option>
                                    </select>
                                </div>
                            </div>
                            <br>
                        </div>
                        <br>
                        <div class=" form-row justify-content-center ">

                            <h4 class=" w-75 col-12 text-start ms-auto me-auto" style="border-bottom:1px solid gray ;">
                                Primary
                                Developer Details</h4>
                            <div class="form-group text-start col-12 w-75">

                                <label for="r_primary_dev_name" class=" form-label ">
                                    Name: <i class="text-danger">*</i></label>
                                <input type="text" required class="form-control ms-auto me-auto"
                                    name="r_primary_dev_name" placeholder="Primary Developer Name"
                                    value="<?php echo $row['r_primary_dev_name'] ?>">
                            </div>

                            <div class="w-75 mt-2 form-row">
                                <div class="form-group text-start col-6">
                                    <label for="r_primary_dev_contact" class=" form-label">
                                        Contact Number: <i class="text-danger">*</i></label>
                                    <input type="text" required class="form-control ms-auto me-auto"
                                        name="r_primary_dev_contact" placeholder="Primary Developer Contact Number"
                                        pattern="^(09|\+639)\d{9}$"
                                        title="Number must start with 09/+639 followed by 9 digits"
                                        value="<?php echo $row['r_primary_dev_contact'] ?>">
                                </div>
                                <div class="form-group text-start col-6">
                                    <label for="r_primary_dev_email" class=" form-label ">
                                        Email: <i class="text-danger">*</i></label>
                                    <input type="email" required class="form-control  ms-auto me-auto"
                                        name="r_primary_dev_email" placeholder="Primary Developer Email Address"
                                        value="<?php echo $row['r_primary_dev_email'] ?>">
                                </div>
                            </div>

                        </div>

                        <hr class="w-75 ms-auto me-auto">
                        <div class="form-group text-start w-100">
                            <div class=" form-group text-start w-100">
                                <div class="w-75 ms-auto me-auto">
                                    <label for="r_total_families" class=" form-label">Total number of relocated ISF in
                                        area: <i class="text-danger">*</i></label>
                                </div>
                                <input type="number" required class="form-control w-75 ms-auto me-auto"
                                    name="r_total_families" min="0" oninput="this.value|=0"
                                    value="<?php echo $row['r_total_families'] ?>">
                            </div>

                            <div class="w-75 ms-auto me-auto">
                                <label for="r_status" class=" form-label">Area Status: <i
                                        class="text-danger">*</i></label>
                            </div>
                            <select required name="r_status" id="" class="form-select w-75 ms-auto me-auto">
                                <option <?php if ($row['r_status'] == "ONGOING RELOCATION") {
                                            echo "selected";
                                        } ?> value="ONGOING RELOCATION">ONGOING RELOCATION</option>
                                <option <?php if ($row['r_status'] == "RELOCATION FINISHED") {
                                            echo "selected";
                                        } ?> value="RELOCATION FINISHED">RELOCATION FINISHED</option>
                            </select>


                        </div>
                        <br>
                        <div class="form-row text-center">
                            <input type="submit" name="submitUpdateArea" value="SAVE"
                                class="w-50 mt-2 ms-auto me-auto btn btn-success " />
                        </div>

                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal<?php echo $row['r_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> ARCHIVE RELOCATION AREA</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="text-center">Are you sure that you want to archive this
                        relocation area?</label>
                    <div class="m-4 row">
                        <a href="../../php_actions/hudrd-manage-area.php?deleteID=<?php echo $row['r_id']; ?>"
                            class="btn col btn-success w-25">YES</a>

                        <a id="btnCancelRemove" href="#" data-bs-dismiss="modal" class="btn col btn-danger w-25">
                            Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>