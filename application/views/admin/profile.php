<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border-bottom text-center pb-4">
                                <img src="<?php echo (isset($records[0]->userprofile) ? $records[0]->userprofile : 'Nothing') ?>" alt="profile" class="img-lg rounded-circle mb-3">
                                <div class="mb-3">
                                    <h3><?php echo (isset($records[0]->username) ? $records[0]->username : 'Nothing') ?></h3>

                                </div>
                                <p class="w-75 mx-auto mb-3"><?php echo (isset($records[0]->bio) ? $records[0]->bio : 'Nothing') ?></p>
                                <!-- <div class="d-flex justify-content-center">
                                    <button class="btn btn-success mr-1">Hire Me</button>
                                    <button class="btn btn-success">Follow</button>
                                </div> -->
                            </div>

                            <div class="border-bottom py-4">
                                <div class="d-flex mb-3">
                                    <div class="progress progress-md flex-grow">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="progress progress-md flex-grow">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Status
                                    </span>
                                    <span class="float-right text-muted">
                                        <?php echo (isset($records[0]->status) ? $records[0]->status : 'Nothing') ?>
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">
                                        Brodcasting
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="<?php echo base_url('en/admin/broadcast/'. $records[0]->id )?>">
                                            Check Broadcasting Rate

                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Ranks
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="<?php echo base_url('en/admin/ranks/'. $records[0]->id ) ?>">
                                            Ranks Management

                                        </a>
                                    </span>
                                </p>

                            </div>
                            <button class="btn btn-primary btn-block mb-2" disabled>Bellow you can perform different opertaions on this profile</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <ul class="nav nav-tabs" role="tablist">

                                <!----pills-activity---->
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-home" aria-selected="true">
                                        Activity
                                    </a>
                                </li>

                                <!----pills-reference---->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-reference" role="tab" aria-controls="pills-contact" aria-selected="false">
                                        Refferel
                                    </a>
                                </li> -->


                                <!----pills-level---->
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-level" role="tab" aria-controls="pills-contact" aria-selected="false">
                                        levels
                                    </a>
                                </li>

                                <!----pills-level---->
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-comments" role="tab" aria-controls="pills-contact" aria-selected="false">
                                        Comments
                                    </a>
                                </li>


                                <!----user-bio---->
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#user-bio" role="tab" aria-controls="user-bio" aria-selected="false">
                                        Profile Text
                                    </a>
                                </li>

                                <!----user-coin---->
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#user-coin" role="tab" aria-controls="user-coin" aria-selected="false">
                                        Coins
                                    </a>
                                </li>

                               

                            </ul>

                            <div class="tab-content">

                                <!----pills-activity---->
                                <div class="tab-pane fade active show" id="pills-activity" role="tabpanel" aria-labelledby="pills-home-tab-custom">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="text-center">Activity Logs</h4>
                                            <div class="table-responsive">
                                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div id="id-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <table class="table dataTable no-footer id-table" role="grid" aria-describedby="id-table_info">
                                                                            <thead>
                                                                                <tr class="bg-primary text-white" role="row">
                                                                                    <th>S.NO</th>
                                                                                    <th>Activity</th>
                                                                                    <th>Time</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php if (isset($logs) && !empty($logs)) { ?>
                                                                                    <?php foreach ($logs as $key => $value) { ?>
                                                                                        <tr>
                                                                                            <td><?php echo (isset($value->activity_id) ? $value->activity_id : 'Nothing') ?></td>
                                                                                            <td><?php echo (isset($value->discription) ? $value->discription : 'Nothing') ?></td>
                                                                                            <td><?php echo (isset($value->created_at) ?  $value->created_at : 'Nothing') ?></td>
                                                                                        </tr>

                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <!----pills-reference---->
                                <!-- <div class="tab-pane fade" id="pills-reference" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="text-center">Referral Links</h4>
                                            <div class="table-responsive">
                                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div id="id-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <table class="table dataTable no-footer id-table" role="grid" aria-describedby="id-table_info">
                                                                            <thead>
                                                                                <tr class="bg-primary text-white" role="row">
                                                                                    <th>S.NO</th>
                                                                                    <th>Streamer Name</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr role="row" class="odd">
                                                                                    <td>1</td>
                                                                                    <td>Test</td>


                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <!----pills-level---->
                                <div class="tab-pane fade" id="pills-level" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                                    <div class="row">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Level Management</h4>
                                                    <form class="submit-form" action="<?php echo base_url('LevelUpdateByAdmin') ?>">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="<?php echo (isset($records[0]->level) ? $records[0]->level : 0) ?>" disabled="">
                                                            <input type="hidden" name="id" value="<?php echo (isset($records[0]->id) ? $records[0]->id : 0) ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Assign New Level</label>
                                                            <select class="form-control" name="level">
                                                                
                                                               <?php for($i=1;$i<=30;$i++)
                                                               {?>
                                                                   <option value="<?php echo $i ;?>">level <?php echo $i ;?></option>
                                                               <?php }
                                                               
                                                               ?>
                                                            </select>
                                                        </div>

                                                        <input type="submit" class="btn btn-primary mr-2" value="Update User Level">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!----pills-level---->
                                <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Comments List </h4>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div id="id-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <table class="table dataTable no-footer id-table" role="grid" aria-describedby="id-table_info">
                                                                                    <thead>
                                                                                        <tr class="bg-primary text-white" role="row">
                                                                                            <th>S.NO</th>
                                                                                            <th>Username</th>
                                                                                            <th>Comments</th>
                                                                                            <th>Status</th>
                                                                                            <th>Date</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php if (isset($comments) && !empty($comments)) { ?>
                                                                                            <?php $i = 1; ?>
                                                                                            <?php foreach ($comments as $key => $value) { ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $i ?></td>
                                                                                                    <td><?php echo (isset($value->username) ? $value->username : '') ?></td>
                                                                                                    <td><?php echo (isset($value->comment) ?  $value->comment : '...') ?></td>
                                                                                                    <?php if ($value->status == "Pending") { ?>
                                                                                                        <td><button class="btn btn-danger" onclick="UpdateCommentStatus('<?php echo $value->comment_id ?>' ,'<?php echo $value->status ?>')">Pending</button></td>
                                                                                                    <?php } else { ?>
                                                                                                        <td><button class="btn btn-success" onclick="UpdateCommentStatus('<?php echo $value->comment_id ?>' ,'<?php echo $value->status ?>')">Active</button></td>

                                                                                                    <?php } ?>
                                                                                                    <td><?php echo (isset($value->updated_at) ?  $value->updated_at : '') ?></td>
                                                                                                </tr>
                                                                                                <?php $i++ ?>

                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!----Bio Text---->
                                <div class="tab-pane fade" id="user-bio" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="text-center">You Can Update User Profile Text!</h4>
                                            <form class="submit-form" action="<?php echo base_url('Admin/UpdateBio') ?>">

                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="username" class="form-control" value="<?php echo (isset($records[0]->username) ? $records[0]->username : 'Nothing') ?>" disabled>
                                                    <input type="hidden" name="id" value="<?php echo (isset($records[0]->id) ? $records[0]->id : 'Nothing') ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Profile Text</label>
                                                    <textarea name="bio" id="" cols="30" class="form-control" rows="10"><?php echo (isset($records[0]->bio) ? $records[0]->bio : 'Nothing') ?></textarea>
                                                </div>

                                                <input type="submit" class="btn btn-primary" value="Update Text">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!----Coins---->
                                <div class="tab-pane fade" id="user-coin" role="tabpanel" aria-labelledby="coin-tab">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="text-center">You Can Update User Coins</h4>
                                            <form class="submit-form" action="<?php echo base_url('Admin/UpdateCoins') ?>">

                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="username" class="form-control" value="<?php echo (isset($records[0]->username) ? $records[0]->username : 'Nothing') ?>" disabled>
                                                    <input type="hidden" name="id" value="<?php echo (isset($records[0]->id) ? $records[0]->id : 'Nothing') ?>" class="form-control">
                                                    <input type="hidden" name="total_coins" value="<?php echo (isset($records[0]->coins) ? $records[0]->coins : 0) ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Total Coins</label>
                                                    <input type="text"  class="form-control" value="<?php echo (isset($records[0]->coins) ? $records[0]->coins :  0) ?>" disabled>
                                                                               </div>
                                                <div class="form-group">
                                                    <label>Select Action</label>
                                                    <select name="action_type" id="" class="form-control">
                                                        <option value="add">Add</option>
                                                        <option value="remove">Remove</option> 
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for=""> Enter Coins </label>
                                                    <input type="number" name="coins"  min="0" class="form-control">
                                                 </div>

                                                <input type="submit" class="btn btn-primary" value="Update Coins">
                                            </form>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                </div>






                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
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