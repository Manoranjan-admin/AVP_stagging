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

    var dataRecords = $('#customerreportTable').DataTable({
        "lengthChange": true,
        "processing": true,
        "serverSide": true,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "order": [],
        "ajax": {
            url: "modules/customer_report/ajax_functions.php",
            type: "POST",
            //  data: { mode: 'filterlistSalesOrder' },
            data: function(d) {
                d.mode = 'filterCustomerlistSalesOrder';
                d.fromDate = $('#fromDate').val();
                d.toDate = $('#toDate').val();
                d.statusfilter = $('#customer-filter').find(":selected").val();

            },
            dataType: "json"
        },

        "columnDefs": [{
            "targets": [0, 4],
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