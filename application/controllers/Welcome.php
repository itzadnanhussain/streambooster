<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
    ///Welcome View
    public function index()
    {
        
        $title = 'Dashboard';
        $page = "welcome";
        ////Joins
        // $tableSelect = "tb1.*, tb2.*";
        // $tableInfo = "promotion tb1, users tb2-tb2.id=tb1.user_id-left";
        // if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true)
        // {
        //     $data['records'] = getByWhere($tableInfo, $tableSelect, array('status' => 'active', 'user_id !=' => $_SESSION['user_info']['id'], 'ranks' => 'Displayed ON Watch Page'), array('invested_coins', 'DESC'));


        // }
        // else
        // {

        //     $data['records'] = getByWhere($tableInfo, $tableSelect, array('status' => 'active', 'ranks' => 'Displayed ON Watch Page'), array('invested_coins', 'DESC'));
        // }

        $users = getByWhere('users');
        $access_token = getByWhere('users', '*', array('twitch_user_id' => '618295746'));
        $access_token = $access_token[0]->twitch_access_token;
        if (isset($users) && !empty($users)) {
            $count = count($users);
            $item = '';
            for ($i = 0; $i < $count; $i++) {
                $records = array();
                // $records = GetActiveStreams($users[$i]->twitch_user_id);
                $records = GetActiveStreams($users[$i]->twitch_user_id, $access_token);
                if (isset($records->data) && !empty($records->data)) {
                    $rec = array();
                    $rec = $records->data;
                    if (isset($rec) && !empty($rec)) {
                        $item = $item . ' <div class="item">' .
                            '<a href=" ' . base_url('en/dashboard/watch/' . $rec[0]->user_name) . '">' .
                            '<div class="live box-shadow">' . $rec[0]->user_name . '</div>' .
                            '</a>' .
                            '<div class="viewers-count box-shadow c-help" title="Current number of viewers">' .
                            '<span class="viewers-icon"></span>' . $rec[0]->viewer_count . '' .
                            '</div>' .
                            '<a href="' . base_url('en/dashboard/watch/' . $rec[0]->user_name) . '">' .
                            '<img class="preview" src="https://static-cdn.jtvnw.net/previews-ttv/live_user_' . strtolower($rec[0]->user_name) . '-180x110.jpg" alt="' . $rec[0]->user_name . '">' .
                            '</a>' .
                            '</div>';
                    }
                }
            }
            $data['items'] = $item;
        } else {
            $data = array();
        }
        $data['new_users'] = 'active';
        if (isset($_SESSION['is_logged_in']) && ($_SESSION['is_logged_in'] == True)) {
            $data['new_users'] = 'inactive';
        }
        ThemeView($page, $data, $title); 
      
    }


    ///UserRating View
    public function UserRating()
    {
        $title = 'User Rating';
        $page = "userRating";
        $data['records'] = getByWhere('users');
        $data['level_box'] = 'active';
        ThemeView($page, $data, $title);
    }


    ///UserLogin View
    public function UserLogin()
    {
        $title = 'User Rating';
        $page = "userLogin";
        $data = array();
        $this->load->view($page, $data, $title);
    }


    ///UserAuth View
    public function UserAuth()
    {
        $title = 'UserAuth';
        $page = "userAuth";
        $data = array();
        $this->load->view($page, $data, $title);
    }


    ///TopGames View
    public function TopGames()
    {
        $title = 'Top Games';
        $page = "topGames";
        $data = array();
        ThemeView($page, $data, $title);
    }


    ///AboutUs View
    public function AboutUs()
    {
        $title = 'About Us';
        $page = "aboutUs";
        $data = array();
        ThemeView($page, $data, $title);
    }


    ///NewsUpdates View
    public function NewsUpdates()
    {
        $title = 'News Updates';
        $page = "newsUpdate";
        $data = array();
        $data['article']=getByWhere('article','*',array(),array('article_id','DESC'));
         
        ThemeView($page, $data, $title);
    }


    ///Articles View
    public function Articles()
    {
        $title = 'Articles';
        $page = "articles";
        $data = array();
        ThemeView($page, $data, $title);
    }


    ///Articles View
    public function ReferencePage()
    {
        //$this->load->library('user_agent');
        ///Test Code For MAC address
        // PHP code to get the MAC address of Client 
        //$MAC = exec('getmac');

        // Storing 'getmac' value in $MAC 
        //$MAC = strtok($MAC, ' ');

        // Updating $MAC value using strtok function,  
        // strtok is used to split the string into tokens 
        // split character of strtok is defined as a space 
        // because getmac returns transport name after 
        // MAC address    
        //echo "MAC address of client is: $MAC";




        ///Clean Code 
        //die;


        $invited_by = base64_decode(urldecode($_GET['id']));
        
        


      //  $invited_by =  base64_decode(urldecode($this->uri->segment(3)));
        $PostData['invite_user_id'] = $invited_by;
        $PostData['client_mac_address'] = 123;
        $_SESSION["invite_userid"] =$invited_by ;
       // $where = array('invite_user_id' => $invited_by, 'client_mac_address' => 123);
        //$findData = array();
       // $findData = getByWhere('referral_users', '*', $where);
       // if ($findData) {
         //   redirect('welcome');
        //} else {

            /*$findData = array();
            $findData = getByWhere('users', '*', array('id' => $invited_by));
            $coins = $findData[0]->coins;
            $coins = $coins + 100;

            updateByWhere('users', array('coins' => $coins), array('id' => $invited_by));*/
          //  addNew('referral_users', $PostData);

            redirect('welcome');
       // }
    }



    public function CheckLevels()

    {

        
        
        
        $getrecords = array();
        $getrecords = getByWhere('users', '*', array('id' => $_SESSION['user_info']['id']));
        $coins = $getrecords[0]->coins;
        $level = $getrecords[0]->level;
        $watchCoins = $getrecords[0]->watching_coins;  
        $checkCoins=floor(intval( $watchCoins/500)); 
        $bouns=500;
            if($watchCoins==1000 && $level==1)
            {
                $coins = $coins + $bouns;
                $level=$level+1;
                updateByWhere('users', array('coins' => $coins ,'level' => $level , 'watching_coins'=> 0 ), array('id' => $_SESSION['user_info']['id'])); 
            }
        
            elseif($watchCoins>1000 && $checkCoins>=$level)
            {
               $bouns=500*intval($level);
                $coins = $coins + $bouns;
                $level=$level+1;
                updateByWhere('users', array('coins' => $coins ,'level' => $level  , 'watching_coins'=> 0 ), array('id' => $_SESSION['user_info']['id'])); 
            }
            //echo $bouns." ......  ".$coins.".......".$level ;
          if(isset($_SESSION['user_info']['level']) && isset( $_SESSION['user_info']['coins'])){
            $_SESSION['user_info']['level']= $level;
            $_SESSION['user_info']['coins']=$coins;
           
           }

        }




}
