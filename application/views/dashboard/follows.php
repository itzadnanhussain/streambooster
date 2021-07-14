  <!----Sec3 Content--->
  <div class="container-fluid mt-15">
      <div class="row">
          <div class="col-md-3 col-xs-12">
              <?php $this->load->view('templates/sideBar') ?>
          </div>
          <div class="col-md-9 col-xs-12">
              <div class="content">
                  <div class="block">
                      <h1>Profitable Follows</h1>
                      <p>Here are shown the channels whose owners have established the greatest reward for the following and are broadcasting at the moment. Please note that only users who have The more Coins has invested on the promotion page, the higher it is displayed on the watch page</p>
                      <div class="row">
                          <?php if (isset($records) && !empty($records)) { ?>

                              <?php foreach ($records as $key => $value) { ?>

                                  <div class="col-sm-4 col-xs-12">
                                      <div class="catalog-td medium-catalog-td">
                                          <div class="medium-catalog-inner-block block-3">
                                              <div class="block-body">
                                                  <h2><a href="<?php echo base_url('en/user/' . $value->username) ?>"><?php echo $value->username ?></a></h2>
                                                  <div class="current-hero">
                                                      <div class="user-logo-container large"><a href="<?php echo base_url('en/user/' . $value->username) ?>"><span class="online c-help" title="Broadcast is live"></span><span class="viewers-count c-help box-shadow" title="<?php echo $value->username ?>"><?php echo $value->view_count ?></span><img src="<?php echo $value->userprofile ?>" class="user-logo box-shadow"></a></div>
                                                  </div>
                                                  <div class="margin-top-a-bit"><span class="cool-title"><span class="credits-icon"></span><?php echo $value->invested_coins ?></span> <span class="coward">bounty for follow</span></div>
                                              </div>
                                              <div class="block-footer center">
                                                  <span id="follow-button-1-OPjnxjwxf6">
                                                      <button class="ajax-popup cool-button follow-button reduce-opacity" id="btn-follow" onclick="CreateNewFollower(<?php echo $value->twitch_user_id ?>,'follow')">
                                                          <span></span>Follow</button>
                                                  </span><span id="follow-button-2-OPjnxjwxf6" class="cool-button already-following-button c-help hidden" title="You are following this channel"><span></span></span></div>
                                          </div>
                                      </div>

                                  </div>

                              <?php  } ?>


                          <?php } ?>
                      </div>
                  </div>
              </div>

          </div>

      </div>

  </div>