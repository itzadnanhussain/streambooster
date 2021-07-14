  <!----Sec3 Content--->
  <div class="container-fluid mt-15" id="main">
      <?php if (isset($records) && empty($records)) { ?>
          <div class="row" id="no-stream" style="height: 450px;">
              <div class="col-sm-12">
                  <div class="content">
                      <div class="block">
                          <h1>No Stream Available at this time</h1>
                      </div>
                  </div>
              </div>
          </div>

      <?php } ?>



      <?php if (isset($records) && !empty($records)) { ?>
          <div class="row">
              <div class="col-sm-9 col-lg-9">
                  <div class="content watch">
                      <div class="card" id="stream">

                          <div id="twitch-embed">

                          </div>
                          <script>
                              var embed = new Twitch.Embed("twitch-embed", {

                                  channel: '<?php echo $records->username ?>',
                                  layout: "video",
                                  autoplay: false,
                                  // only needed if your site is also embedded on embed.example.com and othersite.example.com 
                                  // parent: ["embed.example.com", "othersite.example.com"]
                              });

                              embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
                                  var player = embed.getPlayer();
                                  player.play();
                              });

                              <?php if (isset($records->stream_type) && ($records->stream_type == 'golden')) { ?>
                                  $('#stream').addClass('gold-color');
                              <?php } ?>

                              <?php if (isset($records->stream_type) && ($records->stream_type == 'silver')) { ?>
                                  $('#stream').addClass('silver-color');
                              <?php } ?>
                          </script>
                          <div class="card-body" id="earn-card">
                              <div class="block" id="under-player-panel">
                                  <ul id="menu">
                                      <?php if (isset($records->stream_type) == 'golden') { ?>
                                          <li class="left-side" id="strEarning"> <a class="cool-button youtube-button" id="strlink" onclick="StartEarning('golden')">Start Earning</a> </li>

                                      <?php } else {  ?>
                                          <li class="left-side" id="strEarning"> <a class="cool-button youtube-button" id="strlink" onclick="StartEarning('silver')">Start Earning</a> </li>
                                      <?php } ?>
                                      <li class="left-side"><span id="check-if-user-here-1" class=""><span class="credits-icon"></span><span id="credits-earned" class="c-help" title="Amount of gold earned">0.00</span></span></li>
                                      <li class="left-side"><span id="check-if-user-here-2" class=""><span class="timer-icon"></span><span class="straight-timer c-help" id="watching-duration"><span id="hour">00</span>:<span id="minute">00</span>:<span id="seconds">00</span></span></span></li>
                                      <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == "Active")) { ?>
                                          <li class="left-side"><span id="check-if-user-here-3" class=""><span class="credits-icon">
                                                      <?php if (isset($records->stream_type) == 'golden') { ?>
                                                  </span><span class="c-help" title="The rate of gold earning"><span id="credits-per-minute">30</span> per min.</span></span>

                                          <?php } else {  ?>
                                              </span><span class="c-help" title="The rate of gold earning"><span id="credits-per-minute">18</span> per min.</span></span>
                                          <?php } ?>
                                      <?php } else { ?>
                                          <li class="left-side"><span id="check-if-user-here-3" class=""><span class="credits-icon">
                                                      <?php if (isset($records->stream_type) == 'golden') { ?>
                                                  </span><span class="c-help" title="The rate of gold earning"><span id="credits-per-minute">15</span> per min.</span></span>

                                          <?php } else {  ?>
                                              </span><span class="c-help" title="The rate of gold earning"><span id="credits-per-minute">9</span> per min.</span></span>
                                          <?php } ?>

                                          </li>
                                      <?php  } ?>
                                      <li class="right-side"><i class="fas fa-user"></i> <?php echo (isset($records->view_count) ? $records->view_count :  0) ?></li>
                                      <li class="right-side"> <button class="ajax-popup cool-button follow-button reduce-opacity" id="btn-follow" onclick="CreateNewFollower(<?php echo $records->twitch_user_id ?>)">
                                              <span></span>Follow</button>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>




                  </div>

              </div>
              <div class="col-sm-3 card" id="chat-window">
                  <div class="right-sidebar watch sticky-sidebar" style="padding-top: 0px;">
                      <div class="block-2">
                          <div id="chat-container">
                              <iframe frameborder="0" scrolling="no" id="chat_embed" src="https://www.twitch.tv/embed/<?php echo $records->username ?>/chat?parent=instantscrapcarremoval.com" height="551" width="100%"></iframe>
                          </div>
                      </div>
                      <div id="stream-rating" data-user-id="46088">
                          <div class="block">
                              <h2>Broadcast Rating</h2>

                              <div class="stream-rating-placeholder first">
                                  Gaming skills
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="6" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjEiO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5" class=""></td>
                                              <td title="1" class=""></td>
                                              <td title="1.5" class=""></td>
                                              <td title="2" class=""></td>
                                              <td title="2.5" class=""></td>
                                              <td title="3" class=""></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="stream-rating-placeholder">
                                  Communicability
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="5" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjIiO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5"></td>
                                              <td title="1"></td>
                                              <td title="1.5"></td>
                                              <td title="2"></td>
                                              <td title="2.5"></td>
                                              <td title="3" class="masked"></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="stream-rating-placeholder">
                                  Video settings
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="4" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjMiO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5"></td>
                                              <td title="1"></td>
                                              <td title="1.5"></td>
                                              <td title="2"></td>
                                              <td title="2.5" class="masked"></td>
                                              <td title="3" class="masked"></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="stream-rating-placeholder">
                                  Audio settings
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="4" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjQiO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5"></td>
                                              <td title="1"></td>
                                              <td title="1.5"></td>
                                              <td title="2"></td>
                                              <td title="2.5" class="masked"></td>
                                              <td title="3" class="masked"></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="stream-rating-placeholder">
                                  Webcam
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="3" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjUiO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5"></td>
                                              <td title="1"></td>
                                              <td title="1.5"></td>
                                              <td title="2" class="masked"></td>
                                              <td title="2.5" class="masked"></td>
                                              <td title="3" class="masked"></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="stream-rating-placeholder">
                                  Adequacy
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="5" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjYiO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5"></td>
                                              <td title="1"></td>
                                              <td title="1.5"></td>
                                              <td title="2"></td>
                                              <td title="2.5"></td>
                                              <td title="3" class="masked"></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="stream-rating-placeholder">
                                  Charisma
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="4" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjciO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5"></td>
                                              <td title="1"></td>
                                              <td title="1.5"></td>
                                              <td title="2"></td>
                                              <td title="2.5" class="masked"></td>
                                              <td title="3" class="masked"></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="stream-rating-placeholder">
                                  Sexuality
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="3" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjgiO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5"></td>
                                              <td title="1"></td>
                                              <td title="1.5"></td>
                                              <td title="2" class="masked"></td>
                                              <td title="2.5" class="masked"></td>
                                              <td title="3" class="masked"></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                              <div class="stream-rating-placeholder">
                                  Streamer of the Year
                              </div>
                              <div class="stream-rating-scale">
                                  <table cellspacing="0" cellpadding="0">
                                      <tbody>
                                          <tr data-current-rating="4" data-params="YToyOntzOjg6InBhcmFtX2lkIjtzOjE6IjkiO3M6NzoidXNlcl9pZCI7czo1OiI0NjA4OCI7fQ==" class="clickable">
                                              <td title="0.5"></td>
                                              <td title="1"></td>
                                              <td title="1.5"></td>
                                              <td title="2"></td>
                                              <td title="2.5" class="masked"></td>
                                              <td title="3" class="masked"></td>
                                              <td title="3.5" class="masked"></td>
                                              <td title="4" class="masked"></td>
                                              <td title="4.5" class="masked"></td>
                                              <td title="5" class="masked"></td>
                                              <td title="5.5" class="masked"></td>
                                              <td title="6" class="masked"></td>
                                              <td title="6.5" class="masked"></td>
                                              <td title="7" class="masked"></td>
                                              <td title="7.5" class="masked"></td>
                                              <td title="8" class="masked"></td>
                                              <td title="8.5" class="masked"></td>
                                              <td title="9" class="masked"></td>
                                              <td title="9.5" class="masked"></td>
                                              <td title="10" class="masked"></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>





      <?php } ?>

  </div>

  <style>
      .cool-button {
          font-size: 9px !important;
          line-height: 20px !important;
          padding: 0 5px !important;
          height: 20px !important;
      }

      .stretch-card>.card {
          width: 100%;
          min-width: 100%
      }

      .flex {
          -webkit-box-flex: 1;
          -ms-flex: 1 1 auto;
          flex: 1 1 auto;
      }

      @media (max-width:991.98px) {
          .padding {
              padding: 1.5rem
          }
      }

      @media (max-width:767.98px) {
          .padding {
              padding: 1rem
          }
      }

      .padding {
          padding: 3rem
      }



      /*card css*/

      .block {
          background: #fff;
          border: #e1e4eb 1px solid;
      }

      ul#menu li {
          display: inline;
          padding-right: 6%;
          margin: 10;
      }

      #menu {
          padding-left: 0 !important;
      }

      #under-player-panel {
          font-size: 11px;
          overflow: hidden;
      }

      .videosize {
          width: 100% !important;
      }



      .padds {
          padding-left: 0;
          padding-right: 2px;
      }






      .cardset {
          padding-left: 3px;
          padding-right: 3px;
          padding-top: 5px;
      }

      .fa-clock {
          color: gray !important;
      }

      .fa-coins {
          color: gold !important;
      }

      .fa-heart {
          color: gray !important;
      }

      .fa-user {
          color: red !important;
      }

      .paddings {
          padding: 3rem;
      }

      @media only screen and (max-width: 600px) {
          .paddings {
              padding: 0 !important;
          }



          #under-player-panel {
              font-size: 9px !important;
          }

          ul#menu li {
              display: inline;
              padding-right: 2%;
          }

          .block {
              padding-left: 5%;
              padding-top: 7%;
          }
      }
  </style>
  <style>
      iframe {
          width: 100% !important;
          height: 551px;

      }

      .card {
          margin-top: 20px;
          margin-bottom: 20px;
          overflow: hidden;
      }

      .gold-color {
          border: 6px solid goldenrod;
      }

      .silver-color {
          border: 6px solid darkblue;
      }
  </style>