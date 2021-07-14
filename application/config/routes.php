<?php
defined('BASEPATH') OR exit('No direct script access allowed');


///dashboard
$route['en/dashboard/welcome']='Dashboard';
$route['en/dashboard/promotion']='Dashboard/PromotionPage';
$route['en/dashboard/watch']='Dashboard/WatchPage';
$route['en/dashboard/watch/(:any)']='Dashboard/WatchSingleUser';
$route['en/dashboard/follows']='Dashboard/FollowPage';
$route['en/dashboard/partner']='Dashboard/PartnerPage';
$route['en/dashboard/settings']='Dashboard/SettingsPage';
$route['en/dashboard/purchase']='Dashboard/PurchasePage';
$route['en/dashboard/purchase/products/(:num)']='Dashboard/PurchaseProducts';
$route['en/dashboard/purchase/paypal/products/(:num)']='Dashboard/PaypalPurchaseProducts';
$route['en/dashboard/purchase/statement/(:num)']='Dashboard/RankTransectionStatement';
$route['en/dashboard/userslevel']='Dashboard/UserLevel';
$route['en/user/logout']='Dashboard/UserLogout';
$route['en/dashboard/watchad/(:num)']='Dashboard/ViewAds';
$route['en/dashboard/getcoins']='Dashboard/AdAction';
//user
$route['en/user/(:any)']='Dashboard/ProfilePage';



///admin
$route['en/admin/login']='Login';
//$route['en/admin/dashboard']='Admin';
$route['en/admin/statistics']='Admin';
$route['en/admin/streamer']='Admin/LoadStreamerTable';
$route['en/admin/videoads']='Admin/VideoAdsPage';
$route['en/admin/setcoins']='Admin/SetCoins';
$route['en/admin/users']='Admin/LoadUsersTable';
$route['en/admin/streamer/(:num)']='Admin/LoadSingleStreamer';
$route['en/admin/ranks/(:num)']='Admin/LoadSingleStreamerRanks';
$route['en/admin/broadcast/(:num)']='Admin/LoadBroadcastStatistics';
$route['logout']='Admin/logout';


////Posts
$route['en/admin/posts']='Posts';


///Theme
$route['en/users-rating']='Welcome/UserRating';
$route['login/user']='Welcome/UserLogin';
$route['user/auth']='Welcome/UserAuth';
$route['en/games']='Welcome/TopGames';
$route['en/ref']='Welcome/ReferencePage';
$route['en/about']='Welcome/AboutUs';
$route['en/news']='Welcome/NewsUpdates';
$route['en/articles']='Welcome/Articles';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



///Partial Functions Routing
$route['UpdateUserLevel']='Partial/UpdateUserLevel';
$route['Donation']='Partial/Donation';
$route['CreateNewFollower']='Partial/CreateNewFollower';
$route['AdminAssignCoins']='Partial/AdminAssignCoins';
$route['DeleteUserPermenent']='Partial/DeleteUserPermenent';
$route['TempararayBanUser']='Partial/TempararayBanUser';
$route['UnblockUser']='Partial/UnblockUser';
$route['PostCoins']='Partial/PostCoins';
$route['WatchPageList']='Partial/WatchPageList';
$route['GetTotalFollowers']='Partial/GetTotalFollowers';
$route['AssignRanksByAdmin']='Partial/AssignRanksByAdmin';
$route['LevelUpdateByAdmin']='Partial/LevelUpdateByAdmin'; 
$route['UpdateCommentStatus']='Partial/UpdateCommentStatus';
$route['SubmitReply']='Partial/SubmitReply';
$route['DeleteComment']='Partial/DeleteComment';
$route['searchUsers']='Partial/searchUsers';
$route['streamRating']='Partial/streamRating';
$route['AutomaticPromoActivation']='Partial/AutomaticPromoActivation';
$route['block/logout']='Partial/UserLogout';


////paypal
$route['products/buy']='products/buy/$1';

