<?php

namespace App\Libraries;

class SurveyApi
{
    private static $api_base_url = "http://localhost/challenge_app/api/";

    public static function list(){
        $error = false;
        $url = static::$api_base_url . "surveys/list";

        $curl_headers = array(
            "Content-Type: application/json",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,1500);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);

        $response = curl_exec($ch);

        if ($response === false && curl_errno($ch) != 0){
            $error = true;
        }
        curl_close($ch);

        return json_decode($response, true);
    }
}
