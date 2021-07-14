<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <strong>Heads up!</strong> Admin Can Assign Manually Ranks To The Streamers.
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Assign Manually Ranks</h4>
                    <form id="assign-ranks" class="submit-form" action="<?php echo base_url('Admin/SetManuallyRank'); ?>"> 
  
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo (isset($id) ? $id : 0) ?>">
                            <label for="exampleSelectGender">Select Ranks</label>
                            <select class="form-control" id="ranks"  name="ranks"><!--onclick="checkranks()"-->
                            <option value="Double Coins">Double Coins</option>  
                            <option value="Virtual Coins">Virtual Coins</option>  
                            <option value="Promoted-Rank">Promoted-Rank</option>  
                            <option value="AFK">AFK</option>  
                            </select>
                        </div>
                        <div class="form-group" id="vr-coins" style="display: none;">
                            <label for="exampleInputEmail3">Assign Coins</label>
                            <input type="number" min="0" class="form-control" name="assign_coins">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Ranks Status</label>
                            <select class="form-control" name="promotion_status">
                                <option value="Pending" selected="">Pending</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>

                            </select>
                        </div>  
                        <input type="submit" class="btn btn-primary mr-2" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <strong>Heads up!</strong> Request From Streamers For Promotion.
            </div>
        </div>
        <?php if (isset($records) && !empty($records)) { ?>
            <?php foreach ($records as $key => $value) { ?>
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo (isset($value->ranks) ? $value->ranks : 'No Value') ?></h4>
                            <form class="form-ranks submit-form"  action="<?php echo base_url('Admin/SetRankStatus'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo (isset($value->ranks) ? $value->ranks : 'No Value') ?>" disabled>
                                    <input type="hidden" name="ranks" class="form-control" value="<?php echo (isset($value->ranks) ? $value->ranks : 'No Value') ?>">
                                    <input type="hidden" name="user_id" class="form-control" value="<?php echo (isset($value->user_id) ? $value->user_id : 0) ?>">
                                    <input type="hidden" name="promotion_id" class="form-control" value="<?php echo (isset($value->promotion_id) ? $value->promotion_id : 0) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Ranks Status</label>
                                    <select class="form-control" name="promotion_status">
                                        <option value="Pending" <?php echo ($value->promotion_status == "Pending") ? 'selected' : '' ?>>Pending</option>
                                        <option value="Active" <?php echo ($value->promotion_status == "Active") ? 'selected' : '' ?>>Active</option>
                                        <option value="Inactive" <?php echo ($value->promotion_status == "Inactive") ? 'selected' : '' ?>>Inactive</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Curren Status</label>
                                    <input type="text" class="form-control" value="<?php echo (isset($value->promotion_status) ? $value->promotion_status : 'No Value') ?>" disabled>
                                </div>

                                <input type="submit" class="btn btn-primary mr-2" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

        <?php } ?>

    </div>


</div>

<script>
    ///General Form Submition
    $('.submit-form').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let form = $(this).serialize();
        var url = $(this).attr('action');
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

                }
            }
        });
    });
</script>