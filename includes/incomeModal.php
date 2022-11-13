<a type="button" href="#" class="btn text-center btn-primary w-75" data-bs-toggle="modal" data-bs-target="#incomeModal">
    VIEW</a>



<div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false"
    data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">

                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title"> AFFIDAVIT OF INCOME</h4>
                <br>
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                    style="min-height: 83vh; ">
                    <br><br>
                    <div class="form-row text-start justify-content-evenly">
                        <br>
                        <h5 class="col-12 text-start ms-auto me-auto" style="border-bottom:1px solid gray ;">I regularly
                            receive professional/ talent/ service fee or earn an income as _________________;:</h5>
                        <br>
                        <br>
                        <div class="form-group  col-lg-10 col-10">
                            <label class=" form-label" for="">Work:</label>
                            <input type="text" required id="i3" class="form-control"></input>
                        </div>
                    </div>
                    <br>
                    <br><br>
                    <div class="form-row text-start justify-content-evenly">
                        <h5 class="col-12 text-start ms-auto me-auto" style="border-bottom:1px solid gray ;">
                            How much gross income did you have for the last six(6) months?:</h5>
                        <br>
                        <br>
                        <div class="form-group col-10">

                            <label class=" form-label" for="">Gross income:</label>
                            <input type="text" id="i4" required class="form-control"></input>
                        </div>

                    </div>
                    <br>
                    <?php
                    $username2 = $_SESSION['username'];
                    $query2 = $conn->query("SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE user_name = '$username2'");
                    while ($row2 = $query2->fetch_assoc()) :

                    ?>
                    <input type="text" name="name" id="i1" class="d-none"
                        value="<?php echo $row2['fname'] . " " . $row2['mname'] . " " . $row2['lname'] ?>">
                    <input type="text" name="name" id="i2" class="d-none"
                        value="<?php echo $row2['detailed_add'] . " , " . $row2['barangay'] . " ,Bacoor City, Cavite" ?>">
                    <?php
                    endwhile;
                    ?>
                    <br>
                    <hr>
                    <div class=" form-row text-start justify-content-evenly ">
                        <button class=" btn btn-success" onclick="printThis2();">PRINT AFFIDAVIT OF
                            INCOME</button>
                    </div>
                    <div id="income" class="d-none">
                        <p style="float:right">HQP-SLF-136 <br> (V01, 05/2020)</p>
                        <p><br></p>
                        <p>Republic of the Philippines)</p>
                        <p>City of Bacoor) S.S.</p>
                        <p><br></p>
                        <p style="text-align: center;">AFFIDAVIT OF INCOME</p>
                        <p><br></p>
                        <p>I, <span id="p11" style="text-decoration:  underline;"></span> and with residence and postal
                            address at
                            <span id="p22" style="text-decoration:  underline;"></span>,
                            of
                            legal
                            age, Filipino, single/married/widow/er, after being duly sworn to in accordance with law,
                            depose
                            and state that:
                        </p>
                        <p><br></p>
                        <p>1.<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>I regularly receive professional/
                            talent/ service fee or earn an income as <span id="p33"
                                style="text-decoration:  underline;"></span>;</p>
                        <p><br></p>
                        <p>2.<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>As such, I have a gross income of
                            P<span id="p44" style="text-decoration:  underline;"></span> for the last six (6) months and
                            to
                            prove that I have the capacity to avail the housing relocation assigned to me.&nbsp;</p>
                        <p><br></p>
                        <p>3.<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>I am executing this Affidavit of
                            Income in support of my housing application for the Housing Urban Development And
                            Resettlement
                            Department, and for whatever
                            legal purpose it may serve.</p>
                        <p><br></p>
                        <p><b>IN WITNESS WHEREOF</b>, I have hereunto &nbsp;set my hand this day of ____ , 2022 at
                            Bacoor City, Cavite.&nbsp;</p>
                        <p><br></p>
                        <p><br></p>
                        <span id="p55"
                            style="text-decoration:  underline;width: 50%;float: right;text-align: center"></span>
                        <br>
                        <p style="width: 50%;float: right;text-align: center;">AFFIANT</p>
                        <p><br></p>
                        <p><br></p>
                        <p><b>SUBSCRIBED AND SWORN</b> to before me this day _______ of ________________ by, affiant who
                            has
                            satisfactorily proven to me his/her identity through his/her ______________________&nbsp;,
                            valid
                            until _____________, that he/she is the same person who is personally signed before me the
                            foregoing Affidavit of Income and acknowledged that he/she executed the same.</p>
                        <p><br></p>
                        <p><br></p>
                        <p style="width: 50%;float: right;text-align: center;">NOTARY PUBLIC</p>
                        <p>Doc. No. ______________________;<br>
                            Page No. ______________________;<br> Book No.______________________;<br> Series of
                            ______________________.</p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




<script>
function printThis2() {
    var i1 = document.getElementById("i1").value;
    var i2 = document.getElementById("i2").value;
    var i3 = document.getElementById("i3").value;
    var i4 = document.getElementById("i4").value;


    var p11 = document.getElementById("p11").innerText = i1;
    var p33 = document.getElementById("p22").innerText = i2;
    var p33 = document.getElementById("p33").innerText = i3;
    var p44 = document.getElementById("p44").innerText = i4;
    var p55 = document.getElementById("p55").innerText = i1;


    var printContent = document.getElementById('income').innerHTML;

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
}
</script>