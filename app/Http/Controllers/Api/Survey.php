<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;

class Survey extends Controller
{
    public function list(){
        try {
            $list = $this->getFileContents();
            return $this->prepareStructuredList($list);

        }catch (\Exception $e){
            return  [];
        }
    }

    private function prepareStructuredList($list){
        $structured_list = [];
        foreach($list as $l){
            if(isset($l['survey']['code'])){
                //Check if code is set in the array
                $code = $l['survey']['code'];
                if(!isset($structured_list[$code])){
                    $structured_list [$code]["info"] = array(
                        "code"=>$l['survey']['code'],
                        "name"=>$l['survey']['name']
                    );
                }

                //Loop on questions
                foreach($l["questions"] as $ques){
                    //$structured_list [$code]["questions"][$ques['label']][] = $ques;
                    if(!isset($structured_list [$code]["questions"][$ques['label']])){
                        $structured_list [$code]["questions"][$ques['label']] = array("type"=>"qcm", "label"=>$ques['label']);
                    }
                    $structured_list [$code]["questions"][$ques['label']]["opt_ans"][] = $ques;
                }

            }
        }
        return $structured_list;
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
