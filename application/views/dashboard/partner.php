  <!----Sec3 Content--->
  <div class="container-fluid mt-15">
      <div class="row">
          <div class="col-md-3 col-xs-12">
              <?php $this->load->view('templates/sideBar') ?>
          </div>
          <div class="col-md-9 col-xs-12">
              <div class="content">
                  <div class="block">
                      <h1>Affiliate Program</h1>
                      <p>Invite your friends to Stream Booster, using your own referral link and get 5% of their received gold.</p>
                      <div class="placeholder">Your referral link:</div>
                      <input type="text" class="red select-all" value="<?php echo base_url('en/ref/?id='.urlencode (base64_encode($_SESSION['user_info']['id']))) ?>" readonly="readonly">
                      <p>The referral you invited will be displayed on this page as soon as you start earning gold.</p>
                  </div>
                  <div class="block">
                      <h2>Referral Charges</h2>
                      You do not have referral charges yet.
                  </div>
              </div>

          </div>

      </div>

  </div>