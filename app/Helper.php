<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Helper{
    public static function getFingerPrint(){
        $server_request = request()->server();
        $browser_info = array(
            "IP_ADDRESS"=>static::getIpAddress(),
            "HTTP_USER_AGENT"=>$server_request["HTTP_USER_AGENT"],
            "HTTP_ACCEPT"=>$server_request["HTTP_ACCEPT"],
            "REQUEST_TIME"=>$server_request["REQUEST_TIME"],
            "REQUEST_TIME_FLOAT"=>$server_request["REQUEST_TIME_FLOAT"]
        );
        return json_encode($browser_info);
    }

    public static function getIpAddress(){
        $server_request = request()->server();
        $ip = (isset($server_request['HTTP_CLIENT_IP']) ? $server_request['HTTP_CLIENT_IP'] : isset($server_request['HTTP_X_FORWARDED_FOR'])) ? $server_request['HTTP_X_FORWARDED_FOR'] : $server_request['REMOTE_ADDR'];
        if($ip == '::1') $ip = '127.0.0.1';
        return $ip;
    }

}
