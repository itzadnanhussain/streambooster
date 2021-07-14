  <!----Sec3 Content--->
  <div class="container-fluid mt-15">
      <div class="row">
          <div class="col-md-3 col-xs-12">
              <?php $this->load->view('templates/sideBar') ?>
          </div>
          <div class="col-md-9 col-xs-12">
              <div class="content">
                  <div class="block">
                      <h2 style="background-color: blueviolet;color: aliceblue;padding-top: 16px;padding-left: 10px;">Stripe Payment Section</h2>
                      <p>Here you can upgrade your account and get additional benefits in Stream Booster system.</p>

                      <div class="row">
                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>Virtual Coins <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <p>Here you can buy coins through pyment if your payment successful done then you have recieved coins.</p>
                                  </div>
                                  <div class="block-footer center">
                                      <a href="<?php echo base_url('en/dashboard/purchase/products/1') ?>" class="cool-button cool-button-3 form-submitter">Buy Coins Using Stripe</a>

                                  </div>

                              </div>

                          </div>
                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>Promoted-Rank <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <p>promote your streams buy pyment.if your payment successful done then you have able to promot one stream.</p>
                                  </div>
                                  <div class="block-footer center">
                                      <?php if (isset($_SESSION['user_info']['promoted_rank']) && ($_SESSION['user_info']['promoted_rank'] == "Active")) { ?>
                                          <a class="cool-button cool-button-3 form-submitter">You Have Activated</a>

                                      <?php } else {  ?>
                                          <a href="<?php echo base_url('en/dashboard/purchase/products/2') ?>" class="cool-button cool-button-3 form-submitter">Promote-Rank Using Stripe</a>

                                      <?php  } ?>
                                  </div>

                              </div>

                          </div>
                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>Double Coins <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <p>Here you can get double coins through pyment.Then you have able to get double coins on watching stream.</p>
                                  </div>
                                  <div class="block-footer center">
                                      <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == "Active")) { ?>
                                          <a class="cool-button cool-button-3 form-submitter">You Have Activated</a>

                                      <?php } else {  ?>
                                          <a href="<?php echo base_url('en/dashboard/purchase/products/3') ?>" class="cool-button cool-button-3 form-submitter">Double Coins Using Stripe</a>

                                      <?php  } ?>

                                  </div>

                              </div>

                          </div>


                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>AFK Varification <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <p>Here you can get double coins through pyment.Then you have able to get double coins on watching stream.</p>
                                  </div>

                                  <div class="block-footer center">

                                      <?php if (isset($_SESSION['user_info']['afk_varification']) && ($_SESSION['user_info']['afk_varification'] == "Active")) { ?>
                                          <a class="cool-button cool-button-3 form-submitter">You Have Activated</a>

                                      <?php } else {  ?>
                                          <a href="<?php echo base_url('en/dashboard/purchase/products/4') ?>" class="cool-button cool-button-3 form-submitter">AFK Varification Using Stripe </a>

                                      <?php  } ?>

                                  </div>


                              </div>

                          </div>
                      </div>


                  </div>
              </div>

              <!-- Paypal Integration -->
              <div class="content">
                  <div class="block">
                      <h2 style="background-color: goldenrod;color: aliceblue;padding-top: 16px;padding-left: 10px;">Paypal Payment Section</h2>
                      <p>Here you can upgrade your account and get additional benefits in Stream Booster system.</p>

                      <div class="row">
                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>Virtual Coins <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <p>Here you can buy coins through pyment if your payment successful done then you have recieved coins.</p>
                                  </div>
                                  <div class="block-footer center">
                                      <a href="<?php echo base_url('en/dashboard/purchase/paypal/products/1') ?>" class="cool-button cool-button-3 form-submitter">Buy Coins Using Paypal</a>

                                  </div>

                              </div>

                          </div>
                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>Promoted-Rank <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <p>promote your streams buy pyment.if your payment successful done then you have able to promot one stream.</p>
                                  </div>
                                  <div class="block-footer center">
                                      <?php if (isset($_SESSION['user_info']['promoted_rank']) && ($_SESSION['user_info']['promoted_rank'] == "Active")) { ?>
                                          <a class="cool-button cool-button-3 form-submitter">You Have Activated</a>

                                      <?php } else {  ?>
                                          <a href="<?php echo base_url('en/dashboard/purchase/products/2') ?>" class="cool-button cool-button-3 form-submitter">Promote-Rank Using Stripe</a>

                                      <?php  } ?>
                                  </div>

                              </div>

                          </div>
                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>Double Coins <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <p>Here you can get double coins through pyment.Then you have able to get double coins on watching stream.</p>
                                  </div>
                                  <div class="block-footer center">
                                      <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == "Active")) { ?>
                                          <a class="cool-button cool-button-3 form-submitter">You Have Activated</a>

                                      <?php } else {  ?>
                                          <a href="<?php echo base_url('en/dashboard/purchase/products/3') ?>" class="cool-button cool-button-3 form-submitter">Double Coins Using Stripe</a>

                                      <?php  } ?>

                                  </div>

                              </div>

                          </div>


                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>AFK Varification <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <p>Here you can get double coins through pyment.Then you have able to get double coins on watching stream.</p>
                                  </div>

                                  <div class="block-footer center">

                                      <?php if (isset($_SESSION['user_info']['afk_varification']) && ($_SESSION['user_info']['afk_varification'] == "Active")) { ?>
                                          <a class="cool-button cool-button-3 form-submitter">You Have Activated</a>

                                      <?php } else {  ?>
                                          <a href="<?php echo base_url('en/dashboard/purchase/products/4') ?>" class="cool-button cool-button-3 form-submitter">AFK Varification Using Stripe </a>

                                      <?php  } ?>

                                  </div>


                              </div>

                          </div>
                      </div>


                  </div>
              </div>
              <style>
                  
                  @keyframes rotation {
  0% {
    transform: rotate3d(0, 1, 0, 0deg);
  }
  50% {
    transform: rotate3d(0, 1, 0, 180deg);
  }
  100% {
    transform: rotate3d(0, 1, 0, 360deg);
  }
}

.coin {
  position: relative;
  top: 0px;
  left: 16%;
  width: 90px;
  height: 90px;
  text-align: center;
  line-height: 50px;
  animation-name: rotation;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
  animation-duration: 2.5s;
  transform: rotateY(0deg);
  transform-style: preserve-3d;
}
.face {font-size: 51px;
    padding-top: 9%;
    color: #FFD705;
    border: 8px solid #FFD705;
    font-weight: 700;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  backface-visibility: hidden;
}
.heads {
 background-color: #FFDF4B;
 z-index: 2;
  transform: rotateY(0deg);
}
.tails {
   background-color: #FFDF4B;
   z-index: 1;
  transform: rotateY(180deg);
}
              </style>
              <!-- get coins by watching ads
              --><div class="content">
                  <div class="block">
                      <h2 style="background-color: lightskyblue;color: aliceblue;padding-top: 16px;padding-left: 10px;">Get Coins By Watch Ads</h2>
                      <p>Here you can get coins by watch Ads.</p>

                      <div class="row">
                          <div class="col-md-3 col-xs-12">
                              <div class="large-catalog-inner-block block-3">
                                  <div class="block-body">
                                      <h2>Virtual Coins <span class="credits-icon"></span></h2>
                                      <!--<img class="large-catalog-image" src="/i/upgrade-5.png">-->
                                      <div class="container">
                                              <div class="coin">
                                                <div class="face heads">
                                                  $
                                                </div>
                                                <div class="face tails">
                                                $
                                                </div>
                                              </div>
                                            </div>
                                  </div>
                                  <div class="block-footer center">
                                      <a href="<?php echo base_url('en/dashboard/watchad/1') ?>" class="cool-button cool-button-3 form-submitter">Watch Ad</a>

                                  </div>

                              </div>

                          </div>
                       
                   


                         
                      </div>


                  </div>
              </div>
              <!--end -->
              
              
              
              
              

          </div>

      </div>

  </div>