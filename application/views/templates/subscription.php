<?php 
// Include configuration file  
include_once APPPATH . 'third_party/paypal_subscription/config.php';

// Include database connection file  
include_once APPPATH . 'third_party/paypal_subscription/dbConnect.php';

?>
<!-- Buy button -->
<form action="<?php echo PAYPAL_URL; ?>" method="post">


    <!-- Identify your business so that you can collect the payments -->
    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
    <input type="hidden" name="rank_id" value="<?php echo (isset($ranks[0]->id) ? $ranks[0]->id : 0) ?>">
    <input type="hidden" name="custom" value="<?php echo $_SESSION['user_info']['id'] ?>">

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION['user_info']['username'] ?>" disabled>
    </div>

    <div class="form-group">
        <label>EMAIL</label>
        <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['user_info']['email'] ?>" disabled>
    </div>


    <!-- Specify a subscriptions button. -->
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!-- <input type="hidden" name="cmd" value="_cart"> -->
    <!-- Specify details about the subscription that buyers will purchase -->
    <input type="hidden" name="item_name" value="<?php echo $ranks[0]->name; ?>">
    <input type="hidden" name="item_number" value="<?php echo $ranks[0]->id; ?>">
    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
    <input type="hidden" name="a3" id="paypalAmt" value="<?php echo $ranks[0]->price ?>">
    <input type="hidden" name="p3" id="paypalValid" value="1">
    <input type="hidden" name="t3" value="M">
      <!-- Specify urls -->
    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
    <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">



    <div class="form-group">
        <label>Subscription Validity</label>
        <select name="validity" onchange="getSubsPrice(this);">
            <option value="1" selected="selected">1 Month</option>
            <option value="3">3 Month</option>
            <option value="6">6 Month</option>
            <option value="9">9 Month</option>
            <option value="12">12 Month</option>
        </select>
    </div>

    <!---For Virtual Coins--->
    <?php if ($ranks[0]->id == 1) { ?>

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

    <button type="submit" class="btn btn-warning buy-btn" id="payBtn">Buy Subscription</button>
    

</form>



 







<script>
    function getSubsPrice(obj) {
        var month = obj.value;
        var price = (month * <?php echo $ranks[0]->price; ?>);
        $('.charges').val('$' + price + ' USD');
        $('#paypalValid').val(month);
        $('#paypalAmt').val(price); 
    }

      ///getcharges
      function getcharges(value) {
        let coins = value;
        let total_charges = coins / 20;
        $('.charges').val(total_charges);
    }
</script>