<?php include_once(FCPATH . 'twitch/autoloader.php') ?>
    <?php
    if (isset($_GET['code']) && isset($_GET['state']) && $_GET['state'] == $_SESSION['twitch_state']) {

        // user is coming from twitch
        // instantiate new twitch class
        $eciTwitchApi = new eciTwitchApi(TWITCH_CLIENT_ID, TWITCH_CLIENT_SECRET);

        // try and log the user in with twitch
        $twitchLogin = $eciTwitchApi->tryAndLoginWithTwitch($_GET['code'], TWITCH_REDIRECT_URI);
    }


    if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true) {
        $_SESSION['reactivation_promo'] = true;
        redirect('en/dashboard/welcome');
    } else {
        redirect('login/user');
    }

    ?>
   