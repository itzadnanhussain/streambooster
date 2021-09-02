<?php defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();

        // Load paypal library 
        $this->load->library('paypal_lib');

        // Load product model 
        $this->load->model('product');
    }

    function index()
    {
        $data = array();

        // Get products from the database 
        $data['products'] = $this->product->getRows();

        // Pass product data to the view 
        $this->load->view('products/index', $data);
    }

    function buy($id)
    {

        extract($_POST);
       


        ///form data
        $_SESSION['paypal_rank_name'];
        $_SESSION['paypal_rank_price'];
        $_SESSION['paypal_rank_id'] = $id;
        if (isset($vr_coins)) {
            $_SESSION['paypal_rank_coins'] =  $vr_coins;
        }

        // echo '<pre>';
        // print_r($_SESSION['paypal_rank_price']);
        // echo '</pre>';
        // die;

        // Set variables for paypal form 
        $returnURL = base_url() . 'paypal/success'; //payment success url 
        $cancelURL = base_url() . 'paypal/cancel'; //payment cancel url 
        $notifyURL = base_url() . 'paypal/ipn'; //ipn url 



        // Add fields to paypal form 
        // $this->paypal_lib->add_field('cmd', $cmd);

        if (isset($subscription) && ($subscription == 'on')) {
            if (isset($vr_coins)) {
                $_SESSION['paypal_rank_coins'] = ($vr_coins + ($vr_coins / 10));
            }





            $_SESSION['payment_type'] = 'subscription';
            $_SESSION['month_limit'] = $p3;
            $this->paypal_lib->add_field('cmd', '_xclick-subscriptions');
            $this->paypal_lib->add_field('a3', $a3);
            $this->paypal_lib->add_field('p3', $p3);
            $this->paypal_lib->add_field('t3', $t3);

            ///check if already subscription 
            $postData = array();
            $postData['user_id'] = $_SESSION['user_info']['id'];
            $postData['rank_id'] = $_SESSION['paypal_rank_id'];
            $postData['subscription_limit'] = $_SESSION['month_limit'];
            $postData['subscription_buy'] = 'paypal';
            $postData['subscription_status'] = 'active'; 
            $check_subscription = getByWhere('subscriptions', '*', $postData);
            if ($check_subscription) {
                redirect($back_url);
            }

        } else { 
            
            $_SESSION['payment_type'] = 'one_time';
            $this->paypal_lib->add_field('cmd', '_xclick');
            $this->paypal_lib->add_field('amount',  $_SESSION['paypal_rank_price']);
        }

        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $_SESSION['paypal_rank_name']);
        $this->paypal_lib->add_field('custom', $_SESSION['user_info']['id']);
        $this->paypal_lib->add_field('item_number',  $id); 

        // Render paypal form 
        $this->paypal_lib->paypal_auto_form();

    }
}
