$(document).ready(function() {


    var dataRecords = $('#estimatecomminprogressTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            total1 = api
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal1 = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(5).footer()).html(
                '₹' + pageTotal1.toFixed(2)
            );
            total2 = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal2 = api
                .column(6, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html(
                '₹' + pageTotal2.toFixed(2)
            );
            total3 = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal3 = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(7).footer()).html(
                '₹' + pageTotal3.toFixed(2)
            );
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/reports/ajax_functions.php",
            type: "POST",
            data: { mode: 'listEstimateComminprogress', 'searchVal': getQueryVariable('ser') },
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 8, 9, 10],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
    var dataRecords = $('#estimatecommcompleteTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            pageTotal1 = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(5).footer()).html(
                '₹' + pageTotal1.toFixed(2)
            );
            total2 = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal2 = api
                .column(6, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html(
                '₹' + pageTotal2.toFixed(2)
            );
            total3 = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal3 = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(7).footer()).html(
                '₹' + pageTotal3.toFixed(2)
            );
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/reports/ajax_functions.php",
            type: "POST",
            data: { mode: 'listEstimateCommcomplete', 'searchVal': getQueryVariable('ser') },
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 8, 9, 10],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
    var dataRecords = $('#estimatenoninprogressTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            pageTotal1 = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(5).footer()).html(
                '₹' + pageTotal1.toFixed(2)
            );
            total2 = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal2 = api
                .column(6, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html(
                '₹' + pageTotal2.toFixed(2)
            );
            total3 = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal3 = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(7).footer()).html(
                '₹' + pageTotal3.toFixed(2)
            );
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/reports/ajax_functions.php",
            type: "POST",
            data: { mode: 'listEstimateNoninprogress', 'searchVal': getQueryVariable('ser') },
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 8, 9, 10],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
    var dataRecords = $('#estimatenoncompleteTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            total1 = api
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal1 = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(5).footer()).html(
                '₹' + pageTotal1.toFixed(2)
            );
            total2 = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal2 = api
                .column(6, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(6).footer()).html(
                '₹' + pageTotal2.toFixed(2)
            );
            total3 = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal3 = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(7).footer()).html(
                '₹' + pageTotal3.toFixed(2)
            );
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/reports/ajax_functions.php",
            type: "POST",
            data: { mode: 'listEstimateNoncomplete', 'searchVal': getQueryVariable('ser') },
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 8, 9, 10],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
    var dataRecords = $('#invoicecommcompleteTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            total = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


            // Total over this page
            pageTotal = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(7).footer()).html(
                '₹' + pageTotal.toFixed(2) + ' ( ₹' + total.toFixed(2) + ' total)'

            );
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/reports/ajax_functions.php",
            type: "POST",
            data: { mode: 'listInvoiceCommcomplete', 'searchVal': getQueryVariable('ser') },
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 6, 7, 8],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
    var dataRecords = $('#invoicenoncompleteTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // Total over all pages
            total = api
                .column(7)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(7).footer()).html(
                '₹' + pageTotal.toFixed(2) + ' ( ₹' + total.toFixed(2) + ' total)'
            );
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/reports/ajax_functions.php",
            type: "POST",
            data: { mode: 'listInvoiceNoncomplete', 'searchVal': getQueryVariable('ser') },
            dataType: "json"
        },
        "columnDefs": [{
            "targets": [0, 6, 7, 8],
            "orderable": false,
        }, ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });





    //get id from URL 
    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
    }


});