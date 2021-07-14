 <!-----Sec2 slider--->
 <div class="container-fluid" id="page-content">
     <div class="row">
         <div class="col-lg-12 stretch-card">
             <div class="card">
                 <div class="card-body pad-10">
                     <!-- <h4 class="card-title">Basic carousel</h4> -->
                     <div class="owl-carousel" id="promo-streams">
                         <?php if (isset($items) && !empty($items)) {
                                echo $items;
                            } ?>


                         <!-- <div class="item"> 
                             <a href="<?php echo base_url('en/dashboard/watch/' . $value->username) ?>" title="<?php echo (isset($value->username) ? $value->username : 'empty') ?>">
                                 <div class="live box-shadow"><?php echo (isset($value->username) ? $value->username : 'empty') ?></div>
                             </a>
                             <div class="viewers-count box-shadow c-help" title="Current number of viewers">
                                 <span class="viewers-icon"></span><?php echo (isset($value->view_counts) ? $value->view_counts : 0) ?>
                             </div>
                             <a href="<?php echo base_url('en/dashboard/watch/' . $value->username) ?>">
                                 <img class="preview" src="https://static-cdn.jtvnw.net/previews-ttv/live_user_<?php echo $value->username ?>-156x88.jpg" alt="<?php echo $value->username ?>">
                             </a>
                         </div> -->

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <?php
    if (isset($_SESSION['is_logged_in'])) {
        //  echo '<pre>';
        //  print_r($_SESSION['user_info']['followers']);
        //  echo '</pre>';
        //  die;
    }

    ?>

 <!----Sec3 Content--->
 <div class="container-fluid mt-15">
     <div class="row">
         <div class="col-md-9 col-xs-12">
             <div class="content">
                 <div class="block">
                     <div id="youtube-promo-video">
                         <iframe class="youtube-video" src="https://www.youtube.com/embed/UOdCjisTX4U?autoplay=1&amp;controls=1&amp;disablekb=1&amp;fs=1&amp;modestbranding=0&amp;rel=0" frameborder="0"></iframe>
                     </div>
                 </div>
                 <div class="block-3">
                     <div class="block-body">
                         <article>
                             <h1>Stream Booster — Free Twitch Channels Promotion</h1>

                             <p>Stream Booster is a free streamer promotion service on today's most popular online streaming platform Twitch.tv. The system is designed in such a way that novice streamers help each other find new viewers around the world and thereby advance their broadcast in a natural way. Thanks to the Stream Booster system, promotion of the Twitch channel is free, absolutely safe and does not require special time expenses. If you decide to start promoting your channel on Twitch and get new regular viewers of your future broadcasts, then Stream Booster is exactly what will help you with this.</p>

                             <h2>Why Twitch Bot Promotion is Inefficient</h2>

                             <p>The cheat of bots at first glance may seem the easiest and most effective way to promote in Twitch. However, it's recommended not to use this method of promoting your channel for several reasons.</p>
                             <p>Firstly, it is not free. Using bot cheating services is quite expensive and very unreliable, and some bots are not taken into account as viewers of the channel and authorized users of the broadcast chat.</p>
                             <p>Secondly, bots do not create any activity in the chat, but this is the main indicator of the quality of the content that the streamer provides to its viewers. It's no secret that there is a direct and obvious dependence — the more interesting the broadcast, the higher the activity of the audience in the chat. Using bot cheating services, you only artificially increase the number of "viewers" of your broadcast, but at the same time you get practically nothing in return.</p>

                             <h2>Promotion of the Twitch Channel by Real Viewers</h2>

                             <p>All novice streamers sooner or later ask the same question — "<i>where to get viewers on Twitch channel?</i>". This question arises immediately after the start of the first broadcast, on which, as practice shows, usually there is not a single viewer. The fact is that non-popular broadcasts are located at the very bottom of the Twitch.tv rating, which means that the chance that real viewers will go to them is extremely small.</p>
                             <p>As soon as they begin to watch the broadcast, its position in the ranking increases and it becomes more visible on the site itself or in the Twitch application. Thanks to this, you get new viewers, and if the stream is interesting enough, then subscribers and followers on Twitch, who in the future can become your regular viewers. Thus, the promotion is carried out thanks to the so-called "snowball" effect, for which it is necessary to set the initial acceleration.</p>
                             <p>The Stream Booster system was created to perform this task and has been quite efficient in dealing with it for several years. The result of the system is the successful promotion of most users who receive a tangible influx of real viewers and subscribers on Twitch.</p>

                             <h2>The Impact of Content Quality on Channel Popularity on Twitch.tv</h2>

                             <p>The popularity of the channel on Twitch.tv depends on many factors — the regularity and quality of broadcasts, the degree of involvement of viewers, the skills of playing and communicating with viewers, the number of subscribers, the correctness of broadcast settings, the relevance of content, the availability of a webcam, the stability of an Internet connection, the power of a computer and others.</p>
                             <p>Despite the fact that there are a lot of parameters that affect the popularity of the broadcast, it’s worth highlighting the quality of the content provided to Twitch.tv viewers as a separate item. It is not so important how good your stream will be designed and tuned and how powerful you bought a graphics card for modern games, because if you do not know how to play and do not communicate with your viewers, then the popularity of your channel on Twitch will not grow.</p>
                             <p>Try to give the audience something in the hope that they came to you — fun pastime, high-quality and interesting content, as well as a bunch of all kinds of emotions from watching the broadcast.</p>

                             <h2>How to Promote a Channel on Twitch.tv in a Stream Booster System</h2>

                             <p>Stream Booster system is so simple and intuitive for users that anyone can promote their channel. All you need to do is log in with one click, using your existing Twitch.tv account, choose a convenient time for the promotion of the broadcast and take the appropriate place in the promotion table.</p>
                             <p>New viewers themselves will come to you as soon as the line reaches your channel, and whether they will be active in the chat and come back again is up to you. Stream Booster helps streamers find new viewers, and viewers get interesting broadcasts and high-quality content for communication and a pleasant pastime with like-minded people.</p>
                             <p>The promotion of the Twitch channel will become even more interesting and exciting, thanks to the many pleasant bonuses provided for users of the Stream Booster system.</p>
                         </article>
                     </div>
                     <div class="block-footer center">
                         <a href="/en/dashboard/promotion" class="cool-button cool-button-4 reduce-opacity">Start Twitch promotion right now</a>
                     </div>
                 </div>
             </div>

         </div>
         <div class="col-md-3 col-xs-12">
             <?php $this->load->view('templates/sideBar') ?>

         </div>


     </div>

 </div>