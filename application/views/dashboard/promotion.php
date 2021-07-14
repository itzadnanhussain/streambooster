 <!----Sec3 Content--->
 <div class="container-fluid mt-15">
     <div class="row">
         <div class="col-md-3 col-xs-12">
             <?php $this->load->view('templates/sideBar') ?>
         </div>
         <div class="col-md-9 col-xs-12">
             <?php if (isset($_SESSION['promo_for_follows_page']) && ($_SESSION['promo_for_follows_page'] == 'active')) { ?>
                 <div class="content">
                     <div class="block" style="border-radius: 10px; border: 3px solid darkgreen;">
                     <div class="field-comment" style="margin: 0;">Follows Page Promotion You Have Already Activated.Total Invested Coins For This Promo Are <?php echo $_SESSION['coins_for_follows_page'] ?> Coins <span class="credits-icon"></span> </div>
                     </div>
                 </div>
             <?php } ?>

             <?php if (isset($_SESSION['promo_for_watch_page']) && ($_SESSION['promo_for_watch_page'] == 'active')) { ?>
                 <div class="content">
                     <div class="block" style="border-radius: 10px; border: 3px solid darkgreen;">
                          <div class="field-comment" style="margin: 0;">Watch Page Promotion You Have Already Activated.Total Invested Coins For This Promo Are <?php echo $_SESSION['coins_for_follows_page'] ?> Coins <span class="credits-icon"></span> </div>

                     </div>
                 </div>
             <?php } ?>
             <?php if (isset($_SESSION['no_promo']) && ($_SESSION['no_promo'] == 'active')) { ?>
                 <div class="content">
                     <div class="block" style="border-radius: 10px; border: 3px solid red;">
                          <div class="field-comment" style="margin: 0;">No Promotion Activated At This Time </div>

                     </div>
                 </div>
             <?php } ?>


             <div class="content">
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="block">
                             <h2>Invest Coins For Getting Desire Promotion</h2>
                             <form class="invest-coins">


                                 <input type="hidden" value="Displayed ON Watch Page" name="ranks">
                                 <div class="field-comment">Here the streamer can invest the collected coins for getting a promotion </div>


                                 <!----Streamer Name --------->
                                 <div class="placeholder">Streamer Name:</div>
                                 <input type="text" name="username" class="with-comment" value="<?php echo $_SESSION['user_info']['username'] ?>" disabled>

                                 <!----Total Coins----->
                                 <div class="placeholder">You Have Total Coins <span class="credits-icon"></span><?php echo $_SESSION['user_info']['coins'] ?></div>
                                 <input name="total-coins" type="text" class="with-comment" value="<?php echo $_SESSION['user_info']['coins'] ?>" disabled>


                                 <!----Select Promotion Type----->
                                 <div class="placeholder">Select Promotion Type</div>
                                 <select name="ranks" id="">
                                     <option value="Displayed ON Watch Page">Displayed ON Watch Page</option>
                                     <option value="Displayed ON Follows Page">Displayed ON Follows Page</option>
                                 </select>

                                 <!----Select Invested Coins----->
                                 <div class="placeholder">Invest Coins <span class="credits-icon"></span></div>
                                 <input name="invested_coins" type="number" class="with-comment" value="50" min="50" max="<?php echo $_SESSION['user_info']['coins'] ?>">


                                 <div class="field-comment">You can set the amount of bounty gold For Getting Top Streams On The List.Your account will be charged the same amount of gold. If you do not want promote your stream on the Stream Booster website, set this parameter to 0.</div>
                                 <input type="submit" class="cool-button form-submitter" value="Save changes">


                             </form>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="block">
                             <h2>Automatic promotion Settings</h2>
                             <form class="general-form" action="<?php echo base_url('AutomaticPromoActivation') ?>">
                                 <div class="field-comment">Here the streamer can invest the collected coins for getting a promotion </div>

                                 <!----Streamer Name --------->
                                 <div class="placeholder">Streamer Name:</div>
                                 <input type="text" name="username" class="with-comment" value="<?php echo $_SESSION['user_info']['username'] ?>" disabled>

                                 <!----Total Coins----->
                                 <div class="placeholder">You Have Total Coins <span class="credits-icon"></span><?php echo $_SESSION['user_info']['coins'] ?></div>
                                 <input name="total-coins" type="text" class="with-comment" value="<?php echo $_SESSION['user_info']['coins'] ?>" disabled>


                                 <!----Select Promotion Type----->
                                 <div class="placeholder">Select Promotion Type</div>
                                 <select name="ranks" id="">
                                     <option value="Displayed ON Watch Page">Displayed ON Watch Page</option>
                                     <option value="Displayed ON Follows Page">Displayed ON Follows Page</option>
                                 </select>


                                 <!----Select Promotion Type----->
                                 <div class="placeholder">Auto Reactivate When I Logged In </div>
                                 <select name="reactivation" id="">
                                     <option value="active">active</option>
                                     <option value="inactive">inactive</option>
                                 </select>


                                 <div class="field-comment">You can set the amount of bounty gold For Getting Top Streams On The List.Your account will be charged the same amount of gold. </div>
                                 <input type="submit" class="cool-button form-submitter" value="Save changes">


                             </form>
                         </div>
                     </div>
                 </div>

             </div>

         </div>

     </div>

 </div>