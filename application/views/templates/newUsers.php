<div class="block-3">
    <div class="block-body">
        <h2>New Users</h2>
        <ul class="users-list">
            <?php if (isset($newUsers) && !empty($newUsers)) { ?>
                <?php for ($i = 0; $i < 8; $i++) { ?>
                    <li>
                        <span class="userpic-container">
                            <div class="user-logo-container small"><a href="/en/user/<?php echo $newUsers[$i]->username ?>"><span class="online c-help hidden" title="Broadcast is live"></span><img src="<?php echo $newUsers[$i]->userprofile ?>" class="user-logo" alt="<?php echo $newUsers[$i]->username ?>" title="<?php echo $newUsers[$i]->username ?>"></a></div>
                        </span><span class="info-container">
                            <div class="user-name"><a class="medium-opacity" href="/en/user/<?php echo $newUsers[$i]->username ?>"><?php echo $newUsers[$i]->username ?></a></div>
                            <div class="user-info"><span class="num"><?php echo $newUsers[$i]->created_at ?></span></div>
                        </span>

                    </li>

                <?php } ?>
            <?php } ?>
        </ul>
    </div>
    <div class="block-footer center">
        <a href="<?php echo base_url('en/users-rating') ?>" class="cool-button cool-button-3">View all users</a>
    </div>
</div>