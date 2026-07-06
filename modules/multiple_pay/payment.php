<?php

//error_reporting(E_ALL);
include "classes/class_category.php";
$obj_cat = new Category('', '', '', '', '', '');

$getcate = $obj_cat->getallcategory();
$cat_data = array();
while ($cat_rows = mysqli_fetch_array($getcate)) {
    $cat_data[] = $cat_rows;
}

include "classes/class_customer.php";
$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);
include "classes/class_advance_commornon.php";

$obj_advancecommornon = new Advance_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

$getcustomer = $obj_cus->getAllCustomer();
$cus_data = array();
while ($cus_rows = mysqli_fetch_array($getcustomer)) {
    $cus_data[] = $cus_rows;
}
/*
$getestimate = $obj_saleestimate->getAllEstimate_noncomm();
$estimate_data = array();
while ($est_rows = mysqli_fetch_array($getestimate)) {
$estimate_data[] = $est_rows;
}*/

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

$getestimate = array();
$tablename = "";
if ($_GET['type'] == 1) {
    $sono = implode(',', $_POST['id']);
    $getestimate = $obj_advancecommornon->getAllEstimateComm($sono);
    $tablename = 'erp_advance_comm';
} elseif ($_GET['type'] == 2) {
    $sono = implode(',', $_POST['id']);

    $getestimate = $obj_advancecommornon->getAllEstimateNonComm($sono);
    $tablename = 'erp_advance_noncomm';

}
$estimate_data = array();
$pending = "";
$grand_total = 0;
$receiptsval = 0;
$advanceval = 0;
while ($est_rows = mysqli_fetch_array($getestimate)) {

    $estimate_data[] = $est_rows;
    $advance = $obj_advancecommornon->getReceiptsadv($est_rows['soId'], 0, $tablename);
    $receipts = $obj_advancecommornon->getReceiptsrec($est_rows['soId'], 1, $tablename);

    $grand_total += $est_rows['grand_total'];

    $receiptsval += $receipts;
    $advanceval += $advance;

}
var_dump($grand_total);
var_dump($receiptsval);
var_dump($advanceval);
$pending = $grand_total - ($receiptsval + $advanceval);

?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php if ($_GET['type'] == 1) {?>
                    <h1>Add Commercial Bulk Receipts</h1>
                    <?php } elseif ($_GET['type'] == 2) {?>
                    <h1>Add NonCommercial Bulk Receipts</h1>
                    <?php }?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Bulk Receipts</li>
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
                        <?php if ($_GET['type'] == 1) {?>
                        <form class="form-horizontal theme-form" id="form_advance_comm_add" autocomplete="off"
                            novalidate="novalidate">
                            <?php } elseif ($_GET['type'] == 2) {?>
                            <form class="form-horizontal theme-form" id="form_advance_noncomm_add" autocomplete="off"
                                novalidate="novalidate">
                                <?php }?>
                                <div class="card-body">
                                    <div id="stepwizard">
                                        <div class="col-4">

                                            <!--   <div class="form-group">
                                            <label for="" class="control-label">Customer <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_customer_name "
                                                        name="txt_customer_name" id="txt_customer_name"
                                                       >
                                                        <option value="">Select Customer</option>
                                                        <?php for ($i = 0; $i < count($cus_data); $i++) {?>
                                                        <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">
                                                            <?php echo $cus_data[$i]['cus_name']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <span class="error" id="txt_customer_name-error"></span>
                                            </div>
                                        </div>-->
                                            <div class="form-group">
                                                <label for="" class="control-label">Estimate No <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <div>
                                                        <select class="form-control txt_estimate_name "
                                                            name="txt_estimate_name[]" id="txt_estimate_name" multiple
                                                            readonly>
                                                            <option value="">Select </option>
                                                            <?php for ($i = 0; $i < count($estimate_data); $i++) {?>
                                                            <option value="<?php echo $estimate_data[$i]['soId']; ?>"
                                                                selected>
                                                                <?php echo $estimate_data[$i]['sono']; ?>
                                                            </option>
                                                            <?php }?>
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
                                            <!-- <div class="form-group">
                                            <label for="" class="control-label">Estimated Delivery Date <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_delivery_date hasDatepicker valid"
                                                    name="txt_delivery_date" id="txt_delivery_date" placeholder="DD/MM/YYYY"
                                                    aria-invalid="false">
                                                <span class="error" id="txt_delivery_date_error"></span>
                                            </div>
                                        </div> -->
                                        </div>
                                        <div class="col-4 col-md-12">
                                        <div class="form-group">
                                                <label for="" class="control-label">Balance Receivable <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <input type="number" class="form-control pending_amount"
                                                        name="pending_amount" min="<?php echo $pending; ?>" max="<?php echo $pending; ?>" id="pending_amount"
                                                        data-amt="<?php echo $pending; ?>"
                                                        value="<?php echo $pending; ?>">
                                                    <span class="error" id="txt_pending_amount_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">


                                                <label for="" class="control-label">Discount </label>

                                                <div class="control-field" style="
                                                    display: table;
                                                    ">
                                                    <input type="number" class="form-control txt_discountper"
                                                        name="txt_discountper" min="0" max="100" id="txt_discountper" value=""     style="
                                                    width: 20%; float: left;
                                                    display: table;
                                                    "><span style="
                                                    width: 10%;
                                                    float: left;
                                                    display: table;
                                                    text-align: center;
                                                    ">%</span><input type="number" class="form-control txt_discount"
                                                        name="txt_discount" min="0" id="txt_discount" value="" style="
                                                    /* float: right; */
                                                    width: 70%;
                                                    display: table;
                                                    ">
                                                    <span class="error" id="txt_discount_error"></span>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label">Final Amount </label>
                                                <div class="control-field">
                                                    <input type="number" class="form-control adv_amount"
                                                        name="adv_amount" min="0" id="adv_amount"
                                                        data-amt="<?php echo $pending; ?>"
                                                        value="<?php echo $pending; ?>">
                                                    <span class="error" id="txt_adv_amount_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer text-right">
                                    <input type="hidden" name="deleted" value="0" id="deleted" />
                                    <?php if ($_GET['type'] == 1) {?>
                                    <input type="hidden" name="mode" value="addAdvancecommmulti" />
                                    <?php } elseif ($_GET['type'] == 2) {?>
                                    <input type="hidden" name="mode" value="addAdvanceNonCommmulti" />
                                    <?php }?>

                                    <span class="pull-left" style="text-align: center;color:#ff0000">
                                        <p>Advance: <?php echo $advanceval; ?></p>
                                        <p>Receipt: <?php echo $receiptsval; ?></p>
                                    </span><span class="pull-right">
                                        <input type="hidden" name="cus_id" id="cus_id">
                                        <button type="submit" id="advMultibtn" class="btn_save btn btn-success btn-lg">Save</button>
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
.theme-form .control-field {
    /*display: flex;*/
}

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
$('#txt_estimate_name').select2();

$('.txt_customer_name').val(<?php echo $_GET['cid']; ?>);
$('.txt_estimate_name').val(<?php echo $_GET['eid']; ?>);


$("#txt_customer_name").change(function() {
    getCustomerBaseEstimate();
});

function getCustomerBaseEstimate() {
    //alert($('option:selected', this).val());
    var c_name = $("#txt_customer_name").find('option:selected').val();
    if (c_name != '') {
        $.ajax({
            url: "modules/multiple_pay/ajax_functions.php",
            data: {
                'mode': 'get_estimate_by_customer',
                'customer': c_name,
                'type': <?php echo $_GET['type']; ?>
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                console.log(response.length);
                //alert(response[0].PK_ES_ID);
                $("#txt_estimate_name").html('');
                $('#txt_estimate_name').append($('<option value="">Select Estimate</option>'));

                if (response.length > 0) {
                    for (var i = 0; i < response.length; i++) {
                        //   console.log(response[i].sono);
                        $('#txt_estimate_name').append($('<option value="' + response[i].PK_ES_ID + '">' +
                            response[i].sono + '</option>'));

                    }


                    setTimeout(function() {
                        $('#txt_estimate_name').find('option[value="' + <?php echo $_GET['id']; ?> +
                            '"]').attr("selected", true);
                    }, 1000);
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
/*

$('#txt_estimate_name').on('change', function(){
  //  var estid  = $('#txt_estimate_name').find('option:selected').val();
  //  $("#txt_estimate_name").select2("destroy").select2();
     var estid  =  $("#txt_estimate_name option:selected").map(function(){ return this.value }).get().join(", ");

    
         $.ajax({
        url: "modules/multiple_pay/ajax_functions.php",
            data: {'estid':estid,'mode':'getestAmount','type':<?php echo $_GET['type']; ?>},
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                var remainamt = 0;
                var advamt = 0;
                if(response.advcount)
               {
                    remainamt = parseFloat(response.grand_total) - parseFloat(response.advcount);
                    advamt =   parseFloat(response.advcount);
                    $('#advanceinfomsg').empty();

                   $('.adv_amount').val(remainamt);
                    $('#advanceinfomsg').append('<p class="pull-right">Advance Amount(₹): '+advamt+'</p>');


                   // $('#adv_amount').val(advamt);
                    
               }
                else{

                    remainamt =parseFloat(response.grand_total);
                    $('.adv_amount').val(parseFloat(remainamt));
                    advamt = 0;

                    $('#advanceinfomsg').empty();

                    $('#advanceinfomsg').append('<p class="pull-right">Advance Amount(₹): '+advamt+'</p>');
                  //  $('#adv_amount').val(remainamt);


                }
                          


              //  advcount  ngrand_total":"944.00
            }
            });
    $.ajax({
            url: "modules/multiple_pay/ajax_functions.php",
            data: {'ordernumber':estid,'mode':'checkBulkorderstatusdelivered','typ':<?php echo $_GET['type']; ?>},
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                    if(response)
                    {
                   
                      //  $('option[value="'+response.esid+'"]').prop('disabled', !$('option[value="'+response.esid+'"]').prop('disabled'));

                        $('#addbillstatusMSSG').html('<div class="addbillstMSSG"><i class="fa fa-exclamation-circle" style="font-size:20px;color:#dfd6d6"><span style="margin: 3px;">Kindly change the status of the estimate  "DELIVERED"  before adding bill receipts. ('+response.sono+')</span></i></div>');
            
                }
            }

        });

});*/
$("#txt_estimateere_name").change(function() {
    //alert($('option:selected', this).val());
    //var cus = $("#txt_customer_name").val());
    var e_name = $('option:selected', this).val();
    if (e_name != '') {
        $.ajax({
            url: "modules/multiple_pay/ajax_functions.php",
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

$('#txt_discount').on('keyup keypress', function(e) {
    var adv_amount = $('#adv_amount').attr('data-amt');
    var discount = $(this).val();
    if (discount > 0) {
        var disPendingAmt = parseFloat(adv_amount) - parseFloat(discount);

        $('#adv_amount').val(disPendingAmt);
    } else {
        $('#adv_amount').val(adv_amount);

    }

});
$('#form_advance_comm_add').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
$('#txt_customer_name').select2();
$(".nav-link").removeClass("active");
$(".nav-item").removeClass("menu-open");

$(".estimate ").addClass("menu-open");
$(".estimate_add .nav-link").addClass("active");




$('#txt_customer_city').select2();


$(document).on("keypress", '.numberss', function(event) {
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});
$.validator.setDefaults({
    ignore: ":hidden:not(select,textarea)"
});
$('#form_advance_comm_add').validate({
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
        pending_amount:{
            required: true,
            
        },
    
        adv_amount: {
            required: true,
            remote: {
                url: "modules/multiple_pay/ajax_functions.php",
                type: "post",
                data: {
                    mode: "check_amountmulti",
                    adv_amount: function() {
                        return $("#adv_amount").val();
                    },
                    'estimate_no': function() {
                        /*var cnt = 0;
                        $("#txt_estimate_name option:selected").each(function() {
                            return  cnt +=Number(this.value);
                        });*/
                        var totAmt = [];
                        $.each($('#txt_estimate_name').find(":selected"), function(i, item) {
                            totAmts = $(item).val();
                            totAmt.push(totAmts);

                        });
                        return totAmt;

                    },
                    type: <?php echo $_GET['type']; ?>
                }
            }
        },
        'txt_estimate_name[]': {
            required: true
        },

    },
    errorPlacement: function(error, element) {
        if (element.attr("name") === 'txt_customer_name') {
            error.insertAfter($("#txt_customer_name-error"));

        } else if (element.attr("name") === 'txt_estimate_name[]') {
            error.insertAfter($("#txt_estimate_name-error"));

        } else {
            error.insertAfter(element);
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
        'txt_estimate_name': {
            required: 'This field is required.'
        },

        pending_amount:{
            required: 'This field is required.',
          
        }

    },
    submitHandler: function(form) {
        $('.btn_save').prop('disabled', true);

        var formData = new FormData($('#form_advance_comm_add')[0]);
        $.ajax({
            url: "modules/multiple_pay/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response) {
                    if (response == 1) {
                        swal({
                            title: "Success!",
                            text: "Bulk receipts has been added successfully!.",
                            type: "success",
                            timer: 1000,
                            buttons: false,
                        }).then(function() {
                            window.location.href = "index.php?erp=114&typ=1";
                        });
                    } else {
                        swal("Failed!", "Something went wrong, Try again!", "error");
                        $('.btn_save ').prop('disabled', false);

                    }

                } else {
                    swal("Failed!", "Something went wrong, Try again!", "error");
                    $('.btn_save').prop('disabled', false);

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
$('#form_advance_noncomm_add').validate({
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
        pending_amount:{
            required: true
        },
            
        adv_amount: {
            required: true,
            remote: {
                url: "modules/multiple_pay/ajax_functions.php",
                type: "post",
                data: {
                    mode: "check_amountmulti",
                    adv_amount: function() {
                        return $("#adv_amount").val();
                    },
                    'estimate_no': function() {
                        /*var cnt = 0;
                        $("#txt_estimate_name option:selected").each(function() {
                            return  cnt +=Number(this.value);
                        });*/
                        var totAmt = [];
                        $.each($('#txt_estimate_name').find(":selected"), function(i, item) {
                            totAmts = $(item).val();
                            totAmt.push(totAmts);

                        });
                        return totAmt;

                    },
                    type: <?php echo $_GET['type']; ?>
                }
            }
        },
        'txt_estimate_name[]': {
            required: true
        },

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
        'txt_estimate_name[]': {
            required: 'This field is required.'
        },
        pending_amount:{
            required: 'This field is required.'
        },
    },
    errorPlacement: function(error, element) {
        if (element.attr("name") === 'txt_customer_name') {
            error.insertAfter($("#txt_customer_name-error"));

        } else if (element.attr("name") === 'txt_estimate_name[]') {
            error.insertAfter($("#txt_estimate_name-error"));

        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function(form) {
        $('#advMultibtn').prop('disabled', true);

        var formData = new FormData($('#form_advance_noncomm_add')[0]);
        $.ajax({
            url: "modules/multiple_pay/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response) {
                    if (response == 1) {
                        swal({
                            title: "Success!",
                            text: "Bulk receipts has been added successfully!.",
                            type: "success",
                            timer: 1000,
                            buttons: false,
                        }).then(function() {
                            window.location.href = "index.php?erp=114&typ=2";
                        });
                    } else {
                        swal("Failed!", "Already record exist !", "error");
                    }
                    $('#advMultibtn').prop('disabled', false);


                } else {
                    swal("Failed!", "Already record exist !", "error");
                    $('#advMultibtn').prop('disabled', false);

                }
            },
            error: function(response) {
                $('#advMultibtn').prop("disabled", false);
                console.log(response);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    },
});

$('#txt_customer_name').trigger('change');

$('#txt_discountper').on('keyup keypress change', function(){

    var adv_amount = $('#pending_amount').val();
    var txt_discountper = $('#txt_discountper').val();

  /*  if(txt_discount > 0 &&  adv_amount > 0)
    {*/
     

     var discountamt =  adv_amount * txt_discountper / 100 ;  // .toFixed(2)

    $('#txt_discount').val(discountamt.toFixed(2)) ;

    var finalamt =  parseFloat(adv_amount) - parseFloat(discountamt);  // .toFixed(2)

    $('#adv_amount').val(finalamt.toFixed(2)) ;
   /* }*/
    

    
})

</script>