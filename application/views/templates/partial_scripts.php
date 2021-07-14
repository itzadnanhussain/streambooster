 
<script>
    ///Call All Funstion On Window Load 
    <?php if (isset($_SESSION['is_logged_in']) && ($_SESSION['is_logged_in'] == true)) { ?>
        window.onload = function() {
            if (localStorage.getItem("hasCodeRunBefore") === null) {
                UpdateUserLevel();
                GetTotalFollowers();
                localStorage.setItem("hasCodeRunBefore", true);
            }
        }
    <?php } ?>

    ///UpdateUserLevel
    function UpdateUserLevel() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('UpdateUserLevel') ?>',
            data: {
                table: 'users',
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':

                        break;
                    case 'warning':


                }
            }
        });

    }
    //03135498960

    ///GetTotalFollowers
    function GetTotalFollowers() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('GetTotalFollowers') ?>',
            data: {
                table: 'users',
            },
            dataType: 'html',
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':

                        break;
                    case 'warning':


                }
            }
        });

    }

    ///CreateNewFollower
    function CreateNewFollower(id, check = null) {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('CreateNewFollower') ?>',
            data: {
                to_id: id,
                requestPage: check,
            },
            dataType: 'html',
            beforeSend: function(){
                $('#btn-follow').text('Following...');
                $('#btn-follow').attr('disabled', 'disabled');

            },
            success: function(data) {
                let res = JSON.parse(data);
                switch (res.code) {
                    case 'success':
                        showSuccessToast(res.message);

                        break;
                    case 'warning':
                        showWarningToast(res.message);


                }
            },
            complete: function()
            {
                $('#btn-follow').text('Followed'); 
                $('#btn-follow').attr('disabled', 'disabled');

            }
            
        });

    }

    ///FollowTwitchUser
    function FollowTwitchUser(id) {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('FollowToTwitchUser') ?>',
            data: {
                'id': id,
                'status': "Following"
            },
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
    }

    ///DeleteComment
    function DeleteComment(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('DeleteComment') ?>',
            data: {
                'id': id,
            },
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
    }

    ///comment reply submit
    $('.submit-comments-reply').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('SubmitReply') ?>',
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
    })


     

    ///search user 
    $(function() {
        $("#search_users").autocomplete({
            source: '<?php echo base_url('searchUsers') ?>',
        });
    });
</script>