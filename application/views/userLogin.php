<html>

<head>
    <title>Conect With Twitch Tv</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/')  ?>css/login.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <?php  include_once (FCPATH.'twitch/autoloader.php') ?> 
    <?php
    // get twitch login url
    $eciTwitchApi = new eciTwitchApi(TWITCH_CLIENT_ID, TWITCH_CLIENT_SECRET);
    $twitchLoginUrl = $eciTwitchApi->getLoginUrl(TWITCH_REDIRECT_URI);

    ?>


</head>

<body>
    

     
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 offset-xs-2 offset-md-3  mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Welcome to Stream Booster, please login below</h5>
                        <form class="form-signin">

                            <a class="btn btn-lg btn-primary btn-block text-uppercase" href="<?php echo $twitchLoginUrl ?>"><i class="fab fa-twitch"></i> Connect with Twitch</a>



                        </form>
                        <a class="btn btn-success btn-block text-uppercase" href="<?php echo base_url() ?>"><i class="fab fa-home"></i>Back To Home</a>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>


</html>