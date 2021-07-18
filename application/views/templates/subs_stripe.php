 <style type="text/css">
     .pricing .card {
         border: none;
         border-radius: 1rem;
         transition: all 0.2s;
         box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
     }

     .pricing hr {
         margin: 1.5rem 0;
     }

     .pricing .card-title {
         margin: 0.5rem 0;
         font-size: 20px;
         letter-spacing: .1rem;
         font-weight: bold;
     }

     .pricing .card-price {
         font-size: 3rem;
         margin: 0;
     }

     .pricing .card-price .period {
         font-size: 0.8rem;
     }

     .pricing ul li {
         margin-bottom: 1rem;
     }

     .pricing .text-muted {
         opacity: 0.7;
     }

     .pricing .btn {
         font-size: 80%;
         border-radius: 5rem;
         letter-spacing: .1rem;
         font-weight: bold;
         padding: 1rem;
         opacity: 0.7;
         transition: all 0.2s;
     }

     /* Hover Effects on Card */

     @media (min-width: 992px) {
         .pricing .card:hover {
             margin-top: -.25rem;
             margin-bottom: .25rem;
             box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
         }

         .pricing .card:hover .btn {
             opacity: 1;
         }
     }

     .pb-5,
     .py-5 {
         padding-bottom: 15px !important;
         padding-top: 15px !important;
     }

     .stripe-button-el {
         background-image: linear-gradient(#007bff, #007bff 85%, #007bff);
         /* margin-left: 31px; */
         border-radius: 50px;
     }

     .stripe-button-el span {
         width: 170px;
         position: relative;

         background: #007bff;
         background-image: -webkit-linear-gradient(#007bff, #007bff 85%, #007bff);
         background-image: -moz-linear-gradient(#007bff, #007bff 85%, #007bff);
         background-image: -ms-linear-gradient(#007bff, #007bff 85%, #007bff);
         background-image: -o-linear-gradient(#007bff, #007bff 85%, #007bff);
         background-image: -webkit-linear-gradient(#007bff, #007bff 85%, #007bff);
         background-image: -moz-linear-gradient(#007bff, #007bff 85%, #007bff);
         background-image: -ms-linear-gradient(#007bff, #007bff 85%, #007bff);
         background-image: -o-linear-gradient(#007bff, #007bff 85%, #007bff);
         background-image: linear-gradient(#007bff, #007bff 85%, #007bff);
         font-size: 16px;
         color: #FFFFFF;
         font-weight: bold;
         font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
         text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
         -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
         -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
         -ms-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
         -o-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
         box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
         -webkit-border-radius: 0px;
         -moz-border-radius: 0px;
         -ms-border-radius: 0px;
         -o-border-radius: 0px;
         border-radius: 0px;
         font-size: 80%;
         border-radius: 5rem;
         letter-spacing: .1rem;
         font-weight: bold;
         transition: all 0.2s;
         padding: .0px;
     }
 </style>
 <section class="showcase" id="test" style="display: none;">
     <div class="container">
         <div class="pb-2 mt-4 mb-2 border-bottom">
             <h2>Stripe Manage Subscription Payment </h2>
             <button type="Button" class="btn btn-info" id="one-time-show" style="width:30%">Back To One Time Payment!</button>
         </div>
         <section class="pricing py-5">
             <div class="container">
                 <div class="row">





                     <!-- Free Tier -->
                     <?php if (isset($ranks) && !empty($ranks)) {  ?>
                         <?php
                            $i = 1;
                            ?>
                         <?php for ($i = 1; $i < 5; $i++) {  ?>
                             <div class="col-lg-3">
                                 <div class="card mb-5 mb-lg-0">
                                     <div class="card-body">
                                         <h6 class="card-title text-success text-uppercase text-center"> Subscription <?php echo $i ?></h6>
                                         <hr>

                                         <?php
                                            switch ($i) {
                                                case '1':
                                                    $month = 1;
                                                    break;
                                                case '2':
                                                    $month = 3;
                                                    break;
                                                case '3':
                                                    $month = 6;
                                                    break;
                                                case '4':
                                                    $month = 12;
                                                    break;
                                            }
                                            ///for database
                                            $total_price = ($month * $ranks[0]->price);
                                            $total_month = $month;
                                            $rank_id = $ranks[0]->id;
                                            $user_id = $_SESSION['user_info']['id'];
                                            $plan = 'Subscription ' . $i;
                                            $subscription_buy = 'stripe';
                                            ?>

                                         <ul class="fa-ul">
                                             <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Total Month <?php echo $month ?></li>
                                             <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Subscription Price <?php echo $total_price ?></li>
                                             <?php if(isset($rank_id) && ($rank_id == 1 )) { ?>
                                             <li><span class="fa-li"><i class="fas fa-check text-success"></i></span>Total Coins <?php echo ($month * 500) ?></li>
                                         <?php } ?>
                                            </ul>
                                         <?php if (isset($rank_status[0]->subscription_limit) && ($i == $rank_status[0]->subscription_limit)) { ?>
                                             <form action="<?php print site_url(); ?>subscription/create" method="post" id="<?php echo 'subscription_limit_' . $rank_status[0]->subscription_limit ?>" class="frmStripePayment">
                                             <?php } else { ?>
                                                 <form action="<?php print site_url(); ?>subscription/create" method="post" class="frmStripePayment">
                                                 <?php } ?>
                                                 <input name="plan" type="hidden" value="<?php echo $plan ?>" />
                                                 <?php if ($total_month == 12) { ?>
                                                     <input name="interval" type="hidden" value="year" />
                                                     <input name="interval_count" type="hidden" value="1" />
                                                 <?php } else { ?>
                                                     <input name="interval" type="hidden" value="month" />
                                                     <input name="interval_count" type="hidden" value="<?php echo $total_month ?>" />
                                                 <?php } ?>
                                                 <input name="price" type="hidden" value="<?php echo $total_price ?>" />
                                                 <input name="currency" type="hidden" value="usd" />
                                                 <input name="url" type="hidden" value="<?php echo current_url() ?>" />
                                                 <input name="user_id" type="hidden" value="<?php echo $user_id ?>" />
                                                 <input name="rank_id" type="hidden" value="<?php echo $rank_id ?>" />
                                                 <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo STRIPE_PUBLISHABLE_KEY; ?>" data-name="<?php echo $plan ?>" data-description="<?php echo $plan ?>" data-panel-label="Buy Now" data-label="Sign Up" data-locale="auto">
                                                 </script>
                                                 </form>

                                     </div>
                                 </div>
                             </div>
                         <?php }  ?>
                     <?php } ?>



                     <!-- ranks array 
                        // [id] => 1
                        // [name] => Virtual Coins
                        // [price] => 25.00
                        // [currency] => USD
                        // [status] => 1 -->


                     <script>
                         $('.stripe-button-el span').text('Subscribe Now');
                     </script>
                     <?php if (isset($rank_status) && !empty($rank_status)) { ?>
                         <script>
                             var id = '<?php echo '#subscription_limit_' . $rank_status[0]->subscription_limit ?>';
                             $(id).find('.stripe-button-el span').text('Subscribed');
                             $(id).find('.stripe-button-el').attr('Disabled', true);
                         </script>
                     <?php } ?>








































































                 </div>
             </div>
         </section>
     </div>
 </section>

 <script>
     $('#one-time-show').on('click', function() {
         $('#test').hide();
         $('#testBtn').show();
         $('#one-time').show();
     })
 </script>