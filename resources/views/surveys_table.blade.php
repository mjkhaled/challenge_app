<table class="table table-flush table-hover p-0 datatable-component" data-sort-col="0" data-sort-order="desc">
    <thead class="thead-light">
    <tr>
        <th class="th-2">Name</th>
        <th class="th-3 desktop">Code</th>
        <th class="th-4">Country</th>
        <th class="th-5">Currency</th>
        <th class="th-6 desktop">Account Details</th>
        <th class="th-7 hidden">Date</th>
    </tr>
    </thead>
        @if (isset($users))
            @foreach($users as $user)
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            @endforeach
        @else
        <tfoot>
        <tr>
            <td colspan="6">There are no users added yet.</td>
        </tr>
        </tfoot>
    @endif
</table>
