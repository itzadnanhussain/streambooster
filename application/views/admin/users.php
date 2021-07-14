<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users List </h4>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                <strong>Heads up!</strong> List of all your registered stremers.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table dataTable no-footer id-table" role="grid" aria-describedby="order-listing_info">
                                                <thead>
                                                    <tr class="bg-primary text-white" role="row">
                                                        <th>User Id</th>
                                                        <th>Username</th>
                                                        <th>Promotion Ranks</th>
                                                        <th>Ban</th>
                                                        <th>Delete</th> 

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($records) && !empty($records)) { ?>
                                                        <?php foreach ($records as $key => $value) { ?>
                                                            <tr>
                                                                <td><?php echo $value->id; ?></td>
                                                                <td><?php echo $value->username; ?></td>
                                                                <td><a type="button" href="<?php echo base_url('en/admin/ranks/1') ?>" class="btn btn-success" >Manage Details</a></td>
                                                                <?php if($value->status=='banned') { ?>
                                                                <td><button type="button" id="banned" class="btn btn-warning" onclick="UnblockUser(<?php echo $value->id; ?>)">Unblock</button></td>
                                                                <?php } else { ?>
                                                                    <td><button type="button" id="banned" class="btn btn-warning" onclick="TempararayBanUser(<?php echo $value->id; ?>)">Block</button></td>
                                                               

                                                                <?php } ?>
                                                                <td><button type="button" class="btn btn-danger btn-rounded btn-fw" onclick="DeleteUserPermenent(<?php echo $value->id; ?>)">Danger</button></td>

                                                            </tr>

                                                        <?php } ?>

                                                    <?php    } ?>


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