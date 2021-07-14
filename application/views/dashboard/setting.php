  <!----Sec3 Content--->
  <div class="container-fluid mt-15">
      <div class="row">
          <div class="col-md-3 col-xs-12">
              <?php $this->load->view('templates/sideBar') ?>
          </div>
          <div class="col-md-9 col-xs-12">
              <div class="content">
                  <div class="block">
                      <h1>Update Your Profile</h1>
                      <form class="invest-coins">
                          <div class="placeholder">Write Something about yourself:</div>
                          <textarea class="with-comment" style="width: 100%;" pattern="_[a-zA-Z0-9]+" name="bio" minlength="0" maxlength="5000"></textarea>
                          <div class="field-comment">The minimum number of characters is 0, the maximum is 5,000. This text is moderated before publication. If the text does not pass moderation, the next one can be sent <span class="red">only after 7 days</span>.</div>
                          <input type="submit" class="cool-button form-submitter" value="Save Changes">
                      </form>
                  </div>

                  <div class="block">
                      <h1>Donate Your Coins</h1>
                      <form class="donation">

                          <div class="form-group">
                              <label>Users</label>
                              <input type="text" name="user_id" id="search_users" class="form-control">

                          </div>
                          <div class="form-group">
                              <label for="">Select Coins For Donation</label>
                              <input name="donate_coins" type="number" class="with-comment" value="0" min="0" max="<?php echo $_SESSION['user_info']['coins'] ?>">
                          </div>
                          <input type="submit" class="cool-button cool-button-3" value="Donat Coins">
                      </form>
                  </div>
                  <div class="block">
                  <form class="submitTest" action="<?php echo base_url()."Partial/ThemeChange"; ?>">

                    <div class="form-group">
                        <label>Select Theme Type </label>
                        <select name="theme_mode" class="theme_selector" id="" class="form-control">
                            <option value="light">Light Mode</option>
                            <option value="dark">Dark Mode</option>
                        </select> 
                    </div> 
                    <input type="submit" class="cool-button theme cool-button-3" value="Save Theme Setting">
                    </form>
                  </div>


              </div>

          </div>

      </div>

  </div>