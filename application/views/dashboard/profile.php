  <!----Sec3 Content--->
  <div class="container-fluid mt-15">
      <div class="row">
          <div class="col-md-3 col-xs-12">
              <?php $this->load->view('templates/sideBar') ?>
          </div>
          <div class="col-md-9 col-xs-12">
              <div class="content">
                  <div class="block">
                      <img class="user-profile-userpic" src="<?php echo (isset($records[0]->userprofile) ? $records[0]->userprofile : '') ?>">
                      <div class="user-profile-header center">
                          <h1><?php echo (isset($records[0]->username) ? $records[0]->username : '') ?></h1>
                          <p><?php echo (isset($records[0]->bio) ? $records[0]->bio : 'No Discription') ?></p>

                          <div class="clear"></div>

                          <ul>
                              <li>
                                  <div class="amount"><?php echo (isset($records[0]->view_count) ? $records[0]->view_count : '') ?></div>VIEWS ON TWITCH
                              </li>
                              <li>
                                  <div class="amount"><?php echo (isset($records[0]->followers) ? $records[0]->followers : '') ?></div><span class="followers-icon"></span>followers
                              </li>
                              <li>
                                  <div class="amount"><?php echo (isset($records[0]->level) ? $records[0]->level : '') ?></div><span class="sb-logo-icon"></span>level
                              </li>
                              <li>
                                  <div class="amount"> <?php echo (isset($records[0]->coins) ? $records[0]->coins : '') ?></div>Total Coins
                              </li>
                          </ul>



                          <div class="clear"></div>
                          <div class="coward">adnantest registered on Stream Booster over 6 days ago. Was online just now.</div>
                          <noindex>
                              <div class="margin-top-a-bit"><a href="<?php echo base_url('/en/dashboard/watch/' . $records[0]->username) ?>" class="cool-button twitch-button reduce-opacity"><span></span>Watch the broadcast</a></div>
                          </noindex>
                      </div>
                  </div>

                  <?php if (isset($comments) && !empty($comments)) { ?>
                      <div class="block">
                          <h1>Comments And Sugestions By Others</h1>
                          <?php if (isset($count) && !empty($count)) { ?>
                              <?php for ($i = 0; $i < $count; $i++) { ?>
                                  <form class="submit-comments-reply">
                                      <p><?php echo $comments[$i]->comment ?></p>
                                      <p class="font-weight-bold">Comment By: <a href="<?php echo base_url('en/user/' . $comments[$i]->username) ?>"><?php echo $comments[$i]->username ?></a></p>
                                      <?php echo  GetReplyOfComments($comments[$i]->comment_id) ?>
                                      <?php if ($_SESSION['user_info']['id'] == $comments[$i]->comment_to) { ?>
                                          <input type="hidden" name="comment_id" value="<?php echo $comments[$i]->comment_id ?>">
                                          <textarea name="reply" required></textarea>
                                          <input type="submit" class="cool-button form-submitter" value="Reply Comment">
                                          <input type="hidden" name="admin_reply " value="Admin">
                                      <?php  } ?>

                                      <?php if ($_SESSION['user_info']['id'] == $comments[$i]->user_id) { ?>
                                          <input type="hidden" name="comment_id" value="<?php echo $comments[$i]->comment_id ?>">
                                          <textarea name="reply" required></textarea>
                                          <input type="submit" class="cool-button form-submitter" value="Reply Comment">
                                          <input type="hidden" name="user_reply" value="User">
                                      <?php  } ?>

                                      <?php if ($_SESSION['user_info']['id'] == $comments[$i]->comment_to) { ?> 
                                      <a class="cool-button" href="javascript:void(0)" onclick="DeleteComment(<?php echo $comments[$i]->comment_id ?>)">Delete Comment</a>
                                  <?php  } ?>

                                  </form>
                               
                                  <hr>
                              <?php } ?>
                          <?php } ?>
                      </div>
                  <?php } ?>

                  <?php if ($records[0]->id != $_SESSION['user_info']['id']) { ?>
                      <div class="block">
                          <h1>Comments And Sugestion</h1>
                          <form class="submit-comments" action="">
                              <div class="placeholder">Write Something about yourself:</div>
                              <input type="hidden" name="comment_to" value="<?php echo (isset($records[0]->id) ? $records[0]->id : '') ?>">
                              <textarea class="with-comment" style="width: 100%;" name="comment" minlength="0" maxlength="5000"></textarea>
                              <div class="field-comment">The minimum number of characters is 0, the maximum is 5,000. This text is moderated before publication. If the text does not pass moderation, the next one can be sent <span class="red">only after 7 days</span>.</div>
                              <input type="submit" class="cool-button form-submitter" value="Save Changes">
                          </form>
                      </div>
                  <?php } ?>
              </div>
          </div>

      </div>

  </div>