<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('PATH_TO_CERT', APPPATH . 'third_party\twitch-api\curl\cacert.pem');


class Partial extends CI_Controller
{
    ///Donation
    public function Donation()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            if ($donate_coins <= 0) {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'You Have Selected Zero Coins');
                echo json_encode($data);
                die;
            }

            $get = getByWhere('users', '*', array('id' => $user_id));
            if ($get) {
                updateByWhere('users', array('coins' => $get[0]->coins + $donate_coins), array('id' => $user_id));
                updateByWhere('users', array('coins' => $_SESSION['user_info']['coins'] - $donate_coins), array('id' => $_SESSION['user_info']['id']));
                $_SESSION['user_info']['coins'] = $_SESSION['user_info']['coins'] - $donate_coins;
                ///Success
                $string = "You Have Donated " . $donate_coins;
                $data = array('code' => 'success', 'message' => $string);
                echo json_encode($data);
                die;
            }
        }
    }

    ///UpdateUserLevel
    public function UpdateUserLevel()
    {
        if ($this->input->is_ajax_request()) {
          /* $records = getByWhere('users');
            $count = count($records);
            $levels = TotalLevel();
            for ($i = 0; $i < $count; $i++) {
                for ($j = 2; $j <= $levels; $j++) {
                    //level two logic
                    $bonus = 500;
                    if ($records[$i]->watching_coins >= $j * $bonus  && $records[$i]->level == $j - 1) {

                        $total_coins = $records[$i]->coins + (($bonus * $j) - $bonus);
                        updateByWhere('users', array('level' => $j, 'coins' => $total_coins), array('id' => $records[$i]->id));
                        if ($records[$i]->status == 'active') {
                            $_SESSION['user_info']['level'] = $j;
                        }
                        $data = array('code' => 'success', 'message' => 'updated Level');
                        echo json_encode($data);
                        die;
                    }
                }
            }*/


               
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
                updateByWhere('users', array('coins' => $coins ,'level' => $level  , 'watching_coins'=> 0 ), array('id' => $_SESSION['user_info']['id'])); 
            }

            //echo $bouns." ......  ".$coins.".......".$level ;
             if ( $getrecords->status == 'active') {
            $_SESSION['user_info']['level']= $level;
            $_SESSION['user_info']['coins']=$coins;
           
           }
           $data = array('code' => 'success', 'message' => 'updated Level');
           echo json_encode($data);
           die;



        }
    }



    ///AdminAssignCoins
    public function AdminAssignCoins()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('coins', 'COINS', 'required');
            if ($this->form_validation->run()) {
                extract($_POST);
                $getCoins = getByWhere('users', '*', array('id' => $id));
                if ($getCoins) {
                    $total_coins = $getCoins[0]->coins + $coins;
                    $check = updateByWhere('users', array('coins' => $total_coins), array('id' => $id));
                    if ($check) {
                        ///Success
                        $data = array('code' => 'success', 'message' => 'Coins Has Been Added');
                        echo json_encode($data);
                        die;
                    }
                } else {
                    ///credential not correct
                    $data = array('code' => 'warning', 'message' => 'Record Not Found!');
                    echo json_encode($data);
                    die;
                }
            } else {
                ///validation errors
                $error_array = array();
                foreach ($_POST as $key => $value) {
                    if (form_error($key)) {
                        $error_array[] = array($key, form_error($key, null, null));
                    }
                }
                $data = array('code' => 'error', 'message' => $error_array);
                echo json_encode($data);
                die;
            }
        }
    }


    ///DeleteUserPermenent
    public function DeleteUserPermenent()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $check = deleteRecordWhere('users', array('id' => $id));
            if ($check) {

                ///Success
                $data = array('code' => 'success', 'message' => 'Record Has Been Deleted');
                echo json_encode($data);
                die;
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Somthing Wrong!');
                echo json_encode($data);
                die;
            }
        }
    }


    ///TempararayBanUser
    public function TempararayBanUser()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $check = updateByWhere('users', array('status' => 'banned'), array('id' => $id));
            if ($check) {


                ///Success
                $data = array('code' => 'success', 'message' => 'Record Has Been Deleted');
                echo json_encode($data);
                die;
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Somthing Wrong!');
                echo json_encode($data);
                die;
            }
        }
    }


    ///UnblockUser
    public function UnblockUser()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $check = updateByWhere('users', array('status' => 'inactive'), array('id' => $id));
            if ($check) {


                ///Success
                $data = array('code' => 'success', 'message' => 'Record Has Been Deleted');
                echo json_encode($data);
                die;
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Somthing Wrong!');
                echo json_encode($data);
                die;
            }
        }
    }

    ////PostCoins
    public function PostCoins()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $check = getByWhere('users', '*', array('id' => $_SESSION['user_info']['id']));
            if ($check) {
                $total_coins = $check[0]->coins + $coins;
                $total_watching = $check[0]->watching_coins + $coins;
                $update = updateByWhere('users', array('coins' => $total_coins, 'watching_coins' => $total_watching), array('id' => $_SESSION['user_info']['id']));

                if ($update) {

                    ///Success
                    $string = 'You Have Earned ' . $coins;
                    $_SESSION['user_info']['coins'] = $total_coins;
                    $_SESSION['user_info']['watching_coins'] = $total_watching;
                    $data = array('code' => 'success', 'message' => $string);
                    echo json_encode($data);
                    die;
                }
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Somthing Wroing');
                echo json_encode($data);
                die;
            }
        }
    }


    ////AssignRanksByAdmin
    public function AssignRanksByAdmin()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $data['user_id'] = $id;
            $data['ranks'] = $ranks;
            $data['promotion_status'] = $promotion_status;
            if ($ranks == "Virtual Coins") {
                $data['assign_coins'] = $assign_coins;
            }
            $where = array('user_id' => $id, 'ranks' => $ranks);
            $check = getByWhere('promotion', '*', $where);
            if (empty($check)) {
                $add = addNew('promotion', $data);
                if ($add) {
                    ///Success
                    $data = array('code' => 'success', 'message' => 'Assign Ranks');
                    echo json_encode($data);
                    die;
                }
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Record Already Exists!');
                echo json_encode($data);
                die;
            }
        }
    }


    ////WatchPageList
    public function WatchPageList()
    {

        if ($this->input->is_ajax_request()) {
            extract($_POST);


            $records = array();
            if ($check == 1) {
                ////Joins
                $tableSelect = "tb1.*, tb2.*";
                $tableInfo = "promotion tb1, users tb2-tb2.id=tb1.user_id-left";
                $records = getByWhere($tableInfo, $tableSelect, array('status' => 'active', 'user_id !=' => $_SESSION['user_info']['id'], 'ranks' => 'Displayed ON Watch Page'), array('invested_coins', 'DESC'));
            }

            if ($check == 0) {
                $records = getByWhere('users', '*', array('username' => $username));
            }

            if ($records) {
                ///Success
                $data = array('code' => 'success', 'records' => $records);
                echo json_encode($data);
                die;
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Record Not Found!');
                echo json_encode($data);
                die;
            }
        }
    }


    ///LevelUpdateByAdmin
    public function LevelUpdateByAdmin()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            
             $getrecords = array();
        $getrecords = getByWhere('users', '*', array('id' => $id));
        $coins = $getrecords[0]->coins;
        $bouns=500;
           // $count = TotalLevel();
            //for ($i = 1; $i <= $count; $i++) {
              //  if ($i == $level) {
              $bouns=500*intval($level-1);
                      
                $coins = $coins + $bouns;
                
                $update =  updateByWhere('users', array('coins' => $coins ,'level' => $level  , 'watching_coins'=> 0 ), array('id' => $id)); 
        
                    if ($update) {
                        ///Success
                        $data = array('code' => 'success', 'message' => "level change done" );
                        echo json_encode($data);
                        die;
                    //}
                //}
            }
        }
    }


    ////UpdateCommentStatus
    public function UpdateCommentStatus()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $check = getByWhere('comments', '*', array('comment_id' => $id, 'status' => $status));
            if ($check) {
                if ($status == "Pending") {
                    $update = updateByWhere('comments', array('status' => 'Active'), array('comment_id' => $id));
                }

                if ($status == "Active") {
                    $update = updateByWhere('comments', array('status' => 'Pending'), array('comment_id' => $id));
                }

                if ($update) {
                    ///Success
                    $data = array('code' => 'success', 'message' => 'Status Has Been Updated');
                    echo json_encode($data);
                    die;
                }
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Record Not Found!');
                echo json_encode($data);
                die;
            }
        }
    }


    ///GetTotalFollowers
    public function GetTotalFollowers()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $users = getByWhere($table);
            $count = count($users);

            for ($i = 0; $i < $count; $i++) {
                $data = array();
                $data = $this->callApiForGetTotalFollowers($users[$i]->twitch_user_id, $users[$i]->twitch_access_token);
                updateByWhere('users', array('followers' => $data->total), array('id' => $users[$i]->id));
            }

            ///Success
            $data = array('code' => 'success', 'message' => 'Followers count Update');
            echo json_encode($data);
            die;
        }
    }


    ////SubmitReply
    public function SubmitReply()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);

            if (isset($admin_reply_) && !empty($admin_reply_)) {
                $data['comment_id'] = $comment_id;
                $data['reply'] = "Reply By " . $admin_reply_ . ': ' . $reply;
                $data['reply_by'] = $admin_reply_;
            }

            if (isset($user_reply) &&  !empty($user_reply)) {
                $data['comment_id'] = $comment_id;
                $data['reply'] = "Reply By " . $user_reply . ': ' . $reply;
                $data['reply_by'] = $user_reply;
            }




            $add = addNew('reply', $data);
            if ($add) {
                ///Success
                $data = array('code' => 'success', 'message' => 'comment has been posted');
                echo json_encode($data);
                die;
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Something issue');
                echo json_encode($data);
                die;
            }
        }
    }


    ///CreatNewFollower
    public function CreateNewFollower()
    {
        if ($this->input->is_ajax_request()) {

            extract($_POST);




            // $to_id="173366421";
            $check = $this->CheckFollowingStatus($to_id);


            if ($check->total == 0) {

                $response = $this->CallApiToCreateFollower($to_id);
                if ($response == 1) {
                    ///coins exchange
                    if ($requestPage == 'follow') {
                        ////Joins
                        $tableSelect = "tb1.*, tb2.*";
                        $tableInfo = "promotion tb1, users tb2-tb2.id=tb1.user_id-left";
                        $streamer = getByWhere($tableInfo, $tableSelect, array('status' => 'active', 'user_id' => $to_id, 'ranks' => 'Displayed ON Follows Page'));
                        $updateCoinsUser = updateByWhere('users', array('coins' => $_SESSION['user_info']['coins'] + $streamer[0]->invested_coins), array('id' => $_SESSION['user_info']['id']));
                        if ($updateCoinsUser) {
                            $updateCoinsStreamer = updateByWhere('users', array('coins' => $streamer[0]->coins - $streamer[0]->invested_coins), array('id' => $to_id));
                            if ($updateCoinsStreamer) {
                                $streamer = getByWhere($tableInfo, $tableSelect, array('status' => 'active', 'user_id' => $to_id, 'ranks' => 'Displayed ON Follows Page'));
                                if ($streamer[0]->invested_coins > $streamer[0]->coins) {
                                    deleteRecordWhere('promotion', array('promotion_id' => $streamer[0]->promotion_id));
                                }
                            }
                        }
                    }
                    ///Success
                    $data = array('code' => 'success', 'message' => ' Now You Are Following!');
                    echo json_encode($data);
                    die;
                }

                if ($response == 0) {

                    ///Success
                    $data = array('code' => 'success', 'message' => 'Something Wrong--');
                    echo json_encode($data);
                    die;
                }
            }

            if ($check->total == 1) {


                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'You already followed this streamer');
                echo json_encode($data);
                die;
            }
        }
    }


    ///UserLogout
    public function UserLogout()
    {
        session_destroy();
        redirect('welcome');
    }



    ///
    public function callApiForGetTotalFollowers($to_id, $token)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitch.tv/helix/users/follows?to_id=' . $to_id . '',
            //CURLOPT_URL => 'https://api.twitch.tv/helix/users/follows?from_id=618295746&to_id=173366421',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Client-Id: us3vpywudnrnfpyri061w26qe0q8oq',
                'Authorization: Bearer ' . $token . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);
        return $data;
    }

    ///CheckFollowingStatus
    public function CheckFollowingStatus($to_id)
    {
        // $to_id='173366421';
        // $from_id='405493872';
        $from_id = $_SESSION['user_info']['twitch_user_id'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            //  CURLOPT_URL => 'https://api.twitch.tv/helix/users/follows?to_id=' . $to_id . '',
            CURLOPT_URL => 'https://api.twitch.tv/helix/users/follows?from_id=' . $from_id . '&to_id=' . $to_id . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Client-Id: us3vpywudnrnfpyri061w26qe0q8oq',
                'Authorization: Bearer ' . $_SESSION['user_info']['twitch_access_token'] . ''
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response);
        return $data;
    }


    ///CallApiToCreateFollower
    public function CallApiToCreateFollower($to_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitch.tv/helix/users/follows',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'from_id=' . $_SESSION['user_info']['twitch_user_id'] . '&to_id=' . $to_id . '',
            CURLOPT_HTTPHEADER => array(
                'Client-Id: us3vpywudnrnfpyri061w26qe0q8oq',
                'Authorization: Bearer ' . $_SESSION['user_info']['twitch_access_token'] . '',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $data = curl_exec($curl);

        if (empty($data) or (curl_getinfo($curl, CURLINFO_HTTP_CODE == 404))) {

            // some kind of an error happened
            die(curl_error($curl));
            curl_close($curl);
            $data = 0;
            return $data;
        } else {
            // everything  is ok
            $data = 1;
            return $data;
        }
    }


    ////searchUsers
    public function searchUsers()
    {
        if ($this->input->is_ajax_request()) {
            $value = $_GET['term'];
            $getUser = getByWhere('users', '*', array(), array(), null, null, array('username' => $value));
            if (isset($getUser) && !empty($getUser)) {
                $userList = array();
                foreach ($getUser as $user) {
                    $userList[] = $user->username;
                }
                echo json_encode($userList);
                die;
            }
        }
    }

    ///DeleteComment
    public function DeleteComment()
    {
        extract($_POST);
        $check = deleteRecordWhere('comments', array('comment_id' => $id));
        if ($check) {
            deleteRecordWhere('reply', array('comment_id' => $id));
            ///Success
            $data = array('code' => 'success', 'message' => 'Comment Has Been Deleted');
            echo json_encode($data);
            die;
        } else {
            ///credential not correct
            $data = array('code' => 'warning', 'message' => 'Record Not Found!');
            echo json_encode($data);
            die;
        }
    }

     ///DeleteByAjax
     public function DeleteByAjax()
     {
         extract($_POST);
         $check = deleteRecordWhere($table, array($field => $value));
         if ($check == 1) {
             ///Success
             $data = array('code' => 'success');
             echo json_encode($data);
             die;
         } else {
             ///credential not correct
             $data = array('code' => 'warning');
             echo json_encode($data);
             die;
         }
     }

    ////streamRating
    public function streamRating()
    {
        extract($_POST);
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        die;
    }

    ///AutomaticPromoActivation
    public function AutomaticPromoActivation()
    {
        if ($this->input->is_ajax_request()) {

            extract($_POST);
           // $data['promo_name']=$ranks;
            $data['reactivation']=$reactivation;
            

            updateByWhere('promo',$data,array('user_id'=>$_SESSION['user_info']['id'],'promo_name'=>$ranks));
            ///Success
            $data=array('code'=>'success','message'=>'Record Updated');
            echo json_encode($data);
            die;
            // [ranks] => Displayed ON Watch Page
            // [reativation] => active


        }
    }





    
public function ThemeChange()
{
    if ($this->input->is_ajax_request()) {
        extract($_POST);
       
        if($theme_mode=="dark"){
            $cookie= array(
                'name'   => 'theme',
                'value'  => $theme_mode,
                'expire' =>  time() + (86400 * 30),
            );
           $this->input->set_cookie($cookie);
        }
        else {
            if(!empty( $this->input->cookie('theme',true))){
            delete_cookie('theme'); } 
        }
        die;

    }
}



// ranking on watch page 
public function Ranking($id,$num,$val)
{
    if ($this->input->is_ajax_request()) {

        $user_exist = getByWhere('broadcast_rating', '*', array('user_id' => $id));

        if (isset($user_exist ) && empty($user_exist )) {
            $data['user_id'] = $id;
            $data[$val] = $num;
            $add = addNew('broadcast_rating', $data);
            $data=array('code'=>'success','message'=>'new');
        }

        else{
            updateByWhere('broadcast_rating', array($val=> $num ), array('user_id' => $id));  $data=array('code'=>'success','message'=>'update');
        }

      // print_r(json_encode($user_exist));
        echo json_encode($data);
        die;

    }
}



}
