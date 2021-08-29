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

    public static function getSurveyQuesResult($ques_type, $option_answers){
        $numeric_result = 0;
        $qcm_result = [];
        foreach($option_answers as $opt_ans){
            if($ques_type == "qcm"){
                foreach($opt_ans["options"] as $opt_key => $opt_val){
                    if(!isset($qcm_result [$opt_val])){
                        $qcm_result [$opt_val] = $opt_ans["answer"][$opt_key];
                    }else{
                        $qcm_result [$opt_val] += $opt_ans["answer"][$opt_key];
                    }
                }
            }else if($ques_type == "numeric"){
                $numeric_result += $opt_ans["answer"];
            }
        }
        return array("qcm"=>$qcm_result, "numeric"=>$numeric_result);
    }

}
