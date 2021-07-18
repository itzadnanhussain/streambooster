<!----Sec3 Content--->
<div class="container-fluid mt-15">
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <?php $this->load->view('templates/sideBar') ?>
        </div>

        <div class="col-md-9 col-xs-12">
            <div class="content">
                <div class="block">
                    <h1>Here You Can Purchase <?php echo $ranks[0]->name; ?></h1>
                    <!---Invest Coins For Getting Top Streams On The List--->
                    <link rel="stylesheet" href="<?php echo base_url('assets/css/stripestyle.css') ?>">
                    <div class="row">
                        <div class="col-md-6 offset-md-3" id="one-time">
                            <div class="panel">

                                <div class="panel-body">
                                    <!-- Display errors returned by createToken -->
                                    <div class="card-errors"></div>

                                    <form id="get-products">
                                        <input type="hidden" name="rank_id" value="<?php echo (isset($ranks[0]->id) ? $ranks[0]->id : 0) ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_info']['id'] ?>">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION['user_info']['username'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>EMAIL</label>
                                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['user_info']['email'] ?>" disabled>
                                        </div>
                                        <!---For Virtual Coins--->
                                        <?php if ($ranks[0]->id == 1) { ?>
                                            <div class="form-gruop">
                                                <label for="">Select coins</label>
                                                <select name="get_coins" id="#getcoins" class="form-control" onchange="getcharges(this.value)">
                                                    <option value="500">500</option>
                                                    <option value="1000">1000</option>
                                                    <option value="1500">1500</option>
                                                    <option value="2000">2000</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Total USD Charges</label>
                                                <input type="text" class="charges form-control" value="<?php echo $ranks[0]->price ?>" disabled>
                                                <input type="hidden" name="paid_amount" class="charges form-contrl" value="<?php echo $ranks[0]->price ?>">

                                            </div>
                                        <?php } ?>

                                        <!---For Promoted Ranks--->
                                        <?php if ($ranks[0]->id == 2) { ?>
                                            <div class="form-group">
                                                <label for="">Total USD Charges</label>
                                                <input type="text" class="charges form-control" value="<?php echo $ranks[0]->price ?>" disabled>
                                                <input type="hidden" name="paid_amount" class="charges form-contrl" value="<?php echo $ranks[0]->price ?>">

                                            </div>
                                        <?php } ?>

                                        <!---For Double Coins--->
                                        <?php if ($ranks[0]->id == 3) { ?>
                                            <div class="form-group">
                                                <label for="">Total USD Charges</label>
                                                <input type="text" class="charges form-control" value="<?php echo $ranks[0]->price ?>" disabled>
                                                <input type="hidden" name="paid_amount" class="charges form-contrl" value="<?php echo $ranks[0]->price ?>">

                                            </div>
                                        <?php } ?>

                                        <!---For Double Coins--->
                                        <?php if ($ranks[0]->id == 4) { ?>
                                            <div class="form-group">
                                                <label for="">Total USD Charges</label>
                                                <input type="text" class="charges form-control" value="<?php echo $ranks[0]->price ?>" disabled>
                                                <input type="hidden" name="paid_amount" class="charges form-contrl" value="<?php echo $ranks[0]->price ?>">

                                            </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>CARD NUMBER</label>
                                            <input type="text" name="card_number" class="form-control" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>EXPIRY DATE</label>

                                            <input type="text" class="form-control" name="card_exp_month" id="card_exp_month" placeholder="MM" required="">

                                            <input type="text" name="card_exp_year" class="form-control" id="card_exp_year" placeholder="YYYY" required="">

                                        </div>

                                        <div class="form-group">
                                            <label>CVC CODE</label>
                                            <input type="text" class="form-control" name="card_cvc" id="card_cvc" placeholder="CVC" autocomplete="off" required="">

                                        </div>
                                        <button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
                                        <button type="button" class="btn btn-warning" style="margin-top:10px" id="testBtn" onclick="subscription()">Check Subscription Details</button>
                                    </form>
                                    <script>
                                        function subscription() {
                                            $('#test').show();
                                            $('#testBtn').hide();
                                            $('#one-time').hide();

                                        }
                                    </script>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>



            </div>

            <!-- test code is here -->
            <div class="content">
                <div class="block">
                    <div class="row">
                        <?php $this->load->view('templates/subs_stripe') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>