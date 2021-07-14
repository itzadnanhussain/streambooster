<script>
    ///DataTable Inialization
    $('#dt-table').DataTable();
    ///Crousal
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({

            autoPlay: 3000,
            items: 7,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            center: true,
            nav: true,
            loop: true,
            responsive: {
                600: {
                    items: 1
                }
            }


        });


        ////for watch page
        $(".owl-carousel-watch").owlCarousel({

            autoPlay: 3000,
            items: 2,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            center: true,
            nav: true,
            loop: true,
            responsive: {
                600: {
                    items: 1
                }
            }


        });


    });

    ///Page-name///Promotion Page
    ///Activity///invest coins 
    $('.invest-coins').submit(function(e) {
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
    });


    ///General Form Submition
    $('.general-form').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize(); 
        $.ajax({
            type: 'POST',
            url: $('.general-form').attr('action'),
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

    $('.submit-comments').submit(function(e) {
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

    ///Activity///invest coins 
    $('.donation').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('Donation') ?>',
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


    <?php if (isset($_SESSION['is_logged_in']) && ($_SESSION['is_logged_in'] == true)) { ?>
        ////Logout Function Call After Some Time 
        var timer = 0;

        function set_interval() {
            // the interval 'timer' is set as soon as the page loads
            timer = setInterval("auto_logout()", 360000);
            // the figure '10000' above indicates how many milliseconds the timer be set to.
            // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
            // So set it to 300000
        }

        function reset_interval() {
            //resets the timer. The timer is reset on each of the below events:
            // 1. mousemove   2. mouseclick   3. key press 4. scroliing
            //first step: clear the existing timer

            if (timer != 0) {
                clearInterval(timer);
                timer = 0;
                // second step: implement the timer again
                timer = setInterval("auto_logout()", 360000);
                // completed the reset of the timer
            }
        }

        function auto_logout() {
            // this function will redirect the user to the logout script
            window.location = "<?php echo base_url('en/user/logout') ?>";
        }

        //call the event funtion when any event is accour after some time  
        window.onload = function() {
            set_interval();

        }
        document.onclick = function() {
            reset_interval();

        }
        document.onkeypress = function() {
            reset_interval();

        }
        document.onscroll = function() {
            reset_interval();
        }

        document.onmousemove = function() {
            reset_interval();
        }

    <?php } ?> 
    ////Logout Process Done  
    
    ///banned User
    <?php if (isset($_SESSION['user_info']['status']) && $_SESSION['user_info']['status'] == "banned") { ?>
        window.onload = function() {
            swal("Your Are Blocked From Admin!", {
                button: false,
                icon: "warning",

            });
            setTimeout(function() {
                window.location = "<?php echo base_url('block/logout') ?>"
            }, 3000)
        }

    <?php } ?>

    window.onbeforeunload = function() {
        alert('helo');
    }



    // theme mode change function

    $('.submitTest').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize(); 


        var url= $(this).attr("action");
        $.ajax({
            type: 'POST',
            url:url,
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
    });

    function DarkModeCSS() {
            //dark  gray
        $("body , .select-all , th , .simplebar-track * , .stream-chat-header * , .cool-button.disabled , .card  , .block-footer, textarea, .cool-button-3 , .with-comment, #search_users, .graph-scale , .theme_selector , select").css({"background-color": "#1b2630 !important" ,"color": "#999" , "border": "#1b2630 1px solid"});
        $(".field-comment * , .user-name * ").css({"color": "#999"});
        $(".user-profile-header li *").css({"color": "#ffffff"});
      //light gray
        $(".block , iframe * , .block-body , .userpic-container , td  , .simplebar-content * , .simplebar-scroll-content * , #chat-window , .simplebar-scroll-content , .info-container, .red , h1, h2, h3, h4, h5, h6 , #most-active").css({"background-color": "#343a40", "color": "#fff !important", "border": "none"});
        $(".block-3 , input").css({"border": "#1b2630 1px solid"});
        $(".clickable td").css({"background-color": "" });
        }


    $(document).ready(function(){
        $(".theme").click(function(){
            var selectedCountry = $( ".theme_selector" ).val();
        if(selectedCountry=="dark")
        {
            
            DarkModeCSS();

        }
        else{ 
            $("body").css({"background-color": "#f5f7fa"});
            $("textarea, .graph-scale , td , .user-profile-header li * , .card  , .userpic-container , .info-container , .with-comment, #search_users , .theme_selector ,.field-comment *,h1, h2, h3, h4, h5, h6 ,.block , .block-body ,  .block-footer , #most-active").css({"background-color": "" ,"color": "#333" , "border": ""});
            $(".cool-button-3 , th").css({"background-color": "#ebebeb " ,"color": "#aaa" , "border": "1px solid"});
        }
        });

        <?php if(!empty( $this->input->cookie('theme',true))){?> 
                DarkModeCSS();
            <?php } ?> 
    });





    
</script>