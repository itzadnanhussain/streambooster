<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content tab-transparent-content pb-0">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-xl-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <h4 class="card-title">Total Coins</h4>

                                    </div>
                                    <div id="sales" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="d-flex flex-wrap align-items-baseline">
                                                    <h2 class="mr-3"><?php echo (isset($coins) ? $coins : '0 Coins') ?></h2>
                                                </div>
                                                <div class="mb-3">
                                                    <p class="text-muted font-weight-bold text-small">Here All Coins Sums Of <span class=" font-weight-normal text-danger">Streamers</span></p>
                                                </div>

                                            </div>
                                            <div class="carousel-item ">
                                                <div class="d-flex flex-wrap align-items-baseline">
                                                    <h2 class="mr-3"><?php echo (isset($coins) ? $coins : '0 Coins') ?></h2>
                                                </div>
                                                <div class="mb-3">
                                                    <p class="text-muted font-weight-bold text-small">Here All Coins Sums Of <span class=" font-weight-normal text-danger">Streamers</span></p>
                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-xl-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <h4 class="card-title">Total Users Registered</h4>

                                    </div>
                                    <div id="sales" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="d-flex flex-wrap align-items-baseline">
                                                    <h2 class="mr-3"><?php echo (isset($totalUsers)) ? $totalUsers : 0 ?></h2>
                                                </div>
                                                <div class="mb-3">
                                                    <p class="text-muted font-weight-bold text-small">Currently Avaialable Users in <span class=" font-weight-normal text-danger">Our Systems</span></p>
                                                </div>

                                            </div>
                                            <div class="carousel-item">
                                                <div class="d-flex flex-wrap align-items-baseline">
                                                    <h2 class="mr-3"><?php echo (isset($totalUsers)) ? $totalUsers : 0 ?></h2>
                                                </div>
                                                <div class="mb-3">
                                                    <p class="text-muted font-weight-bold text-small">Currently Avaialable Users in <span class=" font-weight-normal text-danger">Our Systems</span></p>
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
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <h4 class="card-title">Register Streamer Statistics for <?php echo date('Y') ?></h4>
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 
  <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            //	exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"

            // axisY: {
            //     includeZero: true
            // },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelFontSize: 16,
                // indexLabelPlacement: "outside",
                dataPoints: [{
                        label: "Jan",
                        y: <?php echo (isset($Jan) ? $Jan : 0) ?>,
                    },
                    {
                        label: "Feb",
                        y: <?php echo (isset($Feb) ? $Feb : 0) ?>,
                    },
                    {
                        label: "Mar",
                        y: <?php echo (isset($Mar) ? $Mar : 0) ?>,
                    },
                    {
                        label: "Apr",
                        y: <?php echo (isset($Apr) ? $Apr : 0) ?>,
                    },
                    {
                        label: "May",
                        y: <?php echo (isset($May) ? $May : 0) ?>,
                    },
                    {
                        label: "Jun",
                        y: <?php echo (isset($Jun) ? $Jun : 0) ?>,
                    },
                    {
                        label: "Jul",
                        y: <?php echo (isset($Jul) ? $Jul : 0) ?>,
                    },
                    {
                        label: "Aug",
                        y: <?php echo (isset($Aug) ? $Aug : 0) ?>,
                    },
                    {
                        label: "Sep",
                        y: <?php echo (isset($Sep) ? $Sep : 0) ?>,
                    },
                    {
                        label: "Oct",
                        y: <?php echo (isset($Oct) ? $Oct : 0) ?>,
                    },
                    {
                        label: "Nov",
                        y: <?php echo (isset($Nov) ? $Nov : 0) ?>,
                    },
                    {
                        label: "Dec",
                        y: <?php echo (isset($Dec)) ? $Dec : 0 ?>,
                    },
                ]
            }]
        });
        chart.render();

    }
</script>  