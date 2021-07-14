<?php
defined('BASEPATH') or exit('No direct script access allowed');

/////GetActiveStreams On Twitch
if (!function_exists('GetActiveStreams')) {
   function GetActiveStreams($id,$access_token)
   // function GetActiveStreams($id,$access_token)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitch.tv/helix/streams?user_id='.$id.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Client-Id: us3vpywudnrnfpyri061w26qe0q8oq',
                'Authorization: Bearer '.$access_token.''
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response);
        return $data;
    }
}
