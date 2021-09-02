<script>
    ///StartEarnig Function
    let hour = 0;
    let minute = 0;
    let seconds = 0;
    let coins = 0;
    let totalSeconds = 0;
    let intervalId = null;
    const post_coins = '<?php echo  $_SESSION['user_info']['wtch_video_permin'] ?>';

    function StartEarning(status) {

        $('#strEarning').css('display', 'none');
        intervalId = setInterval(function() {
            startTimer(status);
        }, 1000);


        <?php if (isset($_SESSION['user_info']['afk_varification']) && ($_SESSION['user_info']['afk_varification'] == 'Inactive')) { ?>
            setTimeout(function() {
                $('#strEarning').css('display', 'block');
                $('#strlink').text('Resume Earning');
                if (intervalId) {
                    clearInterval(intervalId);
                }
            }, 60000 * 5)
        <?php }   ?>

        <?php if (isset($_SESSION['user_info']['afk_varification']) && ($_SESSION['user_info']['afk_varification'] == 'Pending')) { ?>
            setTimeout(function() {
                $('#strEarning').css('display', 'block');
                $('#strlink').text('Resume Earning');
                if (intervalId) {
                    clearInterval(intervalId);
                }
            }, 60000 * 5)
        <?php }   ?>









    }

    function startTimer(status) {

        ++totalSeconds;
        hour = Math.floor(totalSeconds / 3600);
        minute = Math.floor((totalSeconds - hour * 3600) / 60);
        seconds = totalSeconds - (hour * 3600 + minute * 60);
        if (seconds == 59) {
            if (status == 'golden') {
                <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == 'Active')) { ?>
                    PostCoins(2*post_coins);
                <?php } else { ?>
                    PostCoins(post_coins);
                <?php } ?>

            }

            if (status == 'silver') {
                <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == 'Active')) { ?>
                    PostCoins(2*post_coins);
                <?php } else { ?>
                    PostCoins(post_coins);
                <?php } ?>

            }


        }

        if (minute) {
            if (status == 'golden') {
                <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == 'Active')) { ?>
                    coins = minute * (2 * post_coins);
                <?php } else { ?>
                    coins = minute * post_coins;
                <?php } ?>

            }

            if (status == 'silver') {
                <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == 'Active')) { ?>
                    coins = minute * (2 * post_coins);
                    <?php } else { ?>
                        coins = minute * post_coins;
                <?php } ?>

            }



        }

        if (minute <= 0) {
            coins = 0;

        }






        document.getElementById("hour").innerHTML = hour;
        document.getElementById("minute").innerHTML = minute;
        document.getElementById("seconds").innerHTML = seconds;
        <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == 'Active')) { ?>
            document.getElementById("credits-earned").innerHTML = coins * 2;
        <?php } else { ?>
            document.getElementById("credits-earned").innerHTML = coins;
        <?php } ?>

    }
 

    ////Post Coins Into DataBase
    function PostCoins(coins) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('PostCoins') ?>',
            data: {
                coins: coins
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);

                        break;
                    case 'warning':
                        showWarningToast(res.message);
                        break;

                }
            }
        });
    }


    ///rating form
    $('.br-selected').click(function(e) {
        alert('hy');
    })
</script>