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

    function buy($id){ 
        
        ///form data
        $_SESSION['paypal_rank_name'];
        $_SESSION['paypal_rank_price']; 
        $_SESSION['paypal_rank_id'] = $id; 
        // echo '<pre>';
        // print_r($_SESSION['paypal_rank_price']);
        // echo '</pre>';
        // die;

        // Set variables for paypal form 
        $returnURL = base_url().'paypal/success'; //payment success url 
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url 
        $notifyURL = base_url().'paypal/ipn'; //ipn url 
         
       
         
        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', $_SESSION['paypal_rank_name']); 
        $this->paypal_lib->add_field('custom', $_SESSION['user_info']['id']); 
        $this->paypal_lib->add_field('item_number',  $id); 
        $this->paypal_lib->add_field('amount',  $_SESSION['paypal_rank_price']); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
    } 
}
