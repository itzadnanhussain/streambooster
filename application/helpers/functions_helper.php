<?php
defined('BASEPATH') or exit('No direct script access allowed');

/////Helper Function For Login Views//////
if (!function_exists('ThemeView')) {
    function ThemeView($page, $data = array(), $title)
    {
        $thiz = &get_instance();
        $data['title'] = $title;


        updateLevel();
        ///topUsers
        $data['topUsers'] = getTopFiveUsers();
        $data['newUsers'] = getNewUsers();  
        $thiz->load->view('templates/header', $title);
        $thiz->load->view($page, $data);
        $thiz->load->view('templates/footer');
        // $thiz->load->view('templates/ad_footer',array('ad_scriptfile'=>basename($page))); 
    }
}



 ///updateLevel
 if (!function_exists('updateLevel')) {
  function updateLevel()
    {    if(isset( $_SESSION['user_info']['id'])){
        $getrecords = array();
        $getrecords = getByWhere('users', '*', array('id' => $_SESSION['user_info']['id']));
        $coins = $getrecords[0]->coins;
        $level = $getrecords[0]->level;
        $watchCoins = $getrecords[0]->watching_coins;  //2000
        $checkCoins=floor(intval( $watchCoins/500));  //2000/500=4
        $bouns=500;
            if($watchCoins==1000 && $level==1)
            {
                $coins = $coins + $bouns;
                $level=$level+1;
                updateByWhere('users', array('coins' => $coins ,'level' => $level , 'watching_coins'=> 0 ), array('id' => $_SESSION['user_info']['id'])); 
            }
        
            elseif($watchCoins>1000 && $checkCoins>$level)
            {
               $bouns=500*intval($level);
                $coins = $coins + $bouns;
                $level=$level+1;
                //$watchCoins=$watchCoins-$bouns;
                updateByWhere('users', array('coins' => $coins ,'level' => $level  , 'watching_coins'=> 0 ), array('id' => $_SESSION['user_info']['id'])); 
            }

            //echo $bouns." ......  ".$coins.".......".$level ;
             
            $_SESSION['user_info']['level']= $level;
            $_SESSION['user_info']['coins']=$coins;
           
        }
    }
}




/////Helper Function For Login Views//////
if (!function_exists('AdminView')) {
    function AdminView($page, $data = array(), $title)
    {
        $thiz = &get_instance();
        $data['title'] = $title;
        $thiz->load->view('templates/ad_header', $title);
        $thiz->load->view($page, $data);
        $thiz->load->view('templates/ad_footer');
        // $thiz->load->view('templates/ad_footer',array('ad_scriptfile'=>basename($page))); 
    }
}


/////TotalLevel//////
if (!function_exists('TotalLevel')) {
    function TotalLevel()
    {
        $count = 40;
        return $count;
    }
}

/////GetReplyOfComments
if (!function_exists('GetReplyOfComments')) {
    function GetReplyOfComments($id)
    {

        $data = getByWhere('reply', '*', array('comment_id' => $id));
        if (isset($data) && !empty($data)) {
            $count = count($data);

            $list = '';
            for ($i = 0; $i < $count; $i++) {
                $list .= '<p>' . $data[$i]->reply . '</p>';
            }
            return $list;
        }
        return 'No More Comments';
    }
}


/////getTopFiveUsers
if (!function_exists('getTopFiveUsers')) {
    function getTopFiveUsers()
    {
        $getusers = getByWhere('users', '*', array(), array('coins', 'DESC'));
        if (isset($getusers) && !empty($getusers)) {
            $list = array();
            for ($i = 0; $i < 5; $i++) {
                array_push($list, $getusers[$i]);
            }
            return $list;
        }
    }
}

/////getNewUsers
if (!function_exists('getNewUsers')) {
    function getNewUsers()
    {
        $getusers = getByWhere('users', '*', array(), array('id', 'DESC')); 
        if (isset($getusers) && !empty($getusers)) {
            $listNewUsers = array();
            for ($i = 0; $i < count($getusers); $i++) {
                array_push($listNewUsers, $getusers[$i]);
            }
            return $listNewUsers;
        }
    }
}


/////PromoReactivationProcess
if (!function_exists('PromoReactivationProcess')) {
    function PromoReactivationProcess()
    {
        $findData = getByWhere('promo', '*', array('user_id' => $_SESSION['user_info']['id']));
        if (isset($findData) && !empty($findData)) {
            for ($i = 0; $i < count($findData); $i++) { 

                if ($findData[$i]->promo_name == 'Displayed ON Follows Page') {
                    updateByWhere('promo',array('status'=>'active'),array('promo_name'=>'Displayed ON Follows Page','user_id'=>$_SESSION['user_info']['id'])); 
                }
                
                if ($findData[$i]->promo_name == 'Displayed ON Watch Page') {

                    $stream = GetActiveStreams($_SESSION['user_info']['twitch_user_id'], $_SESSION['user_info']['twitch_access_token']);
                    
                    if (isset($stream) && !empty($stream)) {
                        $active_streamers = $stream->data;
                        if (isset($active_streamers) && !empty($active_streamers)) {
                            if ($active_streamers[0]->user_name == $_SESSION['user_info']['username'] && $active_streamers[0]->type == 'live') {
                                //check coins
                                if ($_SESSION['user_info']['coins'] >= 0 && $findData[$i]->coins <= $_SESSION['user_info']['coins']) {
                                    $total_coins = $_SESSION['user_info']['coins'] - $findData[$i]->coins;
                                    updateByWhere('users', array('coins' => $total_coins), array('id' => $_SESSION['user_info']['id']));
                                    updateByWhere('promo',array('status'=>'active'),array('promo_name'=>'Displayed ON Watch Page','user_id'=>$_SESSION['user_info']['id'])); 

                                    $_SESSION['user_info']['coins'] = $total_coins;
                                }
                                else
                                { 
                                    deleteRecordWhere('promo', array('promo_name' => 'Displayed ON Watch Page', 'user_id' => $_SESSION['user_info']['id'])); 

                                } 
                            } 
                        }  
                    }
                    else
                    {
                        deleteRecordWhere('promo', array('promo_name' => 'Displayed ON Watch Page', 'user_id' => $_SESSION['user_info']['id'])); 
 
                    }

                }
            }
        }
    }
}
