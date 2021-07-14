<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!---Css Files---->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/responsive.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/content.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>vendors/jquery-toast-plugin/jquery.toast.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/') ?>vendors/jquery-bar-rating/bars-1to10.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/bars-1to10.min.css" />


    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://embed.twitch.tv/embed/v1.js"></script>


</head>

<body>



    <!-----Nav Bar--->

    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="logo" src="<?php echo base_url('assets/') ?>images/logo-darkened-mode.png" alt=""></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>




        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('en/dashboard/promotion') ?>">PROMOTION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('en/dashboard/watch') ?>">WATCH</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('en/dashboard/purchase') ?>">PURCHASE</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('en/dashboard/follows') ?>">FOLLOWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('en/dashboard/partner') ?>">REFERRALS </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">FORUM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('en/dashboard/settings') ?>">SETTINGS</a>
                </li>
                <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true) { ?>


                    <li class="nav-item">
                        <div class="user-controls f-right" id="user-controls">
                            <div class="f-left">
                                <div class="name right"><a class="medium-opacity" href="<?php echo base_url('en/user/' . $_SESSION['user_info']['username']) ?>"><?php echo $_SESSION['user_info']['username'] ?></a></div>
                                <div class="balance right"><a href="javascript:void(0)"><span class="credits-icon"></span></a><a class="medium-opacity" href="/en/dashboard/balance-history"><span id="current-credits"><?php echo $_SESSION['user_info']['coins']  ?></span></a></div>
                            </div>
                            <div class="f-left">
                                <div class="user-logo-container small"><span class="online c-help hidden"></span><a href="<?php echo base_url('en/user/' . $_SESSION['user_info']['username']) ?>"><img src="<?php echo $_SESSION['user_info']['userprofile']  ?>" class="user-logo" title="<?php echo $_SESSION['user_info']['username'] ?> "></a></div>
                            </div>
                            <div class="f-left">
                                <a href="<?php echo base_url('en/user/logout') ?>" class="low-opacity" title="Logout"><i class="fas fa-sign-out-alt logout"></i></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </li>

                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link loginc" href="<?php echo base_url('login/user') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link loginc" href="<?php echo base_url('en/admin/statistics') ?>">Admin</a>
                    </li>
                <?php } ?>

            </ul>
        </div>

    </nav>