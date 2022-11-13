<?php
session_start();
$_SESSION['login_attempt'] = 0;
?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title>City of Bacoor HUDRD </title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/bacoor-icon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="style.css">
<!-- Colors CSS -->

<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css/custom.css">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="politics_version">

    <!-- LOADER -->
    <!-- <div id="preloader">
        <div id="main-ld">
            <div id="loader"></div>
        </div>

    </div> -->
    <!-- end loader -->
    <!-- END LOADER -->


    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container">
                <div class="navbar-header" style="margin-bottom: 5px;">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logos/bacoor-logo.png" alt="image"
                            height="60" width="60"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a data-scroll-nav="0" href="#main-banner" class="active">Home</a></li>
                        <li><a data-scroll-nav="1" href="#about">About Us</a></li>
                        <li><a data-scroll-nav="3" href="#event">List of ISF</a></li>
                        <li><a data-scroll-nav="8" href="#contact">Contact</a></li>
                        <li><a href="userData/multi-user-login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="main-banner" class="banner-one" data-scroll-index="0">
        <div data-src="uploads/city-bg.jpg">
            <div class="camera_caption">
                <div class="container">
                    <h1 class="wow fadeInUp animated"> City of Bacoor Housing Urban Development and Resettlement
                        Department</h1>
                    <p class="wow fadeInUp animated" data-wow-delay="0.1s">Your House is our PRIORITY</p>
                </div> <!-- /.container -->
            </div> <!-- /.camera_caption -->
        </div>
        <div data-src="uploads/city-bg1.jpg">
            <div class="camera_caption">
                <div class="container">
                    <h1 class="wow fadeInUp animated">City of Bacoor Housing Urban Development and Resettlement Website
                    </h1>
                    <p class="wow fadeInUp animated" data-wow-delay="0.1s">Your House is our PRIORITY</p>
                </div> <!-- /.container -->
            </div> <!-- /.camera_caption -->
        </div>
        <div data-src="uploads/bacoor2.jpg">
            <div class="camera_caption">
                <div class="container">
                    <h1 class="wow fadeInUp animated">City of Bacoor Housing Urban Development and Resettlement Website
                    </h1>
                    <p class="wow fadeInUp animated" data-wow-delay="0.1s">Your House is our PRIORITY</p>
                </div> <!-- /.container -->
            </div> <!-- /.camera_caption -->
        </div>
    </div> <!-- /#theme-main-banner -->


    <div id="about" data-scroll-index="1" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h4>Who We are</h4>
                        <h2>Welcome to HUDRD Website</h2>
                        <blockquote class="lead">HUDRD is a department that priors Informal Settler Families who will be
                            affected in a demolition projects by DPWH</blockquote>

                        <p> City of Bacoor Housing Urban Development and Resettlement Department is a organization that
                            priors
                            Informal Settler Families that would be given a free house and lot. </p>

                        <!-- <a href="#services" data-scroll class="btn btn-light btn-radius btn-brd grd1">Learn More</a> -->
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="uploads/about-bacoor.jpg" alt="" class="img-responsive img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="hr1">

            <div class="row text-center">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media_pp wow fadeIn">
                            <a href="uploads/about-bacoor1.jpg" data-rel="prettyPhoto[gal]"></a>
                            <img src="uploads/about-bacoor1.jpg" class="img-responsive">
                            <div class="hover-up">
                                <h3>HUDRD works for a better future</h3>
                                <p>HUDRD priors isf for daily living.</p>
                            </div>
                        </div>

                    </div><!-- end service -->
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media_pp wow fadeIn">
                            <a href="uploads/bacoor2.jpg" data-rel="prettyPhoto[gal]"></a>
                            <img src="uploads/bacoor2.jpg" class="img-responsive">
                            <div class="hover-up">
                                <h3>Tenement and Urban House building for ISF</h3>
                                <p>For safety daily basis. </p>
                            </div>
                        </div>

                    </div><!-- end service -->
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media_pp wow fadeIn">
                            <a href="uploads/bacoor3.jpg" data-rel="prettyPhoto[gal]"></a>
                            <img src="uploads/bacoor3.jpg" class="img-responsive">
                            <div class="hover-up">
                                <h3>Construction of Buildings</h3>
                                <p>More Building, More ISF</p>
                            </div>
                        </div>

                    </div><!-- end service -->
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="service-widget">
                        <div class="post-media_pp wow fadeIn">
                            <a href="uploads/about-bacoor6.jpg" data-rel="prettyPhoto[gal]"></a>
                            <img src="uploads/about-bacoor6.jpg" class="img-responsive">
                            <div class="hover-up">
                                <h3>Relocation Project</h3>
                                <p>Evacuation of ISF's for their new home. </p>
                            </div>
                        </div>
                    </div><!-- end service -->
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->


    <div id="event" data-scroll-index="3" class="section wb" style="border-top:1px solid gray">
        <div class="container">
            <div class="section-title text-center">
                <h3>LIST OF ISF</h3>
            </div><!-- end title -->
            <div class="bg-light  me-auto ms-auto border-1 border-secondary border" style="min-height:72vh;">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>#event" method="POST" class="m-3 bg-dark w-100">
                    <div class="row align-items-center">
                        <div class="col-lg-5" style="padding:0">
                            <input type=" text" name="searchKey" id="" class="form-control" placeholder="Search"
                                style="width: 100%;"
                                value="<?php if (isset($_POST['searchKey'])) {
                                                                                                                                                    echo $_POST['searchKey'];
                                                                                                                                                } ?>">
                        </div>
                        <div class="col-lg-5" style="padding:0">


                            <select name="barangay_filter" class=" form-control form-select" id="">

                                <?php
                                if (isset($_POST['barangay_filter'])) {
                                    if (($_POST['barangay_filter']) == "") {
                                        echo '<option class="" value="">--Select Barangay--</option>';
                                    } else {
                                        echo '<option class="" hidden selected value="' . $_POST['barangay_filter'] . '">' . $_POST['barangay_filter'] . '</option>';
                                        echo '<option class="" value="">--Select Barangay--</option>';
                                    }
                                } else {
                                    echo '<option class="" value="">--Select Barangay--</option>';
                                }
                                ?>
                                <option value="Alima">Alima </option>
                                <option value="Aniban I">Aniban I</option>
                                <option value="Aniban II">Aniban II</option>
                                <option value="Aniban III">Aniban III</option>
                                <option value="Aniban IV">Aniban IV</option>
                                <option value="Aniban V">Aniban V</option>
                                <option value="Banalo">Banalo</option>
                                <option value="Bayanan">Bayanan</option>
                                <option value="Campo Santo">Campo Santo</option>
                                <option value="Daang Bukid">Daang Bukid</option>

                                <option value="Digman">Digman </option>
                                <option value="Dulong Bayan">Dulong Bayan</option>
                                <option value="Habay I">Habay I</option>
                                <option value="Habay II">Habay II</option>
                                <option value="Kaingin">Kaingin</option>
                                <option value="Ligas I">Ligas I</option>
                                <option value="Ligas II">Ligas II</option>
                                <option value="Ligas III">Ligas III</option>
                                <option value="Mabolo I">Mabolo I</option>
                                <option value="Mabolo II">Mabolo II</option>

                                <option value="Mabolo III">Mabolo III </option>
                                <option value="Maliksi I">Maliksi I</option>
                                <option value="Maliksi II">Maliksi II</option>
                                <option value="Maliksi III">Maliksi III</option>
                                <option value="Mambog I">Mambog I</option>
                                <option value="Mambog II">Mambog II</option>
                                <option value="Mambog III">Mambog III</option>
                                <option value="Mambog IV">Mambog IV</option>
                                <option value="Mambog V">Mambog V</option>
                                <option value="Molino I">Molino I</option>

                                <option value="Molino II">Molino II </option>
                                <option value="Molino III">Molino III</option>
                                <option value="Molino IV">Molino IV</option>
                                <option value="Molino V">Molino V</option>
                                <option value="Molino VI">Molino VI</option>
                                <option value="Molino VII">Molino VII</option>
                                <option value="Niog I">Niog I</option>
                                <option value="Niog II">Niog II</option>
                                <option value="Niog III">Niog III</option>
                                <option value="P.F. Espiritu I (Panapaan)">P.F. Espiritu I (Panapaan)</option>

                                <option value="P.F. Espiritu II">P.F. Espiritu II</option>
                                <option value="P.F. Espiritu III">P.F. Espiritu III</option>
                                <option value="P.F. Espiritu IV">P.F. Espiritu IV</option>
                                <option value="P.F. Espiritu V">P.F. Espiritu V</option>
                                <option value="P.F. Espiritu VI">P.F. Espiritu VI</option>
                                <option value="P.F. Espiritu VII">P.F. Espiritu VII</option>
                                <option value="P.F. Espiritu VIII">P.F. Espiritu VIII</option>
                                <option value="Queens Row Central">Queens Row Central</option>
                                <option value="Queens Row East">Queens Row East</option>
                                <option value="Queens Row West">Queens Row West</option>

                                <option value="Real I">Real I</option>
                                <option value="Real II">Real II</option>
                                <option value="Salinas I">Salinas I</option>
                                <option value="Salinas II">Salinas II</option>
                                <option value="Salinas III">Salinas III</option>
                                <option value="Salinas IV">Salinas IV</option>
                                <option value="San Nicolas I">San Nicolas I</option>
                                <option value="San Nicolas II">San Nicolas II</option>
                                <option value="San Nicolas III">San Nicolas III</option>
                                <option value="Sineguelasan">Sineguelasan</option>



                                <option value="Tabing Dagat">Tabing Dagat</option>
                                <option value="Talaba I">Talaba I</option>
                                <option value="Talaba II">Talaba II</option>
                                <option value="Talaba III">Talaba III</option>
                                <option value="Talaba IV">Talaba IV</option>
                                <option value="Talaba V">Talaba V</option>
                                <option value="Talaba VI">Talaba VI</option>
                                <option value="Talaba VII">Talaba VII</option>
                                <option value="Zapote I">Zapote I</option>
                                <option value="Zapote II">Zapote II</option>

                                <option value="Zapote III">Zapote III</option>
                                <option value="Zapote IV">Zapote IV</option>
                                <option value="Zapote V">Zapote V</option>
                            </select>
                        </div>
                        <div class="col-lg-2" style="padding:0">
                            <input type="submit" name="submitSearch" value="Search" class="btn btn-primary"
                                style="width: 100%;">
                        </div>


                    </div>
                </form>
                <hr>
                <div class="table-responsive" style="max-height:60vh;">
                    <table class="table table-bordered  table-striped" style="color: black;">
                        <tr class="text-center" style="color:black;">
                            <th>Full Name</th>
                            <th>Barangay</th>
                        </tr>
                        <?php
                        require_once 'includes/conn.php';
                        if (isset($_POST['submitSearch'])) {
                            $searchName = $conn->real_escape_string($_POST['searchKey']);
                            $searchBarangay = $conn->real_escape_string($_POST['barangay_filter']);

                            $sql = "SELECT * FROM tbl_users";

                            $condition = array();

                            if (!empty($searchName)) {

                                array_push($condition, "fname LIKE '%$searchName%' OR lname LIKE '%$searchName%' OR ename LIKE '%$searchName%' OR mname LIKE '%$searchName%' OR CONCAT(fname,' ',lname) LIKE '%$searchName%' OR CONCAT(fname,' ',lname,' ',ename) LIKE '%$searchName%'");
                            }
                            if (!empty($searchBarangay)) {
                                array_push($condition, "barangay = '$searchBarangay'");
                            }

                            $query = $sql;

                            if (count($condition) > 0) {
                                $query .= " WHERE " . implode(' AND ', $condition);
                                $query .= " AND user_type = 'ISF'";
                            } else {
                                $query .= " WHERE user_type = 'ISF'";
                            }

                            $result = $conn->query($query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) :
                        ?>
                        <tr>

                            <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['ename'] ?>
                            </td>
                            <td><?php echo $row['barangay'] ?></td>
                        </tr>
                        <?php

                                endwhile;
                            } else {
                                echo '<td colspan="2" class=" text-danger text-center">
                    NO RECORDS FOUND
                    </td>';
                            }
                            ?>

                        <?php
                        } else {

                            $query = $conn->query("SELECT * FROM tbl_users WHERE user_type ='ISF'");
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) :
                            ?>

                        <tr>
                            <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['ename'] ?>
                            </td>
                            <td><?php echo $row['barangay'] ?></td>
                        </tr>

                        <?php

                                endwhile;
                            } else {
                                echo '<td colspan="2" class=" text-danger text-center">
                    NO RECORDS FOUND
                    </td>';
                            }
                        }
                        ?>
                    </table>
                </div>

            </div>

        </div><!-- end container -->
    </div><!-- end section -->


    <div id="donate" data-scroll-index="8" class="section db ">
        <div class="container">
            <div class="section-title text-center">
                <h3>HUDRD Contact Form</h3>
                <p class="lead " style="color: white;">You can message us via website!.<br> Use this form.</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">

                    <div class="contact_form text-black">
                        <div id="message"></div>
                        <form action="index.php" method="POST">
                            <fieldset class="row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required name="fname" class="form-control"
                                        placeholder="First Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="mname" class="form-control"
                                        placeholder="Middle Name (Optional)">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required name="lname" class="form-control"
                                        placeholder="Last Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="ename" class="form-control"
                                        placeholder="Extension Name (Optional)">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" required name="email" class="form-control"
                                        placeholder="Your Email">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required name="cpnumber" class="form-control"
                                        placeholder="Your Phone">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" required name="concern" rows="6"
                                        placeholder="Express your concern here..."></textarea>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center">
                                    <button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block"
                                        name="submit">Send Message</button>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $fname = $_POST['fname'];
                            $mname = $_POST['mname'];
                            $lname = $_POST['lname'];
                            $ename = $_POST['ename'];
                            $email = $_POST['email'];
                            $cpnumber = $_POST['cpnumber'];
                            $concern = $_POST['concern'];


                            // modified query for contact form
                            $querycheck = $conn->query("INSERT INTO tbl_concern (fname, mname, lname, ename, email, cp_num, concern, c_status, notif_status) 
                            VALUES ('$fname','$mname', '$lname','$ename','$email','$cpnumber','$concern','NO RESPONSE','0')") or die($conn->error);
                            if ($querycheck) {
                                echo "<script> alert('Email Sent!') </script>";
                            } else {
                                echo "<script> alert('Email not sent!') </script>";
                                echo mysqli_error($conn);
                            }
                        }
                        ?>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p>Contact Us: 0997 583 2090</p>

                    <p class="footer-company-name">All Rights Reserved. &copy; 2022 <a href="#">City of Bacoor House
                            Urban Development and Resettlement Department</a>
                        <br>
                        Design By: CvSU-Bacoor BSIT Student
                    </p>
                </div>


            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>


    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<script>alert("Concern sent Successfully!");</script>';
        unset($_SESSION['message']);
    }


    ?>
    <!-- Camera Slider -->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/camera.min.js"></script>
    <script src="js/scrollIt.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/jquery.vide.js"></script>

</body>

</html>