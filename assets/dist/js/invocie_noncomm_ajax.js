$(document).ready(function () {
    var roleId = $('#getSessRollId').val();
    var restrColEstimate = [];
    var hidecolumn = []
    var hidecolprint = []
    if (roleId == 999 || roleId == 1) {
        restrColEstimate = [0, 6, 7, 8];
        hidecolprint = [0, 1, 2, 3, 4, 5, 6, 7];
    } else {
        hidecolumn = [8];
        hidecolprint = [0, 1, 2, 3, 4, 5, 6];

    }
    var dataRecords = $('#invoiceTable').DataTable({
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(),
                data;
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Total over all pages
            total = api
                .column(7)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(7).footer()).html(
                '₹' + pageTotal.toFixed(2)
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
            url: "modules/invoice/noncommercial_ajax_functions.php",
            type: "POST",
            // data: { mode: 'listInvoice' },
            data: function (data) {
                data.mode = 'listInvoice';

                var filterDate = $('#filter_date').val();
                if (filterDate) {
                    data.filter_date = filterDate;
                }
            },
            dataType: "json"
        },
        "dom": 'Blfrtip',
        buttons: [{
            extend: 'print',
            text: '<span class="mdi mdi-file-print"></span> Print',
            title: 'Invoice',
            action: newexportaction1,

            exportOptions: {
                modifier: {
                    search: 'applied',
                    order: 'applied'
                },
                columns: hidecolprint,
            },
            footer: true
        },
        {
            extend: 'excelHtml5',
            text: '<span class="mdi mdi-file-excel"></span> Excel',
            title: 'Invoice',
            action: newexportaction1,
            exportOptions: {
                modifier: {
                    search: 'applied',
                    order: 'applied'
                },
                columns: hidecolprint,
            },
            footer: true
        }],

        "columnDefs": [{
            "targets": [0, 7, 8],
            "orderable": false,
        }, {
            "targets": hidecolumn,
            "visible": false,

        }],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100, "All"]
        ],
        "pageLength": 10,
    });
    /*
        $('.search_key').on('click', function(e) {
            if ($('.searchKeyword').val() != '') {
                dataRecords.search($('.searchKeyword').val()).draw();
            } else {
                dataRecords.search('').columns().search('').draw();
            }
        });*/
    $('#addRecord').click(function () {

        $('#recordModal').modal('show');
        $('#database_AddForm')[0].reset();
        $('.modal-title').html(" Add - Manual Entry");
        $('#action').val('addRecord');
        $('#save').val('Add');
        getMonthListings();
    });
    $("#datatable_LeadTable").on('click', '.update', function () {

        var id = $(this).attr("id");

        var action = 'getRecord';
        $.ajax({
            url: 'modules/manual_entry/ajax_functions.php',
            method: "POST",
            data: { id: id, action: action },
            dataType: "json",
            success: function (data) {
                $('#AddLead-modal').modal('show');
                $('#idform').val(data.id);
                $('#txt_database_lead').val(data.database_lead);
                $('#txt_database_reference').val(data.database_reference);
                $('#txt_postive_replies').val(data.postive_replies);
                $('#txt_monthVal').val(data.mixmonthlevel);

                $('.modal-title').html(" Edit - Manual Entry");
                $('#action').val('updateRecord');
                $('#save').val('Update');
            }
        })
    });
    //  $("#AddLead-modal").on('submit', '#database_AddForm', function(event) {
    $("#database_AddForm").validate({
        rules: {
            txt_database_lead: {
                required: true,

            },
            txt_database_reference: {
                required: true,

            },
            txt_postive_replies: {
                required: true,

            },
            txt_monthVal: {
                required: true,

            }
        },
        /*  messages: {
            name: "Please specify your name",
            email: {
              required: "We need your email address to contact you",
              email: "Your email address must be in the format of name@domain.com"
            }
          },*/
        submitHandler: function (form) {
            $('#save').attr('disabled', 'disabled');
            //var formData = $("#database_AddForm").serialize();
            var level = $('#txt_monthVal').find(":selected").attr('data-level');
            var mixmonthlevel = $('#txt_monthVal').find(":selected").attr('data-mixmonthlevel');
            var formData = $('#database_AddForm').serializeArray();
            formData.push({ name: 'level', value: level })
            formData.push({ name: 'mixmonthlevel', value: mixmonthlevel })
            $.ajax({
                url: "modules/manual_entry/ajax_functions.php",
                method: "POST",
                data: formData,
                success: function (data) {
                    $('#database_AddForm')[0].reset();
                    $('#AddLead-modal').modal('hide');
                    $('#save').attr('disabled', false);
                    var datamsg = $('#save').val();
                    var msgtxt = '';
                    if (datamsg == 'Add') {
                        msgtxt = 'Added';
                    } else if (datamsg == 'Update') {
                        msgtxt = 'Updated';
                    }
                    $.toast({ title: 'Success', content: 'Record ' + msgtxt + ' Successfully !!', type: 'success', delay: 5000 });
                    dataRecords.ajax.reload();
                }
            })

        }
    });
    // event.preventDefault();

    // });
    $("#datatable_LeadTable").on('click', '.delete', function () {
        var id = $(this).attr("id");
        var action = "deleteRecord";

        swal({
            title: "Are you sure?",
            text: "",
            type: "warning",
            confirmButtonText: `Yes`,
            denyButtonText: `No`,
            showDenyButton: true,
            showCancelButton: true,
        })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "modules/manual_entry/ajax_functions.php",
                        method: "POST",
                        data: { id: id, action: action },
                        success: function (data) {
                            swal(
                                'Success',
                                'Record deleted successfully :)',
                                'success'
                            )
                            dataRecords.ajax.reload();
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your stay here :)',
                        'error'
                    )
                }
            })


    });


    $("#datatable_LeadTable").on('click', '.update', function () {

        var mixmonthlevel = $(this).attr('data-mixmonthlevelbtn');
        getMonthListings(mixmonthlevel);
    });



    function newexportaction1(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function (e, settings) {
                // Call the original action function
                if (button[0].className.indexOf('buttons-copy') >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-print') >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                }
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };

    function getMonthListings(mixmonthlevel) {

        var mixmonthlevel = mixmonthlevel;
        $.ajax({
            url: "modules/manual_entry/ajax_functions.php",
            data: { 'action': 'getMonthdata' },
            type: 'post',
            dataType: 'json',
            success: function (response) {
                //$('#txt_monthVal').chosen('destroy');
                $('.txt_monthVal').select2({
                    placeholder: "Select a Month",
                    allowClear: true
                });
                $('.txt_monthVal').html('');
                $('.txt_monthVal').append('<option value="">Select Month</option>');
                var leveldata = '';

                for (var i = 0; i < response.length; i++) {


                    $('.txt_monthVal').append('<option value="' + response[i].year + '-' + response[i].month + '#' + response[i].campaign_level + '" data-mixmonthlevel="' + response[i].year + '-' + response[i].month + '"  data-level="' + response[i].campaign_level + '" >' + response[i].monthname + ' ' + response[i].year + ' #' + response[i].campaign_level + '</option>');
                }
                $('.txt_monthVal').val(mixmonthlevel).trigger("change");



            }
        });
    }

    /* ADDITIONAL PRICE HERE */
});