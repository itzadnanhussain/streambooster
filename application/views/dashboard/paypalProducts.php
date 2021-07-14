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
                        <div class="col-md-6 offset-md-3">
                            <div class="panel">

                                <div class="panel-body">
                                    <!-- Display errors returned by createToken -->
                                    <div class="card-errors"></div>
                                    <form class="submit-paypal-form" action="<?php echo base_url('products/buy') ?>">

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
                                                <input type="text" class="charges form-control" value="500" disabled>
                                                <?php $_SESSION['paypal_rank_coins'] = 500  ?>

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

                                        <!-- <button type="submit" class="btn btn-warning" id="payBtn">Submit Payment By Paypal</button> -->
                                        <a href="<?php echo base_url('products/buy/' . $ranks[0]->id) ?>" class="btn btn-warning" id="payBtn">Submit Payment By Paypal</a>


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
<!-- <script>
    $('.submit-paypal-form').submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let url = $('.submit-paypal-form').attr('action');
        alert(url);
        let form = $(this).serialize(); 
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
                    case 'error':
                        res.message.forEach(function(error) {
                            $('[name=' + error[0] + ']').parent().append('<span>' + error[1] + '</span>');
                        })
                        break;
                }
            }
        });
    })
</script> -->

<script>
    ///getcharges
    function getcharges(value) {
        let coins = value;
        let total_charges = coins / 20;
        $('.charges').val(total_charges); 
    }
</script>