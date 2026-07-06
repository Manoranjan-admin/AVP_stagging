<?php
//error_reporting(E_ALL);
/*
include("classes/class_category.php");
include("classes/class_uom.php");
$obj_cat = new Category('','','','','','');
$obj_uom = new Uom('','','','','');
include("classes/class_sale_order.php");
$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$get_sales_order = $obj_saleorder->getsalesorder_edit($_GET['id']);
$sales_order_data=array();
while($data_sales_rows=mysqli_fetch_array($get_sales_order)) {
$sales_order_data[]=$data_sales_rows;
}

$getuom = $obj_uom->getalluom();
$uom_data=array();
while($uom_rows=mysqli_fetch_array($getuom)) {
$uom_data[]=$uom_rows;
}

$getcate = $obj_cat->getallcategory();
$cat_data=array();
while($cat_rows=mysqli_fetch_array($getcate)) {
$cat_data[]=$cat_rows;
}
 */
include "classes/class_customer.php";
$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);
$getcustomer = $obj_cus->getAllCustomer();
$cus_data = array();
while ($cus_rows = mysqli_fetch_array($getcustomer)) {
    $cus_data[] = $cus_rows;
}
/*
include("classes/class_product.php");
$obj_product = new Product('','','','','','','','','','','');
$getproduct = $obj_product->getAllProducts();
$prod_data=array();
while($prod_rows=mysqli_fetch_array($getproduct)) {
$prod_data[]=$prod_rows;
}*/
?>
<div class="content-wrapper" style="min-height: 1342.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Estimate</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">View Estimate</li>
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
                <a href="print_pdf/print_report_SE.php?soid=<?php echo $_GET['id']; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Print</a>

                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <!-- <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div> -->
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal theme-form" id="form_sale_order_edit" novalidate="novalidate">
                            <div class="card-body">
                                <div id="stepwizard">
                                    <!-- <div style="padding: 10px;">
                        <a style="border: 1px solid;padding: 3px 9px;" href="index.php?erp=16&id=<?php echo $_GET['id']; ?>"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                      </div> -->
                                    <input type="hidden" class="form-control txt_so_id" name="txt_so_id" id="txt_so_id"
                                        value=<?php echo $_GET['id']; ?>>
                                    <div class="one-half-column">
                                        <div class="form-group">
                                            <label for="" class="control-label">SE No </label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_seno" value=""
                                                    name="txt_seno" id="txt_seno" placeholder="Auto" title="SE NO"
                                                    readonly="">
                                                <span class="error" id="txt_seno_error"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="control-label">Date <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_pi_date hasDatepicker valid"
                                                    name="txt_pi_date" id="txt_pi_date" placeholder="DD/MM/YYYY"
                                                    required="" aria-required="true" aria-invalid="false" value=""  disabled>
                                                <span class="error" id="txt_pi_date_error"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="control-label">Customer <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_customer_name chosen_required"
                                                        name="txt_customer_name" id="txt_customer_name" title="Customer"
                                                        required="" aria-required="true"  disabled>
                                                        <option value="">Select Customer</option>
                                                    </select>

                                                </div>
                                                <span class="error" id="txt_customer_name-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Reference Number </label>
                                            <div class="control-field">
                                                <input type="text" value="" class="form-control txt_reference_number"
                                                    name="txt_reference_number" id="txt_reference_number"
                                                    placeholder="Reference Number" title="Reference Number"  readonly="">
                                                <span class="error" id="txt_reference_number_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Sales Order No <span class="color">
                                                    *</span></label>
                                            <div class="control-field">
                                                <select class="form-control txt_sc_no chosen_required" id="txt_sc_no"
                                                    name="txt_sc_no[]" multiple  disabled> </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="text-right">
                                      
                                    </div>

                                    <div class="table-div table-responsive">
                                        <table class="table-bordered table thead itemTable">
                                            <thead>
                                                <tr>
                                                    <th width="120">Item Name<span class="color"> *</span></th>
                                                    <th width="120">Category </th>
                                                    <th width="120">Inner Sheet </th>
                                                    <th width="120">Special Effects </th>
                                                    <th width="120">Size</th>
                                                    <th width="120">Quantity <span class="color">*</span></th>
                                                    <th width="120">Price(₹) <span class="color">*</span></th>
                                                    <th width="120">Total (₹) <span class="color"> *</span></th>
                                                </tr>
                                            </thead>
                                            <tbody class="itemclone custom_table_width">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="colum_split">
                                        <div class="one-half-column">
                                        </div>
                                        <div class="one-half-column pull-right custom_table_widths">
                                            <div class="table-div table-responsive">
                                                <table class="table-bordered table thead amountdetails" width="100%"
                                                    cellspacing="0" cellpadding="0">
                                                    <thead>
                                                        <tr>
                                                            <td class="text-right">
                                                                <label style="margin-top: 6px;"
                                                                    class="agents"><strong>Items
                                                                        Total(₹)</strong></label>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="txt_item_total"
                                                                    class="form-control txt_item_total pull-right w-21 text-right numberss"
                                                                    id="txt_item_total" readonly="">
                                                            </td>
                                                            <!-- <td></td> -->
                                                        </tr>
                                                      

                                                    </thead>
                                                    <tbody class="totalamounts">


                                                        <tr class="apRow">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 "
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class=""
                                                                        style="    padding-right: 15px;">DISCOUNT</label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 65% !important;">
                                                                        <input type="text" name="discount_final"
                                                                            id="discount_final" onkeyup="cal()"
                                                                            class="form-control igst pull-left discount_final_1"
                                                                            placeholder="%" max="100" readonly>
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-percent"></i></span>
                                                                    </div>
                                                                    <select
                                                                        class="form-control txt_cal_type_igst pull-left numberss pricefieldchanges extraprices"
                                                                        name="txt_cal_type_igst_final"
                                                                        id="txt_cal_type_igst_final">
                                                                        <option value="1" selected="">-</option>
                                                                        <!-- <option value="2">-</option> -->
                                                                    </select>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="discount_final_amt"
                                                                    class="form-control txt_field_value_comm totalcalc extrapricescomm pull-right text-right numberss"
                                                                    id="discount_final_amt" readonly="readonly" min="0"
                                                                    max="' + itemTot + '">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 interst"
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class="" style="    padding-right: 15px;">GST
                                                                    </label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 65% !important;">
                                                                        <input type="text" name="gst_per" id="gst_per"
                                                                            onkeyup="cal()"
                                                                            class="form-control igst pull-left gst_per"
                                                                            placeholder="%" max="100" readonly>
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-percent"></i></span>
                                                                    </div>
                                                                    <select
                                                                        class="form-control txt_cal_type_igst pull-left numberss pricefieldchanges extraprices"
                                                                        name="txt_cal_type_igst_final"
                                                                        id="txt_cal_type_igst_final">
                                                                        <option value="1" selected="">+</option>
                                                                        <!-- <option value="2">-</option> -->
                                                                    </select>

                                                                </span>

                                                            </td>
                                                            <td>
                                                                <span class="col-md-12 p-0 interst"
                                                                    style="display: block;">

                                                                    <input type="text" name="gst_total"
                                                                        class="form-control gst_total totalcalc  pull-right text-right numberss"
                                                                        id="gst_total" readonly="readonly" min="0"
                                                                        max="' + itemTot + '">

                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">
                                                                <label for="" class="control-label text-right gtotal">
                                                                    <strong>Grand Total(₹)</strong></label>
                                                            </td>
                                                            <td class="text-right">
                                                                <input type="text" name="txt_grand_total"
                                                                    class="form-control txt_grand_total pull-right w-21 text-right"
                                                                    id="txt_grand_total" readonly="" value="0.00">
                                                            </td>
                                                            <!-- <td></td> -->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-body -->
                         
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
<script
    src="assets/dist/js/so_serverdatatable_ajax.js?version=<?php echo md5_file('js/so_serverdatatable_ajax.js'); ?>">
</script>

<style type="text/css">
.theme-form .control-field {
    /*display: flex;*/
}

.select2 {
    width: 100% !important;
}

.one-half-column {
    width: 49.5%;
    padding: 0;
    float: left;
}

.custom_table_widths {
    width: 60%;
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

.custom_table_widths .table-div table tbody tr:nth-child(n+2) td:first-child input {
    width: 80% !important;
}

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
</style>
<script>
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

if (getQueryVariable('id')) {
    var eid = getQueryVariable('id');
    getSEEditValues(eid);
}
$('#form_sale_order_edit').validate({
    rules: {
        txt_customer_name: {
            required: true
        },
        txt_pi_date: {
            required: true
        },
        'txt_product_name[]': {
            required: true
        },
        'txt_uom[]': {
            required: true
        },
        'txt_product_qty[]': {
            required: true
        },
        'txt_price[]': {
            required: true
        },
        'txt_total[]': {
            required: true
        },
        'txt_grand_total[]': {
            required: true
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($('#form_sale_order_edit')[0]);
        $.ajax({
            url: "modules/sales/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Sales Order has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=12";
                    });
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

/*get sales order values edit page */
function getSEEditValues(eid) {
    $.ajax({
        url: "modules/estimate/ajax_functions.php",
        data: {
            'eid': eid,
            'mode': 'getSEEditValues'
        },
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            $("#cover").css("display", "block");
        },
        success: function(response) {
            if (eid == 0) {
                $('table .itemclone').append(
                    "<tr><td class='text-center' colspan='6'>No data available</td></tr>");
            } else {


                $('#proStatus').val(1);
                $('#cus_id').val(response[0].fk_customer_id);
                getCustomersListings(response[0].fk_customer_id);
                getJobOrder(response[0].fk_so_id, vz, response[0].fk_customer_id);
                $('#txt_seno').val(response[0].eno);

                $('#txt_reference_number').val(response[0].reference_number);

                $('#txt_pi_date').val(moment(response[0].sale_date).format('DD/MM/YYYY'));
                $('#txt_item_total').val(parseFloat(response[0].item_total).toFixed(2));
                $('#gst_per').val(parseFloat(response[0].gst_percent).toFixed(2));
                $('#gst_total').val(parseFloat(response[0].gst_total).toFixed(2));
                $('#discount_final').val(parseFloat(response[0].discount_final).toFixed(2));
                $('#discount_final_amt').val(parseFloat(response[0].discount_final_amt).toFixed(2));
                $('#txt_grand_total').val(parseFloat(response[0].grand_total).toFixed(2));
                // $('#txt_gst_total').val(parseFloat(response[0].gst_total).toFixed(2));


                var vz = 0;
                var regex = /(<([^>]+)>)/ig;
                $('table .itemclone').html('');

                for (j = 0; j < response[1].length; j++) {
                    vz++;

                    $('table .itemclone').append(
                        '<tr><td><select class="form-control txt_product_name txt_product_name_' +
                        vz + ' chosen_required" name="txt_product_name[]" id="txt_product_name_' + vz +
                        '" title="Product Name" data-czid="' + vz +
                        '" data-classids="txt_product_name_' + vz +
                        '" disabled></select><input type="hidden" name="pro_type[]" id="pro_type" class="pro_type pro_type_' +
                        vz + '" ></td><td><select class="form-control txt_category txt_category_' + vz +
                        ' chosen_required" name="txt_category[]" id="txt_category_' + vz +
                        '" title="Category" data-czid="1"  disabled></select></td>  <td><select  class="form-control txt_innersheet txt_innersheet_' +
                        vz + '" name="txt_innersheet[]" id="txt_innersheet_' + vz + '" data-czid="' +
                        vz +
                        '"  title="Inner Sheet" disabled></select></td><td><select  class="form-control txt_specialeffects txt_specialeffects_' +
                        vz + '" name="txt_specialeffects[]" id="txt_specialeffects_' + vz +
                        '" data-czid="' + vz +
                        '" title="Special Effects" disabled></select></td><td><select  class="form-control txt_size txt_size_' +
                        vz + '" name="txt_size[]" data-czid="' + vz + '" id="txt_size_' + vz +
                        '" title="Size" disabled></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
                        vz + '" min="0" max="999999" id="txt_product_qty_' + vz +
                        '" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value=' +
                        response[1][j].sep_qty +
                        ' readonly></td> <td ><input type="text" name="txt_price[]" id="txt_price_' + vz +
                        '" class="form-control pricefield txt_price txt_price_' + vz +
                        ' numberss text-right" title="Price"  value=' + response[1][j].sep_price +
                        ' readonly><input type="hidden" class="txt_comm txt_comm_' + vz +
                        '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
                        vz + '" class="form-control txt_final_total_' + vz +
                        ' numberss txt_final_total text-right" title="Grand Total" value=' + response[1]
                        [j].sep_total + ' readonly></td></tr>');


                  //  $('.txt_price_' + response[1].length).attr("readonly", false);
                  



                    
                    getProductListingsEdit(response[1][j].pk_product_id, vz, response[0].fk_customer_id);
                    getCategoryListingsEdit(response[1][j].fk_category_id, vz);
                    getInnerSheetListingEdit(response[1][j].inner_sheet_id, vz);
                    getSpecialEffectsListingEdit(response[1][j].special_effects_id, vz);
                    getSizeListingEdit(response[1][j].size_id, vz);
                    //       getAllGradeListingEdit(response[1][j].fk_grade_id, vz, response[1][j].fk_product_id, response[0].fk_customer_id);
                    //      getAllUOMListingEdit(response[1][j].fk_uom_id, vz, response[1][j].fk_product_id, response[0].fk_customer_id);
                    $('#cgst_final').trigger('change');
                    $('#sgst_final').trigger('change');
                    $('#igst_final').trigger('change');

                }

                // validatefunctions();
            }
        },
        error: function(response) {
            console.log(response);
        }

    });
}

function getJobOrder(so_id,zz,cusId) {
    $.ajax({
        url: "modules/estimate/ajax_functions.php",
        data: {
            'id': cusId,
            'mode': 'getJobOrder'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            console.log(response[0]);
            $('#txt_sc_no').html('');
            for (var i = 0; i < response.length; i++) {
                $('#txt_sc_no').append('<option value="' + response[i].pk_sale_order + '">' + response[i]
                    .sono + '</option>');
            }
            setTimeout(function() {
               var  so_idval = so_id.split('#');
            

                //$('.txt_sc_no').find('option[value="1,2"]').attr("selected", true);
                    $('.txt_sc_no').val(so_idval).attr("selected", true);

                //   $('.txt_product_name_' + zz).chosen();
                //    $('.txt_product_name_' + zz).trigger('chosen:updated');
            }, 1000);
        },
        error: function(response) {
            console.log(response);
        }
    });
}
//GET CUSTOMER EDIT PAGE
function getCustomersListings(cusid) {
    var cusid = cusid;
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getCustomerListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            //  $('#txt_customer_name').chosen('destroy');
            $('.txt_customer_name').html('');
            $('.txt_customer_name').append('<option value="">Select Customer</option>');
            for (var i = 0; i < response.length; i++) {
                $('.txt_customer_name').append('<option value="' + response[i].pk_cus_id + '">' + response[
                    i].cus_name + '</option>');
            }
            setTimeout(function() {
                $('#txt_customer_name').find('option[value="' + cusid + '"]').attr("selected",
                    true);
                //   $("#txt_customer_name").chosen();
                //$("#txt_customer_name").trigger('chosen:updated');
                /*   if (getQueryVariable('hnd') != pageView) {
                       $('#txt_customer_name').trigger('change');
                   }*/

            }, 1000);
        }
    });
}

function getProductListingsEdit(proid, zz, cusId) {
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getProductListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {

            //  $('.txt_product_name_' + zz).chosen('destroy');
            $('.txt_product_name_' + zz).html('<option selected disabled>Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_product_id == '9999') {

                    $('.txt_product_name_' + zz).append('<option value="' + response[0][i].pk_product_id +
                        '" data-types="2">' + response[0][i].product_name + '</option>');
                } else {

                    $('.txt_product_name_' + zz).append('<option value="' + response[0][i].pk_product_id +
                        '" data-types="1">' + response[0][i].product_name + ' </option>');
                }
            }
            setTimeout(function() {
                $('.txt_product_name_' + zz).find('option[value="' + proid + '"]').attr("selected",
                    true);
                //   $('.txt_product_name_' + zz).chosen();
                //    $('.txt_product_name_' + zz).trigger('chosen:updated');
            }, 1000);
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getCategoryListingsEdit(catid, zz) {
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getCategoryListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {

            //  $('.txt_product_name_' + zz).chosen('destroy');
            $('.txt_category_' + zz).html('<option selected >Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_cat_id == '9999') {

                    $('.txt_category_' + zz).append('<option value="' + response[0][i].pk_cat_id +
                        '" data-types="2">' + response[0][i].cat_name + '  </option>');
                } else {

                    $('.txt_category_' + zz).append('<option value="' + response[0][i].pk_cat_id +
                        '" data-types="1">' + response[0][i].cat_name + '</option>');
                }
            }
            setTimeout(function() {
                $('.txt_category_' + zz).find('option[value="' + catid + '"]').attr("selected",
                    true);
                //   $('.txt_product_name_' + zz).chosen();
                //    $('.txt_product_name_' + zz).trigger('chosen:updated');
            }, 1000);
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getProductListing(type) {
    //alert('test');
    $.ajax({
        url: "modules/products/ajax_functions.php",
        data: {
            'mode': 'getProductListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            if (response[0].length > 0) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_product_name_' + type).html('');
                $('.txt_product_name_' + type).html('<option selected disabled>Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_product_id == '9999') {

                        $('.txt_product_name_' + type).append('<option value="' + response[0][i]
                            .pk_product_id + '" data-types="2">' + response[0][i].product_name +
                            '</option>');
                    } else {

                        $('.txt_product_name_' + type).append('<option value="' + response[0][i]
                            .pk_product_id + '" data-types="1">' + response[0][i].product_name +
                            ' </option>');
                    }
                }
                //$('.txt_product_name').chosen();
                $("#proStatus").val(1);
            } else {
                $('table .itemclone').html(
                    '<tr><td colspan="10" class="text-center error"> No records available in the table !</td></tr>'
                );
                $("#additems").hide();
                $("#proStatus").val(0);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getCategoryListing(type) {
    //alert('test');
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getCategoryListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {

            //$('.txt_product_name').chosen('destroy');
            $('.txt_category_' + type).html('');
            $('.txt_category_' + type).html('<option selected disabled>Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_product_id == '9999') {

                    $('.txt_category_' + type).append('<option value="' + response[0][i]
                        .pk_cat_id + '" data-types="2"> ' +
                        response[0][i].cat_name + '</option>');
                } else {

                    $('.txt_category_' + type).append('<option value="' + response[0][i]
                        .pk_cat_id + '" data-types="1"> ' +
                        response[0][i].cat_name + '</option>');
                }
            }
            //$('.txt_product_name').chosen();
            $("#proStatus").val(1);

        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getInnerSheetListing(type) {
    //alert('test');
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getInnerSheetListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            if (response[0].length > 0) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_innersheet_' + type).html('');
                $('.txt_innersheet_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_is_id == '9999') {

                        $('.txt_innersheet_' + type).append('<option value="' + response[0][i].pk_is_id +
                            '" data-cost="' + response[0][i].cost + '" data-types="2">' + response[0][i]
                            .name + '</option>');
                    } else {

                        $('.txt_innersheet_' + type).append('<option value="' + response[0][i].pk_is_id +
                            '" data-cost="' + response[0][i].cost + '" data-types="1">' + response[0][i]
                            .name + '</option>');
                    }
                }
                //$('.txt_product_name').chosen();
                $("#proStatus").val(1);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getSpecialEffectsListing(type) {
    //alert('test');
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getSpecialEffectsListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            if (response[0].length > 0) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_specialeffects_' + type).html('');
                $('.txt_specialeffects_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_se_id == '9999') {

                        $('.txt_specialeffects_' + type).append('<option value="' + response[0][i]
                            .pk_se_id + '" data-secost="' + response[0][i].cost + '" data-types="2">' +
                            response[0][i].name + '</option>');
                    } else {

                        $('.txt_specialeffects_' + type).append('<option value="' + response[0][i]
                            .pk_se_id + '"  data-secost="' + response[0][i].cost + '" data-types="1">' +
                            response[0][i].name + '</option>');
                    }
                }
                //$('.txt_product_name').chosen();
                $("#proStatus").val(1);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getSizeListing(type) {
    //alert('test');
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getSizeListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            if (response[0].length > 0) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_size_' + type).html('');
                $('.txt_size_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_size_id == '9999') {

                        $('.txt_size_' + type).append('<option value="' + response[0][i].pk_size_id +
                            '" data-sizecost="' + response[0][i].cost + '" data-types="2">' + response[
                                0][i].name + '</option>');
                    } else {

                        $('.txt_size_' + type).append('<option value="' + response[0][i].pk_size_id +
                            '" data-sizecost="' + response[0][i].cost + '" data-types="1">' + response[
                                0][i].name + '</option>');
                    }
                }

                //$('.txt_product_name').chosen();
                $("#proStatus").val(1);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}




function getInnerSheetListingEdit(innerId, type) {
    //alert('test');
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getInnerSheetListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            if (response[0].length > 0) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_innersheet_' + type).html('');
                $('.txt_innersheet_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_is_id == '9999') {

                        $('.txt_innersheet_' + type).append('<option value="' + response[0][i].pk_is_id +
                            '" data-cost="' + response[0][i].cost + '" data-types="2">' + response[0][i]
                            .name + '</option>');
                    } else {

                        $('.txt_innersheet_' + type).append('<option value="' + response[0][i].pk_is_id +
                            '" data-cost="' + response[0][i].cost + '" data-types="1">' + response[0][i]
                            .name + '</option>');
                    }
                }
                setTimeout(function() {
                    $('.txt_innersheet_' + type).find('option[value="' + innerId + '"]').attr(
                        "selected",
                        true);
                    //   $('.txt_product_name_' + zz).chosen();
                    //    $('.txt_product_name_' + zz).trigger('chosen:updated');
                }, 1000);
                $("#proStatus").val(1);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getSpecialEffectsListingEdit(specialid, type) {
    //alert('test');
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getSpecialEffectsListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            if (response[0].length > 0) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_specialeffects_' + type).html('');
                $('.txt_specialeffects_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_se_id == '9999') {

                        $('.txt_specialeffects_' + type).append('<option value="' + response[0][i]
                            .pk_se_id + '" data-secost="' + response[0][i].cost + '" data-types="2">' +
                            response[0][i].name + '</option>');
                    } else {

                        $('.txt_specialeffects_' + type).append('<option value="' + response[0][i]
                            .pk_se_id + '"  data-secost="' + response[0][i].cost + '" data-types="1">' +
                            response[0][i].name + '</option>');
                    }
                }
                setTimeout(function() {
                    $('.txt_specialeffects_' + type).find('option[value="' + specialid + '"]').attr(
                        "selected",
                        true);
                    //   $('.txt_product_name_' + zz).chosen();
                    //    $('.txt_product_name_' + zz).trigger('chosen:updated');
                }, 1000);
                $("#proStatus").val(1);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getSizeListingEdit(sizeid, type) {
    //alert('test');
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getSizeListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            if (response[0].length > 0) {
                console.log(response);
                //$('.txt_product_name').chosen('destroy');
                $('.txt_size_' + type).html('');
                $('.txt_size_' + type).html('<option selected >Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_size_id == '9999') {

                        $('.txt_size_' + type).append('<option value="' + response[0][i].pk_size_id +
                            '" data-sizecost="' + response[0][i].cost + '" data-types="2">' + response[
                                0][i].name + '</option>');
                    } else {

                        $('.txt_size_' + type).append('<option value="' + response[0][i].pk_size_id +
                            '" data-sizecost="' + response[0][i].cost + '" data-types="1">' + response[
                                0][i].name + '</option>');
                    }
                }
                setTimeout(function() {
                    $('.txt_size_' + type).find('option[value="' + sizeid + '"]').attr("selected",
                        true);
                    //   $('.txt_product_name_' + zz).chosen();
                    //    $('.txt_product_name_' + zz).trigger('chosen:updated');
                }, 1000);
                $("#proStatus").val(1);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}


$(".nav-link").removeClass("active");
$(".nav-item").removeClass("menu-open");
$(".sales").addClass("menu-open");
$(".estimate .nav-link").addClass("active");


function cal() {
    var deleted = $('#deleted').val();
    var rowCount = $('.itemTable >tbody >tr').length;
    var total_length = parseFloat(rowCount) + parseFloat(deleted);
    var total_total_amount = 0;
    var total_amount = 0;
    var gst_amttot = 0;
    var sgst_amttot = 0;
    var igst_amttot = 0;
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



        if (parseFloat(taxable_total) > 0) {

        } else {
            total_total_amount = total_total_amount + 0;
            // $("#txt_total_"+i).val("");
            $("#txt_final_total_" + i).val("");
        }


        var total_amount = parseFloat(taxable_total);
        total_total_amount = total_total_amount + total_amount;
        $("#txt_final_total_" + i).val(parseFloat(total_amount).toFixed(2));
    }


    $("#txt_item_total").val(parseFloat(total_total_amount).toFixed(2));


    var gst = $("#gst_per").val();
    if (parseFloat(gst) > 0) {
        gst = gst;
    } else {
        gst = 0;
    }
    var gst_per = parseFloat(gst) / 100;
    var gst_amt = parseFloat(gst_per) * parseFloat(taxable_total);

    if (parseFloat(gst_amt) > 0) {
        $("#gst_total").val(parseFloat(gst_amt).toFixed(2));

        gst_amttot = gst_amttot + parseFloat(gst_amt);
    } else {
        $("#gst_total").val("");
    }



    var gst_total = parseFloat(gst_amttot);

    if (parseFloat(gst_total) > 0) {
        //$("#txt_gst_total").val(parseFloat(gst_total).toFixed(2));
    } else {
        // $("#txt_gst_total").val("");
    }


    var discount_final = $("#discount_final").val();
    if (parseFloat(discount_final) > 0) {

    } else {
        discount_final = 0;
    }
    var gst_total_final_amount = parseFloat(total_total_amount) + parseFloat(gst_amttot);

    var discount_final_per = parseFloat(discount_final) / 100;
    var discount_final_amt = parseFloat(discount_final_per) * parseFloat(gst_total_final_amount);

    if (parseFloat(discount_final_amt) > 0) {
        $("#discount_final_amt").val(parseFloat(discount_final_amt).toFixed(2));
    } else {
        $("#discount_final_amt").val("");
    }

    var grand_total = parseFloat(gst_total_final_amount) - parseFloat(discount_final_amt);
    $("#txt_grand_total").val(parseFloat(grand_total).toFixed(2));
}

$('.txt_intstate').on('change', function() {

    var getintval = $(this).val();
    $('.interst').hide();
    $('.intrast').hide();

    if (getintval == 1) {
        $('.interst').show();
        $('.interst').find('input').prop("disabled", false);
        $('.intrast').find('input').prop("disabled", true);
    } else {
        $('.intrast').show();
        $('.intrast').find('input').prop("disabled", false);
        $('.interst').find('input').prop("disabled", true);

    }
    cal();
});


$('table').on("change", ".txt_innersheet,.txt_specialeffects,.txt_size", function(e) {
    var czid = $(this).attr("data-czid");
    var incost = $('.txt_innersheet_' + czid).find("option:selected").attr("data-cost");
    var spcost = $('.txt_specialeffects_' + czid).find("option:selected").attr("data-secost");
    var sizecost = $('.txt_size_' + czid).find("option:selected").attr("data-sizecost");

    totcost = 0;
    if (incost) {
        totcost += parseFloat(incost);
    }
    if (spcost) {
        totcost += parseFloat(spcost);
    }
    if (sizecost) {
        totcost += parseFloat(sizecost);
    }
    $('.txt_price_' + czid).val(totcost);
    cal();

});
</script>