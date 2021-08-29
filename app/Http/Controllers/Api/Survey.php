<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;

class Survey extends Controller
{
    public function list(){
        try {
            $list = $this->getFileContents();
            return $list;
        }catch (\Exception $e){
            return  [];
        }
    }
    
    private function getFileContents(){
        try {
            $list = file_get_contents('surveys_data/list.json');
            if(!empty($list)){
               return json_decode($list, true);
            }
            return  [];
        }catch (\Exception $e){
            return  [];
        }
    }
}
