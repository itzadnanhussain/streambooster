<?php defined('BASEPATH') or exit('No direct script access allowed');

class Paypal extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();

        // Load paypal library 
        $this->load->library('paypal_lib');

        // Load product model 
        $this->load->model('product');

        // Load payment model 
        $this->load->model('payment');
    }

    function success()
    {

         ///post coins to database 
         if ($_SESSION['paypal_rank_id'] == 1) {

            $check = updateByWhere('users', array('coins' => $_SESSION['user_info']['coins'] + $_SESSION['paypal_rank_coins']), array('id' => $_SESSION['user_info']['id']));
            if ($check) {
                $_SESSION['user_info']['coins'] = $_SESSION['user_info']['coins'] + $_SESSION['paypal_rank_coins'];
                
            }
        } elseif ($_SESSION['paypal_rank_id']== 2) {
            $check = updateByWhere('users', array('promoted_rank' => "Active"), array('id' => $_SESSION['user_info']['id']));
            if ($check) {
                $_SESSION['user_info']['promoted_rank'] = "Active"; 
            }
        } elseif ($_SESSION['paypal_rank_id'] == 3) {
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

        // Get the transaction data 
        $paypalInfo = $this->input->get();

        $productData = $paymentData = array();
        if (!empty($paypalInfo['item_number']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])) {
            $item_name = $paypalInfo['item_name'];
            $item_number = $paypalInfo['item_number'];
            $txn_id = $paypalInfo["tx"];
            $payment_amt = $paypalInfo["amt"];
            $currency_code = $paypalInfo["cc"];
            $status = $paypalInfo["st"];

            // Get product info from the database 
            $productData = $this->product->getRows($item_number);

            // Check if transaction data exists with the same TXN ID 
            $paymentData = $this->payment->getPayment(array('txn_id' => $txn_id));
        }

        // Pass the transaction data to view 
        $data['product'] = $productData;
      //  $data['payment'] = $paymentData;
        $data['payment'] = $paypalInfo;
        $this->load->view('paypal/success', $data);
    }

    function cancel()
    {
        // Load payment failed view 
        $this->load->view('paypal/cancel');
    }

    function ipn()
    {
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post();

        if (!empty($paypalInfo)) {
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid 
            if ($ipnCheck) {
                // Check whether the transaction data is exists 
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"]));
                if (!$prevPayment) {
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"];
                    $data['product_id']    = $paypalInfo["item_number"];
                    $data['txn_id']    = $paypalInfo["txn_id"];
                    $data['payment_gross']    = $paypalInfo["mc_gross"];
                    $data['currency_code']    = $paypalInfo["mc_currency"];
                    $data['payer_name']    = trim($paypalInfo["first_name"] . ' ' . $paypalInfo["last_name"], ' ');
                    $data['payer_email']    = $paypalInfo["payer_email"];
                    $data['status'] = $paypalInfo["payment_status"];

                    $this->payment->insertTransaction($data);
                }
            }
        }
    }
}
