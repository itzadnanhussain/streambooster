<script>
    ///Table initialize 
    $('.id-table').DataTable();

    ///statistics 
    if (window.location.href.indexOf("statistics") > -1) {
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {

                animationEnabled: true,
                // title: {
                //     text: "Statistics"
                // },
                legend: {
                    cursor: "pointer",
                    itemclick: explodePie
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}</strong>",
                    indexLabel: "{name} :  {y} ",
                    dataPoints: [{
                            y: <?php echo (isset($streamers) ? $streamers : '0') ?>,
                            name: "Total Register Streamers",
                            exploded: true
                        },
                        {
                            y: <?php echo (isset($last7days) ? count($last7days) : '0') ?>,
                            name: "Last 30 Days Rigister Streamers"
                        },
                        {
                            y: <?php echo (isset($last30days) ? count($last30days) : '0') ?>,
                            name: "Last 7 Days Rigister Streamers"
                        },


                    ]
                }]
            });
            chart.render();
        }

        function explodePie(e) {
            if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
            } else {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
            }
            e.chart.render();

        }

    }



    ///broadcasting Rating
    if (window.location.href.indexOf("broadcast") > -1) {
        window.onload = function() {

            var chart = new CanvasJS.Chart("broadcasting", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Broadcating Quality"
                },
                // axisY: {
                //     title: "Growth Rate (in %)",
                //     suffix: "%"
                // },
                // axisX: {
                //     title: "Countries"
                // },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.0#\"%\"",
                    dataPoints: [{
                            label: "Gaming skills",
                            y: <?php echo (isset($records[0]->gaming_skills) ? $records[0]->gaming_skills : 0) ?>
                        },
                        {
                            label: "Communicability",
                            y: <?php echo (isset($records[0]->communicability) ? $records[0]->communicability : 0) ?>
                        },
                        {
                            label: "Video settings",
                            y: <?php echo (isset($records[0]->video_settings) ? $records[0]->video_settings : 0) ?>
                        },
                        {
                            label: "Audio settings",
                            y: <?php echo (isset($records[0]->audio_settings) ? $records[0]->audio_settings : 0) ?>
                        },
                        {
                            label: "Webcam",
                            y: <?php echo (isset($records[0]->webcam) ? $records[0]->webcam : 0) ?>
                        },
                        {
                            label: "Adequacy",
                            y: <?php echo (isset($records[0]->adequacy) ? $records[0]->adequacy : 0) ?>
                        },
                        {
                            label: "Charisma",
                            y: <?php echo (isset($records[0]->charisma) ? $records[0]->charisma : 0) ?>
                        },
                        {
                            label: "Sexuality",
                            y: <?php echo (isset($records[0]->sexuality) ? $records[0]->sexuality : 0) ?>
                        },
                        {
                            label: "Streamer of the Year",
                            y: <?php echo (isset($records[0]->stream_of_the_year) ? $records[0]->stream_of_the_year : 0) ?>
                        }

                    ]
                }]
            });
            chart.render();

        }
    }


    ////submit-form
    $('.submit-form').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let url = $('.submit-form').attr('action');
        let form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 3500)
                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;
                    case 'error':
                        res.message.forEach(function(error) {
                            $('[name=' + error[0] + ']').parent().append('<span>' + error[1] + '</span>');
                        })
                        break;
                }
            }
        });
    })


    ////DeleteUserPermenent
    function DeleteUserPermenent(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('DeleteUserPermenent') ?>',
            data: {
                id: id,
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload()
                        }, 3500)
                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;

                }
            }
        });
    }


    ////TempararayBanUser
    function TempararayBanUser(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('TempararayBanUser') ?>',
            data: {
                id: id,
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload()
                        }, 3500)
                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;

                }
            }
        });
    }

    ///UpdateCommentStatus
    function UpdateCommentStatus(id, status) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('UpdateCommentStatus') ?>',
            data: {
                id: id,
                status: status,
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload();

                        }, 3000)

                        break;
                    case 'warning':
                        showWarningToast(res.message);


                }
            }
        });

    }
    

    ////UnblockUser
    function UnblockUser(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('UnblockUser') ?>',
            data: {
                id: id,
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload()
                        }, 3500)
                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;

                }
            }
        });
    }

    ////Ranks Promotion
    $('.form-ranks').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize();
        $.ajax({
            type: 'POST',
            data: form,
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload()
                        }, 3500)
                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;

                }
            }
        });
    });

    $('#assign-ranks').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('AssignRanksByAdmin')  ?>',
            data: form,
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 3500)
                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;

                }
            }
        });

    });


    //////check Ranks
    function checkranks() {
        if ($('#ranks').val() == "Virtual Coins") {
            $('#vr-coins').css('display', 'block');
        } else {
            $('#vr-coins').css('display', 'none');
        }
    }
</script>