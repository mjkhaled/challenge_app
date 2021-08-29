<table class="table table-flush table-hover p-0 datatable-component">
    <thead class="thead-light">
    <tr>
        <th>Survey Code</th>
        <th>Survey Name</th>
        <th>Number of Questions</th>
        <th>Questions Description</th>
        <th>Action</th>
    </tr>
    </thead>
    @if(isset($surveys_list) && !empty($surveys_list))
    <tbody>
        @foreach($surveys_list as $surv_code => $surv)
        <tr>
            <td>{{ $surv["info"]["code"] }}</td>
            <td>{{ $surv["info"]["name"] }}</td>
            <td>{{ count($surv["questions"]) }}</td>
            <td>
                <ol>
                    @foreach($surv["questions"] as $ques_name => $ques_values)
                        <li>{{ $ques_name }}</li>
                    @endforeach
                </ol>
            </td>
            <td>
                <a class="btn btn-primary" href="{{ url("survey/view/".$surv_code) }}">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
