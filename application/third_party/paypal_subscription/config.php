<?php  
// Product information 
$itemName = 'Membership Subscription'; 
$itemNumber = 'MS123456'; 
 
// Subscription price for one month 
$itemPrice = 25.00; 
   
// PayPal configuration  
define('PAYPAL_ID', 'sb-43p7vr6021623@business.example.com');  
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
  
define('PAYPAL_RETURN_URL', 'http://www.example.com/success.php');  
define('PAYPAL_CANCEL_URL', 'http://www.example.com/cancel.php');  
define('PAYPAL_NOTIFY_URL', 'http://www.example.com/paypal_ipn.php');  
define('PAYPAL_CURRENCY', 'USD');  
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '123456');  
define('DB_NAME', 'streambooster');  
  
// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");