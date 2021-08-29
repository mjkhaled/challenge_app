<?php


namespace App\Http\Controllers;

use App\Libraries\SurveyApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Survey extends Controller
{
    public function index(){
        $list = SurveyApi::list();
        $data = array(
            "table_view"=>view("surveys_table", ["surveys_list"=>$list])
        );

        return $this->loadTemplate('surveys', $data);
    }

}
