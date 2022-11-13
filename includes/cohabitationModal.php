<a type="button" href="#" class="btn text-center btn-primary w-75" data-bs-toggle="modal"
    data-bs-target="#cohabitation">
    VIEW</a>


<div class="modal fade" id="cohabitation" tabindex="-1" role="dialog" aria-hidden="true" data-bs-keyboard="false"
    data-bs-backdrop="static">
    <div class=" modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-between"
                style=" background:linear-gradient(90deg,#a2beff,#be9cfe); " id="printThis">

                <button id="Button2" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title"> AFFIDAVIT OF COHABITATION</h4>
                <br>
                <div class="col-lg-11 bg-light col-11 mb-2 mt-2 border border-1 border-dark ms-auto me-auto"
                    style="min-height: 83vh; ">
                    <br>
                    <div class="form-row text-start justify-content-evenly">

                        <h5 class="col-12 text-start ms-auto me-auto" style="border-bottom:1px solid gray ;">Please
                            input the names of you and your partner:</h5>
                        <br>
                        <br>
                        <div class="form-group  col-lg-5 col-10">
                            <label class=" form-label" for="">User's' Name:</label>
                            <input type="text" required id="c1" class="form-control"></input>
                        </div>
                        <div class="form-group col-lg-5 col-10">
                            <label class=" form-label" for="">Partner's Name:'</label>
                            <input type="text" required id="c2" class="form-control"></input>
                        </div>
                    </div>
                    <br>
                    <div class="form-row text-start justify-content-evenly">
                        <h5 class="col-12 text-start ms-auto me-auto" style="border-bottom:1px solid gray ;">
                            How many years have the two of you been together?:</h5>
                        <br>
                        <br>
                        <div class="form-group col-10">

                            <label class=" form-label" for="">Years together with partner (number only):</label>
                            <input type="number" min="0" max="100" id="c3" oninput="this.value|=0" required
                                class="form-control"></input>
                        </div>

                    </div>
                    <br>
                    <div class="form-row text-start justify-content-evenly">
                        <h5 class="col-12 text-start ms-auto me-auto" style="border-bottom:1px solid gray ;">
                            Do you have any children together? If yes, how many?:</h5>
                        <br>
                        <br>
                        <div class="form-group col-10">
                            <label class=" form-label" for="">Number of children:</label>
                            <input type="number" min="0" max="100" id="c4" onkeyup="checkIfHaveChild();"
                                oninput="this.value|=0" required class="form-control"></input>
                        </div>
                    </div>
                    <br>
                    <div class="form-row text-start justify-content-evenly d-none" id="childcontrol">
                        <div class="form-group col-10" id="childDiv">
                            <label class=" form-label" for="">Child's name:</label>
                            <input type="text" name="child[]" class="form-control"></input>
                        </div>
                        <div class="form-group text-center col-10 align-items-center">
                            <button class=" btn btn-primary mt-2 mb-2 ms-auto me-auto " id="addMoreChild"><i
                                    class=" fa fa-plus"></i>
                                Add more field for child</button>
                            <button class=" btn btn-danger mt-2 mb-2 ms-auto me-auto " id="removeChild"><i
                                    class=" fa fa-minus"></i>
                                Remove field for child</button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row text-start justify-content-evenly ">
                        <button class="btn btn-success" onclick="printThis1();">PRINT AFFIDAVIT OF
                            COHABITATION</button>
                    </div>
                    <br>
                </div>
                <hr>
                <div id="cohabitationTemplate" style="display: none;">

                    <p>REPUBLIC OF THE PHILIPINES</p>
                    <p>PROVINCE OF CAVITE</p>
                    <p>CITY OF &nbsp;BACOOR</p>
                    <p><br></p>
                    <p>JOINT AFFIDAVIT OF COHABITATION</p>
                    <p><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>We, <span
                            style="text-decoration: underline;" id="p1"></span> and
                        <span style="text-decoration: underline;" id="p2"></span> both of legal ages, Filipinos, single
                        and residents of
                        Barangay <span style="text-decoration: underline;" id="p3">
                            <?php if (!isset($_SESSION)) {
                                session_start();
                            }

                            echo $_SESSION['barangay']; ?> </span>being duly sworn to in
                        accordance with law, depose and say:
                    </p>
                    <p>1.<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>That we have been living together as
                        husband and wife
                        without benefit of the lawful marriage for more than <span style="text-decoration: underline;"
                            id="p4"></span>
                        years now;</p>
                    <p><br></p>
                    <p id="numOfChildren">2.<span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>That out of this
                        union born &nbsp;<span style="text-decoration: underline;" id="p5"></span>
                        &nbsp;children.
                    </p>
                    <p id="namesOfChildren"><span style="white-space:pre;"></p>
                    <p><br></p>
                    <p><span id="number2">3.</span><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>That were
                        not laboring under legal
                        impediment to enter
                        into a marriage, as we all the qualifications and none of the disqualifications to contract
                        marriage;</p>
                    <p><br></p>
                    <p><span id="number3">4.</span><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>That we wish
                        to validate and ratify
                        our union into a
                        lawful one in accordance with the rites and performance, provisions of Article 34 of the Family
                        code;</p>
                    <p><br></p>
                    <p><span id="number4">5.</span><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>The we
                        execute this affidavit to
                        attest to the truth
                        of all the foregoing statement for the purpose as indicated above.</p>
                    <p><br></p>
                    <p>AFFIANTS FURTHER SAYETH NONE</p>
                    <p><br></p>
                    <p style="width:100%; justify-content:center">&nbsp;
                        &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; <span
                            style="border-bottom:1px solid black; display:inline-block;width:30%;text-align:center;"
                            id="p6"></span><span style="white-space:pre;">&nbsp; &nbsp;&nbsp;</span>&nbsp; &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        &nbsp;<span
                            style="border-bottom:1px solid black; display:inline-block;width:30%;text-align:center;"
                            id="p7"></span>
                    </p>
                    <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Affiant &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Affiant</p>
                    <p>CTC No. ___________________________ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        &nbsp; &nbsp; CTC No. ___________________________</p>
                    <p>Issued at: ___________________________ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        &nbsp; &nbsp; Issued at: ___________________________</p>
                    <p>Issued on: __________________________ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        &nbsp; &nbsp; Issued on: __________________________</p>
                    <p><br></p>
                    <p>SUBSCRIBED AND SWORN to before me this _______ day of _____________________, Bacoor City,
                        Cavite.&nbsp;</p>
                    <p><br></p>
                    <p>Doc. No. _____;</p>
                    <p>Page No. _____;</p>
                    <p>Book No. _____;</p>
                    <p>Series of 2022.</p>

                </div>
            </div>
        </div>
    </div>
</div>



<script>
var addMoreChild = document.getElementById("addMoreChild");
var removeChild = document.getElementById("removeChild");
var childDiv = document.getElementById("childDiv");
var i = 0;
addMoreChild.onclick = function() {
    i++;
    var newField = document.createElement('input');
    newField.setAttribute['type', 'text'];
    newField.setAttribute['name', 'child[' + i + ']'];
    newField.setAttribute['id', 'child[' + i + ']'];
    newField.className = "form-control";
    childDiv.appendChild(newField);
}

removeChild.onclick = function() {
    var input_tags = childDiv.getElementsByTagName('input');
    if (input_tags.length > 1) {
        input_tags[(input_tags.length) - 1].innerHTML = "";
        childDiv.removeChild(input_tags[(input_tags.length) - 1]);
    }
}

function checkIfHaveChild() {
    var childcontrol = document.getElementById("childcontrol");
    var c4 = document.getElementById("c4");
    var cval = c4.value;
    if (cval === "0" || cval === "") {
        childcontrol.classList.add("d-none");
    } else {
        childcontrol.classList.remove("d-none");
    }
}

function printThis1() {

    var c1 = document.getElementById("c1").value;
    var c2 = document.getElementById("c2").value;
    var c3 = document.getElementById("c3").value;
    var c4 = document.getElementById("c4").value;

    var p1 = document.getElementById("p1").innerText = c1;
    var p2 = document.getElementById("p2").innerText = c2;
    var p4 = document.getElementById("p4").innerText = c3;
    var p5 = document.getElementById("p5").innerText = c4;
    var p6 = document.getElementById("p6");
    p6.innerText = c1;
    var p7 = document.getElementById("p7");
    p7.innerText = c2;
    var numOfChildren = document.getElementById("numOfChildren");
    var namesOfChildren = document.getElementById("namesOfChildren");


    if (c4 === "" || c4 === "0") {
        numOfChildren.style.display = "none";
        namesOfChildren.style.display = "none";
        var num2 = document.getElementById("number2").innerText = "2.";
        var num3 = document.getElementById("number3").innerText = "3.";
        var num4 = document.getElementById("number4").innerText = "4.";

    } else {
        numOfChildren.style.display = "block";
        namesOfChildren.style.display = "block";
        var num2 = document.getElementById("number2").innerText = "3.";
        var num3 = document.getElementById("number3").innerText = "4.";
        var num4 = document.getElementById("number4").innerText = "5.";
        var input_tags = childDiv.getElementsByTagName('input');
        var span_tags = namesOfChildren.getElementsByTagName('span');



        //add new span
        if (input_tags.length >= 1) {
            //remove old span

            for (var x = 0; x <= span_tags.length; x++) {
                namesOfChildren.removeChild(span_tags[x]);
            }

            for (var x = 0; x < input_tags.length; x++) {
                var newSpan = document.createElement('span');
                newSpan.style.textDecoration = "underline";
                if (x == (input_tags.length - 1)) {
                    newSpan.textContent = input_tags[x].value + "   .";
                } else {
                    newSpan.textContent = input_tags[x].value + "   , ";
                }

                namesOfChildren.appendChild(newSpan);
            }
        }



    }

    var printContent = document.getElementById('cohabitationTemplate').innerHTML;

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