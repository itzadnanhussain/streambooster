<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{



    // ///check login
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('en/admin/login');
        }
    }

    ///LoadStreamerStatistics
    public function index()
    {
        $data = array();
        $title['title'] = 'Statistics';
        $data = getByWhere('users');

        if (isset($data) && !empty($data)) {
            $count = count($data);
            $data['totalUsers'] = $count;
            $coins = 0;



            for ($i = 0; $i < $count; $i++) {
                $coins = $coins + $data[$i]->coins;
            }

            $data['coins'] = $coins;
            $data['streamers'] = $count;
        }

        $year = date('Y');

        $Jan = getByWhere('users', '*', array('created_at' => $year . '-01'));

        if (isset($Jan) && !empty($Jan)) {
            $data['Jan'] = count($Jan);
        }

        $Feb = getByWhere('users', '*', array('created_at' => $year . '-02'));
        if (isset($Feb) && !empty($Feb)) {
            $data['Feb'] = count($Feb);
        }

        $Mar = getByWhere('users', '*', array('created_at' => $year . '-03'));
        if (isset($Mar) && !empty($Mar)) {
            $data['Mar'] = count($Mar);
        }

        $Apr = getByWhere('users', '*', array('created_at' => $year . '-04'));
        if (isset($Apr) && !empty($Apr)) {
            $data['Apr'] = count($Apr);
        }

        $May = getByWhere('users', '*', array('created_at' => $year . '-05'));
        if (isset($May) && !empty($May)) {
            $data['May'] = count($May);
        }


        $Jun = getByWhere('users', '*', array('created_at' => $year . '-06'));
        if (isset($Jun) && !empty($Jun)) {
            $data['Jun'] = count($Jun);
        }

        $Jul = getByWhere('users', '*', array('created_at' => $year . '-07'));
        if (isset($Jul) && !empty($Jul)) {
            $data['Jul'] = count($Jul);
        }

        $Aug = getByWhere('users', '*', array('created_at' => $year . '-08'));
        if (isset($Aug) && !empty($Aug)) {
            $data['Aug'] = count($Aug);
        }

        $Sep = getByWhere('users', '*', array('created_at' => $year . '-09'));
        if (isset($Sep) && !empty($Sep)) {
            $data['Sep'] = count($Sep);
        }

        $Oct = getByWhere('users', '*', array('created_at' => $year . '-10'));
        if (isset($Oct) && !empty($Oct)) {
            $data['Oct'] = count($Oct);
        }

        $Nov = getByWhere('users', '*', array('created_at' => $year . '-11'));
        if (isset($Nov) && !empty($Nov)) {
            $data['Nov'] = count($Nov);
        }

        $Dec = getByWhere('users', '*', array('created_at' => $year . '-12'));
        if (isset($Dec) && !empty($Dec)) {
            $data['Dec'] = count($Dec);
        }








        // $data['last7days'] = getByWhere('users', '*', array('register_here >=' => date('Y-m-d', strtotime("-7 days"))));
        // $data['last30days'] = getByWhere('users', '*', array('register_here>=' => date('Y-m-d', strtotime("-30 days"))));

        $page = 'admin/statistics';
        AdminView($page, $data, $title);
    }

    ///dashboard
    // public function index()
    // {
    //     $title['title'] = 'Dashboard';
    //     $data = array();
    //     $page = 'admin/dashboard';
    //     AdminView($page, $data, $title);
    // }

    ///LoadStreamerTable
    public function LoadStreamerTable()
    {
        $title['title'] = 'streamers';
        $data['records'] = getByWhere('users');
        $page = 'admin/streamer';
        AdminView($page, $data, $title);
    }

 ///setcoins
    public function SetCoins()
    {
        $title['title'] = 'setcoins';
        $data['records'] = getByWhere('coins_management');
        $page = 'admin/set_coins';
        AdminView($page, $data, $title);
    }




  ///VideoAdsPage
    public function VideoAdsPage()
    {
        $title['title'] = 'videoads';
        $data['records'] = getByWhere('video_ads');
        $page = 'admin/videoads';
        AdminView($page, $data, $title);
    
       
    }
    
    
    ///VideoAdsPageAction
    public function VideoAdsPageAction()
    {
            extract($_POST);
          
                $target_dir = "assets/video/"; 
                if (!is_dir($target_dir)) {  
                    mkdir($target_dir , 0777, TRUE);
                }
                $target_file =$target_dir.$_FILES["uploads"]["name"];
                    // Upload file
                    if(move_uploaded_file($_FILES["uploads"]["tmp_name"],$target_file)){
                         $data['video_path'] = $target_file;
                   
                    $create_logs = addNew('video_ads', $data);
                    //$data = array('code' => 'success', 'message' => $target_file);
                    $this->VideoAdsPage();
                    }
        
                    

    
    
    }
    

    ///LoadUsersTable
    public function LoadUsersTable()
    {
        $title['title'] = 'Manage Users';
        $data['records'] = getByWhere('users');
        $page = 'admin/users';
        AdminView($page, $data, $title);
    }

    ///LoadSingleStreamer
    public function LoadSingleStreamer()
    {
        $title['title'] = 'Single Streamer';
        $id = $this->uri->segment(4);
        $data['records'] = getByWhere('users', '*', array('id' => $id), array('id', 'ASC'));
        $data['logs'] = getByWhere('activity_logs', '*', array('user_id' => $id));
        $data['comments'] = getByWhere('comments', '*', array('comment_to' => $id));
        $page = 'admin/profile';
        AdminView($page, $data, $title);
    }


    ///LoadSingleStreamerRanks
    public function LoadSingleStreamerRanks()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $update = updateByWhere('promotion', array('promotion_status' => $promotion_status), array('user_id' => $user_id, 'promotion_id' => $promotion_id));
            if ($update) {
                ///Success
                $data = array('code' => 'success', 'message' => 'Ranks Updated');
                echo json_encode($data);
                die;
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Record Not Found!');
                echo json_encode($data);
                die;
            }
        } else {
            $title['title'] = 'Single Streamer Ranks De';
            $id = $this->uri->segment(4);
            $data['records'] = getByWhere('promotion', '*', array('user_id' => $id, 'promotion_status != ' => 'Displayed ON Watch Page', 'promotion_status !=' => 'Displayed ON Follows Page'));
            $data['id'] = $id;

            $page = 'admin/ranks';
            AdminView($page, $data, $title);
        }
    }



    ///LoadBroadcastStatistics
    public function LoadBroadcastStatistics()
    {
        $title['title'] = 'Broadcast Rating';
        $id = $this->uri->segment(4);
        $data['records'] = getByWhere('broadcast_rating', '*', array('user_id' => $id));
        $page = 'admin/broadcast';
        AdminView($page, $data, $title);
    }

    ///UpdateBio
    public function UpdateBio()
    {
        if ($this->input->is_ajax_request()) {

            extract($_POST);
            updateByWhere('users', array('bio' => $_POST['bio']), array('id' => $_POST['id']));
            ///Success
            $data = array('code' => 'success', 'message' => 'Record Updated');
            echo json_encode($data);
            die;
        }
    }







    ///UpdateCoins
    public function UpdateCoins()
    {
        if ($this->input->is_ajax_request()) {

            extract($_POST);
            if ($action_type == 'remove') {
                if ($total_coins > $coins) {
                    $coins = $total_coins - $coins;
                    updateByWhere('users', array('coins' => $coins), array('id' => $_POST['id']));
                    ///Success
                    $data = array('code' => 'success', 'message' => 'Coins Have Removed!');
                    echo json_encode($data);
                    die;
                } else {
                    ///credential not correct
                    $data = array('code' => 'warning', 'message' => 'Sorry you are removing more then user coins');
                    echo json_encode($data);
                    die;
                }
            } else {
                $coins = $total_coins + $coins;
                updateByWhere('users', array('coins' => $coins), array('id' => $_POST['id']));
                ///Success
                $data = array('code' => 'success', 'message' => 'Coins Have Added!');
                echo json_encode($data);
                die;
            }
        }
    }
    
    
    
    
    ///deletevideo
    public function DeleteVideo($id)
    {
        if ($this->input->is_ajax_request()) {

            extract($_POST);
                       $check = deleteRecordWhere('video_ads', array('id' => $id));
            if ($check) {

                ///Success
                $data = array('code' => 'success', 'message' => 'Record Has Been Deleted');
                echo json_encode($data);
                die;
            } 
        }
    }
    
    
    

        //AddManualRank
        
        public function SetManuallyRank() 
        {
            if($this->input->is_ajax_request())
            { 
            extract($_POST);
            $current_date=date("Y-m-d");
                 $findData = getByWhere('promotion', '*', array('user_id' => $id, 'ranks' => $ranks));
            if ($findData) {
                  updateByWhere('promotion', array('promotion_status' => $promotion_status ), array('user_id' => $id,'ranks' => $ranks ));
                $data = array('code' => 'success', 'message' => 'Promo updated');
                        echo json_encode($data);
                        die;
            }
            else{
                   $data = array();
                    $data['user_id'] = $id;
                    $data['ranks'] = $ranks;
                    $data['promotion_status'] = $promotion_status;
                    $data['Updated_at'] = $current_date;
                   
                    $create_logs = addNew('promotion', $data);
                    
                    $data = array('code' => 'success', 'message' => 'Promo Activated');
                        echo json_encode($data);
                        die;
            
            }
            }
        }


        //SetRankStatus
        
        public function SetRankStatus() 
        {
            if($this->input->is_ajax_request())
            { 
            extract($_POST);
            
                 updateByWhere('promotion', array('promotion_status' => $promotion_status), array('user_id' => $user_id,'ranks' => $ranks ,'promotion_id' => $promotion_id));
                $data = array('code' => 'success', 'message' => 'Promo updated');
                echo json_encode($data);
              die;
            
          
            }
        }


  ///AllUserUpdateCoins
    public function AllUserUpdateCoins()
    {
        if ($this->input->is_ajax_request()) {

            extract($_POST);
            if ($action_type == 'remove') {
                
                    
                    $sql = "update users SET coins= coins-'".$coins."'";


                    updatecoins($sql);
                    ///Success
                    $data = array('code' => 'success', 'message' => 'Coins Have Removed!');
                    echo json_encode($data);
                    die;
               
            } else {
               $sql = "update users SET coins= coins+'".$coins."'";
                    updatecoins($sql);
                ///Success
                $data = array('code' => 'success', 'message' => 'Coins Have Added!');
                echo json_encode($data);
                die;
            }
        }
    }






    ///logout
    public function logout()
    {
        session_destroy();
        redirect('welcome');
    }
}
