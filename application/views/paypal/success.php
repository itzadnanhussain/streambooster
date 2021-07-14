<!DOCTYPE html>
<html>

<head>
  <title>Transaction Successfull - Codeigniter Paypal Integration Example - nicesnippets.com</title>
  <!-- Latest CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>
  <div class="container">
    <h2 class="mt-3 mb-3">Transaction Detalis</h2>
     
    <?php if (!empty($payment)) { ?>
    <?php redirect(base_url('en/dashboard/purchase')) ?>
      <!-- <h1 class="success">Your Payment has been Successful!</h1> -->
      <!-- <script>
        showSuccessToast('Your Payment has been Successful!');
        setTimeout(function() {
          window.location.href = "<?php echo base_url('en/dashboard/purchase') ?>";
        }, 3500)
      </script> -->
      <!-- <h4>Payment Information</h4>
      <p><b>Reference Number:</b> #<?php echo $payment['id']; ?></p>
      <p><b>Transaction ID:</b> <?php echo $payment['txn_id']; ?></p>
      <p><b>Paid Amount:</b> <?php echo $payment['payment_gross'] . ' ' . $payment['currency_code']; ?></p>
      <p><b>Payment Status:</b> <?php echo $payment['status']; ?></p>

      <h4>Payer Information</h4>
      <p><b>Name:</b> <?php echo $payment['payer_name']; ?></p>
      <p><b>Email:</b> <?php echo $payment['payer_email']; ?></p>

      <h4>Product Information</h4>
      <p><b>Name:</b> <?php echo $product['name']; ?></p>
      <p><b>Price:</b> <?php echo $product['price'] . ' ' . $product['currency']; ?></p> -->
    <?php } else { ?>
      <?php redirect(base_url('en/dashboard/purchase')) ?>
      <!-- <h1 class="error">Transaction has been failed!</h1> -->
      <!-- <script>
        showWarningToast('Transaction has been failed!');
        setTimeout(function() {
          window.location.href = "<?php echo base_url('en/dashboard/purchase') ?>";
        }, 3500)
      </script> -->
    <?php } ?>
  </div>
</body>

</html>