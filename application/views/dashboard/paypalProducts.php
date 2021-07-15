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
                    <?php $_SESSION['paypal_rank_name'] = $ranks[0]->name; ?>
                    <?php $_SESSION['paypal_rank_price'] = $ranks[0]->price  ?>

                    <!---Invest Coins For Getting Top Streams On The List--->
                    <link rel="stylesheet" href="<?php echo base_url('assets/css/stripestyle.css') ?>">
                    <div class="row">
                        <!-- one time payment -->
                        <div class="col-md-6  offset-md-3">
                            <div class="panel">

                                <div class="panel-body">
                                    <!-- Display errors returned by createToken -->
                                    <div class="card-errors"></div>
                                    <form class="submit-paypal-form" action="<?php echo base_url('products/buy/' . $ranks[0]->id) ?>" method="POST">

                                        <!-- Specify a Subscribe button. -->
                                        <input type="hidden" name="cmd" value="_xclick-subscriptions">


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
                                                <label for="">Total Coins</label>
                                                <input type="text" class="vr-coins form-control" value="500" disabled>
                                                <input type="hidden" class="vr-coins" name="vr_coins" value="500">
                                                <!-- <select name="get_coins" id="#getcoins" class="form-control" onchange="getcharges(this.value)">
                                                    <option value="500">500</option>
                                                    <option value="1000">1000</option>
                                                    <option value="1500">1500</option>
                                                    <option value="2000">2000</option>
                                                </select> -->
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
                                            <span>Do you want to subscribe to get 10% more coins ? if yes then please checked below box!</span>
                                           
                                            <?php if ((Checked_Rank($ranks[0]->id)) == 'active') { ?>
                                                <input type="checkbox" style="margin-top: 10px;" id="checkbox" onclick="get_subscription_check(this)" name="subscription" checked>
                                            <?php  } else { ?>
                                                <input type="checkbox" style="margin-top: 10px;" id="checkbox" onclick="get_subscription_check(this)" name="subscription">
                                            <?php } ?>
                                           
                                        </div>
                                        <?php if (isset($rank_status) && !empty($rank_status)) { ?>
                                               <p> <span style="color:green; font-weight:bold;">You have subscribed <?php echo $rank_status[0]->subscription_limit   ?> month subscription! </span> </p>
                                            <?php } ?>

                                        <div class="form-group" id="month_validation" style="display: none;">
                                            <label>Subscription Validity </label>
                                            <select name="validity" onchange="getSubsPrice(this);">
                                                <?php if (isset($rank_status) && !empty($rank_status)) { ?>
                                                    <option value="1" <?php echo (($rank_status[0]->subscription_limit == 1) ? 'selected' : '') ?>>1 Month</option>
                                                    <option value="3" <?php echo (($rank_status[0]->subscription_limit == 3) ? 'selected' : '') ?>>3 Month</option>
                                                    <option value="6" <?php echo (($rank_status[0]->subscription_limit == 6) ? 'selected' : '') ?>>6 Month</option>
                                                    <option value="9" <?php echo (($rank_status[0]->subscription_limit == 9) ? 'selected' : '') ?>>9 Month</option>
                                                    <option value="12" <?php echo (($rank_status[0]->subscription_limit == 12) ? 'selected' : '') ?>>12 Month</option>
                                                <?php } else { ?>
                                                    <option value="1" selected="selected">1 Month</option>
                                                    <option value="3">3 Month</option>
                                                    <option value="6">6 Month</option>
                                                    <option value="9">9 Month</option>
                                                    <option value="12">12 Month</option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- for subscription -->
                                        <input type="hidden" name="a3" id="paypalAmt" value="<?php echo $ranks[0]->price ?>">
                                        <input type="hidden" name="p3" id="paypalValid" value="1">
                                        <input type="hidden" name="t3" value="M">

                                        <button type="submit" class="btn btn-warning" id="payBtn"></button>
                                        <!-- <a href="<?php echo base_url('products/buy/' . $ranks[0]->id) ?>" class="btn btn-warning" id="payBtn">Submit Payment By Paypal</a> -->


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

<script>
    $(function() {
        get_subscription_check()
    })

    function getSubsPrice(obj) {

        var month = obj.value;
        var price = (month * <?php echo $ranks[0]->price; ?>);
        var coins = (month * 500);

        $('.charges').val(price);
        $('#paypalValid').val(month);
        $('#paypalAmt').val(price);
        $('.vr-coins').val(coins);

    }

    ///getcharges
    function getcharges(value) {
        let coins = value;
        let total_charges = coins / 20;
        $('.charges').val(total_charges);
    }

    function get_subscription_check() {

        if ($('#checkbox').is(":checked")) {
            $('#month_validation').show();
            $('#payBtn').text('Buy Subscription');
        } else {
            $('#payBtn').text('Buy Now');
            $('#month_validation').hide();
        }


    }
</script>