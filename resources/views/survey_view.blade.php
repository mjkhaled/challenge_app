<div class="container-fluid">
    <div class="card m-5">
        <a class="btn btn-info" style="width:130px; margin:20px" href="{{ url("/") }}">All Surveys</a>
        <div class="card-body">
            <h1>Survey Name: {{ $survey["info"]["name"] }}</h1>
            <h2>Survey Code: {{ $survey["info"]["code"] }}</h2>
            <hr/>
            <h2>Questions</h2>
            <ol>
                @foreach($survey["questions"] as $survey_ques)
                    <li>
                        <h3>Ques: {{ $survey_ques["label"] }}</h3>
                        <h4>Type: {{ $survey_ques["type"] }}</h4>
                        <p>Result</p>
                        @php $result = \App\Helper::getSurveyQuesResult($survey_ques["type"], $survey_ques["opt_ans"]); @endphp
                        @isset($result[$survey_ques["type"]])
                            @if(is_array($result[$survey_ques["type"]]))
                                @foreach($result[$survey_ques["type"]] as $res_key => $res_val)
                                    <p>{{ $res_key ." => ". $res_val }}</p>
                                @endforeach
                            @else
                                <p>{{ number_format($result[$survey_ques["type"]]) }}</p>
                            @endif
                        @endisset
                    </li>
                @endforeach
            </ol>
        </div>

    </div>
</div>
