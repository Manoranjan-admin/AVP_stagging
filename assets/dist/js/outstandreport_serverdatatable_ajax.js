var toDate, fromDate;

// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        var toD = toDate.val();
        var fromD = fromDate.val();
        var date = new Date(data[4]);

        if (
            (toD === null && fromD === null) ||
            (toD === null && date <= fromD) ||
            (toD <= date && fromD === null) ||
            (toD <= date && date <= fromD)
        ) {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {

    var dataRecords = $('#customerpaidreportTable').DataTable({
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/outstanding_report/ajax_functions.php",
            type: "POST",
            //  data: { mode: 'filterlistSalesOrder' },
            data: function(d) {
                d.mode = 'filterCustomerCreditOrder';
                d.statusfilter = $('#customer-filter').find(":selected").val();

            },
            dataType: "json"
        },

        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
	
	var dataRecords = $('#singlecustomerpaidreportTable').DataTable({
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/outstanding_report/ajax_functions.php",
            type: "POST",
            //  data: { mode: 'filterlistSalesOrder' },
            data: function(d) {
                d.mode = 'singlecustomerreport';
                d.statusfilter = $('#customer-filter').find(":selected").val();
				d.customer_id = $('#custid').val();

            },
            dataType: "json"
        },

        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
	
	var dataRecords = $('#singlecustomerpaidreportTable_by_number').DataTable({
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/outstanding_report/ajax_functions.php",
            type: "POST",
            //  data: { mode: 'filterlistSalesOrder' },
            data: function(d) {
                d.mode = 'singlecustomerreport_by_id';
                d.statusfilter = $('#customer-filter').find(":selected").val();
				d.customer_id = $('#custid').val();

            },
            dataType: "json"
        },

        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });





    // Refilter the table
    $('#toDate, #fromDate').on('change', function() {
        dataRecords.draw();
    });
    $('#customer-filter').on('change', function() {
        dataRecords.draw();
    });
    $('#txt_sc_no').on('change', function() {
        var scId = $(this).val();
        if (scId) {
            getSCValues(scId);
        }
    });
    $('#clearDates').on('click', function() {
        dates.attr('value', '');
        dates.datepicker("option", {
            minDate: null,
            maxDate: null
        });
    });




});