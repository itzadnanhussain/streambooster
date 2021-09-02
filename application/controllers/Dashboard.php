<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login/user');
        }

        $this->load->library('stripe_lib');
        $this->load->model('product');
    }

    ///*********************************table names**************************///
    // $promotion_table="promotion";
    // $logs_table="activity_logs";


    ///Welcome View
    public function index()
    {

        $title = 'Dashboard';
        $page = "welcome";
        if ($_SESSION['reactivation_promo'] == true) {
            PromoReactivationProcess();
            $_SESSION['reactivation_promo'] == false;
        }

        $data = array();
        $data['level_box'] = 'active';
        ThemeView($page, $data, $title);
    }

    public function ViewAds()
    {

        $title = 'Dashboard';
        $page = "dashboard/watchads";
        $data = array();
        $data['records'] = getByWhere('video_ads');
        ThemeView($page, $data, $title);
    }
    public function AdAction()
    {


        $getrecords = getByWhere('users', '*', array('id' => $_SESSION['user_info']['id']));
        $coins = $getrecords[0]->coins;
        $coins = $coins + 100;
        updateByWhere('users', array('coins' => $coins), array('id' => $_SESSION['user_info']['id']));
        $_SESSION['user_info']['coins'] = $coins;
        $this->PurchasePage();
    }
    ///LoadPromotionPage
    public function PromotionPage()
    {
        if ($this->input->is_ajax_request()) {

            extract($_POST);
            // [ranks] => Displayed ON Watch Page
            // [invested_coins] => 50
            // [reativation] => active

            $promotion_table = "promo";
            $logs_table = "activity_logs";
            $data['user_id'] = $_SESSION['user_info']['id'];

            ///ranks Displayed ON Watch Page
            if ($ranks == "Displayed ON Watch Page") {

                $stream = GetActiveStreams($_SESSION['user_info']['twitch_user_id'], $_SESSION['user_info']['twitch_access_token']);
                //  $stream = GetActiveStreams( '207813352', $_SESSION['user_info']['twitch_access_token']);

                if (isset($stream) && !empty($stream)) {
                    $active_streamers = $stream->data;
                    if (isset($active_streamers) && !empty($active_streamers)) {
                        if ($active_streamers[0]->user_name == $_SESSION['user_info']['username'] && $active_streamers[0]->type == 'live') {
                            //check coins
                            if ($_SESSION['user_info']['coins'] >= 0 && $invested_coins <= $_SESSION['user_info']['coins']) {
                                $total_coins = $_SESSION['user_info']['coins'] - $invested_coins;
                            } else {
                                ///credential not correct
                                $data = array('code' => 'warning', 'message' => 'Sorry You Have Enaugh Coins');
                                echo json_encode($data);
                                die;
                            }
                        } else {
                            ///credential not correct
                            $data = array('code' => 'warning', 'message' => 'Sorry You Are Not Live On Twitch');
                            echo json_encode($data);
                            die;
                        }
                    } else {
                        ///credential not correct
                        $data = array('code' => 'warning', 'message' => 'Sorry You Are Not Live On Twitch');
                        echo json_encode($data);
                        die;
                    }
                }
            }

            ///generate random key 
            $data['promo_name'] = $ranks;
            $data['coins'] = $invested_coins;
            $data['status'] = 'active';



            $findData = getByWhere($promotion_table, '*', array('user_id' => $_SESSION['user_info']['id'], 'promo_name' => $ranks, 'status' => 'active',));
            if ($findData) {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Promo Already Active');
                echo json_encode($data);
                die;
            } else {
                ///Post data to database 
                $check = addNew($promotion_table, $data);
                if ($check) {
                    ///update session coins 
                    if ($ranks == "Displayed ON Watch Page") {
                        updateByWhere('users', array('coins' => $total_coins), array('id' => $_SESSION['user_info']['id']));
                        $_SESSION['user_info']['coins'] = $total_coins;
                    }
                    ///make activity
                    $data = array();
                    $data['user_id'] = $_SESSION['user_info']['id'];
                    $data['username'] = $_SESSION['user_info']['username'];
                    $data['twitch_id'] = $_SESSION['user_info']['twitch_user_id'];
                    $data['discription'] = 'Invest ' . $invested_coins . ' coins For ' . $ranks;

                    $create_logs = addNew($logs_table, $data);
                    if ($create_logs) {
                        ///Success
                        $data = array('code' => 'success', 'message' => 'Promo Activated');
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
        } else {

            $title = 'Promotion Page';
            $page = "dashboard/promotion";
            $data = array();
            $findData = getByWhere('promo', '*', array('user_id' => $_SESSION['user_info']['id']));

            if (isset($findData) && !empty($findData)) {
                for ($i = 0; $i < count($findData); $i++) {

                    if ($findData[$i]->promo_name == 'Displayed ON Follows Page') {
                        $_SESSION['promo_for_follows_page'] = 'active';
                        $_SESSION['coins_for_follows_page'] = $findData[$i]->coins;
                    }

                    if ($findData[$i]->promo_name == 'Displayed ON Watch Page') {
                        $_SESSION['promo_for_watch_page'] = 'active';
                        $_SESSION['coins_for_watch_page'] = $findData[$i]->coins;
                    }
                }
            } else {
                $_SESSION['no_promo'] = 'active';
            }
            $data['level_box'] = 'active';
            ThemeView($page, $data, $title);
        }
    }

    ///WatchPage
    public function WatchPage()
    {
        $title = 'Watch Page';
        $page = "dashboard/watch";
        $tableSelect = "tb1.*, tb2.*";
        $tableInfo = "promotion tb1, users tb2-tb2.id=tb1.user_id-left";
        $records = getByWhere($tableInfo, $tableSelect, array('status' => 'active', 'user_id !=' => $_SESSION['user_info']['id'], 'ranks' => 'Displayed ON Watch Page'), array('invested_coins', 'DESC'));

        if (isset($records) && !empty($records)) {
            // $access_token = getByWhere('users', '*', array('twitch_user_id' => '618295746'));
            // $access_token = $access_token[0]->twitch_access_token;
            $j = 0;
            for ($i = 0; $i < count($records); $i++) {
                $stream = array();
                $stream = GetActiveStreams($records[$i]->twitch_user_id, $records[$i]->twitch_access_token);


                //  $stream = GetActiveStreams('190835892', $access_token);
                if (isset($stream->data) && !empty($stream->data)) {
                    $active_streamers = $stream->data;
                    if (isset($active_streamers) && !empty($active_streamers)) {

                        ///here you can update streamer data
                        $records[$i]->view_count = $active_streamers[0]->viewer_count;
                    }
                } else {
                    ///here you can update streamer data
                    // deleteRecordWhere('promotion',array('promotion_id'=>$records[$i]->promotion_id)); 
                    // continue;
                }

                ///define stream type
                if ($j < 3) {
                    $records[$i]->stream_type = 'golden';
                } else {
                    $records[$i]->stream_type = 'silver';
                }
                $j++;
            }
            $ranks = getByWhere('broadcast_rating', '*', array('user_id' => $records[0]->id));
            if (isset($ranks) && !empty($ranks)) {
                $data['ranks'] = $ranks;
            }


            $data['records'] = $records;
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // die;
        } else {
            $data['records'] = array();
        }



        ThemeView($page, $data, $title);
    }


    ////WatchSingleUser
    public function WatchSingleUser()
    {
        $title = 'Watch Single Page';
        $page = "dashboard/watchsingle";
        $username = $this->uri->segment(4);
        $tableSelect = "tb1.*, tb2.*";
        $tableInfo = "promotion tb1, users tb2-tb2.id=tb1.user_id-left";
        $streamers = getByWhere($tableInfo, $tableSelect, array('status' => 'active', 'user_id !=' => $_SESSION['user_info']['id'], 'ranks' => 'Displayed ON Watch Page'), array('invested_coins', 'DESC'));
        $data['records'] = array();
        if (isset($streamers) && !empty($streamers)) {
            // $access_token = getByWhere('users', '*', array('twitch_user_id' => '618295746'));
            // $access_token = $access_token[0]->twitch_access_token;
            $j = 0;
            for ($i = 0; $i < count($streamers); $i++) {
                $stream = array();

                $stream = GetActiveStreams($streamers[$i]->twitch_user_id, $streamers[$i]->twitch_access_token);


                //  $stream = GetActiveStreams('190835892', $access_token);
                if (isset($stream->data) && !empty($stream->data)) {
                    $active_streamers = $stream->data;
                    if (isset($active_streamers) && !empty($active_streamers)) {

                        ///here you can update streamer data
                        $streamers[$i]->view_count = $active_streamers[0]->viewer_count;
                    }
                } else {
                    ///here you can update streamer data
                    // deleteRecordWhere('promotion',array('promotion_id'=>$records[$i]->promotion_id)); 
                    // continue;
                }

                ///define stream type
                if ($j < 3) {
                    $streamers[$i]->stream_type = 'golden';
                } else {
                    $streamers[$i]->stream_type = 'silver';
                }
                $j++;


                ////pass streamers to records
                if ($streamers[$i]->username == $username) {
                    $data['records'] = $streamers[$i];
                }
            }
        }
        ThemeView($page, $data, $title);
    }

    ///FollowPage
    public function FollowPage()
    {
        ////Joins
        $tableSelect = "tb1.*, tb2.*";
        $tableInfo = "promotion tb1, users tb2-tb2.id=tb1.user_id-left";
        $data['records'] = getByWhere($tableInfo, $tableSelect, array('status' => 'active', 'user_id !=' => $_SESSION['user_info']['id'], 'ranks' => 'Displayed ON Follows Page'));

        $title = 'Follows Page';
        $page = "dashboard/follows";
        $data['level_box'] = 'active';
        ThemeView($page, $data, $title);
    }


    ///PartnerPage
    public function PartnerPage()
    {
        $title = 'Partner Page';
        $page = "dashboard/partner";
        $data = array();
        $data['level_box'] = 'active';
        ThemeView($page, $data, $title);
    }


    ///SettingsPage
    public function SettingsPage()
    {
        if ($this->input->post()) {
            extract($_POST);
            $this->form_validation->set_rules('bio', 'BIO', 'required');
            if (str_word_count($bio) == 1 && strlen($bio) >= 20) {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'You are Uisng Wrong Format');
                echo json_encode($data);
                die;
            }
            if ($this->form_validation->run()) {
                $check = updateByWhere('users', array('bio' => $bio), array('id' => $_SESSION['user_info']['id']));
                if ($check) {
                    $_SESSION['user_info']['bio'] = $bio;
                    ///Success
                    $data = array('code' => 'success', 'message' => 'Record Has Been Updated');
                    echo json_encode($data);
                    die;
                } else {
                    ///credential not correct
                    $data = array('code' => 'warning', 'message' => 'Something Wrong');
                    echo json_encode($data);
                    die;
                }
            }
        } else {
            $title = 'Settings Page';
            $page = "dashboard/setting";
            $data = array();
            $data['userList'] = getByWhere('users', '*', array('id !=' => $_SESSION['user_info']['id']));
            $data['level_box'] = 'active';
            ThemeView($page, $data, $title);
        }
    }


    ///PurchasePage
    public function PurchasePage()
    {
        $title = 'Purchase Page';
        $page = "dashboard/purchase";
        $data = array();
        $data['level_box'] = 'active';
        ThemeView($page, $data, $title);
    }


    ///PurchaseProducts
    public function PurchaseProducts()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);

            // Get product data from the database
            $product = $this->product->getRows($rank_id);


            // Retrieve stripe token, card and user info from the submitted form data
            $postData = $this->input->post();
            $postData = array_merge($postData, $product);

            // Make payment

            $paymentID = $this->payment($postData);
            // If payment successful
            if ($paymentID) {

                ///post coins to database 
                if ($rank_id == 1) {
                    $check = updateByWhere('users', array('coins' => $_SESSION['user_info']['coins'] + $get_coins), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['coins'] = $_SESSION['user_info']['coins'] + $get_coins;
                        ///Success
                        $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                        echo json_encode($data);
                        die;
                    }
                } elseif ($rank_id == 2) {
                    $check = updateByWhere('users', array('promoted_rank' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['promoted_rank'] = "Active";
                        ///Success
                        $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                        echo json_encode($data);
                        die;
                    }
                } elseif ($rank_id == 3) {
                    $check = updateByWhere('users', array('double_coins' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['double_coins'] = "Active";
                        ///Success
                        $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                        echo json_encode($data);
                        die;
                    }
                } elseif ($rank_id == 4) {
                    $check = updateByWhere('users', array('afk_varification' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['afk_varification'] = "Active";
                        ///Success
                        $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                        echo json_encode($data);
                        die;
                    }
                } else {
                    ///Success
                    $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                    echo json_encode($data);
                    die;
                }
            } else {

                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Record Not Found!');
                echo json_encode($data);
                die;
                //     $apiError = !empty($this->stripe_lib->api_error) ? ' (' . $this->stripe_lib->api_error . ')' : '';
                //     $data['error_msg'] = 'Transaction has been failed!' . $apiError;
                // }
            }
        } else {

            //$this->load->library('stripe_lib');
            $title = 'Purchase Products Page';
            $page = "dashboard/getProducts";
            $data['ranks'] = getByWhere('ranks', '*', array('id' => $this->uri->segment(5)));
            $data['rank_status'] = getByWhere('subscriptions','*',array('rank_id'=> $this->uri->segment(5) , 'user_id' => $_SESSION['user_info']['id'],'subscription_buy' => 'stripe'));
            
            ThemeView($page, $data, $title);
        }
    }


    ///PaypalPurchaseProducts
    public function PaypalPurchaseProducts()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            die;

            // Get product data from the database
            $product = $this->product->getRows($rank_id);



            // Retrieve stripe token, card and user info from the submitted form data
            $postData = $this->input->post();
            $postData = array_merge($postData, $product);

            // Make payment

            $paymentID = $this->payment($postData);
            // If payment successful
            if ($paymentID) {

                ///post coins to database 
                if ($rank_id == 1) {
                    $check = updateByWhere('users', array('coins' => $_SESSION['user_info']['coins'] + $get_coins), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['coins'] = $_SESSION['user_info']['coins'] + $get_coins;
                        ///Success
                        $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                        echo json_encode($data);
                        die;
                    }
                } elseif ($rank_id == 2) {
                    $check = updateByWhere('users', array('promoted_rank' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['promoted_rank'] = "Active";
                        ///Success
                        $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                        echo json_encode($data);
                        die;
                    }
                } elseif ($rank_id == 3) {
                    $check = updateByWhere('users', array('double_coins' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['double_coins'] = "Active";
                        ///Success
                        $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                        echo json_encode($data);
                        die;
                    }
                } elseif ($rank_id == 4) {
                    $check = updateByWhere('users', array('afk_varification' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['afk_varification'] = "Active";
                        ///Success
                        $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                        echo json_encode($data);
                        die;
                    }
                } else {
                    ///Success
                    $data = array('code' => 'success', 'id' => $paymentID, 'message' => 'You Have Order Done');
                    echo json_encode($data);
                    die;
                }
            } else {

                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Record Not Found!');
                echo json_encode($data);
                die;
                //     $apiError = !empty($this->stripe_lib->api_error) ? ' (' . $this->stripe_lib->api_error . ')' : '';
                //     $data['error_msg'] = 'Transaction has been failed!' . $apiError;
                // }
            }
        } else {
 

            //$this->load->library('stripe_lib');
            $title = 'Purchase Products Page';
            $page = "dashboard/paypalProducts";
            $data['ranks'] = getByWhere('ranks', '*', array('id' => $this->uri->segment(6)));
            $data['rank_status'] = getByWhere('subscriptions','*',array('rank_id'=> $this->uri->segment(6) , 'subscription_buy' => 'paypal', 'user_id' => $_SESSION['user_info']['id']));
            
            ThemeView($page, $data, $title);
        }
    }


    ///RankTransectionStatement
    public function RankTransectionStatement()
    {
        $id = $this->uri->segment(5); 
        $title = 'Payment Status Page';
        $page = "dashboard/paymentstatus";
        $data['ranks'] = getByWhere('ranks');
        $data['records'] = getByWhere('orders', '*', array('id' => $id));
        ThemeView($page, $data, $title);
    }


    ///ProfilePage
    public function ProfilePage()
    {
        if ($this->input->is_ajax_request()) {
            extract($_POST);
            $data['comment_to'] = $comment_to;
            $data['comment'] = "User Comment: " . $comment;
            $data['user_id'] = $_SESSION['user_info']['id'];
            $data['username'] = $_SESSION['user_info']['username'];

            $check = getByWhere('comments', '*', array('user_id' => $data['user_id'], 'comment_to' => $comment_to, 'status' => 'Pending'));
            if (empty($check)) {
                $add = addNew('comments', $data);
                if ($add) {
                    ///Success
                    $data = array('code' => 'success', 'message' => 'Your Suggestion is Posted To Admin Done');
                    echo json_encode($data);
                    die;
                }
            } else {
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Your Are Sending Comment Very Fast');
                echo json_encode($data);
                die;
            }
        } else {
            $title = 'Profile Page';
            $page = "dashboard/profile";
            $username = $this->uri->segment(3);

            $data['records'] = getByWhere('users', '*', array('username' => $username));


            // $tableSelect = "tb1.*, tb2.*";
            // $tableInfo = "comments tb1, reply tb2-tb2.comment_id=tb1.comment_id-left";
            // $data['comments'] = getByWhere($tableInfo, $tableSelect, array('status' => 'active','comment_to'=>$data['records'][0]->id));

            $data['comments'] = getByWhere('comments', '*', array('comment_to' => $data['records'][0]->id, 'status' => 'active'));
            if (isset($data['comments']) && !empty($data['comments'])) {
                $data['count'] = count($data['comments']);
            }
            $data['level_box'] = 'active';
            ThemeView($page, $data, $title);
        }
    }

    ////stripe payment
    function payment($postData)
    {


        // If post data is not empty
        if (!empty($postData)) {


            // Retrieve stripe token, card and user info from the submitted form data
            $token  = $postData['stripeToken'];
            $email = $_SESSION['user_info']['email'];
            $user_id = $postData['user_id'];
            $card_number = $postData['card_number'];
            $card_number = preg_replace('/\s+/', '', $card_number);
            $card_exp_month = $postData['card_exp_month'];
            ///get coins
            if ($postData['rank_id'] == 1) {
                $get_coins = $postData['get_coins'];
                $ranks_status = "Completed";
            } else {
                $get_coins = 'NULL';
                $ranks_status = "Active";
            }
            $card_exp_year = $postData['card_exp_year'];
            $card_cvc = $postData['card_cvc'];

            // Unique order ID
            $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
            // Add customer to stripe
            $customer = $this->stripe_lib->addCustomer($email, $token);



            if ($customer) {

                // Charge a credit or a debit card
                $charge = $this->stripe_lib->createCharge($customer->id, $postData['name'], $postData['paid_amount'], $orderID);


                if ($charge) {
                    // Check whether the charge is successful
                    if ($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1) {
                        // Transaction details 
                        $transactionID = $charge['balance_transaction'];
                        $paidAmount = $charge['amount'];
                        $paidAmount = ($paidAmount / 100);
                        $paidCurrency = $charge['currency'];
                        $payment_status = $charge['status'];


                        // Insert tansaction data into the database
                        $orderData = array(
                            'rank_id' => $postData['rank_id'],
                            'user_id' => $user_id,
                            'card_number' => $card_number,
                            'card_exp_month' => $card_exp_month,
                            'card_exp_year' => $card_exp_year,
                            'paid_amount' => $paidAmount,
                            'paid_amount_currency' => $paidCurrency,
                            'txn_id' => $transactionID,
                            'get_coins' => $get_coins,
                            'rank_status' => $ranks_status,
                            'payment_status' => $payment_status
                        );

                        $orderID = $this->product->insertOrder($orderData);



                        // If the order is successful
                        if ($payment_status == 'succeeded') {
                            return $orderID;
                        }
                    }
                }
            }
        }
        return false;
    }


    ///Users Levels
    public function UserLevel()
    {

        $title = 'Profile Page';
        $page = "dashboard/user_level";
        $data['level_box'] = 'active';
        ThemeView($page, $data, $title);
    }


    ///UserLogout
    public function UserLogout()
    {

        deleteRecordWhere('promo', array('promo_name' => 'Displayed ON Watch Page', 'reactivation' => 'inactive', 'user_id' => $_SESSION['user_info']['id']));
        deleteRecordWhere('promo', array('promo_name' => 'Displayed ON Follows Page', 'reactivation' => 'inactive', 'user_id' => $_SESSION['user_info']['id']));
        updateByWhere('promo', array('status' => 'inactive'), array('user_id' => $_SESSION['user_info']['id']));
        $check = updateByWhere('users', array('status' => 'inactive'), array('id' => $_SESSION['user_info']['id']));
        if ($check) {
            session_destroy();
            redirect('welcome');
        }
    }
}
