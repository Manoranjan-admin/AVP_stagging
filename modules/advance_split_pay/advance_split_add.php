<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);
include "classes/class_category.php";
$obj_cat = new Category('', '', '', '', '', '');


$getcate = $obj_cat->getallcategory();
$cat_data = array();
while ($cat_rows = mysqli_fetch_array($getcate)) {
    $cat_data[] = $cat_rows;
}



include "classes/class_customer.php";
$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);
include "classes/class_estimate_commornon.php";

$obj_saleestimate = new Estimate_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$getcustomer = $obj_cus->getAllCustomer();
$cus_data = array();
while ($cus_rows = mysqli_fetch_array($getcustomer)) {
    $cus_data[] = $cus_rows;
}


if ($_GET['type'] == 1) {
    $getestimate = $obj_saleestimate->getAllEstimate_comm();
    $estimate_data = array();
    while ($est_rows = mysqli_fetch_array($getestimate)) {
        $estimate_data[] = $est_rows;
    }
} elseif ($_GET['type'] == 2) {
    $getestimate = $obj_saleestimate->getAllEstimate_noncomm();
    $estimate_data = array();
    while ($est_rows = mysqli_fetch_array($getestimate)) {
        $estimate_data[] = $est_rows;
    }
}

$getAllFrancise = $obj_cus->getAllFrancise();
$fran_data = array();
while ($fran_rows = mysqli_fetch_array($getAllFrancise)) {
    $fran_data[] = $fran_rows;
}

$getAllStates = $obj_cus->getAllStates();
$state_data = array();
while ($state_rows = mysqli_fetch_array($getAllStates)) {
    $state_data[] = $state_rows;
}

$remainingAmt = '';

if ($_GET['type'] == 1) {
    $getestimatedata = $obj_saleestimate->getestimateCommCustomer($_GET['id']);

    $estimatedata = mysqli_fetch_array($getestimatedata);
    //var_dump( $estimatedata['customer_id']);

    $advance = $obj_saleestimate->getReceipts($estimatedata['customer_id'], 0);
    $receipts = $obj_saleestimate->getReceipts($estimatedata['customer_id'], 1);

    $remainingAmt = number_format($estimatedata['totalAmt'] - ($receipts + $advance), 2);
    //  var_dump( $remainingAmt);
    //  var_dump( $advance);
    //  var_dump( $receipts);
} else if ($_GET['type'] == 2) {


    $getestimatedata =   $obj_saleestimate->getestimateNonCommCustomer($_GET['id']);
    $estimatedata = mysqli_fetch_array($getestimatedata);

    $advance = $obj_saleestimate->getReceipts($estimatedata['customer_id'], 0);
    $receipts = $obj_saleestimate->getReceipts($estimatedata['customer_id'], 1);

    $remainingAmt = number_format($estimatedata['totalAmt'] - ($receipts + $advance), 2);
}




?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if ($_GET['type'] == 1) { ?>
                        <h1>Add Commercial Advance</h1>
                    <?php } elseif ($_GET['type'] == 2) { ?>
                        <h1>Add NonCommercial Advance</h1>
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Advance</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if ($_GET['type'] == 1) { ?>
                            <form class="form-horizontal theme-form" id="form_advance_comm_add" autocomplete="off"
                                novalidate="novalidate">
                            <?php } elseif ($_GET['type'] == 2) { ?>
                                <form class="form-horizontal theme-form" id="form_advance_noncomm_add" autocomplete="off"
                                    novalidate="novalidate" onsubmit="return false">
                                <?php } ?>
                                <div class="card-body">
                                    <div class="row" id="stepwizard">
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="" class="control-label">Customer <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <div>
                                                        <select class="form-control txt_customer_name "
                                                            name="txt_customer_name" id="txt_customer_name">
                                                            <option value="">Select Customer</option>
                                                            <?php for ($i = 0; $i < count($cus_data); $i++) {
                                                                $selcurrem = '';
                                                                if ($estimatedata['customer_id']  == $cus_data[$i]['pk_cus_id']) {
                                                                    $selcurrem = 'selected';
                                                                }
                                                            ?>
                                                                <option <?php echo $selcurrem; ?>
                                                                    value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">
                                                                    <?php echo $cus_data[$i]['cus_name']; ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                    <span class="error" id="txt_customer_name-error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label">Estimate No <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <div>
                                                        <select class="form-control txt_estimate_name"
                                                            name="txt_estimate_name[]" id="txt_estimate_name" multiple>
                                                            <option value="">Select Estimate</option>
                                                            <?php

                                                            if (isset($_GET['id'])) { ?>
                                                                <?php for ($i = 0; $i < count($estimate_data); $i++) { ?>
                                                                    <option
                                                                        value="<?php echo $estimate_data[$i]['PK_ES_ID']; ?>">
                                                                        <?php echo $estimate_data[$i]['sono']; ?></option>
                                                                <?php  }
                                                            } else { ?>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <span class="error" id="txt_estimate_name-error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label">Date <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <input type="text"
                                                        class="form-control txt_pi_date hasDatepicker valid"
                                                        name="txt_pi_date" id="txt_pi_date" placeholder="DD/MM/YYYY"
                                                        aria-invalid="false">
                                                    <span class="error" id="txt_pi_date_error"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="control-label">Receipts Type <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <div>
                                                        <select class="form-control txt_payment_type "
                                                            name="txt_payment_type" id="txt_payment_type">
                                                            <option value="">Select Receipts Type</option>
                                                            <option value="1">Cash</option>
                                                            <option value="2">Credit Card</option>
                                                            <option value="3">UPI</option>
                                                            <option value="4">Bank Transfer</option>
                                                            <option value="5">Cheque</option>

                                                        </select>
                                                    </div>
                                                    <span class="error" id="txt_payment_type-error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label">Advance Amount(₹) </label>
                                                <div class="control-field">
                                                    <input type="number" class="form-control adv_amount"
                                                        name="adv_amount" id="adv_amount">
                                                    <span class="error" id="txt_adv_amount_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label">Remarks </label>
                                                <div class="control-field">
                                                    <textarea class="form-control txt_remarks" name="txt_remarks"
                                                        style="height: 77px !important;" id="txt_remarks"></textarea>
                                                    <span class="error" id="txt_remarks_error"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-8">
                                            <!-- <button class="btn btn-primary" id="allocateBtn">
                                                Allocate Advance
                                            </button> -->

                                            <div class="table-responsive mt-4">
                                                <table class="table table-bordered table-sm text-center"
                                                    id="allocationTable" style="display:none;">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Order No</th>
                                                            <th width="200">Allocated Advance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>

                                            <div class="summary mt-3">
                                                Total Allocated: ₹ <span id="totalAllocated">0.00</span>
                                            </div>
                                        </div>

                                    </div>



                                    <!-- /.card-body -->
                                    <div class="card-footer text-right">
                                        <span style="float: left;" class="col-md-8">
                                            <p id="advanceinfomsg" style=" text-align: center;color:#ff0000;font-size:14px">
                                            </p>
                                        </span>
                                        <span class="col-md-2"> <input type="hidden" name="deleted" value="0"
                                                id="deleted" />
                                            <?php if ($_GET['type'] == 1) { ?>
                                                <input type="hidden" name="mode" value="addAdvancecomm" />
                                            <?php } elseif ($_GET['type'] == 2) { ?>
                                                <input type="hidden" name="mode" value="addAdvanceNonComm" />
                                            <?php } ?>
                                            <input type="hidden" name="cus_id" id="cus_id">
                                            <button type="submit" class="btn_save btn btn-success btn-lg">Save</button>
                                        </span>
                                    </div>
                                </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<style type="text/css">
    /* .theme-form .control-field {
        display: flex;
    } */

    .select2 {
        width: 100% !important;
    }

    .one-half-column {
        width: 60%;
        padding: 0;
        float: left;
    }

    .custom_table_widths {
        width: 40%;
    }

    .table-div {
        clear: left;
    }

    .colum_split {
        display: flex;
    }

    .custom_table_widths .table-div table tbody tr:first-child td .gstcol span.totalamounts_sec {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .custom_table_widths .table-div table tbody tr:first-child td .gstcol span.totalamounts_sec label {
        padding-right: 15px;
    }

    .custom_table_widths .table-div table tbody tr:first-child td .gstcol span.totalamounts_sec .input-group {
        margin-right: 20px !important;
        width: 65% !important;
    }

    #txt_cal_type_cgst_final,
    #txt_cal_type_sgst_final,
    #txt_cal_type_igst_final {
        width: 15% !important;
        height: 32px !important;
        margin-left: 10px !important;
    }

    input[type="checkbox"],
    input[type="radio"] {
        margin: 4px 0 0;
        margin-top: 1px\9;
        line-height: normal;
    }

    .table .form-control {
        padding: 6px;
    }

    label {
        font-weight: normal;
        text-transform: uppercase;
    }

    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 700;
    }

    /*
    .custom_table_widths .table-div table tbody tr:nth-child(n+2) td:first-child input {
        width: 80% !important;
    }
    */
    .custom_table_widths .table-div table tbody tr td:first-child select#txt_cal_types_comm {
        width: 15% !important;
        float: right !important;
    }

    select#txt_cal_types_comm {
        margin-left: 10px !important;
    }

    .class_per {
        text-align: center !important;
        width: 20%;
        float: left;
    }

    .class_amt {
        width: 75%;
        float: left;
        margin-left: 5%;
    }


    .apRow .extraprices {
        width: 15%;
    }
</style>
<script>
    class AdvanceAllocator {

        constructor() {
            this.previousAdvance = 0;
            this.cacheDom();
            this.bindEvents();
        }

        cacheDom() {
            this.$orders = $("#txt_estimate_name");
            this.$advance = $("#adv_amount");
            this.$table = $("#allocationTable");
            this.$tbody = $("#allocationTable tbody");
            this.$total = $("#totalAllocated");
            this.$cusNo = $("#txt_estimate_name");
        }

        bindEvents() {
            // $("#allocateBtn").on("click", () => this.generateTable());
            // this.$advance.on("input", () => this.adjustAdvance());
            this.$advance.on("blur", () => this.adjustAdvance());
            this.$cusNo.on("change", () => {
                const selected = this.$cusNo.val();
                if (selected && selected.length > 0) {
                    // alert("Selected count: " + selected.length);
                    // $("#allocateBtn").trigger('click');
                    this.generateTable()
                } else {
                    this.$tbody.empty();
                    this.$table.hide();
                }

            });
        }

        generateTable() {
            const advance = parseFloat(this.$advance.val());
            const selectedOrders = this.$orders.val();
            const selectedLabels = this.$orders.find("option:selected")
                .map(function() {
                    return $(this).text();
                }).get();

            if (!selectedLabels || selectedLabels.length === 0) {
                alert("Please select at least one order");
                return;
            }

            if (!advance || advance <= 0) {
                alert("Enter valid advance amount");
                return;
            }

            this.$tbody.empty();

            const split = (advance / selectedLabels.length).toFixed(2);

            console.log(selectedLabels)

            selectedLabels.forEach((order, index) => {
                this.$tbody.append(`
                    <tr>
                        <td>${index+1}</td>
                        <td>${order}</td>
                        <td>
                            <input type="number"
                                class="form-control form-control-sm allocInput"
                                id="split_${order}"
                                name="split_amount[]"
                                data-es_id="${selectedOrders[index]}"
                                value="${split}">
                        </td>
                    </tr>
                `);
            });

            this.$table.show();
            this.previousAdvance = advance;

            this.bindAllocationInputs();
            this.recalculate();
        }

        bindAllocationInputs() {
            $(".allocInput").on("input", () => this.recalculate());
        }

        adjustAdvance() {
            console.log("test")
            const advance = parseFloat(this.$advance.val());
            const $inputs = $(".allocInput");

            if ($inputs.length === 0) return;
            if (!advance || advance <= 0) return;

            const difference = advance - this.previousAdvance;
            const perOrderChange = difference / $inputs.length;

            $inputs.each(function() {
                const current = parseFloat($(this).val()) || 0;
                $(this).val((current + perOrderChange).toFixed(2));
            });

            this.previousAdvance = advance;
            this.recalculate();
        }

        recalculate() {
            let total = 0;

            $(".allocInput").each(function() {
                total += parseFloat($(this).val()) || 0;
            });

            // this.$total.text(total.toFixed(2));
            this.$advance.val(total.toFixed(2));
        }
    }

    // Initialize
    $(document).ready(function() {
        new AdvanceAllocator();
    });

    $('#txt_customer_name').select2();
    $('#txt_estimate_name').select2();
    $('#txt_payment_type').select2();





    $("#txt_customer_name").change(function() {
        getCustomerBaseEstimate();
    });

    function getCustomerBaseEstimate() {
        //alert($('option:selected', this).val());
        var c_name = $("#txt_customer_name").find('option:selected').val();
        if (c_name != '') {
            $.ajax({
                url: "modules/advance/ajax_functions_commercial.php",
                data: {
                    'mode': 'get_estimate_by_customer',
                    'customer': c_name,
                    'type': <?php echo $_GET['type']; ?>
                },
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    //alert(response[0].PK_ES_ID);
                    $("#txt_estimate_name").html('');
                    $('#txt_estimate_name').append($('<option value="">Select Estimate</option>'));

                    if (response.length > 0) {
                        for (var i = 0; i < response.length; i++) {
                            //   console.log(response[i].sono);
                            $('#txt_estimate_name').append($('<option value="' + response[i].PK_ES_ID + '">' +
                                response[i].sono + '</option>'));

                        }


                        // setTimeout(function() {
                        $('#txt_estimate_name').find('option[value="' + <?php echo $_GET['id']; ?> + '"]').attr(
                            "selected", true);
                        $('.txt_estimate_name').trigger('change');

                        //  }, 1000);
                    }
                    /*
                             //  if(response.length){

                    			for(var i=0;i<=response.length;i++){
                    				$('#txt_estimate_name').append($('<option value="'+response[i].PK_ES_ID+'">'+response[i].sono+'</option>'));
                    			}
                              // }
                    		   */
                },
                error: function(response) {
                    console.log(response);
                }
            });
        } else {

        }
    }
    $("#txt_estimateere_name").change(function() {
        //alert($('option:selected', this).val());
        //var cus = $("#txt_customer_name").val());
        var e_name = $('option:selected', this).val();
        if (e_name != '') {
            $.ajax({
                url: "modules/advance/ajax_functions_commercial.php",
                data: {
                    'mode': 'get_customer_by_estimate',
                    'estimate': e_name,
                },
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    //alert(response.length);
                    //alert(response[0].PK_ES_ID);
                    $("#txt_customer_name").html('');
                    $('#txt_customer_name').append($('<option value="">Select Customer</option>'));
                    for (var i = 0; i <= response.length; i++) {
                        $('#txt_customer_name').append($('<option value="' + response[i].customer_id +
                            '">' + response[i].cus_name + '</option>'));
                    }
                    //$("#txt_customer_name").val(cus);

                },
                error: function(response) {
                    console.log(response);
                }
            });
        } else {

        }
    });
    getCategoryListing(1);

    $('#form_advance_comm_add').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $(".nav-link").removeClass("active");
    $(".nav-item").removeClass("menu-open");

    $(".estimate ").addClass("menu-open");
    $(".estimate_add .nav-link").addClass("active");

    $('.txt_product_name').select2();
    $('#txt_product_name_1').select2();


    getCity();

    $('#txt_customer_city').select2();

    //$('#txt_types').on('change', function() {
    $('table').on("change", ".txt_types", function(e) {
        var czid = $(this).attr('data-czid');
        var types = $(".txt_types_" + czid).find("option:selected").val();
        getCostTypeListing(czid);
        /*  getProductListing(1);
          getCategoryListing(1);*/
        // getItemType();
        if (types == 1) {
            $('.txt_itemtypes_' + czid).html(
                '<option selected >Select One</option><option value="1">Product</option>');
        } else if (types == 2) {
            getTypesListing(czid);
        }
        $("#additems").show();
        $('#txt_product_qty_1').val(1);

    });

    var deleted = 0;

    $('table').on("click", ".removeitems", function(e) {
        e.preventDefault();
        var rowCount = $('.itemTable >tbody >tr').length;

        if ($('.removeitems').length > 1) {
            var sqpid = $(this).closest('tr').find('td .txt_sqp_id').val();
            if (sqpid) {
                var sqvals = $('.txt_deleted_sqp').val();
                if (sqvals != 0) {
                    var vallss = sqvals + '##' + sqpid;
                } else {
                    var vallss = sqpid;
                }
                $('.txt_deleted_sqp').val(vallss);
            }
            $(this).closest('tr').remove();

            var cusId = $('#txt_customer_name').val();

            var prodid = $('.txt_product_name').val();

            deleted++;
            $('#deleted').val(deleted)
            cal()
        }
    });

    $('table').on("change", ".txt_itemtypes ", function(e) {
        var czid = $(this).attr('data-czid');
        var itemtypes = $('.txt_itemtypes_' + czid).find("option:selected").val();
        var types = $('.txt_types_' + czid).find("option:selected").val();
        if (types == 2) {
            if (itemtypes == 7) {
                getCategoryListing(czid);
            } else {
                $('.txt_category_' + czid).html('<option selected >None</option>');

            }



        } else {
            $('.txt_category_' + czid).html('<option selected >None</option>');

        }

        getComercialorNonItemsType(czid);



    });



    $('table').on("change", ".txt_item, .txt_price_type", function(e) {
        var czid = $(this).attr("data-czid");
        getCostListing(czid)

    });

    function getCostListing(czid) {
        var itemid = $('.txt_item_' + czid).find("option:selected").val();
        var costtype = $('.txt_price_type_' + czid).find("option:selected").val();
        //if (costtype > 0) {
        var typesval = $('.txt_types_' + czid).find("option:selected").val();
        var product_id = $(this).find("option:selected").val();
        $.ajax({
            url: "modules/sales/ajax_functions_commercial.php",
            data: {
                'mode': 'getCostListing',
                'typesid': typesval,
                'costtype': costtype,
                'itemtypeId': itemid
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('.txt_price_' + czid).val(' ');
                $('.txt_price_' + czid).val(response);
                cal();
            },
            error: function(response) {
                console.log(response);
            }
        });

    }

    $('table').on("change", ".txt_innersheet,.txt_specialeffects,.txt_size", function(e) {
        var czid = $(this).attr("data-czid");

        var incost = $('.txt_innersheet_' + czid).find("option:selected").attr("data-cost");
        var spcost = $('.txt_specialeffects_' + czid).find("option:selected").attr("data-secost");
        var sizecost = $('.txt_size_' + czid).find("option:selected").attr("data-sizecost");


        totcost = 0;
        if (incost) {
            console.log(incost);

            totcost += parseFloat(incost);
        }
        if (spcost) {
            console.log(spcost);

            totcost += parseFloat(spcost);
        }
        if (sizecost) {
            console.log(sizecost);

            totcost += parseFloat(sizecost);
        }


        $('.txt_price_' + czid).val(totcost);


        cal();

    });

    var e = 0;
    $('.addextraitemscomm').on('click', function() {
        var itemTot = $("#txt_item_total").val();
        var tcont = $('tbody.totalamounts tr').length;
        if (tcont > 2) {
            var evalues = parseInt(tcont) - 2;
            e = evalues;
        }
        $('table.amountdetails tbody.totalamounts').find('tr:last').prev().after(
            '<tr class="apRow"><td class="text-right"><input type="text" name="txt_field_name_comm[]" class="form-control txt_field_name_comm pull-left" id="txt_field_name_comm_' +
            e +
            '" placeholder="Field Name"><select class="form-control txt_cal_types_comm pull-left numbersOnly extrapricescomm chosen" name="txt_cal_types_comm[]" id="txt_cal_types_comm"><option value="1" selected>+</option><option value="2">-</option></select></td><td><input type="text" name="txt_field_value_comm[]" class="form-control txt_field_value_comm totalcalc extrapricescomm pull-right text-right numberss" id="txt_field_value_comm" min="0" max="' +
            itemTot +
            '"></td><td><button type="button" class="btn btn-danger pull-left removeextraitems"><i class="fa fa-minus" aria-hidden="true"></i></button></td></tr>'
        );
        $('.extrapricescomm').on('focusout change', function() {
            calculateSCitems();
        });
        getAllExtraCharges(e);
        validatefunctions();
    });

    var f = 0;
    $('.addextraitemscommedit').on('click', function() {
        var itemTot = $("#txt_item_total").val();
        var tcont = $('tbody.totalamountsedit tr').length;
        if (tcont > 2) {
            var fvalues = parseInt(tcont) - 2;
            f = fvalues;
        }
        $('table.amountdetailsedit tbody.totalamountsedit').find('tr:last').prev().after(
            '<tr class="apRow"><td class="text-right"><input type="text" name="txt_field_name_comm[]" class="form-control txt_field_name_comm pull-left" id="txt_field_name_comm_' +
            f +
            '" placeholder="Field Name"><select class="form-control txt_cal_types_comm pull-left numbersOnly extrapricescomm chosen" name="txt_cal_types_comm[]" id="txt_cal_types_comm"><option value="1" selected>+</option><option value="2">-</option></select></td><td><input type="text" name="txt_field_value_comm[]" class="form-control txt_field_value_comm totalcalc extrapricescomm pull-right text-right numberss" id="txt_field_value_comm" min="0" max="' +
            itemTot +
            '"></td><td><button type="button" class="btn btn-danger pull-left removeextraitems"><i class="fa fa-minus" aria-hidden="true"></i></button></td></tr>'
        );

        $('.extrapricescomm').on('focusout change', function() {
            calculateSCitems();
        });
        getAllExtraCharges(f);
        validatefunctions();
    });
    $('table').on("click", ".removeextraitems", function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        calculateSCitems();
        //setTimeout(function() { ProductDisable(); }, 500);
    });



    $('.txt_state').on('change', function() {

        var getintval = $(this).find("option:selected").attr('data-code');
        $('.interst').hide();
        $('.intrast').hide();

        if (getintval == 33) {

            $('.intrast').show();
            $('.intrast').find('input').prop("disabled", false);
            $('.interst').find('input').prop("disabled", true);


        } else {
            //$('#gst_per').val(' ');
            $('.interst').show();
            $('.interst').find('input').prop("disabled", false);
            $('.intrast').find('input').prop("disabled", true);



        }
        cal();
    });
    getCostTypeListing(1);

    function getCostTypeListing(types) {
        // var typesval = $('.txt_types_' + types).find("option:selected").val();

        $('.txt_price_type_' + types).html('<option selected >SELECT ONE </option>');


        //  type_tables, table_pk_id, orderid
        $('.txt_price_type_' + types).append(
            '<option value="1">First Copy</option><option value="2">Additional Copy</option>');


    }

    function getCity() {
        $('#txt_customer_city').empty();
        $('#txt_customer_city').append('<option value=""  selected>SELECT CITY</option>');
        $.post("modules/sales/ajax_functions_commercial.php", {
                mode: 'getAllCities',
            },
            function(data, status) {
                var data = jQuery.parseJSON(data);
                var cityNameOpt = '';
                if (data.length > 0) {
                    var cityNameOpt = '';
                    for (var i in data) {

                        cityNameOpt = cityNameOpt + '<option value=' + data[i]['pk_city_id'] + '>' + data[i]['city'] +
                            '</option>';
                    }
                    $('#txt_customer_city').append(cityNameOpt);
                }

            });

    }

    function getTypesListing(type) {
        //alert('test');
        $.ajax({
            url: "modules/products/ajax_functions_commercial.php",
            data: {
                'mode': 'getTypesListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('.txt_itemtypes_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_types_id == '9999') {
                        //  type_tables, table_pk_id, orderid
                        $('.txt_itemtypes_' + type).append('<option value="' + response[0][i]
                            .pk_types_id + '" data-types="2" data-tables="' + response[0][i].type_tables +
                            '" data-pkid="' + response[0][i].table_pk_id + '">' + response[0][i]
                            .types_name + ' </option>');
                    } else {

                        $('.txt_itemtypes_' + type).append('<option value="' + response[0][i].pk_types_id +
                            '" data-types="1" data-tables="' + response[0][i].type_tables +
                            '" data-pkid="' + response[0][i].table_pk_id + '">' + response[0][i]
                            .types_name + '</option>');
                    }
                }


            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    getComercialorNonItemsType(1);

    function getComercialorNonItemsType(type) {
        //alert('test');
        var typesid = 1;
        var itemtypeId = 1;
        /*  var typesid = $('.txt_types_' + type).find("option:selected").val();
          var itemtypeId = $('.txt_itemtypes_' + type).find("option:selected").val();*/
        //   var pkid = $('.txt_itemtypes_' + type).find("option:selected").attr('data-pkid');


        $.ajax({
            url: "modules/sales/ajax_functions_commercial.php",
            data: {
                'mode': 'getComercialorNonItemsType',
                'typesid': typesid,
                'itemtypeId': itemtypeId
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('.txt_item_' + type).html('<option selected >SELECT ONE</option>');
                $('.itemsdata').show();
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_items_id == '9999') {
                        //  type_tables, table_pk_id, orderid
                        $('.txt_item_' + type).append('<option value="' + response[0][i]
                            .pk_items_id + '"  data-items="2">' + response[0][i].fk_item_id +
                            ' </option>');
                    } else {

                        $('.txt_item_' + type).append('<option value="' + response[0][i]
                            .pk_items_id + '"  data-items="1" >' + response[0][i].fk_item_id +
                            '</option>');
                    }
                }


            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function getProductListing(type) {
        //alert('test');
        $.ajax({
            url: "modules/products/ajax_functions_commercial.php",
            data: {
                'mode': 'getProductListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_product_name_' + type).html('');
                $('.txt_product_name_' + type).html('<option selected >Select One</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_product_id == '9999') {

                        $('.txt_product_name_' + type).append('<option value="' + response[0][i]
                            .pk_product_id + '" data-types="2">' + response[0][i].product_name +
                            ' </option>');
                    } else {

                        $('.txt_product_name_' + type).append('<option value="' + response[0][i]
                            .pk_product_id + '" data-types="1">' + response[0][i].product_name +
                            '</option>');
                    }
                }


            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function getCategoryListing(type) {
        $.ajax({
            url: "modules/sales/ajax_functions_commercial.php",
            data: {
                'mode': 'getCategoryListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {

                //$('.txt_product_name').chosen('destroy');
                $('.txt_category_' + type).html('');
                $('.txt_category_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_product_id == '9999') {

                        $('.txt_category_' + type).append('<option value="' + response[0][i]
                            .pk_cat_id + '" data-types="2">' + response[0][i].cat_name + '</option>');
                    } else {

                        $('.txt_category_' + type).append('<option value="' + response[0][i]
                            .pk_cat_id + '" data-types="1">' +
                            response[0][i].cat_name + '</option>');
                    }
                }


            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function addrow() {
        var cusId = $('#txt_customer_name').val();
        var tcont = $('tbody.itemclone tr').length;
        var deleted = $('#deleted').val();
        zz = parseInt(tcont) + 1 + parseInt(deleted);
        console.log(zz);
        $('.nodata').remove();
        $('table .itemclone').append('<tr><td ><select  class="form-control txt_item  txt_item_' + zz +
            '" name="txt_item[]" id="txt_item_' + zz + '" data-czid="' + zz +
            '"  title="" onchange="cal()"></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
            zz + '" min="0" max="999999" id="txt_product_qty_' + zz +
            '" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value="1"></td><td><select class="form-control txt_price_type txt_price_type_' +
            zz + ' " data-czid="' + zz + '"  name="txt_price_type[]" id="txt_price_type_' + zz +
            '" title="Price Type" onchange="cal()"></select></td><td><select class="form-control txt_orientation txt_orientation_' +
            zz + '"  name="txt_orientation[]" id="txt_orientation_' + zz +
            '" title="Orientation"  ><option value="">Select Orientation</option><option value="1">Length</option><option value="2">Breadth </option><option value="">None </option></select></td><td ><input type="text" name="txt_price[]" id="txt_price_' +
            zz + '" onkeyup="cal()" class="form-control pricefield txt_price txt_price_' + zz +
            ' numberss text-right" title="Price"><input type="hidden" class="txt_comm txt_comm_' + zz +
            '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
            zz + '" class="form-control txt_final_total_' + zz +
            ' numberss txt_final_total text-right" title="Grand Total" readonly></td><td><button type="button" name="removeitems" id="removeitems" class="btn btn-danger removeitems" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>'
        );
        //getTypesListing(zz);
        //getProductListing(zz);
        getCategoryListing(zz);
        getComercialorNonItemsType(zz);
        getCostTypeListing(zz);

        var types = $('.txt_types_' + zz).find("option:selected").val();
        $('.txt_price_type_' + zz).trigger('change');
        if (types == 2) {
            getTypesListing(zz);


        } else {
            $('.txt_itemtypes_' + zz).html('<option selected >Select One</option><option value="1">Product</option>');

        }

    }

    function calAdvance(e) {
        var grandtotal = $('#txt_grand_total').val();
        var advance = $('#discount_final4').val();
        $('#discount_final_amt4').val(parseFloat(advance).toFixed(2));
        var pendamt = 0;
        if (parseFloat(advance) > 0) {
            pendamt = parseFloat(grandtotal) - parseFloat(advance);
        } else {
            pendamt = parseFloat(grandtotal);
        }

        $('#discount_final_amt5').val(parseFloat(pendamt).toFixed(2));
    }

    function cal() {
        var deleted = $('#deleted').val();
        var rowCount = $('.itemTable >tbody >tr').length;
        var total_length = parseFloat(rowCount) + parseFloat(deleted);
        var total_total_amount = 0;
        var total_amount = 0;
        var cgst_amttot = 0;
        var sgst_amttot = 0;
        var igst_amttot = 0;
        var total_amounts = 0;
        console.log('length = ' + total_length);
        for (var i = 1; i <= total_length; i++) {
            var taxable_total = 0;
            var qty = $("#txt_product_qty_" + i).val();
            if (parseFloat(qty) > 0) {
                qty = qty;

            } else {
                qty = 0;
            }

            var price = $("#txt_price_" + i).val();
            if (parseFloat(price) > 0) {
                price = price;
            } else {
                price = 0;
            }
            taxable_total = parseFloat(qty) * parseFloat(price);
            //   $("#txt_total_"+i).val(parseFloat(taxable_total).toFixed(2));
            if (parseFloat(taxable_total) > 0) {} else {
                rice = 0;
            }
            taxable_total = parseFloat(qty) * parseFloat(price);
            //   $("#txt_total_"+i).val(parseFloat(taxable_total).toFixed(2));
            if (parseFloat(taxable_total) > 0) {} else {
                total_total_amount = total_total_amount + 0;
                // $("#txt_total_"+i).val("");
                $("#txt_final_total_" + i).val("");
            }
            var total_amount = parseFloat(taxable_total);
            total_amounts += taxable_total;
            total_total_amount = total_total_amount + total_amount;
            $("#txt_final_total_" + i).val(parseFloat(total_amount).toFixed(2));
        }
        $("#txt_item_total").val(parseFloat(total_total_amount).toFixed(2));
        var txtstate = $('.txt_state').find("option:selected").attr('data-code');
        console.log(txtstate);
        var csgst_total_final_amount = 0;
        var igst_total_final_amount = 0;
        if (txtstate == 33) {
            /*CGST*/
            var cgst = $("#cgst_per").val();
            if (parseFloat(cgst) > 0) {
                cgst = cgst;
            } else {
                cgst = 0;
            }
            var cgst_per = parseFloat(cgst) / 100;
            var cgst_amt = parseFloat(cgst_per) * (parseFloat(total_amounts));
            if (parseFloat(cgst_amt) > 0) {
                $("#cgst_total").val(parseFloat(cgst_amt).toFixed(2));
                cgst_amttot = cgst_amttot + parseFloat(cgst_amt);
            } else {
                $("#cgst_total").val("");
            }
            var ctotalamt = 0;
            var cgsttype = $('.txt_intstate').find("option:selected").val();
            if (cgsttype == 1) {
                var cinclusiveGST = parseFloat(total_total_amount) - parseFloat(cgst_amttot)
                //$('.txt_total').val(inclusiveGST);
                $('.txt_item_total').val(cinclusiveGST);
                ctotalamt = parseFloat(cinclusiveGST);
            } else {
                var cexclusiveGST = parseFloat(total_total_amount) + parseFloat(cgst_amttot)
                //$('.txt_total').val(exclusiveGST);
                $('.txt_item_total').val(total_total_amount);
                ctotalamt = parseFloat(total_total_amount);
            }
            //  var totalamt = $('.txt_total').val();
            var cgst_total_final_amount = parseFloat(ctotalamt) + parseFloat(cgst_amt);


            /*SGST*/
            var sgst = $("#sgst_per").val();
            if (parseFloat(sgst) > 0) {
                sgst = sgst;
            } else {
                sgst = 0;
            }
            var sgst_per = parseFloat(sgst) / 100;
            var sgst_amt = parseFloat(sgst_per) * (parseFloat(total_amounts));
            if (parseFloat(sgst_amt) > 0) {
                $("#sgst_total").val(parseFloat(sgst_amt).toFixed(2));
                sgst_amttot = sgst_amttot + parseFloat(sgst_amt);
            } else {
                $("#sgst_total").val("");
            }
            var stotalamt = 0;
            var sgsttype = $('.txt_intstate').find("option:selected").val();
            if (sgsttype == 1) {
                var sinclusiveGST = parseFloat(total_total_amount) - parseFloat(sgst_amttot)
                //$('.txt_total').val(inclusiveGST);
                $('.txt_item_total').val(sinclusiveGST);
                stotalamt = parseFloat(sinclusiveGST);
            } else {
                var sexclusiveGST = parseFloat(total_total_amount) + parseFloat(sgst_amttot)
                //$('.txt_total').val(exclusiveGST);
                $('.txt_item_total').val(total_total_amount);
                stotalamt = parseFloat(total_total_amount);
            }
            //  var totalamt = $('.txt_total').val();
            var csgst_total_final_amount = parseFloat(stotalamt) + parseFloat(sgst_amt) + parseFloat(cgst_amt);


        } else {

            /*IGST*/
            var igst = $("#igst_per").val();
            if (parseFloat(igst) > 0) {
                igst = igst;
            } else {
                igst = 0;
            }
            var igst_per = parseFloat(igst) / 100;
            var igst_amt = parseFloat(igst_per) * (parseFloat(total_amounts));
            if (parseFloat(igst_amt) > 0) {
                $("#igst_total").val(parseFloat(igst_amt).toFixed(2));
                igst_amttot = igst_amttot + parseFloat(igst_amt);
            } else {
                $("#igst_total").val("");
            }
            var itotalamt = 0;
            var igsttype = $('.txt_intstate').find("option:selected").val();
            if (igsttype == 1) {
                var iinclusiveGST = parseFloat(total_total_amount) - parseFloat(igst_amttot)
                //$('.txt_total').val(inclusiveGST);
                $('.txt_item_total').val(iinclusiveGST);
                itotalamt = parseFloat(iinclusiveGST);
            } else {
                var iexclusiveGST = parseFloat(total_total_amount) + parseFloat(igst_amttot)
                //$('.txt_total').val(exclusiveGST);
                $('.txt_item_total').val(total_total_amount);
                itotalamt = parseFloat(total_total_amount);
            }
            //  var totalamt = $('.txt_total').val();
            var igst_total_final_amount = parseFloat(itotalamt) + parseFloat(igst_amt);


        }


        var discount_final1 = $("#discount_final1").val();

        if (parseFloat(discount_final1) > 0) {} else {
            discount_final1 = 0;
        }
        var caltype1 = $("#txt_cal_type1").find("option:selected").val();
        var discount_final_amt1 = '';
        if (caltype1 == 1) {
            $("#discount_final1").removeAttr('max');
            discount_final_amt1 = parseFloat(discount_final1);

        } else {
            $("#discount_final1").attr('max', 100);
            var discount_final_per1 = parseFloat(discount_final1) / 100;
            discount_final_amt1 = parseFloat(discount_final_per1) * parseFloat(total_amounts);

        }


        if (parseFloat(discount_final_amt1) > 0) {
            $("#discount_final_amt1").val(parseFloat(discount_final_amt1).toFixed(2));
        } else {
            $("#discount_final_amt1").val("");
        }
        var discommper1 = 0.00;
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers = $('.discount_type1').val();
        //var enteredamt = $(this).val();

        //if(enteredamt){
        if (calpers == 1) {
            discommper1 += parseFloat(discount_final_amt1, 10) || 0;
        }
        if (calpers == 2) {
            discommper1 -= parseFloat(discount_final_amt1, 10) || 0;
        }
        var distot1 = discommper1.toFixed(2);

        //  var distot1 = discommper1.toFixed(2);
        //});



        var discount_final2 = $("#discount_final2").val();

        if (parseFloat(discount_final2) > 0) {} else {
            discount_final2 = 0;
        }


        var caltype2 = $("#txt_cal_type2").find("option:selected").val();
        var discount_final_amt2 = '';
        if (caltype2 == 1) {
            $("#discount_final2").removeAttr('max');
            discount_final_amt2 = parseFloat(discount_final2);

        } else {
            $("#discount_final2").attr('max', 100);

            var discount_final_per2 = parseFloat(discount_final2) / 100;
            discount_final_amt2 = parseFloat(discount_final_per2) * parseFloat(total_amounts);
        }



        if (parseFloat(discount_final_amt2) > 0) {
            $("#discount_final_amt2").val(parseFloat(discount_final_amt2).toFixed(2));
        } else {
            $("#discount_final_amt2").val("");
        }
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers = $('.discount_type2').val();
        //var enteredamt = $(this).val();
        var discommper2 = 0.00;

        //if(enteredamt){
        if (calpers == 1) {
            discommper2 += parseFloat(discount_final_amt2, 10) || 0;
        }
        if (calpers == 2) {
            discommper2 -= parseFloat(discount_final_amt2, 10) || 0;
        }

        //});
        var distot2 = discommper2.toFixed(2);

        var discount_final3 = $("#discount_final3").val();

        if (parseFloat(discount_final3) > 0) {} else {
            discount_final3 = 0;
        }


        var caltype3 = $("#txt_cal_type3").find("option:selected").val();
        var discount_final_amt3 = '';
        if (caltype3 == 1) {
            $("#discount_final3").removeAttr('max');
            discount_final_amt3 = parseFloat(discount_final3);

        } else {
            $("#discount_final3").attr('max', 100);
            var discount_final_per3 = parseFloat(discount_final3) / 100;
            discount_final_amt3 = parseFloat(discount_final_per3) * parseFloat(total_amounts);
        }




        if (parseFloat(discount_final_amt3) > 0) {
            $("#discount_final_amt3").val(parseFloat(discount_final_amt3).toFixed(2));
        } else {
            $("#discount_final_amt3").val("");
        }
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers3 = $('.discount_type3').val();
        //var enteredamt = $(this).val();
        var discommper3 = 0.00;

        //if(enteredamt){
        if (calpers3 == 1) {
            discommper3 += parseFloat(discount_final_amt3, 10) || 0;
        }
        if (calpers == 2) {
            discommper3 -= parseFloat(discount_final_amt3, 10) || 0;
        }
        var distot3 = discommper3.toFixed(2);

        //  var distot = discommper.toFixed(2);
        //});

        var discount_final4 = $("#discount_final4").val();

        if (parseFloat(discount_final4) > 0) {} else {
            discount_final4 = 0;
        }


        var caltype4 = $("#txt_cal_type4").find("option:selected").val();
        var discount_final_amt4 = '';
        if (caltype4 == 1) {
            $("#discount_final4").removeAttr('max');
            discount_final_amt4 = parseFloat(discount_final4);

        } else {
            $("#discount_final4").attr('max', 100);


            var discount_final_per4 = parseFloat(discount_final4) / 100;
            discount_final_amt4 = parseFloat(discount_final_per4) * parseFloat(total_amounts);
        }


        if (parseFloat(discount_final_amt4) > 0) {
            $("#discount_final_amt4").val(parseFloat(discount_final_amt4).toFixed(2));
        } else {
            $("#discount_final_amt4").val("");
        }
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers = $('.discount_type4').val();
        //var enteredamt = $(this).val();
        var discommper4 = 0.00;
        //if(enteredamt){
        if (calpers == 1) {
            discommper4 += parseFloat(discount_final_amt4, 10) || 0;
        }
        if (calpers == 2) {
            discommper4 -= parseFloat(discount_final_amt4, 10) || 0;
        }
        var distot4 = discommper4.toFixed(2);

        // var distot = discommper.toFixed(2);
        //});

        var discount_final5 = $("#discount_final5").val();

        if (parseFloat(discount_final5) > 0) {} else {
            discount_final5 = 0;
        }


        var caltype5 = $("#txt_cal_type5").find("option:selected").val();
        var discount_final_amt5 = '';
        if (caltype5 == 1) {
            $("#discount_final5").removeAttr('max');
            discount_final_amt5 = parseFloat(discount_final5);

        } else {
            $("#discount_final5").attr('max', 100);
            var discount_final_per5 = parseFloat(discount_final5) / 100;
            discount_final_amt5 = parseFloat(discount_final_per5) * parseFloat(total_amounts);
        }


        if (parseFloat(discount_final_amt5) > 0) {
            $("#discount_final_amt5").val(parseFloat(discount_final_amt5).toFixed(2));
        } else {
            $("#discount_final_amt5").val("");
        }
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers5 = $('.discount_type5').val();
        //var enteredamt = $(this).val();
        var discommper5 = 0.00;

        //if(enteredamt){
        if (calpers5 == 1) {
            discommper5 += parseFloat(discount_final_amt5, 10) || 0;
        }
        if (calpers == 2) {
            discommper5 -= parseFloat(discount_final_amt5, 10) || 0;
        }

        var distot5 = discommper5.toFixed(2);

        var distotaamount = parseFloat(distot1) + parseFloat(distot2) + parseFloat(distot3);
        //});
        var GST_totamount = parseFloat(csgst_total_final_amount) + parseFloat(igst_total_final_amount);
        var grand_total = parseFloat(GST_totamount) + parseFloat(distotaamount);
        $("#txt_grand_total").val(parseFloat(grand_total).toFixed(2));

        calAdvance();

        // var grand_total = parseFloat(gst_total_final_amount) ;
        //$("#txt_grand_total").val(parseFloat(grand_total).toFixed(2));
    }


    $(document).on("keypress keyup blur", ".numbersOnly", function(event) {
        var $input = $(this);
        var regex = /^\d+$/;
        if (!regex.test($input.val())) {
            $input.val($input.val().replace(/\D/, ''));
        }
    });
    $(document).on("keypress", '.numberss', function(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $.validator.addMethod("checkAdvanceAmount", function(value, element) {

        var isValid = true;

        $.ajax({
            url: "modules/advance_split_pay/ajax_function.php",
            type: "post",
            async: false, // required for validator
            dataType: "json",
            data: {
                mode: "check_amount",
                estimate_no: $(element).data("es_id"),
                adv_amount: value,
                type: <?php echo $_GET['type']; ?>
            },
            success: function(response) {

                if (response !== "true") {
                    isValid = false;

                    // store dynamic error message
                    $(element).data("custom-error", response);
                }
            }
        });

        return isValid;

    }, function(params, element) {
        return $(element).data("custom-error") || "Invalid amount";
    });

    $('#form_advance_comm_add').validate({
        ignore: [],
        rules: {
            txt_customer_name: {
                required: true
            },
            txt_payment_type: {
                required: true
            },
            txt_pi_date: {
                required: true
            },
            adv_amount: {
                required: true,
                min: 1
            },
            "txt_estimate_name[]": {
                required: true
            },
            "split_amount[]": {
                required: true,
                min: 1,
                checkAdvanceAmount: true
            }

        },
        message: {
            txt_customer_name: {
                required: 'This field is required.'
            },
            txt_pi_date: {
                required: 'This field is required.'
            },
            txt_payment_type: {
                required: 'This field is required.'
            },
            adv_amount: {
                required: 'This field is required.'
            },
            "txt_estimate_name[]": {
                required: 'This field is required.'
            },


        },
        errorPlacement: function(error, element) {
            if (element.attr("name") === 'txt_customer_name') {
                error.insertAfter($("#txt_customer_name-error"));

            } else if (element.attr("name") === 'txt_estimate_name') {
                error.insertAfter($("#txt_estimate_name-error"));
            } else if (element.attr("name") === 'txt_payment_type') {
                error.insertAfter($("#txt_payment_type-error"));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            var formData = new FormData(form);
            // ✅ Check allocation
            if ($(".allocInput").length === 0) {
                alert("Please click 'Allocate Advance' before saving.");
                return false;
            }

            // for (const pair of formData.entries()) {
            //     console.log(pair[0], pair[1]);
            // }
            // return;
            $.ajax({
                url: "modules/advance_split_pay/ajax_function.php",
                data: formData,
                type: 'post',
                async: false,
                dataType: 'json',
                success: function(response) {
                    if (response) {
                        if (response == 1) {
                            swal({
                                title: "Success!",
                                text: "Advance has been added successfully!.",
                                type: "success",
                                timer: 1000,
                                buttons: false,
                            }).then(function() {
                                window.location.href = "index.php?erp=147&type=1";
                            });
                        } else {
                            swal("Failed!", "Something went wrong, Try again!", "error");
                        }

                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                },
                error: function(response) {
                    $('.btn_save').prop("disabled", false);
                    console.log(response);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        },
    });


    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });
</script>
<script>
    getCategoryListing(1);

    $('#form_advance_noncomm_add').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    $('#txt_customer_name').select2();
    $('#txt_uom').select2();
    $(".nav-link").removeClass("active");
    $(".nav-item").removeClass("menu-open");

    $(".estimate ").addClass("menu-open");
    $(".estimate_add .nav-link").addClass("active");

    $('.txt_product_name').select2();
    $('#txt_product_name_1').select2();


    getCity();

    $('#txt_customer_city').select2();

    //$('#txt_types').on('change', function() {
    $('table').on("change", ".txt_types", function(e) {
        var czid = $(this).attr('data-czid');
        var types = $(".txt_types_" + czid).find("option:selected").val();
        getCostTypeListing(czid);
        /*  getProductListing(1);
          getCategoryListing(1);*/
        // getItemType();
        if (types == 1) {
            $('.txt_itemtypes_' + czid).html(
                '<option selected >Select One</option><option value="1">Product</option>');
        } else if (types == 2) {
            getTypesListing(czid);
        }
        $("#additems").show();
        $('#txt_product_qty_1').val(1);

    });

    var deleted = 0;

    $('table').on("click", ".removeitems", function(e) {
        e.preventDefault();
        var rowCount = $('.itemTable >tbody >tr').length;

        if ($('.removeitems').length > 1) {
            var sqpid = $(this).closest('tr').find('td .txt_sqp_id').val();
            if (sqpid) {
                var sqvals = $('.txt_deleted_sqp').val();
                if (sqvals != 0) {
                    var vallss = sqvals + '##' + sqpid;
                } else {
                    var vallss = sqpid;
                }
                $('.txt_deleted_sqp').val(vallss);
            }
            $(this).closest('tr').remove();

            var cusId = $('#txt_customer_name').val();

            var prodid = $('.txt_product_name').val();

            deleted++;
            $('#deleted').val(deleted)
            cal()
        }
    });

    $('table').on("change", ".txt_itemtypes ", function(e) {
        var czid = $(this).attr('data-czid');
        var itemtypes = $('.txt_itemtypes_' + czid).find("option:selected").val();
        var types = $('.txt_types_' + czid).find("option:selected").val();
        if (types == 2) {
            if (itemtypes == 7) {
                getCategoryListing(czid);
            } else {
                $('.txt_category_' + czid).html('<option selected >None</option>');

            }



        } else {
            $('.txt_category_' + czid).html('<option selected >None</option>');

        }

        getComercialorNonItemsType(czid);



    });



    $('table').on("change", ".txt_item, .txt_price_type", function(e) {
        var czid = $(this).attr("data-czid");
        getCostListing(czid)

    });

    function getCostListing(czid) {
        var itemid = $('.txt_item_' + czid).find("option:selected").val();
        var costtype = $('.txt_price_type_' + czid).find("option:selected").val();
        //if (costtype > 0) {
        var typesval = $('.txt_types_' + czid).find("option:selected").val();
        var product_id = $(this).find("option:selected").val();
        $.ajax({
            url: "modules/sales/ajax_functions_commercial.php",
            data: {
                'mode': 'getCostListing',
                'typesid': typesval,
                'costtype': costtype,
                'itemtypeId': itemid
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('.txt_price_' + czid).val(' ');
                $('.txt_price_' + czid).val(response);
                cal();
            },
            error: function(response) {
                console.log(response);
            }
        });

    }

    $('table').on("change", ".txt_innersheet,.txt_specialeffects,.txt_size", function(e) {
        var czid = $(this).attr("data-czid");

        var incost = $('.txt_innersheet_' + czid).find("option:selected").attr("data-cost");
        var spcost = $('.txt_specialeffects_' + czid).find("option:selected").attr("data-secost");
        var sizecost = $('.txt_size_' + czid).find("option:selected").attr("data-sizecost");


        totcost = 0;
        if (incost) {
            console.log(incost);

            totcost += parseFloat(incost);
        }
        if (spcost) {
            console.log(spcost);

            totcost += parseFloat(spcost);
        }
        if (sizecost) {
            console.log(sizecost);

            totcost += parseFloat(sizecost);
        }


        $('.txt_price_' + czid).val(totcost);


        cal();

    });

    var e = 0;
    $('.addextraitemscomm').on('click', function() {
        var itemTot = $("#txt_item_total").val();
        var tcont = $('tbody.totalamounts tr').length;
        if (tcont > 2) {
            var evalues = parseInt(tcont) - 2;
            e = evalues;
        }
        $('table.amountdetails tbody.totalamounts').find('tr:last').prev().after(
            '<tr class="apRow"><td class="text-right"><input type="text" name="txt_field_name_comm[]" class="form-control txt_field_name_comm pull-left" id="txt_field_name_comm_' +
            e +
            '" placeholder="Field Name"><select class="form-control txt_cal_types_comm pull-left numbersOnly extrapricescomm chosen" name="txt_cal_types_comm[]" id="txt_cal_types_comm"><option value="1" selected>+</option><option value="2">-</option></select></td><td><input type="text" name="txt_field_value_comm[]" class="form-control txt_field_value_comm totalcalc extrapricescomm pull-right text-right numberss" id="txt_field_value_comm" min="0" max="' +
            itemTot +
            '"></td><td><button type="button" class="btn btn-danger pull-left removeextraitems"><i class="fa fa-minus" aria-hidden="true"></i></button></td></tr>'
        );
        $('.extrapricescomm').on('focusout change', function() {
            calculateSCitems();
        });
        getAllExtraCharges(e);
        validatefunctions();
    });

    var f = 0;
    $('.addextraitemscommedit').on('click', function() {
        var itemTot = $("#txt_item_total").val();
        var tcont = $('tbody.totalamountsedit tr').length;
        if (tcont > 2) {
            var fvalues = parseInt(tcont) - 2;
            f = fvalues;
        }
        $('table.amountdetailsedit tbody.totalamountsedit').find('tr:last').prev().after(
            '<tr class="apRow"><td class="text-right"><input type="text" name="txt_field_name_comm[]" class="form-control txt_field_name_comm pull-left" id="txt_field_name_comm_' +
            f +
            '" placeholder="Field Name"><select class="form-control txt_cal_types_comm pull-left numbersOnly extrapricescomm chosen" name="txt_cal_types_comm[]" id="txt_cal_types_comm"><option value="1" selected>+</option><option value="2">-</option></select></td><td><input type="text" name="txt_field_value_comm[]" class="form-control txt_field_value_comm totalcalc extrapricescomm pull-right text-right numberss" id="txt_field_value_comm" min="0" max="' +
            itemTot +
            '"></td><td><button type="button" class="btn btn-danger pull-left removeextraitems"><i class="fa fa-minus" aria-hidden="true"></i></button></td></tr>'
        );

        $('.extrapricescomm').on('focusout change', function() {
            calculateSCitems();
        });
        getAllExtraCharges(f);
        validatefunctions();
    });
    $('table').on("click", ".removeextraitems", function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        calculateSCitems();
        //setTimeout(function() { ProductDisable(); }, 500);
    });



    $('.txt_state').on('change', function() {

        var getintval = $(this).find("option:selected").attr('data-code');
        $('.interst').hide();
        $('.intrast').hide();

        if (getintval == 33) {

            $('.intrast').show();
            $('.intrast').find('input').prop("disabled", false);
            $('.interst').find('input').prop("disabled", true);


        } else {
            //$('#gst_per').val(' ');
            $('.interst').show();
            $('.interst').find('input').prop("disabled", false);
            $('.intrast').find('input').prop("disabled", true);



        }
        cal();
    });
    getCostTypeListing(1);

    function getCostTypeListing(types) {
        // var typesval = $('.txt_types_' + types).find("option:selected").val();

        $('.txt_price_type_' + types).html('<option selected >SELECT ONE </option>');


        //  type_tables, table_pk_id, orderid
        $('.txt_price_type_' + types).append(
            '<option value="1">First Copy</option><option value="2">Additional Copy</option>');


    }

    function getCity() {
        $('#txt_customer_city').empty();
        $('#txt_customer_city').append('<option value=""  selected>SELECT CITY</option>');
        $.post("modules/sales/ajax_functions_commercial.php", {
                mode: 'getAllCities',
            },
            function(data, status) {
                var data = jQuery.parseJSON(data);
                var cityNameOpt = '';
                if (data.length > 0) {
                    var cityNameOpt = '';
                    for (var i in data) {

                        cityNameOpt = cityNameOpt + '<option value=' + data[i]['pk_city_id'] + '>' + data[i]['city'] +
                            '</option>';
                    }
                    $('#txt_customer_city').append(cityNameOpt);
                }

            });

    }

    function getTypesListing(type) {
        //alert('test');
        $.ajax({
            url: "modules/products/ajax_functions_commercial.php",
            data: {
                'mode': 'getTypesListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('.txt_itemtypes_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_types_id == '9999') {
                        //  type_tables, table_pk_id, orderid
                        $('.txt_itemtypes_' + type).append('<option value="' + response[0][i]
                            .pk_types_id + '" data-types="2" data-tables="' + response[0][i].type_tables +
                            '" data-pkid="' + response[0][i].table_pk_id + '">' + response[0][i]
                            .types_name + ' </option>');
                    } else {

                        $('.txt_itemtypes_' + type).append('<option value="' + response[0][i].pk_types_id +
                            '" data-types="1" data-tables="' + response[0][i].type_tables +
                            '" data-pkid="' + response[0][i].table_pk_id + '">' + response[0][i]
                            .types_name + '</option>');
                    }
                }


            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    getComercialorNonItemsType(1);

    function getComercialorNonItemsType(type) {
        //alert('test');
        var typesid = 1;
        var itemtypeId = 1;
        /*  var typesid = $('.txt_types_' + type).find("option:selected").val();
          var itemtypeId = $('.txt_itemtypes_' + type).find("option:selected").val();*/
        //   var pkid = $('.txt_itemtypes_' + type).find("option:selected").attr('data-pkid');


        $.ajax({
            url: "modules/sales/ajax_functions_commercial.php",
            data: {
                'mode': 'getComercialorNonItemsType',
                'typesid': typesid,
                'itemtypeId': itemtypeId
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('.txt_item_' + type).html('<option selected >SELECT ONE</option>');
                $('.itemsdata').show();
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_items_id == '9999') {
                        //  type_tables, table_pk_id, orderid
                        $('.txt_item_' + type).append('<option value="' + response[0][i]
                            .pk_items_id + '"  data-items="2">' + response[0][i].fk_item_id +
                            ' </option>');
                    } else {

                        $('.txt_item_' + type).append('<option value="' + response[0][i]
                            .pk_items_id + '"  data-items="1" >' + response[0][i].fk_item_id +
                            '</option>');
                    }
                }


            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function getProductListing(type) {
        //alert('test');
        $.ajax({
            url: "modules/products/ajax_functions_commercial.php",
            data: {
                'mode': 'getProductListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_product_name_' + type).html('');
                $('.txt_product_name_' + type).html('<option selected >Select One</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_product_id == '9999') {

                        $('.txt_product_name_' + type).append('<option value="' + response[0][i]
                            .pk_product_id + '" data-types="2">' + response[0][i].product_name +
                            ' </option>');
                    } else {

                        $('.txt_product_name_' + type).append('<option value="' + response[0][i]
                            .pk_product_id + '" data-types="1">' + response[0][i].product_name +
                            '</option>');
                    }
                }


            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function getCategoryListing(type) {
        $.ajax({
            url: "modules/sales/ajax_functions_commercial.php",
            data: {
                'mode': 'getCategoryListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {

                //$('.txt_product_name').chosen('destroy');
                $('.txt_category_' + type).html('');
                $('.txt_category_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_product_id == '9999') {

                        $('.txt_category_' + type).append('<option value="' + response[0][i]
                            .pk_cat_id + '" data-types="2">' + response[0][i].cat_name + '</option>');
                    } else {

                        $('.txt_category_' + type).append('<option value="' + response[0][i]
                            .pk_cat_id + '" data-types="1">' +
                            response[0][i].cat_name + '</option>');
                    }
                }


            },
            error: function(response) {
                console.log(response);
            }
        });
    }

    function addrow() {
        var cusId = $('#txt_customer_name').val();
        var tcont = $('tbody.itemclone tr').length;
        var deleted = $('#deleted').val();
        zz = parseInt(tcont) + 1 + parseInt(deleted);
        console.log(zz);
        $('.nodata').remove();
        $('table .itemclone').append('<tr><td ><select  class="form-control txt_item  txt_item_' + zz +
            '" name="txt_item[]" id="txt_item_' + zz + '" data-czid="' + zz +
            '"  title="" onchange="cal()"></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
            zz + '" min="0" max="999999" id="txt_product_qty_' + zz +
            '" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value="1"></td><td><select class="form-control txt_price_type txt_price_type_' +
            zz + ' " data-czid="' + zz + '"  name="txt_price_type[]" id="txt_price_type_' + zz +
            '" title="Price Type" onchange="cal()"></select></td><td><select class="form-control txt_orientation txt_orientation_' +
            zz + '"  name="txt_orientation[]" id="txt_orientation_' + zz +
            '" title="Orientation"  ><option value="">Select Orientation</option><option value="1">Length</option><option value="2">Breadth </option><option value="">None </option></select></td><td ><input type="text" name="txt_price[]" id="txt_price_' +
            zz + '" onkeyup="cal()" class="form-control pricefield txt_price txt_price_' + zz +
            ' numberss text-right" title="Price"><input type="hidden" class="txt_comm txt_comm_' + zz +
            '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
            zz + '" class="form-control txt_final_total_' + zz +
            ' numberss txt_final_total text-right" title="Grand Total" readonly></td><td><button type="button" name="removeitems" id="removeitems" class="btn btn-danger removeitems" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>'
        );
        //getTypesListing(zz);
        //getProductListing(zz);
        getCategoryListing(zz);
        getComercialorNonItemsType(zz);
        getCostTypeListing(zz);

        var types = $('.txt_types_' + zz).find("option:selected").val();
        $('.txt_price_type_' + zz).trigger('change');
        if (types == 2) {
            getTypesListing(zz);


        } else {
            $('.txt_itemtypes_' + zz).html('<option selected >Select One</option><option value="1">Product</option>');

        }

    }

    function calAdvance(e) {
        var grandtotal = $('#txt_grand_total').val();
        var advance = $('#discount_final4').val();
        $('#discount_final_amt4').val(parseFloat(advance).toFixed(2));
        var pendamt = 0;
        if (parseFloat(advance) > 0) {
            pendamt = parseFloat(grandtotal) - parseFloat(advance);
        } else {
            pendamt = parseFloat(grandtotal);
        }

        $('#discount_final_amt5').val(parseFloat(pendamt).toFixed(2));
    }

    function cal() {
        var deleted = $('#deleted').val();
        var rowCount = $('.itemTable >tbody >tr').length;
        var total_length = parseFloat(rowCount) + parseFloat(deleted);
        var total_total_amount = 0;
        var total_amount = 0;
        var cgst_amttot = 0;
        var sgst_amttot = 0;
        var igst_amttot = 0;
        var total_amounts = 0;
        console.log('length = ' + total_length);
        for (var i = 1; i <= total_length; i++) {
            var taxable_total = 0;
            var qty = $("#txt_product_qty_" + i).val();
            if (parseFloat(qty) > 0) {
                qty = qty;

            } else {
                qty = 0;
            }

            var price = $("#txt_price_" + i).val();
            if (parseFloat(price) > 0) {
                price = price;
            } else {
                price = 0;
            }
            taxable_total = parseFloat(qty) * parseFloat(price);
            //   $("#txt_total_"+i).val(parseFloat(taxable_total).toFixed(2));
            if (parseFloat(taxable_total) > 0) {} else {
                rice = 0;
            }
            taxable_total = parseFloat(qty) * parseFloat(price);
            //   $("#txt_total_"+i).val(parseFloat(taxable_total).toFixed(2));
            if (parseFloat(taxable_total) > 0) {} else {
                total_total_amount = total_total_amount + 0;
                // $("#txt_total_"+i).val("");
                $("#txt_final_total_" + i).val("");
            }
            var total_amount = parseFloat(taxable_total);
            total_amounts += taxable_total;
            total_total_amount = total_total_amount + total_amount;
            $("#txt_final_total_" + i).val(parseFloat(total_amount).toFixed(2));
        }
        $("#txt_item_total").val(parseFloat(total_total_amount).toFixed(2));
        var txtstate = $('.txt_state').find("option:selected").attr('data-code');
        console.log(txtstate);
        var csgst_total_final_amount = 0;
        var igst_total_final_amount = 0;
        if (txtstate == 33) {
            /*CGST*/
            var cgst = $("#cgst_per").val();
            if (parseFloat(cgst) > 0) {
                cgst = cgst;
            } else {
                cgst = 0;
            }
            var cgst_per = parseFloat(cgst) / 100;
            var cgst_amt = parseFloat(cgst_per) * (parseFloat(total_amounts));
            if (parseFloat(cgst_amt) > 0) {
                $("#cgst_total").val(parseFloat(cgst_amt).toFixed(2));
                cgst_amttot = cgst_amttot + parseFloat(cgst_amt);
            } else {
                $("#cgst_total").val("");
            }
            var ctotalamt = 0;
            var cgsttype = $('.txt_intstate').find("option:selected").val();
            if (cgsttype == 1) {
                var cinclusiveGST = parseFloat(total_total_amount) - parseFloat(cgst_amttot)
                //$('.txt_total').val(inclusiveGST);
                $('.txt_item_total').val(cinclusiveGST);
                ctotalamt = parseFloat(cinclusiveGST);
            } else {
                var cexclusiveGST = parseFloat(total_total_amount) + parseFloat(cgst_amttot)
                //$('.txt_total').val(exclusiveGST);
                $('.txt_item_total').val(total_total_amount);
                ctotalamt = parseFloat(total_total_amount);
            }
            //  var totalamt = $('.txt_total').val();
            var cgst_total_final_amount = parseFloat(ctotalamt) + parseFloat(cgst_amt);


            /*SGST*/
            var sgst = $("#sgst_per").val();
            if (parseFloat(sgst) > 0) {
                sgst = sgst;
            } else {
                sgst = 0;
            }
            var sgst_per = parseFloat(sgst) / 100;
            var sgst_amt = parseFloat(sgst_per) * (parseFloat(total_amounts));
            if (parseFloat(sgst_amt) > 0) {
                $("#sgst_total").val(parseFloat(sgst_amt).toFixed(2));
                sgst_amttot = sgst_amttot + parseFloat(sgst_amt);
            } else {
                $("#sgst_total").val("");
            }
            var stotalamt = 0;
            var sgsttype = $('.txt_intstate').find("option:selected").val();
            if (sgsttype == 1) {
                var sinclusiveGST = parseFloat(total_total_amount) - parseFloat(sgst_amttot)
                //$('.txt_total').val(inclusiveGST);
                $('.txt_item_total').val(sinclusiveGST);
                stotalamt = parseFloat(sinclusiveGST);
            } else {
                var sexclusiveGST = parseFloat(total_total_amount) + parseFloat(sgst_amttot)
                //$('.txt_total').val(exclusiveGST);
                $('.txt_item_total').val(total_total_amount);
                stotalamt = parseFloat(total_total_amount);
            }
            //  var totalamt = $('.txt_total').val();
            var csgst_total_final_amount = parseFloat(stotalamt) + parseFloat(sgst_amt) + parseFloat(cgst_amt);


        } else {

            /*IGST*/
            var igst = $("#igst_per").val();
            if (parseFloat(igst) > 0) {
                igst = igst;
            } else {
                igst = 0;
            }
            var igst_per = parseFloat(igst) / 100;
            var igst_amt = parseFloat(igst_per) * (parseFloat(total_amounts));
            if (parseFloat(igst_amt) > 0) {
                $("#igst_total").val(parseFloat(igst_amt).toFixed(2));
                igst_amttot = igst_amttot + parseFloat(igst_amt);
            } else {
                $("#igst_total").val("");
            }
            var itotalamt = 0;
            var igsttype = $('.txt_intstate').find("option:selected").val();
            if (igsttype == 1) {
                var iinclusiveGST = parseFloat(total_total_amount) - parseFloat(igst_amttot)
                //$('.txt_total').val(inclusiveGST);
                $('.txt_item_total').val(iinclusiveGST);
                itotalamt = parseFloat(iinclusiveGST);
            } else {
                var iexclusiveGST = parseFloat(total_total_amount) + parseFloat(igst_amttot)
                //$('.txt_total').val(exclusiveGST);
                $('.txt_item_total').val(total_total_amount);
                itotalamt = parseFloat(total_total_amount);
            }
            //  var totalamt = $('.txt_total').val();
            var igst_total_final_amount = parseFloat(itotalamt) + parseFloat(igst_amt);


        }


        var discount_final1 = $("#discount_final1").val();

        if (parseFloat(discount_final1) > 0) {} else {
            discount_final1 = 0;
        }
        var caltype1 = $("#txt_cal_type1").find("option:selected").val();
        var discount_final_amt1 = '';
        if (caltype1 == 1) {
            $("#discount_final1").removeAttr('max');
            discount_final_amt1 = parseFloat(discount_final1);

        } else {
            $("#discount_final1").attr('max', 100);
            var discount_final_per1 = parseFloat(discount_final1) / 100;
            discount_final_amt1 = parseFloat(discount_final_per1) * parseFloat(total_amounts);

        }


        if (parseFloat(discount_final_amt1) > 0) {
            $("#discount_final_amt1").val(parseFloat(discount_final_amt1).toFixed(2));
        } else {
            $("#discount_final_amt1").val("");
        }
        var discommper1 = 0.00;
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers = $('.discount_type1').val();
        //var enteredamt = $(this).val();

        //if(enteredamt){
        if (calpers == 1) {
            discommper1 += parseFloat(discount_final_amt1, 10) || 0;
        }
        if (calpers == 2) {
            discommper1 -= parseFloat(discount_final_amt1, 10) || 0;
        }
        var distot1 = discommper1.toFixed(2);

        //  var distot1 = discommper1.toFixed(2);
        //});



        var discount_final2 = $("#discount_final2").val();

        if (parseFloat(discount_final2) > 0) {} else {
            discount_final2 = 0;
        }


        var caltype2 = $("#txt_cal_type2").find("option:selected").val();
        var discount_final_amt2 = '';
        if (caltype2 == 1) {
            $("#discount_final2").removeAttr('max');
            discount_final_amt2 = parseFloat(discount_final2);

        } else {
            $("#discount_final2").attr('max', 100);

            var discount_final_per2 = parseFloat(discount_final2) / 100;
            discount_final_amt2 = parseFloat(discount_final_per2) * parseFloat(total_amounts);
        }



        if (parseFloat(discount_final_amt2) > 0) {
            $("#discount_final_amt2").val(parseFloat(discount_final_amt2).toFixed(2));
        } else {
            $("#discount_final_amt2").val("");
        }
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers = $('.discount_type2').val();
        //var enteredamt = $(this).val();
        var discommper2 = 0.00;

        //if(enteredamt){
        if (calpers == 1) {
            discommper2 += parseFloat(discount_final_amt2, 10) || 0;
        }
        if (calpers == 2) {
            discommper2 -= parseFloat(discount_final_amt2, 10) || 0;
        }

        //});
        var distot2 = discommper2.toFixed(2);

        var discount_final3 = $("#discount_final3").val();

        if (parseFloat(discount_final3) > 0) {} else {
            discount_final3 = 0;
        }


        var caltype3 = $("#txt_cal_type3").find("option:selected").val();
        var discount_final_amt3 = '';
        if (caltype3 == 1) {
            $("#discount_final3").removeAttr('max');
            discount_final_amt3 = parseFloat(discount_final3);

        } else {
            $("#discount_final3").attr('max', 100);
            var discount_final_per3 = parseFloat(discount_final3) / 100;
            discount_final_amt3 = parseFloat(discount_final_per3) * parseFloat(total_amounts);
        }




        if (parseFloat(discount_final_amt3) > 0) {
            $("#discount_final_amt3").val(parseFloat(discount_final_amt3).toFixed(2));
        } else {
            $("#discount_final_amt3").val("");
        }
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers3 = $('.discount_type3').val();
        //var enteredamt = $(this).val();
        var discommper3 = 0.00;

        //if(enteredamt){
        if (calpers3 == 1) {
            discommper3 += parseFloat(discount_final_amt3, 10) || 0;
        }
        if (calpers == 2) {
            discommper3 -= parseFloat(discount_final_amt3, 10) || 0;
        }
        var distot3 = discommper3.toFixed(2);

        //  var distot = discommper.toFixed(2);
        //});

        var discount_final4 = $("#discount_final4").val();

        if (parseFloat(discount_final4) > 0) {} else {
            discount_final4 = 0;
        }


        var caltype4 = $("#txt_cal_type4").find("option:selected").val();
        var discount_final_amt4 = '';
        if (caltype4 == 1) {
            $("#discount_final4").removeAttr('max');
            discount_final_amt4 = parseFloat(discount_final4);

        } else {
            $("#discount_final4").attr('max', 100);


            var discount_final_per4 = parseFloat(discount_final4) / 100;
            discount_final_amt4 = parseFloat(discount_final_per4) * parseFloat(total_amounts);
        }


        if (parseFloat(discount_final_amt4) > 0) {
            $("#discount_final_amt4").val(parseFloat(discount_final_amt4).toFixed(2));
        } else {
            $("#discount_final_amt4").val("");
        }
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers = $('.discount_type4').val();
        //var enteredamt = $(this).val();
        var discommper4 = 0.00;
        //if(enteredamt){
        if (calpers == 1) {
            discommper4 += parseFloat(discount_final_amt4, 10) || 0;
        }
        if (calpers == 2) {
            discommper4 -= parseFloat(discount_final_amt4, 10) || 0;
        }
        var distot4 = discommper4.toFixed(2);

        // var distot = discommper.toFixed(2);
        //});

        var discount_final5 = $("#discount_final5").val();

        if (parseFloat(discount_final5) > 0) {} else {
            discount_final5 = 0;
        }


        var caltype5 = $("#txt_cal_type5").find("option:selected").val();
        var discount_final_amt5 = '';
        if (caltype5 == 1) {
            $("#discount_final5").removeAttr('max');
            discount_final_amt5 = parseFloat(discount_final5);

        } else {
            $("#discount_final5").attr('max', 100);
            var discount_final_per5 = parseFloat(discount_final5) / 100;
            discount_final_amt5 = parseFloat(discount_final_per5) * parseFloat(total_amounts);
        }


        if (parseFloat(discount_final_amt5) > 0) {
            $("#discount_final_amt5").val(parseFloat(discount_final_amt5).toFixed(2));
        } else {
            $("#discount_final_amt5").val("");
        }
        //$('.txt_field_value_comm').each(function() {
        //var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
        var calpers5 = $('.discount_type5').val();
        //var enteredamt = $(this).val();
        var discommper5 = 0.00;

        //if(enteredamt){
        if (calpers5 == 1) {
            discommper5 += parseFloat(discount_final_amt5, 10) || 0;
        }
        if (calpers == 2) {
            discommper5 -= parseFloat(discount_final_amt5, 10) || 0;
        }

        var distot5 = discommper5.toFixed(2);

        var distotaamount = parseFloat(distot1) + parseFloat(distot2) + parseFloat(distot3);
        //});
        var GST_totamount = parseFloat(csgst_total_final_amount) + parseFloat(igst_total_final_amount);
        var grand_total = parseFloat(GST_totamount) + parseFloat(distotaamount);
        $("#txt_grand_total").val(parseFloat(grand_total).toFixed(2));

        calAdvance();

        // var grand_total = parseFloat(gst_total_final_amount) ;
        //$("#txt_grand_total").val(parseFloat(grand_total).toFixed(2));
    }
    $(document).on("keypress keyup blur", ".numbersOnly", function(event) {
        var $input = $(this);
        var regex = /^\d+$/;
        if (!regex.test($input.val())) {
            $input.val($input.val().replace(/\D/, ''));
        }
    });
    $(document).on("keypress", '.numberss', function(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    // $.ajaxSetup({ traditional: true });

    // $.ajaxSetup({ traditional: true });

    // $.ajaxPrefilter(function (options) {
    //     options.traditional = true;
    // });



    $('#form_advance_noncomm_add').validate({
        ignore: [],
        rules: {
            txt_customer_name: {
                required: true
            },
            txt_payment_type: {
                required: true
            },
            txt_pi_date: {
                required: true
            },
            adv_amount: {
                required: true,
                min: 1
            },
            "txt_estimate_name[]": {
                required: true
            },
            "split_amount[]": {
                required: true,
                min: 1,
                checkAdvanceAmount: true
            }

        },
        messages: {
            txt_customer_name: {
                required: 'This field is required.'
            },
            txt_pi_date: {
                required: 'This field is required.'
            },
            txt_payment_type: {
                required: 'This field is required.'
            },
            adv_amount: {
                required: 'This field is required.'
            },
            "txt_estimate_name[]": {
                required: 'This field is required.'
            },
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") === 'txt_customer_name') {
                error.insertAfter($("#txt_customer_name-error"));

            } else if (element.attr("name") === 'txt_estimate_name') {
                error.insertAfter($("#txt_estimate_name-error"));
            } else if (element.attr("name") === 'txt_payment_type') {
                error.insertAfter($("#txt_payment_type-error"));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            var formData = new FormData(form);

            // ✅ Check allocation
            if ($(".allocInput").length === 0) {
                alert("Please click 'Allocate Advance' before saving.");
                return false;
            }

            // for (const pair of formData.entries()) {
            //     console.log(pair[0], pair[1]);
            // }
            // return;
            $.ajax({
                url: "modules/advance_split_pay/ajax_function.php",
                data: formData,
                type: 'post',
                async: false,
                dataType: 'json',
                success: function(response) {
                    if (response) {
                        if (response == 1) {
                            swal({
                                title: "Success!",
                                text: "Advance has been added successfully!.",
                                type: "success",
                                timer: 1000,
                                buttons: false,
                            }).then(function() {
                                window.location.href = "index.php?erp=147&type=2";
                            });
                        } else {
                            swal("Failed!", "Something went wrong, Try again!", "error");
                        }

                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                    }
                },
                error: function(response) {
                    $('.btn_save').prop("disabled", false);
                    console.log(response);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        },
    });
    $('#txt_estimate_name').on('change', function() {
        $.ajax({
            url: "modules/advance_split_pay/ajax_function.php",
            data: {
                'estid': $('#txt_estimate_name').val(),
                'mode': 'getestAmount',
                'type': <?php echo $_GET['type']; ?>
            },
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                var remainamt = 0;
                var advamt = 0;
                $('#advanceinfomsg').empty();
                if (response.advcount) {
                    remainamt = parseFloat(response.grand_total) - parseFloat(response.advcount);
                    advamt = parseFloat(response.advcount);
                    $('.adv_amount').val(remainamt);
                    $('#advanceinfomsg').append('<p class="pull-right">Advance Amount(₹): ' + advamt +
                        '</p>');


                    // $('#adv_amount').val(advamt);

                } else {
                    remainamt = parseFloat(response.grand_total);
                    $('.adv_amount').val(parseFloat(remainamt));
                    advamt = 0;

                    $('#advanceinfomsg').append('<p class="pull-right">Advance Amount(₹): ' + advamt +
                        '</p>');
                    //  $('#adv_amount').val(remainamt);


                }



                //  advcount  ngrand_total":"944.00
            }
        });
    });

    $('#txt_customer_name').trigger('change');

    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });
</script>