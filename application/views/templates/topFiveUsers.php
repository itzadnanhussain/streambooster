<div class="block-3">
    <div class="block-body">
        <h2>TOP-5 Users</h2>
        <ul class="users-list">
            <?php if(isset($topUsers) && !empty($topUsers)) { ?>
                <?php foreach ($topUsers as $key => $value) { ?>
                    
            <li> <span class="userpic-container">
                    <div class="user-logo-container small"><a href="<?php echo base_url('en/user/'.$value->username) ?>"><span class="online c-help hidden" title="Broadcast is live"></span> <img src="<?php echo $value->userprofile ?>" class="user-logo"></a></div>
                </span> <span class="info-container">
                    <div class="user-name"><a class="medium-opacity" href="<?php echo base_url('en/user/'.$value->username) ?>"><?php echo $value->username ?></a></div>
                    <div class="user-info"><span class="num"><?php echo $value->coins ?></span> Total Coins</div>
                </span>
            </li>
            <?php  } ?>
            <?php } ?>
        </ul>
    </div>
    <div class="block-footer center">
        <a href="<?php echo base_url('en/users-rating') ?>" class="cool-button cool-button-3">View full users rating</a>
    </div>

</div>

 