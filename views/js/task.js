$(document).ready(function(){
    $('#producttable').DataTable({
        'processing' : true,
        'serverSide' : true,
        'ajax' : {
            'url' : mp_ajax + '?action=ptable',
        }

    });
});
