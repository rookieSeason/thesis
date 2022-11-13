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

            <a href="#" class="dropdown-item" <?php if ($_SESSION["usertype"] == "EMPLOYEE") {
                                                    if ($row['user_type'] == 'EMPLOYEE' || $row['user_type'] == 'ADMIN') {
                                                        echo "style='pointer-events:none;opacity:0.5;'";
                                                    }
                                                } ?> data-bs-toggle="modal"
                data-bs-target="#editModal<?php echo $row['user_id']; ?>">
                <i class=" fa fa-edit "></i> EDIT</a>
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
                <h4 class="modal-title"> <i class="fa fa-file"></i> VIEW USER INFORMATION</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                    style="min-height: 83vh; ">
                    <h2
                        class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                        USER DETAILS OF USER ID # <?php echo $row['user_id'] ?></h2>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-10 ">
                            <label class=" form-label" for="">Full Name</label>
                            <input class="form-control" readonly type="text"
                                value="<?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['ename'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class=" justify-content-evenly form-row text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Username</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['user_name'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">User Type</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['user_type'] ?>">
                        </div>

                    </div>
                    <br>

                    <div class="form-row justify-content-evenly text-start">
                        <div class="form-group col-3 ">
                            <label class=" form-label" for="">House #/Blk/Lot/Subdivision</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['detailed_add'] ?>">
                        </div>
                        <div class="form-group col-3 ">
                            <label style="overflow: hidden;" class=" form-label" for="">Barangay</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['barangay'] ?>">
                        </div>
                        <div class="form-group col-3 ">
                            <label class=" form-label" for="">City</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['city'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row justify-content-evenly text-start">
                        <div class="form-group col-3 ">
                            <label class=" form-label" for="">Birth date</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['bday'] ?>">
                        </div>
                        <div class="form-group col-3 ">
                            <label class=" form-label" for="">Age</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['age'] ?>">
                        </div>
                        <div class="form-group col-3 ">
                            <label class=" form-label" for="">Sex</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['gender'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row justify-content-evenly text-start">
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Contact Number</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['contact_no'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Email</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['email'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row justify-content-evenly text-start" <?php if ($row['user_type'] === "ISF") {
                                                                                echo "style= 'display:none;'";
                                                                            } ?>>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Job Position</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['job_position'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Job Description</label>
                            <textarea readonly name="" id="" rows="2"
                                class=" form-control text-start"><?php echo $row['job_description'] ?></textarea>

                        </div>
                    </div>
                    <br>
                    <div class="form-row justify-content-evenly text-start" <?php if ($row['user_type'] === "ISF") {
                                                                                echo "style= 'display:none;'";
                                                                            } ?>>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Hire Date</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['hire_date'] ?>">
                        </div>
                        <div class="form-group col-5 ">
                            <label class=" form-label" for="">Salary</label>
                            <input class="form-control" readonly type="text" value="<?php echo $row['salary'] ?>">

                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-file"></i> EDIT USER INFORMATION
                </h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="../../php_actions/hudrd-manage-users.php" method="POST">
                    <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                        style="min-height: 83vh; ">
                        <h2
                            class="p-3 border border-start-0 border-end-0 border-top-0 border-bottom border-1 border-secondary">
                            USER DETAILS OF USER ID # <?php echo $row['user_id'] ?></h2>
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Username</label>
                                <input class="form-control" readonly name="" type="text"
                                    value="<?php echo $row['user_name'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">User Type <?php if (
                                                                                $row['user_type']
                                                                                != "ISF"
                                                                            ) {
                                                                                echo '<i class="text-danger">*</i>';
                                                                            } ?></label>
                                <select name="user_type" <?php if ($row['user_type'] == "ISF") {
                                                                echo "readonly";
                                                            } else {
                                                                echo "required";
                                                            }  ?> class="form-control form-select">
                                    <option <?php if ($row['user_type'] == "EMPLOYEE") {
                                                echo "selected";
                                            } else if ($row['user_type'] == "ISF") {
                                                echo "hidden";
                                            } ?> value="EMPLOYEE">EMPLOYEE</option>
                                    <option <?php if ($row['user_type'] == "ADMIN") {
                                                echo "selected";
                                            } else if ($row['user_type'] == "ISF") {
                                                echo "hidden";
                                            } ?> value="ADMIN">ADMIN</option>
                                    <option <?php if ($row['user_type'] == "ISF") {
                                                echo "selected hidden";
                                            } else {
                                                echo "class='d-none'";
                                            } ?> value="ISF">ISF</option>
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">First Name <i class="text-danger">*</i></label>
                                <input class="form-control" required name="fname" type="text"
                                    value="<?php echo $row['fname'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Middle Name</label>
                                <input class="form-control" name="mname" type="text"
                                    value="<?php echo $row['mname'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class=" justify-content-evenly form-row text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Last Name <i class="text-danger">*</i></label>
                                <input class="form-control" required name="lname" type="text"
                                    value="<?php echo $row['lname'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Name Extension</label>
                                <input class="form-control" name="ename" type="text"
                                    value="<?php echo $row['ename'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start">
                            <div class="form-group col-3 ">
                                <label class=" form-label" for="">House #/Blk/Lot/Subdivision <i
                                        class="text-danger">*</i></label>
                                <input class="form-control" required name="detailed_add" type="text"
                                    value="<?php echo $row['detailed_add'] ?>">
                            </div>
                            <div class="form-group col-3 ">
                                <label style="overflow: hidden;" class=" form-label" for="">Barangay <i
                                        class="text-danger">*</i></label>
                                <input class="form-control" required name="barangay1" <?php if ($row['user_type'] == "ISF") {
                                                                                            echo "style = 'display:none'";
                                                                                        } ?> type="text"
                                    value="<?php echo $row['barangay'] ?>">
                                <select class="form-control form-select " required name="barangay2" <?php if ($row['user_type'] != "ISF") {
                                                                                                        echo "style = 'display:none'";
                                                                                                    } ?> id="">
                                    <option <?php if ($row['barangay'] == "ALIMA") {
                                                echo "selected";
                                            } ?> value="Alima">Alima </option>
                                    <option <?php if ($row['barangay'] == "ANIBAN I") {
                                                echo "selected";
                                            } ?> value="Aniban I">Aniban I</option>
                                    <option <?php if ($row['barangay'] == "ANIBAN II") {
                                                echo "selected";
                                            } ?> value="Aniban II">Aniban II</option>
                                    <option <?php if ($row['barangay'] == "ANIBAN III") {
                                                echo "selected";
                                            } ?> value="Aniban III">Aniban III</option>
                                    <option <?php if ($row['barangay'] == "ANIBAN IV") {
                                                echo "selected";
                                            } ?> value="Aniban IV">Aniban IV</option>
                                    <option <?php if ($row['barangay'] == "ANIBAN V") {
                                                echo "selected";
                                            } ?> value="Aniban V">Aniban V</option>
                                    <option <?php if ($row['barangay'] == "BANALO") {
                                                echo "selected";
                                            } ?> value="Banalo">Banalo</option>
                                    <option <?php if ($row['barangay'] == "BAYANAN") {
                                                echo "selected";
                                            } ?> value="Bayanan">Bayanan</option>
                                    <option <?php if ($row['barangay'] == "CAMPO SANTO") {
                                                echo "selected";
                                            } ?> value="Campo Santo">Campo Santo</option>
                                    <option <?php if ($row['barangay'] == "DAANG BUKID") {
                                                echo "selected";
                                            } ?> value="Daang Bukid">Daang Bukid</option>

                                    <option <?php if ($row['barangay'] == "DIGMAN") {
                                                echo "selected";
                                            } ?> value="Digman">Digman </option>
                                    <option <?php if ($row['barangay'] == "DULONG BAYAN") {
                                                echo "selected";
                                            } ?> value="Dulong Bayan">Dulong Bayan</option>
                                    <option <?php if ($row['barangay'] == "HABAY I") {
                                                echo "selected";
                                            } ?> value="Habay I">Habay I</option>
                                    <option <?php if ($row['barangay'] == "HABAY II") {
                                                echo "selected";
                                            } ?> value="Habay II">Habay II</option>
                                    <option <?php if ($row['barangay'] == "KAINGIN") {
                                                echo "selected";
                                            } ?> value="Kaingin">Kaingin</option>
                                    <option <?php if ($row['barangay'] == "LIGAS I") {
                                                echo "selected";
                                            } ?> value="Ligas I">Ligas I</option>
                                    <option <?php if ($row['barangay'] == "LIGAS II") {
                                                echo "selected";
                                            } ?> value="Ligas II">Ligas II</option>
                                    <option <?php if ($row['barangay'] == "LIGAS III") {
                                                echo "selected";
                                            } ?> value="Ligas III">Ligas III</option>
                                    <option <?php if ($row['barangay'] == "MABOLO I") {
                                                echo "selected";
                                            } ?> value="Mabolo I">Mabolo I</option>
                                    <option <?php if ($row['barangay'] == "MABOLO II") {
                                                echo "selected";
                                            } ?> value="Mabolo II">Mabolo II</option>

                                    <option <?php if ($row['barangay'] == "MABOLO III") {
                                                echo "selected";
                                            } ?> value="Mabolo III">Mabolo III </option>
                                    <option <?php if ($row['barangay'] == "MALIKSI I") {
                                                echo "selected";
                                            } ?> value="Maliksi I">Maliksi I</option>
                                    <option <?php if ($row['barangay'] == "MALIKSI II") {
                                                echo "selected";
                                            } ?> value="Maliksi II">Maliksi II</option>
                                    <option <?php if ($row['barangay'] == "MALIKSI III") {
                                                echo "selected";
                                            } ?> value="Maliksi III">Maliksi III</option>
                                    <option <?php if ($row['barangay'] == "MAMBOG I") {
                                                echo "selected";
                                            } ?> value="Mambog I">Mambog I</option>
                                    <option <?php if ($row['barangay'] == "MAMBOG II") {
                                                echo "selected";
                                            } ?> value="Mambog II">Mambog II</option>
                                    <option <?php if ($row['barangay'] == "MAMBOG III") {
                                                echo "selected";
                                            } ?> value="Mambog III">Mambog III</option>
                                    <option <?php if ($row['barangay'] == "MAMBOG IV") {
                                                echo "selected";
                                            } ?> value="Mambog IV">Mambog IV</option>
                                    <option <?php if ($row['barangay'] == "MAMBOG V") {
                                                echo "selected";
                                            } ?> value="Mambog V">Mambog V</option>
                                    <option <?php if ($row['barangay'] == "MOLINO I") {
                                                echo "selected";
                                            } ?> value="Molino I">Molino I</option>

                                    <option <?php if ($row['barangay'] == "MOLINO II") {
                                                echo "selected";
                                            } ?> value="Molino II">Molino II </option>
                                    <option <?php if ($row['barangay'] == "MOLINO III") {
                                                echo "selected";
                                            } ?> value="Molino III">Molino III</option>
                                    <option <?php if ($row['barangay'] == "MOLINO IV") {
                                                echo "selected";
                                            } ?> value="Molino IV">Molino IV</option>
                                    <option <?php if ($row['barangay'] == "MOLINO V") {
                                                echo "selected";
                                            } ?> value="Molino V">Molino V</option>
                                    <option <?php if ($row['barangay'] == "MOLINO VI") {
                                                echo "selected";
                                            } ?> value="Molino VI">Molino VI</option>
                                    <option <?php if ($row['barangay'] == "MOLINO VII") {
                                                echo "selected";
                                            } ?> value="Molino VII">Molino VII</option>
                                    <option <?php if ($row['barangay'] == "NIOG I") {
                                                echo "selected";
                                            } ?> value="Niog I">Niog I</option>
                                    <option <?php if ($row['barangay'] == "NIOG II") {
                                                echo "selected";
                                            } ?> value="Niog II">Niog II</option>
                                    <option <?php if ($row['barangay'] == "NIOG III") {
                                                echo "selected";
                                            } ?> value="Niog III">Niog III</option>
                                    <option <?php if ($row['barangay'] == "P.F. ESPIRITU I (PANAPAAN)") {
                                                echo "selected";
                                            } ?> value="P.F. Espiritu I (Panapaan)">P.F. Espiritu I (Panapaan)</option>

                                    <option <?php if ($row['barangay'] == "P.F. ESPIRITU II") {
                                                echo "selected";
                                            } ?> value="P.F. Espiritu II">P.F. Espiritu II</option>
                                    <option <?php if ($row['barangay'] == "P.F. ESPIRITU III") {
                                                echo "selected";
                                            } ?> value="P.F. Espiritu III">P.F. Espiritu III</option>
                                    <option <?php if ($row['barangay'] == "P.F. ESPIRITU IV") {
                                                echo "selected";
                                            } ?> value="P.F. Espiritu IV">P.F. Espiritu IV</option>
                                    <option <?php if ($row['barangay'] == "P.F. ESPIRITU V") {
                                                echo "selected";
                                            } ?> value="P.F. Espiritu V">P.F. Espiritu V</option>
                                    <option <?php if ($row['barangay'] == "P.F. ESPIRITU VI") {
                                                echo "selected";
                                            } ?> value="P.F. Espiritu VI">P.F. Espiritu VI</option>
                                    <option <?php if ($row['barangay'] == "P.F. ESPIRITU VII") {
                                                echo "selected";
                                            } ?> value="P.F. Espiritu VII">P.F. Espiritu VII</option>
                                    <option <?php if ($row['barangay'] == "P.F. ESPIRITU VIII") {
                                                echo "selected";
                                            } ?> value="P.F. Espiritu VIII">P.F. Espiritu VIII</option>
                                    <option <?php if ($row['barangay'] == "QUEENS ROW CENTRAL") {
                                                echo "selected";
                                            } ?> value="Queens Row Central">Queens Row Central</option>
                                    <option <?php if ($row['barangay'] == "QUEENS ROW EAST") {
                                                echo "selected";
                                            } ?> value="Queens Row East">Queens Row East</option>
                                    <option <?php if ($row['barangay'] == "QUEENS ROW WEST") {
                                                echo "selected";
                                            } ?> value="Queens Row West">Queens Row West</option>

                                    <option <?php if ($row['barangay'] == "Real I") {
                                                echo "selected";
                                            } ?> value="Real I">Real I</option>
                                    <option <?php if ($row['barangay'] == "REAL I") {
                                                echo "selected";
                                            } ?> value="Real II">Real II</option>
                                    <option <?php if ($row['barangay'] == "SALINAS I") {
                                                echo "selected";
                                            } ?> value="Salinas I">Salinas I</option>
                                    <option <?php if ($row['barangay'] == "SALINAS II") {
                                                echo "selected";
                                            } ?> value="Salinas II">Salinas II</option>
                                    <option <?php if ($row['barangay'] == "SALINAS III") {
                                                echo "selected";
                                            } ?> value="Salinas III">Salinas III</option>
                                    <option <?php if ($row['barangay'] == "SALINAS IV") {
                                                echo "selected";
                                            } ?> value="Salinas IV">Salinas IV</option>
                                    <option <?php if ($row['barangay'] == "SAN NICOLAS I") {
                                                echo "selected";
                                            } ?> value="San Nicolas I">San Nicolas I</option>
                                    <option <?php if ($row['barangay'] == "SAN NICOLAS II") {
                                                echo "selected";
                                            } ?> value="San Nicolas II">San Nicolas II</option>
                                    <option <?php if ($row['barangay'] == "SAN NICOLAS III") {
                                                echo "selected";
                                            } ?> value="San Nicolas III">San Nicolas III</option>
                                    <option <?php if ($row['barangay'] == "SINEGUELASAN") {
                                                echo "selected";
                                            } ?> value="Sineguelasan">Sineguelasan</option>



                                    <option <?php if ($row['barangay'] == "TABING DAGAT") {
                                                echo "selected";
                                            } ?> value="Tabing Dagat">Tabing Dagat</option>
                                    <option <?php if ($row['barangay'] == "TALABA I") {
                                                echo "selected";
                                            } ?> value="Talaba I">Talaba I</option>
                                    <option <?php if ($row['barangay'] == "TALABA II") {
                                                echo "selected";
                                            } ?> value="Talaba II">Talaba II</option>
                                    <option <?php if ($row['barangay'] == "TALABA III") {
                                                echo "selected";
                                            } ?> value="Talaba III">Talaba III</option>
                                    <option <?php if ($row['barangay'] == "TALABA IV") {
                                                echo "selected";
                                            } ?> value="Talaba IV">Talaba IV</option>
                                    <option <?php if ($row['barangay'] == "TALABA V") {
                                                echo "selected";
                                            } ?> value="Talaba V">Talaba V</option>
                                    <option <?php if ($row['barangay'] == "TALABA VI") {
                                                echo "selected";
                                            } ?> value="Talaba VI">Talaba VI</option>
                                    <option <?php if ($row['barangay'] == "TALABA VII") {
                                                echo "selected";
                                            } ?> value="Talaba VII">Talaba VII</option>
                                    <option <?php if ($row['barangay'] == "ZAPOTE I") {
                                                echo "selected";
                                            } ?> value="Zapote I">Zapote I</option>
                                    <option <?php if ($row['barangay'] == "ZAPOTE II") {
                                                echo "selected";
                                            } ?> value="Zapote II">Zapote II</option>

                                    <option <?php if ($row['barangay'] == "ZAPOTE III") {
                                                echo "selected";
                                            } ?> value="Zapote III">Zapote III</option>
                                    <option <?php if ($row['barangay'] == "ZAPOTE IV") {
                                                echo "selected";
                                            } ?> value="Zapote IV">Zapote IV</option>
                                    <option <?php if ($row['barangay'] == "ZAPOTE V") {
                                                echo "selected";
                                            } ?> value="Zapote V">Zapote V</option>
                                </select>
                            </div>
                            <div class="form-group col-3 ">
                                <label class=" form-label" for="">City <i class="text-danger">*</i></label>
                                <input class="form-control" required name="city" type="text"
                                    value="<?php echo $row['city'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start">
                            <div class="form-group col-3 ">
                                <label class=" form-label" for="">Birth date <i class="text-danger">*</i></label>
                                <input class="form-control" required onchange="fnCalculateAge()" id="bday" name="bday"
                                    type="date" value="<?php echo $row['bday'] ?>">

                            </div>
                            <div class="form-group col-3 ">
                                <label class=" form-label" for="">Age <i class="text-danger">*</i></label>
                                <input class="form-control" readonly id="ageTotal" name="age" type="number"
                                    value="<?php echo $row['age'] ?>">
                            </div>
                            <div class="form-group col-3 ">
                                <label class=" form-label" for="">Sex <i class="text-danger">*</i></label>
                                <select class="form-control form-select" required name="gender" id="" required>

                                    <option <?php if ($row['gender'] == "Female") {
                                                echo "selected";
                                            } ?> value="Female">Female</option>
                                    <option <?php if ($row['gender'] == "Male") {
                                                echo "selected";
                                            } ?> value="Male">Male</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start">
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Contact Number <i class="text-danger">*</i></label>
                                <input class="form-control" required pattern="^(09|\+639)\d{9}$"
                                    title="Number must start with 09/+639 followed by 9 digits" name="contact_no"
                                    type="text" value="<?php echo $row['contact_no'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Email <i class="text-danger">*</i></label>
                                <input class="form-control" required name="email" type="text"
                                    value="<?php echo $row['email'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start" <?php if ($row['user_type'] === "ISF") {
                                                                                    echo "style= 'display:none;'";
                                                                                } ?>>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Job Position <i class="text-danger">*</i>'</label>
                                <input class="form-control" name="job_position" <?php if (
                                                                                    $row['user_type']
                                                                                    != "ISF"
                                                                                ) {
                                                                                    echo 'required';
                                                                                } ?> type="text"
                                    value="<?php echo $row['job_position'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Job Description</label>
                                <textarea name="job_description" id="" rows="2"
                                    class=" form-control text-start"><?php echo $row['job_description'] ?></textarea>

                            </div>
                        </div>
                        <br>
                        <div class="form-row justify-content-evenly text-start" <?php if ($row['user_type'] === "ISF") {
                                                                                    echo "style= 'display:none;'";
                                                                                } ?>>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Hire Date</label>
                                <input class="form-control" name="hire_date" <?php if (
                                                                                    $row['user_type']
                                                                                    != "ISF"
                                                                                ) {
                                                                                    echo 'required';
                                                                                } ?> type="date"
                                    value="<?php echo $row['hire_date'] ?>">
                            </div>
                            <div class="form-group col-5 ">
                                <label class=" form-label" for="">Salary</label>
                                <input class="form-control" name="salary" type="number"
                                    value="<?php echo $row['salary'] ?>">

                            </div>
                        </div>
                        <br>
                    </div>

            </div>
            <div class=" modal-footer  justify-content-end">
                <div class=" w-75 justify-content-end">
                    <div class="justify-content-end text-end">
                        <input type="submit" class="col-lg-3 btn btn-success col-3" name="submitEditEmployee"
                            value="SUBMIT"
                            <?php if ($row['user_type'] === 'ISF') {
                                                                                                                                    echo "style= 'display:none'";
                                                                                                                                }  ?>>
                        <input type="submit" class="col-lg-3 btn btn-success col-3" name="submitEditUser" value="SUBMIT"
                            <?php if ($row['user_type'] === 'ADMIN' or $row['user_type'] === 'EMPLOYEE') {
                                                                                                                                echo "style= 'display:none'";
                                                                                                                            }  ?>>

                        </form>
                        <button class=" col-lg-3 btn btn-secondary col-3" data-bs-dismiss="modal">Cancel</button>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>



<div class="modal fade" id="deleteModal<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-keyboard="false" data-bs-backdrop="static">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">
                <h4 class="modal-title"> <i class="fa fa-trash"></i> ARCHIVE USER ACCOUNT</h4>
                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <label class="text-center">Are you sure that you want to archive this
                        user??</label>
                    <div class="m-4 row">
                        <a href="../../php_actions/hudrd-manage-users.php?deleteID=<?php echo $row['user_id']; ?>"
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
function fnCalculateAge() {

    var userDateinput = document.getElementById("bday").value;

    // convert user input value into date object
    var birthDate = new Date(userDateinput);

    // get difference from current date;
    var difference = Date.now() - birthDate.getTime();

    var ageDate = new Date(difference);
    var calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);
    document.getElementById("ageTotal").value = calculatedAge;
}
</script>