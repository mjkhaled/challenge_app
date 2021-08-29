<?php


namespace App\Http\Controllers;


class Survey extends Controller
{
    public function index(){
        $data = array(
            "table_view"=>view("surveys_table")
        );

        return $this->loadTemplate('surveys', $data);
    }

}
