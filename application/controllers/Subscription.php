<?php
defined('BASEPATH') or
    exit('No direct script access allowed');
/**
 * Version: 1.0.0
 *
 * Description of Subscriptions Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *
 **/

// Subscriptions class
class Subscription extends CI_Controller
{
    //Load libraries in Constructor.
    public function __construct()
    {
        parent::__construct();
        $this->load->library('stripe');
    }

    // public function index() {
    //     $data['metaDescription'] = 'Stripe Manage Subscription Payment using Codeigniter';
    //     $data['metaKeywords'] = 'Stripe Manage Subscription Payment using Codeigniter';
    //     $data['title'] = "Stripe Manage Subscription Payment using Codeigniter - TechArise";
    //     $data['breadcrumbs'] = array('Stripe Manage Subscription Payment using Codeigniter' => '#');
    //     $this->load->view('subscription/index', $data);
    // }


    // create subscription
    public function create()
    {

        extract($_POST);



        ///check subscription
        $subscription_id = $this->check_subscription($rank_id, $user_id);
        if ($subscription_id != false) {

            $path = "https://api.stripe.com/v1/subscriptions/".$subscription_id;
            $this->curl_del($path);   
            
        }  

        ///create new subscription 
        \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

        $token  = $this->input->post('stripeToken');
        $email  = $this->input->post('stripeEmail');



        $time = time();
        $plan = \Stripe\Plan::create(array(
            "product" => [
                "name" => $plan,
                "type" => "service"
            ],
            "nickname" => $plan,
            "interval" => $interval,
            "interval_count" => $interval_count,
            "currency" => $currency,
            "amount" => ($price),
        ));

        $customer = \Stripe\Customer::create([
            'email' => $email,
            'source'  => $token,
        ]);

        $subscription = \Stripe\Subscription::create(array(
            "customer" => $customer->id,
            "items" => array(
                array(
                    "plan" => $plan->id,
                ),
            ),
        ));

        ///check all subscription details
        // echo '<pre>';
        // print_r($subscription);
        // echo '</pre>';
        // die;


        if ($subscription->status == 'active') {

            $postData = array();
            $postData['subscription_id'] = $subscription->id;
            $postData['user_id'] = $user_id;
            $postData['rank_id'] = $rank_id;
            $postData['subscription_limit'] = $interval_count;
            $postData['subscription_status'] = 'active';
            $postData['subscription_buy'] = 'stripe';
            $check_subscription = getByWhere('subscriptions', '*', array('rank_id' => $postData['rank_id'], 'user_id' => $user_id));
            if ($check_subscription) {
                $last_id = updateByWhere('subscriptions', $postData, array('rank_id' => $postData['rank_id'], 'user_id' => $user_id));
            } else {
                $last_id = addNew('subscriptions', $postData);
            }

            if ($last_id) {
                if ($rank_id == 1) {
                    $total_coins = ($interval_count * 500);
                    $total_coins = ($total_coins + ($total_coins / 10));
                    // echo '<pre>';
                    // print_r($total_coins);
                    // echo '</pre>';
                    // die;
                    ///update user coins and other data from user table
                    $update_user = updateByWhere('users', array('coins' => $_SESSION['user_info']['coins'] + $total_coins), array('id' => $_SESSION['user_info']['id']));
                    if ($update_user) {
                        $_SESSION['user_info']['coins'] = $_SESSION['user_info']['coins'] + $total_coins;
                    }
                } elseif ($rank_id == 2) {
                    $check = updateByWhere('users', array('promoted_rank' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['promoted_rank'] = "Active";
                    }
                } elseif ($rank_id == 3) {
                    $check = updateByWhere('users', array('double_coins' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['double_coins'] = "Active";
                    }
                } else {
                    $check = updateByWhere('users', array('afk_varification' => "Active"), array('id' => $_SESSION['user_info']['id']));
                    if ($check) {
                        $_SESSION['user_info']['afk_varification'] = "Active";
                    }
                }
            }
        }

        $data['price'] = $price;
        $this->session->set_flashdata('price', $price);
        redirect($url);
    }


    ///check_subscription
    function check_subscription($rank_id = null, $user_id = null)
    {
        $check = getByWhere('subscriptions', '*', array('rank_id' => $rank_id, 'user_id' => $user_id,'subscription_buy'=>'stripe'));
        if ($check) {
            return  $check[0]->subscription_id;
        } else {
            return false;
        }
    }


    function curl_del($path)
    {
        // Add your key
        $headers = array('Authorization: Bearer ' . STRIPE_SECRET_KEY . '');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $httpCode;
    }
}
