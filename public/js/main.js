jQuery(document).ready(function() {
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});

    /*-- BEING USED--*/
    if ($("table.datatable-component").length > 0) {
        $("table.datatable-component").DataTable();
    }
});
