<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>
<script>
    $(document).ready(function() {
        // On form submit
        $("#get-products").submit(function() {
            // Disable the submit button to prevent repeated clicks
          //  $('#payBtn').attr("disabled", "disabled");

            // Create single-use token to charge the user
            Stripe.createToken({
                number: $('#card_number').val(),
                exp_month: $('#card_exp_month').val(),
                exp_year: $('#card_exp_year').val(),
                cvc: $('#card_cvc').val()
            }, stripeResponseHandler);

            // Submit from callback
            return false;
        });
    });
    // Set your publishable key
    Stripe.setPublishableKey('<?php echo $this->config->item('stripe_publishable_key'); ?>');

    // Callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            // Enable the submit button
            $('#payBtn').removeAttr("disabled");
            // Display the errors on the form
            $(".card-errors").html('<p>' + response.error.message + '</p>');
        } else {
            var form$ = $("#get-products");
            // Get token id
            var token = response.id;
            // Insert the token into the form
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            // Submit form to the server  
            let form = form$.serialize();
            $.ajax({
                type: 'POST',
                data: form,
                dataType: 'html',
                success: function(data) {
                   
                    let res = JSON.parse(data); 
                    switch (res.code) {
                        case 'success':
                            showSuccessToast(res.message);
                            setTimeout(function() {
                                window.location.href="<?php echo base_url('en/dashboard/purchase/statement/') ?>"+res.id;
                            }, 3500)

                            break;
                        case 'warning':
                            showWarningToast(res.message);
                            setTimeout(function() {
                                window.location.reload();
                            }, 3500)
                            break;

                    }
                }
            });


        }
    }


    ///getcharges
    function getcharges(value)
    {
         let coins=value; 
         let total_charges=coins/20; 
         $('.charges').val(total_charges);
    }
</script>