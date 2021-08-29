<?php


namespace App\Http\Controllers;


class Survey extends Controller
{
    private $api_base_url = "http://localhost/challenge_app/api/";
    public function index(){
        $data = array(
            "table_view"=>view("surveys_table")
        );

//        $res = $this->api();
//        var_dump($res);exit;

        return $this->loadTemplate('surveys', $data);
    }

    public function api(){
        $error = false;
        $url = $this->api_base_url . "surveys";

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
        var_dump($response);
        if ($response === false && curl_errno($ch) != 0){
            $error = true;
        }
        curl_close($ch);

        return json_decode($response, true);
    }
}
