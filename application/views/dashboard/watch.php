<!----Sec3 Content--->
<div class="container-fluid mt-15" id="main">
     <?php if (isset($records) && empty($records))
{ ?>
         <div class="row" id="no-stream" style="height: 450px;">
             <div class="col-sm-12">
                 <div class="content">
                     <div class="block">
                         <h1>No Stream Available at this time</h1>
                     </div>
                 </div>
             </div>
         </div>

     <?php
} ?>

     <?php if (isset($records) && !empty($records))
{
    ?>
         <div class="row">
             <div class="col-sm-9 col-lg-9">
                 <div class="content watch">
                     <div class="card" id="gold">
                         <div id="twitch-embed">
                         <div class="usercoins"  style="display:none ;color: #fff; position:absolute; z-index: 1; top: 5%;left: 12%;font-weight: 600;
    font-size: 14px;"><?php print_r($records[0]->invested_coins); ?><span class="credits-icon"></span></div>
                         
                         </div> 
                         <script>
$(document).ready(function(){
  $("#twitch-embed").hover(function(){
    $('.usercoins').show();
    }, function(){
        $('.usercoins').hide();
  });     
});
</script>
                         <script>
                             var embed = new Twitch.Embed("twitch-embed", {

                                 channel: '<?php echo $records[0]->username ?>',
                                 layout: "video",
                                 autoplay: false,
                                 // only needed if your site is also embedded on embed.example.com and othersite.example.com 
                                 // parent: ["embed.example.com", "othersite.example.com"]
                             });

                             embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
                                 var player = embed.getPlayer();
                                 player.play();
                             });


                             <?php if (isset($records[0]->stream_type) && ($records[0]->stream_type == 'golden')) { ?>
                                 $('#gold').addClass('gold-color');
                             <?php } ?>
                         </script>
                         <div class="card-body" id="earn-card">
                             <div class="block" id="under-player-panel">
                                 <ul id="menu">
                                     <?php if (isset($records[0]->stream_type) == 'golden')
    { ?>
                                         <li class="left-side" id="strEarning"> <a class="cool-button youtube-button" id="strlink" onclick="StartEarning('golden')">Start Earning</a> </li>

                                     <?php
    }
    else
    { ?>
                                         <li class="left-side" id="strEarning"> <a class="cool-button youtube-button" id="strlink" onclick="StartEarning('silver')">Start Earning</a> </li>
                                     <?php
    } ?>
                                     <li class="left-side"><span id="check-if-user-here-1" class=""><span class="credits-icon"></span><span id="credits-earned" class="c-help" title="Amount of gold earned">0.00</span></span></li>
                                     <li class="left-side"><span id="check-if-user-here-2" class=""><span class="timer-icon"></span><span class="straight-timer c-help" id="watching-duration"><span id="hour">00</span>:<span id="minute">00</span>:<span id="seconds">00</span></span></span></li>
                                     <?php if (isset($_SESSION['user_info']['double_coins']) && ($_SESSION['user_info']['double_coins'] == "Active"))
    { ?>
                                         <li class="left-side"><span id="check-if-user-here-3" class=""><span class="credits-icon">
                                                     <?php if (isset($records[0]->stream_type) == 'golden')
        { ?>
                                                 </span><span class="c-help" title="The rate of gold earning"><span id="credits-per-minute">30</span> per min.</span></span>

                                         <?php
        }
        else
        { ?>
                                             </span><span class="c-help" title="The rate of gold earning"><span id="credits-per-minute">18</span> per min.</span></span>
                                         <?php
        } ?>
                                     <?php
    }
    else
    { ?>
                                         <li class="left-side"><span id="check-if-user-here-3" class=""><span class="credits-icon">
                                                     <?php if (isset($records[0]->stream_type) == 'golden')
        { ?>
                                                 </span><span class="c-help" title="The rate of gold earning"><span id="credits-per-minute">15</span> per min.</span></span>

                                         <?php
        }
        else
        { ?>
                                             </span><span class="c-help" title="The rate of gold earning"><span id="credits-per-minute">9</span> per min.</span></span>
                                         <?php
        } ?>

                                         </li>
                                     <?php
    } ?>
                                     <li class="right-side"><i class="fas fa-user"></i> <?php echo (isset($records[0]->view_count) ? $records[0]->view_count : 0) ?></li>
                                     <li class="right-side"> <button class="ajax-popup cool-button follow-button reduce-opacity" id="btn-follow" onclick="CreateNewFollower(<?php echo $records[0]->twitch_user_id ?>)">
                                             <span></span>Follow</button>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>


                     <div class="row">

                         <?php for ($i = 1;$i < count($records);$i++)
    { ?>


                             <!---Streams Loop--->
                             <div class="col-sm-4">
                                 <div class="content watch">
                                     <div class="card" id="stream_<?php echo $i ?>">
                                         <div id="twitch-embed_<?php echo $i ?>" class="streamer_list">

                                         </div>
                                         <script>
                                             var embed = new Twitch.Embed("twitch-embed_<?php echo $i ?>", {

                                                 channel: '<?php echo $records[$i]->username ?>',
                                                 layout: "video",
                                                 autoplay: false,
                                                 // only needed if your site is also embedded on embed.example.com and othersite.example.com 
                                                 // parent: ["embed.example.com", "othersite.example.com"]
                                             });

                                             embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
                                                 var player = embed.getPlayer();
                                                 player.play();
                                             });

                                             <?php if (isset($records[$i]->stream_type) && ($records[$i]->stream_type == 'golden'))
        { ?>
                                                 $('#stream_<?php echo $i ?>').addClass('gold-color');
                                             <?php
        } ?>

                                             <?php if (isset($records[$i]->stream_type) && ($records[$i]->stream_type == 'silver'))
        { ?> 
                                                 $('#stream_<?php echo $i ?>').addClass('silver-color');
                                             <?php
        } ?>
                                         </script>
                                         <div class="card-body twitch-btn" id="earn-card">
                                             <a href="<?php echo base_url('en/dashboard/watch/' . $records[$i]->username) ?>" class="twitch-button  "><span></span>Watch the broadcast</a>

                                         </div>

                                     </div>

                                 </div>
                             </div>

                         <?php
    } ?>

                     </div>


                 </div>

             </div>
             <div class="col-sm-3 card" id="chat-window">
                 <div class="right-sidebar watch sticky-sidebar" style="padding-top: 0px;">
                     <div class="block-2">
                         <div id="chat-container">
                             <iframe frameborder="0" scrolling="no" id="chat_embed" src="https://www.twitch.tv/embed/<?php echo $records[0]->username ?>/chat?parent=instantscrapcarremoval.com&theme=dark" height="551" width="100%"></iframe>
                         </div>
                     </div>
                     <div id="stream-rating" data-user-id="46088">
                         <div class="block">
                             <h2>Broadcast Rating</h2>

                             <div class="stream-rating-placeholder first">
                                 Gaming skills
                             </div>




                             <?php if (isset($ranks) && !empty($ranks) && $ranks[0]->gaming_skills > 0)
    {
        $limit = $ranks[0]->gaming_skills;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>


                            
                            
                            <?php
    }
    else
    { ?>



                             <div class="rating gaming_skills">
                            <?php for ($i = 10;$i > 0;)
        {
            $val = "'gaming_skills'";
            echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734</span>';
            $i = $i - 0.5;
        } ?>

                            </div>
                            <?php
    } ?>
                            <!-- <div class="stream-rating-scale">
                                 <table cellspacing="0" cellpadding="0">
                                     <tbody>
                                         <tr data-current-rating="6" data-params="gamming_skills" class="clickable">
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
                             </div>-->
                          
                             <div class="stream-rating-placeholder">
                                 Communicability
                             </div>
                             <!--<div class="stream-rating-scale">
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
-->


<?php if (isset($ranks) && !empty($ranks) && $ranks[0]->communicability > 0)
    {
        $limit = $ranks[0]->communicability;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>


                            
                            
                            <?php
    }
    else
    { ?>

                            <div class="rating communicability">
                            <?php for ($i = 10;$i > 0;)
        {
            $val = "'communicability'";
            echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734</span>';
            $i = $i - 0.5;
        } ?>
                            </div>


                            <?php
    } ?>

                             <div class="stream-rating-placeholder">
                                 Video settings
                             </div>
                            <!-- <div class="stream-rating-scale">
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
--> 


<?php if (isset($ranks) && !empty($ranks) && $ranks[0]->video_settings > 0)
    {
        $limit = $ranks[0]->video_settings;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>
                            <?php
    }
    else
    { ?>



<div class="rating video_settings">
<?php for ($i = 10;$i > 0;)
        {
            $val = "'video_settings'";
            echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734</span>';
            $i = $i - 0.5;
        } ?>

                            </div>
<?php
    } ?>




                             <div class="stream-rating-placeholder">
                                 Audio settings
                             </div>




                             <?php if (isset($ranks) && !empty($ranks) && $ranks[0]->audio_settings > 0)
    {
        $limit = $ranks[0]->audio_settings;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>


                            
                            
                            <?php
    }
    else
    { ?>

                             <div class="rating audio_settings">
                            <?php for ($i = 10;$i > 0;)
        {
            $val = "'audio_settings'";
            echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734</span>';
            $i = $i - 0.5;
        } ?>

                            </div>


                            <?php
    } ?>
                             <!--<div class="stream-rating-scale">
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
                             </div>-->

                             <div class="stream-rating-placeholder">
                                 Webcam
                             </div>


                             <?php if (isset($ranks) && !empty($ranks) && $ranks[0]->webcam > 0)
    {
        $limit = $ranks[0]->webcam;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>


                            
                            
                            <?php
    }
    else
    { ?>

                             <div class="rating webcam">
                            <?php for ($i = 10;$i > 0;)
        {
            $val = "'webcam'";
            echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734</span>';
            $i = $i - 0.5;
        } ?>

                            </div>


                            <?php
    } ?>
                            <!-- <div class="stream-rating-scale">
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
                             </div>-->

                             <div class="stream-rating-placeholder">
                                 Adequacy
                             </div>


                             <?php if (isset($ranks) && !empty($ranks) && $ranks[0]->adequacy > 0)
    {
        $limit = $ranks[0]->adequacy;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>


                            
                            
                            <?php
    }
    else
    { ?>

                             <div class="rating adequacy">
                            <?php for ($i = 10;$i > 0;)
                                {
                                    $val = "'adequacy'";
                                    echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734</span>';
                                    $i = $i - 0.5;
                                } ?>

                            </div>


                            <?php
    } ?>

                             
                             <div class="stream-rating-placeholder">
                                 Charisma
                             </div>
                             <!--<div class="stream-rating-scale">
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
                             </div>-->


                             <?php if (isset($ranks) && !empty($ranks) && $ranks[0]->charisma > 0)
    {
        $limit = $ranks[0]->charisma;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>


                            
                            
                            <?php
    }
    else
    { ?>

                             <div class="rating charisma">
<?php for ($i = 10;$i > 0;)
        {
            $val = "'charisma'";
            echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734</span>';
            $i = $i - 0.5;
        } ?>

</div>


<?php
    } ?>

                             <div class="stream-rating-placeholder">
                                 Sexuality
                             </div>

                             <?php if (isset($ranks) && !empty($ranks) && $ranks[0]->sexuality > 0)
    {
        $limit = $ranks[0]->sexuality;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>


                            
                            
                            <?php
    }
    else
    { ?>

                             <div class="rating sexuality">
<?php for ($i = 10;$i > 0;)
        {
            $val = "'sexuality'";
            echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734</span>';
            $i = $i - 0.5;
        } ?>
</div><?php
    } ?>
                            <!-- <div class="stream-rating-scale">
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
                             </div>-->

                             <div class="stream-rating-placeholder ">
                                 Streamer of the Year
                             </div>
                            <!-- <div class="stream-rating-scale">
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
                             -->
                             <?php if (isset($ranks) && !empty($ranks) && $ranks[0]->streamer_of_the_year > 0)
    {
        $limit = $ranks[0]->streamer_of_the_year;
        for ($i = 0.5;$i < 10.5;$i = $i + 0.5)
        {

            if ($i <= $limit)
            {
                echo "<span class='greens iconsize'> &#9733</span>";
            }
            else
            {
                echo "<span class='greens iconsize'> &#9734</span>";
            }

        }

?>


                            
                            
                            <?php
    }
    else
    { ?>

                             <div class="rating streamer_of_the_year">




                             <?php for ($i = 10;$i > 0;)
        {
            $val = "'streamer_of_the_year'";
            echo '<span title="' . $i . '" onclick="myFunction( ' . $records[0]->id . ',' . $i . ',' . $val . ')"> &#9734 </span>';
            $i = $i - 0.5;
        } ?>

</div>
<?php
    } ?>



                         </div>
                     </div>
                 </div>
             </div>
         </div>





     <?php
} ?>

 </div>

 <script>
function myFunction(id,num,val) {
  //alert(val);

  $.ajax({
            type: "GET",
          
            url:"<?php echo base_url('partial/ranking/'); ?>"+id+"/"+num+"/"+val,
            dataType: 'json',
        
            async: false,
            success: function(obj) {
                $("."+val).removeClass( "rating" );
                $("."+val).empty();
                for (i = 0.5; i < 10.5 ; i=i+0.5){
                    if(i<=num)
                    {
                        $("."+val).append("<span class='greens iconsize'> &#9733</span>");
                    }

                    else{
                        $("."+val).append("<span class='iconsize'> &#9734</span>");
                    }
                    

}   
                  
        
            }
    
        });




}
</script>
<style>
    .rating > span:hover:before {
   content: "\2605";color:#336600;
   position: absolute;
   left: 0.5px;
  top:-1px;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";color:#336600;
   position: absolute; left: 0.5px;top:-1px;
  
}.rating {
  unicode-bidi: bidi-override;
  direction: rtl;
}
.rating > span {
    font-size: 11px;
  position: relative;

}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";

   color:#336600;
   position: absolute; left: 0.5px;top:-1px;
  
}
.iconsize{font-size: 11px;}
.greens{ color:#336600;}
</style>





<script>
         // $(document).ready(function(){
           
             //   $('iframe').contents().find("body").css('background-color', '#333');
        
           //});


           //window.onload = function() {
  //let frameElement = document.getElementById("chat_embed");
  //let doc = frameElement.contentDocument;
  //doc.body.innerHTML = doc.body.innerHTML + '<style> body{background-color:#333;}</style>';
//}


          //  $(document).ready(function(){
 //var iFrameDOM = $("iframe#chat_embed").contents();
//iFrameDOM.find(".simplebar-content").css("color", "#333");
//});

</script>


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
         height: 450px;
background-color: #333;
     }
   
     .card {
         margin-top: 20px;
         margin-bottom: 20px;
         overflow: hidden;
     }
 </style>

 <style>
     .twitch-btn {
         text-align: center;
         margin: 10px;


     }

     .twitch-btn a {
         font-size: 12px !important;
         line-height: 20px !important;
         padding: 10px !important;
         height: 20px !important;
         border-radius: 25px;
     }

     .streamer_list iframe {
         width: 100%;
         height: 250px !important;
     }

     .gold-color {
         border: 6px solid goldenrod !important;
     }
     .silver-color {
         border: 6px solid darkblue !important;
     }
 </style>
