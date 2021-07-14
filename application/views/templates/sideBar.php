<div class="left-sidebar sticky-sidebar" style="padding-top: 0px;">
    <!---User level--->
    <?php if (isset($level_box) && ($level_box == 'active') && (isset($_SESSION['is_logged_in']) && ($_SESSION['is_logged_in'] == True))) { ?>
        <div id="current-level">
            <div class="block-3">
                <div class="block-body">
                    <h2>Current Level</h2>
                    <div class="circle-level">
                        <div class="inner"><?php echo (isset($_SESSION['user_info']['level']) ? $_SESSION['user_info']['level'] : 'Nothing') ?></div>
                    </div>
                    <div class="absolute-scale-container">
                        <div class="graph-scale c-help" title="You have 57,796 experience points (5.2%)">
                            <div class="inner" style="width: 5.2%;"></div>
                        </div>
                    </div>
                </div>
                <div class="block-footer center">
                    <a href="<?php echo base_url('en/dashboard/userslevel') ?>" class="cool-button cool-button-3">Learn more about levels</a>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if (isset($new_users) && ($new_users == 'active')) { ?>

        <div id="most-active">
            <?php $this->load->view('templates/newUsers') ?>
        </div>

    <?php }  ?>
    <div id="most-active">
        <?php $this->load->view('templates/topFiveUsers') ?>
    </div>
    <div class="block-2">
        <a href="javascript:void(0)"><img class="instagram-contest-banner" src="<?php echo base_url('assets/images') ?>/i/instagram-contest-banner-01-en.png"></a>
    </div>


</div>