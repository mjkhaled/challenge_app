<?php


namespace App\Http\Controllers;

use App\Libraries\SurveyApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Survey extends Controller
{
    public function index(){
        $list = file_get_contents(resource_path('views/surveys_data/list.json'));
        var_dump($list);
        exit;
        $list = SurveyApi::list();
        $data = array(
            "table_view"=>view("surveys_table", ["surveys_list"=>$list])
        );

        return $this->loadTemplate('surveys', $data);
    }

    public function view($id){
        $survey = SurveyApi::view($id);
        //echo "<pre>";print_r($survey);exit;
        if(empty($survey)){
            abort(404);
        }
        $data = array(
            "survey"=>$survey
        );

        return $this->loadTemplate('survey_view', $data);
    }

}
