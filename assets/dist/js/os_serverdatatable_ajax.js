$(document).ready(function() {

    var dataRecords = $('#OrderStatusTable').DataTable({
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/order_status/ajax_functions.php",
            type: "POST",
            data: { mode: 'OrderStatusTable' },
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 6],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });


});