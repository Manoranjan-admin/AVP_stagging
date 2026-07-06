$(document).ready(function() {
    var roleId = $('#getSessRollId').val();
    var restrColEstimate = [];
    var hidecolumn = []
    if (roleId == 999 || roleId == 1) {
        restrColEstimate = [0, 6, 7, 8];
    } else {
        hidecolumn = [6];
    }
    var dataRecords = $('#salesOrderTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var roleId = $('#getSessRollId').val();

            //   if (roleId == 999 || roleId == 1) {
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
                '₹' + pageTotal.toFixed(2)
            );
            // }
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/sales/ajax_functions_commercial.php",
            type: "POST",
            data: { mode: 'listEstimateComm' },
            dataType: "json"
        },

        "columnDefs": [{
            "targets": [0, 8, 9, 10],
            "orderable": false,
        }, { 'targets': [5, 6, 7], 'className': 'dt-body-right', }],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
    var dataRecords = $('#salesOrdercompleteTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var roleId = $('#getSessRollId').val();

            //  if (roleId == 999 || roleId == 1) {
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
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(5).footer()).html(
                '₹' + pageTotal.toFixed(2)
            );
            //  }
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/sales/ajax_functions_commercial.php",
            type: "POST",
            data: { mode: 'listEstimateCommcomplete' },
            dataType: "json"
        },
        "columnDefs": [{
                "targets": [0, 6, 7, 8],
                "orderable": false,
            },
            {
                "targets": hidecolumn,
                "visible": false
            }, { 'targets': 5, 'className': 'dt-body-right', }
        ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
    var dataRecords = $('#salesOrderpaidcompleteTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var roleId = $('#getSessRollId').val();

            //  if (roleId == 999 || roleId == 1) {
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
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(5).footer()).html(
                '₹' + pageTotal.toFixed(2)
            );
            //  }
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/sales/ajax_functions_commercial.php",
            type: "POST",
            data: { mode: 'listEstimateCommPaidcomplete' },
            dataType: "json"
        },
        "columnDefs": [{
                "targets": [0, 6, 7, 8],
                "orderable": false,
            },
            {
                "targets": hidecolumn,
                "visible": false
            }, { 'targets': 5, 'className': 'dt-body-right', }
        ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });
    var dataRecordsT_O_P = $('#salesOrdertypesofpaymentTable').DataTable({
        "footerCallback": function(row, data, start, end, display) {
            var roleId = $('#getSessRollId').val();

            //  if (roleId == 999 || roleId == 1) {
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
                .column(5)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            console.log(total);


            // Total over this page
            pageTotal = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer

            $(api.column(5).footer()).html(
                '₹' + pageTotal.toFixed(2)
            );
            //  }
        },
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/sales/ajax_functions_commercial.php",
            type: "POST",
            data: function(d) {
                d.mode = 'listEstimateCommT_O_P';
                d.types_of_payment = $('#txt_T_O_P ').val();
            },
            dataType: "json"
        },
        "columnDefs": [{
                "targets": [0, 6, 7, 8],
                "orderable": false,
            },
            {
                "targets": hidecolumn,
                "visible": false
            }, { 'targets': 5, 'className': 'dt-body-right', }
        ],

        'lengthMenu': [
            [10, 50, 100, -1],
            [10, 50, 100]
        ],
        "pageLength": 10,
    });


    $('#txt_T_O_P').select2();
    $('#report_reset').on('click', function() {

        $('#txt_T_O_P').find("option:selected").prop("selected", false)

        $('#txt_T_O_P').trigger('change');

    });
    $('#txt_T_O_P').on('change', function() {
        dataRecordsT_O_P.draw();
    });
    var dataRecords = $('#salesOrdercancelTable').DataTable({
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/sales/ajax_functions.php",
            type: "POST",
            data: { mode: 'listSalesOrderCancel' },
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

    $('#addRecord').click(function() {

        $('#recordModal').modal('show');
        $('#database_AddForm')[0].reset();
        $('.modal-title').html(" Add - Manual Entry");
        $('#action').val('addRecord');
        $('#save').val('Add');
        getMonthListings();
    });
    $("#datatable_LeadTable").on('click', '.update', function() {

        var id = $(this).attr("id");

        var action = 'getRecord';
        $.ajax({
            url: 'modules/manual_entry/ajax_functions.php',
            method: "POST",
            data: { id: id, action: action },
            dataType: "json",
            success: function(data) {
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
        submitHandler: function(form) {
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
                success: function(data) {
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
    $("#salesOrderTable").on('click', '.btnCancel', function() {
        var id = $(this).attr("data-id");
        var sono = $(this).attr("data-sono");
        //var sonos.innerHTML = '<b>'+sono+'</b>';
        // content.innerHTML = 'Hello <strong>'+ name +'</strong>';

        var action = "cancelCommRecord";

        swal({
                title: "Are you sure?",
                text: 'Cancel this order : ' + sono,
                type: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],

                showDenyButton: true,
                showCancelButton: true,
            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "modules/sales/ajax_functions_commercial.php",
                        method: "POST",
                        data: { id: id, mode: action },
                        success: function(data) {
                            swal(
                                'Success',
                                'Record Cancelled successfully :)',
                                'success'
                            )
                            dataRecords.ajax.reload();
                        }
                    });
                } else {
                    swal(
                        'Cancelled',
                        'Your stay here :)',
                        'error'
                    )
                }
            })


    });
    $("#datatable_LeadTable").on('click', '.delete', function() {
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
                        success: function(data) {
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


    $("#datatable_LeadTable").on('click', '.update', function() {

        var mixmonthlevel = $(this).attr('data-mixmonthlevelbtn');
        getMonthListings(mixmonthlevel);
    });


    function getMonthListings(mixmonthlevel) {

        var mixmonthlevel = mixmonthlevel;
        $.ajax({
            url: "modules/manual_entry/ajax_functions.php",
            data: { 'action': 'getMonthdata' },
            type: 'post',
            dataType: 'json',
            success: function(response) {
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

    $('#txt_sc_no').on('change', function() {
        var scId = $(this).val();
        if (scId) {
            getSCValues(scId);
        }
    });

    function getSCValues(scid) {
        var cusId = $('#txt_customer_name').val();
        $.ajax({
            url: "modules/invoice/ajax_functions.php",
            data: { 'scid': scid, 'mode': 'getSOValues' },
            type: 'post',
            dataType: 'json',
            beforeSend: function() { $("#cover").css("display", "block"); },
            success: function(response) {
                console.log(response);
                var list = new Array();
                var uom = new Array();
                var regex = /(<([^>]+)>)/ig;
                var vz = 0;
                var pz = 0;
                var gno = new Array();

                $('table .itemclone').html('');
                $('table .poitemclone').html('');
                $('#txt_sc_no option').prop('selected', false);
                if (response[0].length > 0) {
                    var sc_id = [];


                    //setTimeout(function() {
                    $("#txt_shipment_from").val(response[2].fk_shipment_from_id).trigger("chosen:updated");
                    $("#txt_shipment_to").val(response[2].fk_shipment_to_id).trigger("chosen:updated");
                    //	}, 500);
                    var soIDarr = [];
                    for (j = 0; j < response[0].length; j++) {
                        $('.interst').hide();
                        $('.intrast').hide();


                        if (response[0][j].sop_CGST_percentage != 0 || response[0][j].sop_SGST_percentage != 0) {
                            $("input.txt_intstate[value=1]").prop("checked", true);
                            $('.interst').show();
                            $('.interst').find('input').prop("disabled", false);
                            $('.intrast').find('input').prop("disabled", true);
                            $('.intersthid').prop("disabled", false);
                            $('.intrasthid').prop("disabled", true);
                        } else {
                            $("input.txt_intstate[value=2]").prop("checked", true);
                            $('.intrast').show();
                            $('.intrast').find('input').prop("disabled", false);
                            $('.interst').find('input').prop("disabled", true);
                            $('.intrasthid').prop("disabled", false);
                            $('.intersthid').prop("disabled", true);
                        }
                        var AHTML = '';
                        $('#txt_fright').val(parseFloat(response[0][j].sc_freight).toFixed(2));
                        $('#txt_insurance').val(parseFloat(response[0][j].sc_insurance).toFixed(2));
                        vz++;
                        gno.push(response[0][j].so_reference_no);


                        AHTML += '<tr>';
                        AHTML += '<td class="firsttr">';
                        AHTML += '<button type="button" name="removeitems" id="removeitems" class="removeitems"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                        AHTML += '</td>';
                        AHTML += '<td>';
                        AHTML += '<input type="hidden" class="form-control txt_product_name txt_product_name_' + vz + '" name="txt_product_name[]" id="txt_product_name" title="Model Number" value="' + response[0][j].pk_finishprod_id + '">' + response[0][j].fp_name_final.toUpperCase() + '';
                        AHTML += '<input type="hidden" value="' + response[0][j].pk_so_id + '" name="txt_sc_nos[]" id="txt_sc_no" class="txt_sc_no txt_sc_no_' + vz + '"><input type="hidden" class="txt_scp_id txt_scp_id_' + vz + '" name="txt_scp_id[]" id="txt_scp_id" value="' + response[0][j].pk_sop_product_id + '">';

                        AHTML += '<input type="hidden" value="' + response[0][j].sonoId + '" name="txt_sc_noID[]" id="txt_sc_noID" class="txt_sc_noID txt_sc_noID_' + vz + '"><input type="hidden" class="txt_soId txt_soId' + vz + '" name="txt_soId[]" id="txt_soId" value="' + response[0][j].soId + '">';

                        AHTML += '<input type="hidden" value="' + response[0][j].customer_po_date + '" name="txt_cpo_date[]" id="txt_cpo_date_' + vz + '" class="txt_cpo_date txt_cpo_date_' + vz + '"><input type="hidden" class="txt_cponumber txt_cponumber' + vz + '" name="txt_cponumber[]" id="txt_cponumber_' + vz + '" value="' + response[0][j].customer_po_number + '">';


                        AHTML += '<label class="label label-sm label-mint">' + response[0][j].sonoId.split("#") + '</label>';
                        AHTML += '</td>';
                        AHTML += '<td>';
                        AHTML += '<input class="form-control numbersOnly pricefield txt_product_qty txt_product_qty_' + vz + '" id="txt_product_qty" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value="' + response[0][j].ReceivedQty + '" min="1" max="' + response[0][j].ReceivedQty + '">';

                        AHTML += '</td>';
                        AHTML += '<td>';
                        AHTML += '<input type="hidden" class="form-control txt_grade txt_grade_' + vz + '" name="txt_grade[]" id="txt_grade" title="Grade" value="' + response[0][j].pk_grade_id + '">' + response[0][j].grade_specification + '';
                        AHTML += '</td>';
                        AHTML += '<td>';
                        AHTML += '<input type="hidden" class="form-control txt_uom txt_uom_' + vz + '" name="txt_uom[]" id="txt_uom" title="Unit" value="' + response[0][j].fk_uom_id + '">' + response[0][j].uom_name + '';
                        AHTML += '</td>';

                        AHTML += '<td>';
                        AHTML += '<input type="text" name="txt_price[]" id="txt_price" class="form-control pricefield numberss txt_price txt_price_' + vz + ' text-right" title="Price" value="' + parseFloat(response[0][j].sop_unit_price).toFixed(2) + '">';
                        AHTML += '</td><td>';

                        AHTML += '<input type="text" class="form-control txt_product_remarks txt_product_remarks_' + vz + '" id="txt_product_remarks_' + vz + '" name="txt_product_remarks[]"  placeholder="Remarks" title="Remarks" value="" ">';

                        AHTML += '</td>';


                        AHTML += '<td><input type="text" name="txt_total[]" id="txt_total" class="form-control txt_total_' + vz + ' txt_total numberss text-right" title="Total" readonly value="' + parseFloat(response[0][j].final_qty * response[0][j].sop_unit_price).toFixed(2) + '"></td>';

                        AHTML += '</tr>';
                        if (j == 0) {
                            $('#cgst_final').val(response[0][0].sop_CGST_percentage);
                            $('#sgst_final').val(response[0][0].sop_SGST_percentage);
                            $('#igst_final').val(response[0][0].sop_IGST_percentage);


                        }
                        if (response[0][0].sop_TCS_percentage != "" || response[0][0].sop_TCS_amount != "") {
                            $('#tcs_per').val(response[0][0].sop_TCS_percentage);
                            $("#tcs_final").val(response[0][0].sop_TCS_amount);
                        }



                        $("#txt_cgst_amt_final").val(response[0][0].sop_CGST_amount);
                        $("#txt_sgst_amt_final").val(response[0][0].sop_SGST_amount);
                        $("#txt_igst_amt_final").val(response[0][0].sop_IGST_amount);


                        $('table .itemclone').append(AHTML);
                        if (jQuery.inArray(response[0][j].fk_so_id, sc_id) !== -1) {} else {
                            sc_id.push(response[0][j].fk_so_id);

                        }
                        if (jQuery.inArray(response[0][j].fk_so_id, scid) !== -1) {


                            var soID = response[0][j].soId.split('#');



                            for (var k = 0; k < soID.length; k++) {
                                $('#txt_sc_no option[value=' + soID[k] + ']').prop('selected', true);
                            }
                        }
                        validatefunctions();
                    }


                    gno = $.unique(gno);
                    gno = gno.join("/ ");
                    $('#txt_ref').val(gno);

                    /* ADDITIONAL PRICE HERE */

                    /* PO DETAILS HERE */
                    for (p = 0; p < response[2].length; p++) {
                        if (jQuery.inArray(response[2][p].fk_so_id, sc_id) !== -1) {
                            pz++;
                            $('table .poitemclone').append('<tr><td><input type="hidden" name="txt_po_id[]" id="txt_po_id" class="txt_po_id txt_po_id_' + pz + '" value="' + response[2][p].po_number + '">' + response[2][p].po_number + '</td><td><input type="hidden" name="txt_po_date[]" id="txt_po_date" class="txt_po_date txt_po_date_' + pz + '" value="' + moment(response[2][p].po_date).format("DD/MM/YYYY") + '">' + moment(response[2][p].po_date).format("DD/MM/YYYY") + '</td></tr>');

                        }
                        //setTimeout(function() {
                        $("#txt_shipment_from").val(response[2][p].fk_shipment_from_id).trigger("chosen:updated");
                        $("#txt_shipment_to").val(response[2][p].fk_shipment_to_id).trigger("chosen:updated");
                        $("#txt_terms_cond").val(response[2][p].so_terms_condition).trigger("chosen:updated");

                        $('#txt_terms_desc').summernote('code', response[2][p].fk_terms_conditions_id);

                        //	}, 500);
                    }

                    var prodIdval = $('.txt_product_name').val();

                    var cusId = $('#txt_customer_name').val();
                    var prodDetail = productDetail(prodIdval, cusId);

                    if (prodDetail) {
                        var gstDetail = getGstDetail(prodDetail.hsn);
                        if (gstDetail) {
                            $('#cgst_final').val(gstDetail[0].cgst_percent);
                            $('#sgst_final').val(gstDetail[0].sgst_percent);
                            $('#igst_final').val(gstDetail[0].igst_percent);
                        }
                    }




                } else {
                    $('table .itemclone').append('<tr><td colspan="8" class="text-center error"> No records available in the table !</td></tr>');
                    $('table .poitemclone').append('<tr><td colspan="8" class="text-center error"> No records available in the table !</td></tr>');
                }



                setTimeout(function() { calculateSIitems(); }, 3000);
            },
            error: function(response) {
                console.log(response);
            }
        });
    }


});