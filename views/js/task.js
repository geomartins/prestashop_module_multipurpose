$(document).ready(function(){
    $('#producttable').dataTable({
        'processing' : true,
        'serverSide' : true,
        'iDisplayLength': 5,
        "bLengthChange": false,
        "bFilter": false,
        'ajax' : {
            'url' : mp_ajax + '?action=ptable',
            'type': 'POST',
        },
        "column": [
            {"data": "id_product"},
            {"data": "name"},
            {"data": "price"},
        ]

    });
});
