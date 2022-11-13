<a type="button" href="#" class="btn text-center btn-primary w-75" data-bs-toggle="modal"
    data-bs-target="#transferModal">
    VIEW</a>



<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false"
    data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">

                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title"> AFFIDAVIT OF TRANSFER</h4>
                <br>
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                    style="min-height: 50vh; ">
                    <br><br>
                    <div class="form-row text-start justify-content-evenly">
                        <br>
                        <h5 class="col-12 text-start ms-auto me-auto" style="border-bottom:1px solid gray ;">Which child
                            do you want to transfer the relocation house? _________________:</h5>
                        <br>
                        <br>
                        <div class="form-group  col-lg-10 col-10">
                            <label class=" form-label" for="">Child Name:</label>
                            <input type="text" id="ii4" class="form-control"></input>
                        </div>
                    </div>
                    <br>
                    <br>
                    <?php
                    $username3 = $_SESSION['username'];
                    $query3 = $conn->query("SELECT * FROM tbl_users INNER JOIN tbl_accounts ON tbl_users.user_id = tbl_accounts.user_id WHERE user_name = '$username2'");
                    while ($row3 = $query3->fetch_assoc()) :

                    ?>
                    <input type="text" name="" id="ii1" class="d-none"
                        value="<?php echo $row3['fname'] . " " . $row3['mname'] . " " . $row3['lname'] ?>">

                    <input type="text" name="" id="ii2" class="d-none" value="<?php echo $row3['age'] ?>">

                    <input type="text" name="" id="ii3" class="d-none"
                        value="<?php echo $row3['detailed_add'] . " , " . $row3['barangay'] . " " ?>">
                    <?php
                    endwhile;
                    ?>
                    <br>
                    <hr>
                    <div class=" form-row text-start justify-content-evenly ">
                        <button class=" btn btn-success" onclick="printThis4();">PRINT AFFIDAVIT OF
                            TRANSFER</button>
                    </div>
                    <br>
                    <div id="transfer" class="d-none">

                        <p>Republic of the Philippines)</p>
                        <p>City of Bacoor) S.S.</p>
                        <p><br></p>
                        <p><br></p>
                        <p style="text-align: center;">KATIBAYAN NG PAGSASALIN</p>
                        <p><br></p>
                        <p>&nbsp;</p>
                        <p style="text-indent: 5%;">Ako si, <span id="t1" style="text-decoration:underline"></span>,
                            Filipino, <span id="t2" style="text-decoration:underline"></span> taong gulang, nakatira sa
                            <span id="t3" style="text-decoration:underline"></span> ,
                            Bacoor City, Cavite;&nbsp;
                        </p>
                        <p><br></p>
                        <p>1.<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>Ang aking bahay at lupa na maaari
                            naming paglilipatan ay aking ibibigay na lamang at ibibigay ang buong karapatan sa aking
                            anak na si <span id="t4" style="text-decoration:underline"></span>, nasa wastong gulang;</p>
                        <p>&nbsp;</p>
                        <p>2.<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>Ako po ay kusang loob at
                            boluntaryong pinagkakaloob ito na walang sinoman ang nanakot o namilit sa akin na ipagkaloob
                            kay <span id="t5" style="text-decoration:underline"></span> ang nasabing bahay at lupa;</p>
                        <p><br></p>
                        <p><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span></p>
                        <p>BILANG PATOTOO, itong kasunduang ito ay ginawa ng may katotohanan para sa anuman legal na
                            kaukulan na maaari nitong pag-gamitan.</p>
                        <p><br></p>
                        <p><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>Nilagdaan at Sinumpaan ngayong ____
                            day of ________, 2022.</p>
                        <p><br></p>
                        <p style="width:100%; justify-content:center">&nbsp;
                            &nbsp; &nbsp;
                            &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; <span
                                style="border-bottom:1px solid black; display:inline-block;width:30%;text-align:center;"
                                id="t6"></span><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp; &nbsp;
                            &nbsp; &nbsp;
                            &nbsp;<span
                                style="border-bottom:1px solid black; display:inline-block;width:30%;text-align:center;"
                                id="t7"></span>
                        </p>
                        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp;NAGSALIN &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp;
                            &nbsp;PINAGSALINAN</p>
                        <p><br></p>
                        <p><br></p>
                        <p><br></p>
                        <p>Sa harap nina:</p>
                        <p><br></p>
                        <p style="width:100%; justify-content:center">&nbsp;
                            &nbsp; &nbsp;
                            &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; <span
                                style="border-bottom:1px solid black; display:inline-block;width:30%;text-align:center;"
                                id=""></span><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp; &nbsp;
                            &nbsp; &nbsp;
                            &nbsp;<span
                                style="border-bottom:1px solid black; display:inline-block;width:30%;text-align:center;"
                                id=""></span>
                        </p>
                        <p><br></p>
                        <p><br></p>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




<script>
function printThis4() {
    var ii1 = document.getElementById("ii1").value;
    var ii2 = document.getElementById("ii2").value;
    var ii3 = document.getElementById("ii3").value;
    var lower = document.getElementById("ii4").value;
    var ii4 = lower.toUpperCase();


    var t1 = document.getElementById("t1").innerText = ii1;
    var t2 = document.getElementById("t2").innerText = ii2;
    var t3 = document.getElementById("t3").innerText = ii3;
    var t4 = document.getElementById("t4").innerText = ii4;
    var t5 = document.getElementById("t5").innerText = ii4;
    var t6 = document.getElementById("t6").innerText = ii1;
    var t7 = document.getElementById("t7").innerText = ii4;


    // alert("hi " + i4 + i2 + "dsadas " + i3);
    var printContent = document.getElementById('transfer').innerHTML;

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