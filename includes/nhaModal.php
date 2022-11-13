<a type="button" href="#" class="btn text-center btn-primary w-75" data-bs-toggle="modal" data-bs-target="#nhaMod">
    VIEW</a>

<div class="modal fade" id="nhaMod" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false"
    data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">

                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title">NHA FORM</h4>
                <br>

                <!-- //old -->
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                    style="min-height: 83vh;">
                    <br>
                    <h5 class="col-12 ps-1 pb-3 text-start ms-auto me-auto" style="border-bottom:1px solid gray;">
                        Applicant's
                        Identity (For female applicant/spouse, give complete maiden name)</h5>
                    <br>
                    <div class="form-row text-center justify-content-evenly">
                        <div class="form-group  col-lg-3 col-10">
                            <input type="text" id="n1" class="form-control"></input>
                            <label class=" form-label" for="">(First)</label>
                        </div>
                        <div class="form-group col-lg-3 col-10">
                            <input type="text" id="n2" class="form-control"></input>
                            <label class=" form-label" for="">(Middle)</label>
                        </div>
                        <div class="form-group  col-lg-3 col-10">
                            <input type="text" id="n3" class="form-control"></input>
                            <label class=" form-label" for="">(Last)</label>
                        </div>
                        <div class="form-group col-lg-3 col-10">
                            <input type="text" id="n4" class="form-control"></input>
                            <label class=" form-label" for="">(Maiden)</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-row text-start justify-content-evenly">
                        <div class="form-group col-10">

                            <label class="" for="">Place of Birth</label>
                            <input type="text" class="form-control" id="n5"></input>
                        </div>

                    </div>
                    <br>
                    <div class="form-row text-start justify-content-evenly">
                        <div class="form-group col-lg-5 col-10">
                            <label class=" form-label" for="">TIN No.</label>
                            <input type="text" id="n6" class="form-control"></input>
                        </div>
                        <div class="form-group col-lg-5  col-10">
                            <label class=" form-label" for="">GSIS/SSS/Pag-ibig Policy No.</label>
                            <input type="text" id="n7" class="form-control"></input>
                        </div>
                    </div>
                    <br>
                    <h5 class="col-12 ps-1 pb-3 text-start ms-auto me-auto" style="border-bottom:1px solid gray;">Name
                        of Spouse:</h5>
                    <br>
                    <div class="form-row text-center justify-content-evenly">
                        <div class="form-group  col-lg-3 col-10">
                            <input type="text" id="n8" class="form-control"></input>
                            <label class=" form-label" for="">(First)</label>
                        </div>
                        <div class="form-group col-lg-3 col-10">
                            <input type="text" id="n9" class="form-control"></input>
                            <label class=" form-label" for="">(Middle)</label>
                        </div>
                        <div class="form-group  col-lg-3 col-10">
                            <input type="text" id="n10" class="form-control"></input>
                            <label class=" form-label" for="">(Last)</label>
                        </div>
                        <div class="form-group col-lg-3 col-10">
                            <input type="text" id="n11" class="form-control"></input>
                            <label class=" form-label" for="">(Maiden)</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-row text-start justify-content-evenly">
                        <div class="form-group col-lg-5 col-10">
                            <label class="" for="">Place of Birth</label>
                            <input type="text" class="form-control" id="n12"></input>
                        </div>
                        <div class="form-group col-lg-5 col-10">
                            <label class="" for="">Date of Birth</label>
                            <input type="date" class="form-control" id="n13"></input>
                        </div>
                    </div>
                    <br>

                    <h5 class="col-12 ps-1 pb-3 text-start ms-auto me-auto" style="border-bottom:1px solid gray;">
                        Applicants Family Composition</h5>
                    <br>
                    <div class="form-row text-start justify-content-evenly " id="tbl_b_control">
                        <div class="form-group col-lg-5 col-10" id="tbl_b1">
                            <label class=" form-label" for="">Name:</label>
                            <input type="text" name="name[]" class="form-control"></input>
                        </div>
                        <div class="form-group col-lg-5 col-10" id="tbl_b2">
                            <label class=" form-label" for="">Relation to Applicant:</label>
                            <input type="text" name="relation[]" class="form-control"></input>
                        </div>
                        <div class="form-group col-lg-5 col-10" id="tbl_b3">
                            <label class=" form-label" for="">Civil Status:</label>
                            <input type="text" name="civil_status[]" class="form-control"></input>
                        </div>
                        <div class="form-group col-lg-5 col-10" id="tbl_b4">
                            <label class=" form-label" for="">Date of Birth:</label>
                            <input type="date" name="dob[]" class="form-control"></input>
                        </div>
                        <!--  -->
                        <div class="form-group col-lg-5 col-10" id="tbl_b5">
                            <label class=" form-label" for="">Monthly Income</label>
                            <input type="number" name="monthly_income[]" class="form-control"></input>
                        </div>
                        <div class="form-group col-lg-5 col-10" id="tbl_b6">
                            <label class=" form-label" for="">Source of Income</label>
                            <input type="text" name="source_of_income[]" class="form-control"></input>
                        </div>
                        <div class="form-group col-lg-5 col-10" id="tbl_b7">
                            <label class=" form-label" for="">Place of Work</label>
                            <input type="text" name="workplace[]" class="form-control"></input>
                        </div>
                        <div class="form-group col-lg-5 col-10" id="tbl_b8">
                            <label class=" form-label" for="">Education Attainment:</label>
                            <input type="text" name="educAttainment[]" class="form-control"></input>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row text-start justify-content-evenly ">
                        <div class="form-group text-center col-10 align-items-center">
                            <button class=" btn btn-primary mt-2 mb-2 ms-auto me-auto " id="addMoreRow"><i
                                    class=" fa fa-plus"></i>
                                Add more field</button>
                            <button class=" btn btn-danger mt-2 mb-2 ms-auto me-auto " id="removeRow"><i
                                    class=" fa fa-minus"></i>
                                Remove field</button>
                        </div>
                    </div>
                    <div class="form-row text-start justify-content-evenly ">
                        <button class="btn btn-success" onclick="printThis3();">PRINT NHA FORM</button>
                    </div>
                    <br>
                </div>
                <hr>
                <!-- new -->
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark"
                    style="min-height: 83vh;display:none;font-size:2pt " id="nhaTemplate">
                    <p>Revised NHA Sworn Application Form </p>
                    <p style="border-top: 1px solid black; float:right" class="col-3">Date of Application</p>
                    <br><br>
                    <div style="font-weight: 800;margin:0;padding:0" class="row">
                        <span class="col-12 w-100">THE GENERAL MANAGER</span>
                        <br>
                        <span class="col-12 w-100">NHA, Elliptical Road, Diliman</span>
                        <br>
                        <span class="col-12 w-100">Quezon City</span>
                        <br>
                    </div>

                    <br>
                    <p style=" margin-bottom:0;padding-bottom:0">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;In
                        accordance with NHA rules and regulations and
                        provisions of R.A 7279 which I and my family agree to comply with faithfully, I hereby
                        &nbsp;apply to purchase/rent: (Pls. Check)</p>
                    <p style=" margin-top:0;padding-top:0">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ( &nbsp; )
                        Residential Lot Only<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;( &nbsp; ) House and Lot Unit<span
                            style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ( &nbsp; ) Dwelling Unit</p>
                    <p style=" margin-bottom:0;padding-bottom:0">Mode of Payment: (Pls. Check)</p>
                    <p style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; ( &nbsp; )
                        Buyer&rsquo;s Financing (Take-Out) &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;( &nbsp; ) Cash &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ( &nbsp; ) Staggered
                        Cash<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; (
                        &nbsp; ) Installment</p>
                    <p style=" margin-top:0;padding-top:0">&nbsp;Lease Terms : &nbsp;__________Years &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ( &nbsp; ) with Option to
                        Purchase</p>
                    <!-- user name -->
                    <p style=" margin-bottom:0;padding-bottom:0">A. APPLICANT&rsquo;S IDENTITY &nbsp; (For
                        female application/spouse, give complete maiden name)</p>
                    <table style=" margin-top:0;padding-top:0; table-layout:fixed;width:100%;word-break:normal;"
                        id="nhaname1">
                        <tr>
                            <td colspan="1">Name:</td>
                            <td colspan="3" style="border-bottom: 1px solid black;text-align:center;"></td>
                            <td colspan="2" style="border-bottom: 1px solid black;text-align:center;"></td>
                            <td colspan="2" style="border-bottom: 1px solid black;text-align:center;"></td>
                            <td colspan="2" style="border-bottom: 1px solid black;text-align:center;"></td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="3" style="text-align:center;">(First)</td>
                            <td colspan="2" style=" text-align:center;">(Middle)</td>
                            <td colspan="2" style="text-align:center;">(Last)</td>
                            <td colspan="2" style=" text-align:center;">(Maiden)</td>
                        </tr>
                        <tr>
                            <td colspan="1" style="text-align:left;">Status:</td>
                            <td colspan="3" style=" text-align:center;border-bottom: 1px solid black;">
                                <?php echo strtoupper($row['v_civil_status']) ?></td>
                            <td colspan="2" style="text-align:end;">Residence Address</td>
                            <td colspan="4" style=" text-align:center;border-bottom: 1px solid black;font-size:x-small">
                                <?php $address = strtoupper($row['detailed_add'] . ', ' . $row['barangay'] . ', ' . $row['city']);
                                echo $address; ?>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" style="text-align:left;">Place & Date of Birth:</td>
                            <td colspan="4" style=" text-align:left;border-bottom: 1px solid black;font-size:x-small">
                            </td>
                            <td colspan="1" style="text-align:center;">Citizenship</td>
                            <td colspan="2" style=" text-align:center;border-bottom: 1px solid black;">
                                Filipino</td>
                        </tr>
                        <tr>
                            <td colspan="1" style="text-align:left;">TIN No.</td>
                            <td colspan="3" style=" text-align:center;border-bottom: 1px solid black;"></td>
                            <td colspan="3" style="text-align:center;">GSIS/SSS/Pag-Ibig Policy No.</td>
                            <td colspan="3" style=" text-align:center;border-bottom: 1px solid black;"></td>
                        </tr>
                        <tr>
                            <td colspan="10" style="text-align:left;padding-bottom:20px">Name of Spouse</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border-bottom: 1px solid black;text-align:center;"></td>
                            <td colspan="2" style="border-bottom: 1px solid black;text-align:center;"></td>
                            <td colspan="3" style="border-bottom: 1px solid black;text-align:center;"></td>
                            <td colspan="2" style="border-bottom: 1px solid black;text-align:center;"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:center;">(First)</td>
                            <td colspan="2" style=" text-align:center;">(Middle)</td>
                            <td colspan="3" style="text-align:center;">(Last)</td>
                            <td colspan="2" style=" text-align:center;">(Maiden)</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:left;">Place & Date of Birth:</td>
                            <td colspan="4" style="text-align:left;border-bottom: 1px solid black;font-size:x-small">
                            </td>
                            <td colspan="1" style="text-align:center;">Citizenship</td>
                            <td colspan="2" style=" text-align:center;border-bottom: 1px solid black;">
                                Filipino</td>
                        </tr>
                    </table>
                    <p>B.<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>APPLICANT&rsquo;S FAMILY
                        &nbsp;COMPOSITION :</p>
                    <!-- family composition -->
                    <table id="nhafamily"
                        style=" margin-top:0;padding-top:0; table-layout:fixed;width:100%;word-break:normal">
                        <tr style="text-align: center;">
                            <td colspan="2" style="text-align: left;">Name</td>
                            <td colspan="1">Relation to Applicant</td>
                            <td colspan="1">Civil Status</td>
                            <td colspan="1">Date of Birth</td>
                            <td colspan="1">Monthly Income</td>
                            <td colspan="1">Source of Income</td>
                            <td colspan="2">Name of Co./ Place of Work</td>
                            <td colspan="1">Educational Attainment</td>
                        </tr>
                    </table>
                    <p>C. APPLICANT&rsquo;S TOTAL FAMILY INCOME PER MONTH (Php <span id="nhac"
                            style="border-bottom: 1px solid black;width:275px;display:inline-block;text-align:start"></span>)
                    </p>
                    <p style=" margin-bottom:0;padding-bottom:0">D. FAMILY REAL PROPERTY HOLDING &nbsp; &nbsp; &nbsp; I
                        certify that</p>
                    <p style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0">&bull;My wife and I:</p>
                    <p style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0">( &nbsp;) Do not own nor
                        under contract to buy any lot/dwelling unit in the Philippines</p>
                    <p style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0">( &nbsp;) Own or under
                        contract to buy the following lot/dwelling unit as followers :</p>
                    <p style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;( &nbsp;) Urban Residential &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Total Areas (sq.m) _______________________</p>
                    <p style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;( &nbsp;)Commercial/Industrial &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Total Market Value
                        (Php)_______________________</p>
                    <p style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0">&bull;<span
                            style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>My Family and I never availed of
                        any government housing assistance/accommodation nor violated Section 14 RA &nbsp;7279</p>
                    <p style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0">&bull;<span
                            style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>I am not professional squatter,
                        nor a member of squatting syndicates.</p>

                    <p style="text-align: justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; I further certify
                        that I am making this
                        application &nbsp;for sole purpose of acquiring a homelot/unit for my family and not as DUMMY or
                        AGENT of any other party.</p>
                    <p style="text-align: justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Any false statement
                        given by my hereinabove
                        shall be sufficient cause for the CANCELLATION of the award and contract that may be executed by
                        NHA in my favour as a result of this application and the forfeiture of all payments that may
                        have been made
                        therefore without prejudice to any administrative criminal or civil action that may be brought
                        by the NHA against me in accordance with existing laws.</p>
                    <br>
                    <p class="w-25" style="float:right;border-top:1px solid black">(Signature of Applicant)</p>
                    <br>
                    <br>
                    <p style="text-align:justify">&nbsp; &nbsp;
                        &nbsp;
                        &nbsp; &nbsp; &nbsp;
                        &nbsp;
                        SUBSCRIBE AND SWORN to before me in <span style="text-decoration: underline;">Bacoor City,
                            Cavite</span>,
                        Philippines this _______ day of ________________________, 20_______ AFFIANT having
                        exhibited to me his/her Community&nbsp;Tax Certificate as stated.&nbsp;</p>
                    <div style="float: right;">
                        <p style=" margin-bottom:0;padding-bottom:0;width:300px;text-align:center;">STRIKE
                            BAUTISTA REVILLA</p>
                        <p
                            style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0;width:300px;text-align:center;">
                            City
                            Mayor</p>
                        <p
                            style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0;width:300px;text-align:center;">
                            City of Bacoor City, Cavite
                        </p>
                        <p
                            style=" margin-top:0;padding-top:0;margin-bottom:0;padding-bottom:0;width:300px;text-align:center;">
                            (
                            R.A. No. 6733, Amending
                            Administrative Code July 25, 1989 )</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



<script>
var addMoreRow = document.getElementById("addMoreRow");
var removeRow = document.getElementById("removeRow");
var tbl_b_control = document.getElementById("tbl_b_control");
var i = 0;
addMoreRow.onclick = function() {
    i++;

    //add user name div 
    var newDiv1 = document.createElement('div');
    newDiv1.classList.add('form-group', 'col-lg-5', 'col-10');
    var lbl1 = document.createElement('label');
    lbl1.classList.add('form-label');
    lbl1.innerText = "Name:";
    var input1 = document.createElement('input');
    input1.type = "text";
    input1.id = "name[" + i + "]";
    input1.className = "form-control";
    newDiv1.appendChild(lbl1);
    newDiv1.appendChild(input1);


    //add relation div 
    var newDiv2 = document.createElement('div');
    newDiv2.classList.add('form-group', 'col-lg-5', 'col-10');
    var lbl2 = document.createElement('label');
    lbl2.classList.add('form-label');
    lbl2.innerText = "Relation to Applicant:";
    var input2 = document.createElement('input');
    input2.type = "text";
    input2.id = "relation[" + i + "]";
    input2.className = "form-control";
    newDiv2.appendChild(lbl2);
    newDiv2.appendChild(input2);

    //add relation div 
    var newDiv3 = document.createElement('div');
    newDiv3.classList.add('form-group', 'col-lg-5', 'col-10');
    var lbl3 = document.createElement('label');
    lbl3.classList.add('form-label');
    lbl3.innerText = "Civil Status:";
    var input3 = document.createElement('input');
    input3.type = "text";
    input3.id = "civil_status[" + i + "]";
    input3.className = "form-control";
    newDiv3.appendChild(lbl3);
    newDiv3.appendChild(input3);

    //add dob div 
    var newDiv4 = document.createElement('div');
    newDiv4.classList.add('form-group', 'col-lg-5', 'col-10');
    var lbl4 = document.createElement('label');
    lbl4.classList.add('form-label');
    lbl4.innerText = "Date of Birth:";
    var input4 = document.createElement('input');
    input4.type = "date";
    input4.id = "dob[" + i + "]";
    input4.className = "form-control";
    newDiv4.appendChild(lbl4);
    newDiv4.appendChild(input4);

    //add Monthly Income div 
    var newDiv5 = document.createElement('div');
    newDiv5.classList.add('form-group', 'col-lg-5', 'col-10');
    var lbl5 = document.createElement('label');
    lbl5.classList.add('form-label');
    lbl5.innerText = "Monthly Income:";
    var input5 = document.createElement('input');
    input5.type = "number";
    input5.id = "monthly_income[" + i + "]";
    input5.className = "form-control";
    newDiv5.appendChild(lbl5);
    newDiv5.appendChild(input5);

    //add Source of Income div 
    var newDiv6 = document.createElement('div');
    newDiv6.classList.add('form-group', 'col-lg-5', 'col-10');
    var lbl6 = document.createElement('label');
    lbl6.classList.add('form-label');
    lbl6.innerText = "Source of Income:";
    var input6 = document.createElement('input');
    input6.setAttribute['type', 'text'];
    input6.id = "source_of_income[" + i + "]";
    input6.className = "form-control";
    newDiv6.appendChild(lbl6);
    newDiv6.appendChild(input6);

    //add Place of Work div 
    var newDiv7 = document.createElement('div');
    newDiv7.classList.add('form-group', 'col-lg-5', 'col-10');
    var lbl7 = document.createElement('label');
    lbl7.classList.add('form-label');
    lbl7.innerText = "Place of Work:";
    var input7 = document.createElement('input');
    input7.setAttribute['type', 'text'];
    input7.id = "workplace[" + i + "]";
    input7.className = "form-control";
    newDiv7.appendChild(lbl7);
    newDiv7.appendChild(input7);

    //add Education Attainment div 
    var newDiv8 = document.createElement('div');
    newDiv8.classList.add('form-group', 'col-lg-5', 'col-10');
    var lbl8 = document.createElement('label');
    lbl8.classList.add('form-label');
    lbl8.innerText = "Education Attainment:";
    var input8 = document.createElement('input');
    input8.setAttribute['type', 'text'];
    input8.id = "educAttainment[" + i + "]";


    input8.className = "form-control";
    newDiv8.appendChild(lbl8);
    newDiv8.appendChild(input8);

    //append divs to tbl_b_control
    tbl_b_control.appendChild(newDiv1);
    tbl_b_control.appendChild(newDiv2);
    tbl_b_control.appendChild(newDiv3);
    tbl_b_control.appendChild(newDiv4);
    tbl_b_control.appendChild(newDiv5);
    tbl_b_control.appendChild(newDiv6);
    tbl_b_control.appendChild(newDiv7);
    tbl_b_control.appendChild(newDiv8);

}

removeRow.onclick = function() {
    var div_tags = tbl_b_control.getElementsByTagName('div');

    if (div_tags.length > 8) {
        var div_last = div_tags.length;

        for (var i = div_last - 1; i >= (div_last - 8); i--) {
            var div_inputs = div_tags[i].getElementsByTagName('input');
            var div_lbl = div_tags[i].getElementsByTagName('label');
            div_lbl[0].innerText = "";
            div_inputs[0].innerHTML = "";
            div_tags[i].removeChild(div_inputs[0]);
            div_tags[i].innerHTML = "";
            tbl_b_control.removeChild(div_tags[i]);
        }
        i--;
    }

}



function printThis3() {
    var bday = "<?php echo $row['bday']; ?>";
    var n1 = document.getElementById("n1").value;
    var n2 = document.getElementById("n2").value;
    var n3 = document.getElementById("n3").value;
    var n4 = document.getElementById("n4").value;
    var n5 = document.getElementById("n5").value;
    var n6 = document.getElementById("n6").value;
    var n7 = document.getElementById("n7").value;
    var n8 = document.getElementById("n8").value;
    var n9 = document.getElementById("n9").value;
    var n10 = document.getElementById("n10").value;
    var n11 = document.getElementById("n11").value;
    var n12 = document.getElementById("n12").value;
    var n13 = document.getElementById("n13").value;


    var tbl_a_cells = document.getElementById("nhaname1").getElementsByTagName('td');
    tbl_a_cells[1].innerText = n1.toUpperCase();
    tbl_a_cells[2].innerText = n2.toUpperCase();
    tbl_a_cells[3].innerText = n3.toUpperCase();
    tbl_a_cells[4].innerText = n4.toUpperCase();
    tbl_a_cells[15].innerText = n5.toUpperCase() + ' - ' + bday;
    tbl_a_cells[19].innerText = n6.toUpperCase();
    tbl_a_cells[21].innerText = n7.toUpperCase();
    tbl_a_cells[23].innerText = n8.toUpperCase();
    tbl_a_cells[24].innerText = n9.toUpperCase();
    tbl_a_cells[25].innerText = n10.toUpperCase();
    tbl_a_cells[26].innerText = n11.toUpperCase();
    tbl_a_cells[32].innerText = n12.toUpperCase() + ' - ' + n13;


    var tbl2 = document.getElementById('nhafamily');

    var div_tags = tbl_b_control.getElementsByTagName('div');
    var div_last = div_tags.length;
    if (tbl2.rows.length > 1) {
        for (var j = tbl2.rows.length - 1; j >= 1; j--) {
            tbl2.deleteRow(j);
        }
    }
    var totalIncome = 0;
    for (var i = 1; i <= (div_tags.length / 8); i++) {
        this["tbl2_row_" + i] = tbl2.insertRow();
        this["tbl2_row_" + i].setAttribute("style", "text-align: start;font-size:x-small");
        this["cell_" + i + "_1"] = this["tbl2_row_" + i].insertCell(0);
        this["cell_" + i + "_2"] = this["tbl2_row_" + i].insertCell(1);
        this["cell_" + i + "_3"] = this["tbl2_row_" + i].insertCell(2);
        this["cell_" + i + "_4"] = this["tbl2_row_" + i].insertCell(3);
        this["cell_" + i + "_5"] = this["tbl2_row_" + i].insertCell(4);
        this["cell_" + i + "_6"] = this["tbl2_row_" + i].insertCell(5);
        this["cell_" + i + "_7"] = this["tbl2_row_" + i].insertCell(6);
        this["cell_" + i + "_8"] = this["tbl2_row_" + i].insertCell(7);
        // add style to cells
        this["cell_" + i + "_1"].setAttribute("style", "border-bottom: 1px solid black;text-align:center");
        this["cell_" + i + "_2"].setAttribute("style", "border-bottom: 1px solid black;text-align:center");
        this["cell_" + i + "_3"].setAttribute("style", "border-bottom: 1px solid black;text-align:center");
        this["cell_" + i + "_4"].setAttribute("style", "border-bottom: 1px solid black;text-align:center");
        this["cell_" + i + "_5"].setAttribute("style", "border-bottom: 1px solid black;text-align:center");
        this["cell_" + i + "_6"].setAttribute("style", "border-bottom: 1px solid black;text-align:center");
        this["cell_" + i + "_7"].setAttribute("style", "border-bottom: 1px solid black;text-align:center");
        this["cell_" + i + "_8"].setAttribute("style", "border-bottom: 1px solid black;text-align:center");
        this["cell_" + i + "_1"].setAttribute("colspan", "2");
        this["cell_" + i + "_2"].setAttribute("colspan", "1");
        this["cell_" + i + "_3"].setAttribute("colspan", "1");
        this["cell_" + i + "_4"].setAttribute("colspan", "1");
        this["cell_" + i + "_5"].setAttribute("colspan", "1");
        this["cell_" + i + "_6"].setAttribute("colspan", "1");
        this["cell_" + i + "_7"].setAttribute("colspan", "2");
        this["cell_" + i + "_8"].setAttribute("colspan", "1");

        if (i == 1) {
            this["cell_" + i + "_1"].innerText = document.getElementById("tbl_b1").getElementsByTagName("input")[0]
                .value.toUpperCase();
            this["cell_" + i + "_2"].innerText = document.getElementById("tbl_b2").getElementsByTagName(
                    "input")[0]
                .value.toUpperCase();
            this["cell_" + i + "_3"].innerText = document.getElementById("tbl_b3").getElementsByTagName(
                    "input")[0]
                .value.toUpperCase();
            this["cell_" + i + "_4"].innerText = document.getElementById("tbl_b4").getElementsByTagName(
                    "input")[0]
                .value;
            this["cell_" + i + "_5"].innerText = document.getElementById("tbl_b5").getElementsByTagName(
                    "input")[0]
                .value;
            totalIncome += parseFloat(document.getElementById("tbl_b5").getElementsByTagName(
                    "input")[0]
                .value);
            this["cell_" + i + "_6"].innerText = document.getElementById("tbl_b6").getElementsByTagName(
                    "input")[0]
                .value.toUpperCase();
            this["cell_" + i + "_7"].innerText = document.getElementById("tbl_b7").getElementsByTagName(
                    "input")[0]
                .value.toUpperCase();
            this["cell_" + i + "_8"].innerText = document.getElementById("tbl_b8").getElementsByTagName(
                    "input")[0]
                .value.toUpperCase();
        } else {
            this["cell_" + i + "_1"].innerText = document.getElementById("name[" + (i - 1) + "]").value.toUpperCase();
            this["cell_" + i + "_2"].innerText = document.getElementById("relation[" + (i - 1) + "]").value
                .toUpperCase();
            this["cell_" + i + "_3"].innerText = document.getElementById("civil_status[" + (i - 1) + "]").value
                .toUpperCase();
            this["cell_" + i + "_4"].innerText = document.getElementById("dob[" + (i - 1) + "]").value;
            this["cell_" + i + "_5"].innerText = document.getElementById("monthly_income[" + (i - 1) + "]").value;
            totalIncome += parseFloat(document.getElementById("monthly_income[" + (i - 1) + "]").value);
            this["cell_" + i + "_6"].innerText = document.getElementById("source_of_income[" + (i - 1) + "]").value
                .toUpperCase();
            this["cell_" + i + "_7"].innerText = document.getElementById("workplace[" + (i - 1) + "]").value
                .toUpperCase();
            this["cell_" + i + "_8"].innerText = document.getElementById("educAttainment[" + (i - 1) + "]").value
                .toUpperCase();
        }

    }

    document.getElementById("nhac").innerText = totalIncome;
    var printContent = document.getElementById('nhaTemplate').innerHTML;

    var left = (screen.width - 1000) / 2;
    var top = (screen.height - 1000) / 4;

    var printscreen = window.open('sample', 'Print', 'left=' + left + ',top=' + top +
        ',width=1000, height=1000');

    //try
    printscreen.document.write(printContent);
    printscreen.document.close();
    printscreen.focus();
    printscreen.print();
    printscreen.close();

};
</script>