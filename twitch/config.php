<?php 

// define db creds
define('DB_HOST', 'localhost'); // database host
define('DB_NAME', 'streambooster'); // database name
define('DB_USER', 'root'); // database username
define('DB_PASS', '123456'); // database password


 
// path to cert
//https://curl.haxx.se/docs/caextract.html
define( 'PATH_TO_CERT', FCPATH.'twitch\curl\cacert.pem' );
//define( 'PATH_TO_CERT', 'http://localhost/streambooster/third_party/twitch-api/curl/cacert.pem' );
//define( 'PATH_TO_CERT', 'E:\xampp\htdocs\secret\cacert.pem' );
 

///for live server
// define('TWITCH_CLIENT_ID', 'us3vpywudnrnfpyri061w26qe0q8oq');
// define('TWITCH_CLIENT_SECRET', 'eur8vpobe3boevzz27je218q66sfyh');
// define('TWITCH_REDIRECT_URI', 'https://instantscrapcarremoval.com/streamviewer/user/auth');


///for local server
define('TWITCH_CLIENT_ID', 'db5n07nl7eer89zellv3chtbihdc3p');
define('TWITCH_CLIENT_SECRET', 'aop6gwe195usjyksau54vb06v1q84k');
define('TWITCH_REDIRECT_URI', 'http://localhost/webmark/streambooster/user/auth');





// path to cert
//https://curl.haxx.se/docs/caextract.html
//define( 'PATH_TO_CERT', 'E:\xampp\htdocs\secret\cacert.pem' );
 
