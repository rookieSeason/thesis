<?php include "../../includes/header.php";
include "checkIfHudrdStaff.php";

?>
<div class=" pt-lg-5 pb-lg-5" style="min-height:80vh;">

    <div class="row m-2 d-flex align-items-center">
        <div class=" col-md-6">
            <div class="row mb-2">


                <div class="col-lg-12 col-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total number of ISF</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $isf = $conn->query("SELECT COUNT(user_id) AS isf  FROM tbl_users WHERE user_type = 'ISF'");
                                        $rowIsf = $isf->fetch_array();
                                        echo $rowIsf['isf'];
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <div class="row mb-2">
                <div class="col-lg-12 col-12 mb-4 center">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Unresponded Concerns</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $concern = $conn->query("SELECT COUNT(f_id) AS concern FROM tbl_concern WHERE c_status = 'NO RESPONSE'");
                                        $rowConcern = $concern->fetch_array();
                                        echo $rowConcern['concern'];
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-6">

            <div class="row mb-2">
                <div class="col-12 mb-4">
                    <div class=" card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class=" row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class=" text-md font-weight-bold text-primary text-uppercase mg-1">
                                        PIE GRAPH
                                    </div>

                                    <div id="chart">
                                        <?php
                                        $reloc = $conn->query("SELECT COUNT(s_id) AS relocated FROM tbl_schedule WHERE s_status = 'RELOCATED'");
                                        $rowReloc = $reloc->fetch_array();



                                        $notreloc = $conn->query("SELECT COUNT(s_id) AS notrelocated FROM tbl_schedule WHERE s_status != 'RELOCATED'");
                                        $rownotReloc = $notreloc->fetch_array();


                                        ?>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>







</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
const relocated = <?php echo $rowReloc['relocated'] ?>;
const notRelocated = <?php echo $rownotReloc['notrelocated'] ?>;


var options = {

    series: [relocated, notRelocated],
    labels: ['Relocated', 'Not Relocated'],
    colors: ['#2fb62f', '#e60000'],
    background: ['#999999'],
    chart: {
        height: 335,
        type: 'donut',

    },
    plotOptions: {
        pie: {
            customScale: 1.0,
            donut: {
                size: '65%'
            }
        }
    },

    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'center',
                fontSize: "50px",
            }
        }
    }],

};
var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>

<?php include "../../includes/footer.php" ?>