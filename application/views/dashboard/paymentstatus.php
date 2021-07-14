<!----Sec3 Content--->

<div class="container-fluid mt-15">
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <?php $this->load->view('templates/sideBar') ?>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="content">
                <div class="block">
                    <h1>Your Payment has been Successful!</h1>
                    <!---Invest Coins For Getting Top Streams On The List--->
                    <link rel="stylesheet" href="<?php echo base_url('assets/css/stripestyle.css') ?>">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="panel">

                                <div class="panel-body">
                                    <!-- Display errors returned by createToken -->
                                    <div class="card-errors"></div>
                                    <form id="get-products">
                                        <div class="form-group">
                                            <label for="">Reference Number</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($records[0]->id)) ? $records[0]->id : '' ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Transaction ID</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($records[0]->txn_id)) ? $records[0]->txn_id : '' ?>" disabled>
                                        </div>


                                        <div class="form-group">
                                            <label for="">Paid Amount</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($records[0]->paid_amount)) ? '$' . $records[0]->paid_amount . ' USD' : '' ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Payment Status</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($records[0]->payment_status)) ? $records[0]->payment_status : '' ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Rank Information</label>
                                            <?php foreach ($ranks as $key => $value) { ?>
                                                <?php if ($value->id == $records[0]->rank_id) { ?>
                                                    <input type="text" class="form-control" value="<?php echo   $value->name  ?>" disabled>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>

                                        <button type="submit" class="btn btn-success" id="payBtn">Done</button>
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