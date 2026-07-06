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

                    <div class="text-right mb-2">
                        <a href="print_pdf/print_report_SE.php?soid=<?php echo $_GET['id']; ?>" class="btn btn-primary"
                            target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                    </div>

                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <!-- <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div> -->
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal theme-form" id="form_sale_estimate_edit" novalidate="novalidate">
                            <div class="card-body">
                                <div id="stepwizard">
                                    <!-- <div style="padding: 10px;">
                        <a style="border: 1px solid;padding: 3px 9px;" href="index.php?erp=16&id=<?php echo $_GET['id']; ?>"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                      </div> -->
                                    <input type="hidden" class="form-control txt_se_id" name="txt_se_id" id="txt_se_id"
                                        value=<?php echo $_GET['id']; ?>>
                                    <!--<div class="one-half-column">
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
                                                    required="" aria-required="true" aria-invalid="false" value="">
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
                                                        required="" aria-required="true">
                                                        <option value="">Select Customer</option>
                                                    </select>

                                                </div>
                                                <span class="error" id="txt_customer_name-error"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="control-label">Product <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_product_name chosen_required"
                                                        name="txt_product_name" id="txt_product_name" title="Product"
                                                        required="" aria-required="true">
                                                        <option value="">Select Product</option>

                                                    </select>
                                                </div>
                                                <span class="error" id="txt_product_name-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Category <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_category chosen_required"
                                                        name="txt_category" id="txt_category" title="Category"
                                                        required="" aria-required="true">
                                                        <option value="">Select Category</option>

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
                                                    placeholder="Reference Number" title="Reference Number">
                                                <span class="error" id="txt_reference_number_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Sales Order No <span class="color">
                                                    *</span></label>
                                            <div class="control-field">
                                                <select class="form-control txt_sc_no chosen_required" id="txt_sc_no"
                                                    name="txt_sc_no[]" multiple> </select>
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="col-4 col-md-12">
                                        <div class="form-group">
                                            <label for="" class="control-label">Estimate No </label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_seno" value=""
                                                    name="txt_seno" id="txt_seno" placeholder="Auto" title="SE NO"
                                                    readonly="">
                                                <span class="error" id="txt_seno_error"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="" class="control-label">Types <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_types chosen_required"
                                                        name="txt_types" id="txt_types" title="Types" required=""
                                                        aria-required="true" readonly>
                                                        <option value="">Select Types</option>
                                                        <option value="1">Commercial</option>
                                                        <option value="2">Non Commercial</option>

                                                    </select>
                                                </div>
                                                <span class="error" id="txt_types-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Sales Order No <span class="color">
                                                    *</span></label>
                                            <div class="control-field">
                                                <select class="form-control txt_sc_no chosen_required" id="txt_sc_no"
                                                    name="txt_sc_no[]" readonly> </select>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="col-4 col-md-12">
                                        <div class="form-group">
                                            <label for="" class="control-label">Date <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_pi_date hasDatepicker valid"
                                                    name="txt_pi_date" id="txt_pi_date" placeholder="DD/MM/YYYY"
                                                    required="" aria-required="true" aria-invalid="false" readonly>
                                                <span class="error" id="txt_pi_date_error"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="" class="control-label">Payment Type <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_payment_type chosen_required"
                                                        name="txt_payment_type" id="txt_payment_type"
                                                        title="Payment Type" required="" aria-required="true" readonly>
                                                        <option value="">Select Payment Type</option>
                                                        <option value="1">Cash</option>
                                                        <option value="2">Credit</option>

                                                    </select>
                                                </div>
                                                <span class="error" id="txt_payment_type-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Orientation <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_orientation chosen_required"
                                                        name="txt_orientation" id="txt_orientation" title="Orientation"
                                                        required="" aria-required="true" readonly>
                                                        <option value="">Select Orientation</option>
                                                        <option value="1">landscape</option>
                                                        <option value="2">portrait</option>

                                                    </select>
                                                </div>
                                                <span class="error" id="txt_orientation-error"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-4 col-md-12">
                                        <div class="form-group">
                                            <label for="" class="control-label">City</label>
                                            <div class="control-field">
                                            <select   class="form-control txt_customer_city capallfields "
                                                    style=" text-transform:uppercase !important;" id="txt_customer_city"
                                                    name="txt_customer_city" readonly>
                                                    <option value="" disabled="" selected="" data-select2-id="4">SELECT
                                                        CITY</option>
                                                </select>

                                                <span class="error" id="txt_customer_city_error"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="control-label">Customer <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_customer_name chosen_required"
                                                        name="txt_customer_name" id="txt_customer_name" title="Customer"
                                                        required="" aria-required="true" readonly>
                                                        <option value="">Select Customer</option>
                                                        <?php
for ($i = 0; $i < count($cus_data); $i++) {
    ?>
                                                        <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">
                                                            <?php echo $cus_data[$i]['cus_name']; ?></option>
                                                        <?php
}
?>
                                                    </select>
                                                </div>
                                                <span class="error" id="txt_customer_name-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Price Type <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_price_type chosen_required"
                                                        name="txt_price_type" id="txt_price_type" title="Price Type"
                                                        required="" aria-required="true" readonly>


                                                    </select>
                                                </div>
                                                <span class="error" id="txt_price_type-error"></span>
                                            </div>
                                        </div>





                                        <!-- <div class="form-group">
                                            <label for="" class="control-label">Reference Number </label>
                                            <div class="control-field">
                                                <input type="text" value="" class="form-control txt_reference_number"
                                                    name="txt_reference_number" id="txt_reference_number"
                                                    placeholder="Reference Number" title="Reference Number">
                                                <span class="error" id="txt_reference_number_error"></span>
                                            </div>
                                        </div>-->
                                    </div>

                                </div>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                  

                                    <div class="table-div table-responsive">
                                        <table class="table-bordered table thead itemTable">
                                            <thead>
                                                <tr>
                                                <th width="120">Product <span class="color"> *</span></th>
                                                    <th width="120">Category <span class="color"> *</span></th>
                                                    <th width="120">Types <span class="color"> *</span></th>
                                                    <th width="120" class="itemsdata" style="display:none">Item </th>
                                                    <th width="120">Quantity <span class="color"> *</span></th>
                                                    <th width="120">Price(₹) <span class="color"> *</span></th>
                                                    <th width="120">Total (₹)<span class="color"> *</span> </th>
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
                                                                        style="margin-right: 20px !important;width: 15% !important;">
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
                                                                        style="margin-right: 20px !important;width: 15% !important;">
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
$('#form_sale_estimate_edit').validate({
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
        var formData = new FormData($('#form_sale_estimate_edit')[0]);
        $.ajax({
            url: "modules/estimate/ajax_functions.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response == 1) {
                    swal({
                        title: "Success!",
                        text: "Sales estimate has been updated successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=19";
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


//getProductListing(1);
//  getTypesListing(1);
//  getCategoryListing(1);
//$('.txt_product_name').select2();
//$('#txt_product_name_1').select2();


$('#txt_types').on('change', function() {
    var types = $(this).find("option:selected").val();
    getCostTypeListing(types);
    getProductListing(1);
    getCategoryListing(1);
    getItemType();
    if (types == 1) {
        $('.txt_itemtypes').html('<option selected >Select One</option><option value="1">Commercial</option>');

    } else {
        getTypesListing(1);
    }
    $("#additems").show();


});

function getItemType() {
    $('table.itemTable tbody.itemclone').html(
        '<tr><td><select class="form-control txt_itemtypes txt_itemtypes_1 chosen_required" name="txt_itemtypes[]" id="txt_itemtypes_1" title="Types" data-czid="1" data-classids="txt_itemtypes_1"></select><input type="hidden" name="pro_type[]" id="pro_type" class="pro_type pro_type_1"></td><td class="itemsdata" style="display:none"><select  class="form-control txt_item  txt_item_1" name="txt_item[]" id="txt_item_1" data-czid="1"  title="" ></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_1" min="0" max="999999" id="txt_product_qty_1" name="txt_product_qty[]" placeholder="Quantity" title="Quantity"></td><td ><input type="text" name="txt_price[]" id="txt_price_1" onkeyup="cal()" class="form-control pricefield txt_price txt_price_1 numberss text-right" title="Price"><input type="hidden" class="txt_comm txt_comm_1" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_1" class="form-control txt_final_total_1 numberss txt_final_total text-right" title="Grand Total" readonly></td></tr>'
    );
}


$('table').on("change", ".txt_itemtypes ", function(e) {
    var czid = $(this).attr('data-czid');
    var itemtypes = $('.txt_itemtypes_' + czid).find("option:selected").val();
    var types = $('.txt_types').find("option:selected").val();
    getComercialorNonItemsType(czid);
});
$('.txt_price_type').on("change", function(e) {

    var product_id = $('.txt_product_name').find("option:selected").val();
    if (product_id > 0) {
        var typesval = $('.txt_types').find("option:selected").val();
        var costtype = $(this).find("option:selected").val();

        $.ajax({
            url: "modules/sales/ajax_functions.php",
            data: {
                'mode': 'getCostListing',
                'typesval': typesval,
                'costtype': costtype,
                'product_id': product_id
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('.txt_price').val(' ');
                $('.txt_price').val(response);



            },
            error: function(response) {
                console.log(response);
            }
        });
        cal();
    } else {
        swal("Failed!", "Choose first product, Try again!", "error");
        getCostTypeListing(1);


    }
    cal();

});

/*
$('#txt_types').on('change', function() {
    var types = $(this).find("option:selected").val();
    getCostTypeListing(types);

    getItemType();
    if (types == 1) {
        $('.txt_itemtypes').html('<option selected >Select One</option><option value="1">Commercial</option>');

    } else {
        getTypesListing(1);
    }
    $("#additems").show();


});

function getItemType() {
    $('table.itemTable tbody.itemclone').html(
        '<tr><td><select class="form-control txt_itemtypes txt_itemtypes_1 chosen_required" name="txt_itemtypes[]" id="txt_itemtypes_1" title="Types" data-czid="1" data-classids="txt_itemtypes_1"></select><input type="hidden" name="pro_type[]" id="pro_type" class="pro_type pro_type_1"></td><td class="itemsdata" style="display:none"><select  class="form-control txt_item  txt_item_1" name="txt_item[]" id="txt_item_1" data-czid="1"  title="" ></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_1" min="0" max="999999" id="txt_product_qty_1" name="txt_product_qty[]" placeholder="Quantity" title="Quantity"></td><td ><input type="text" name="txt_price[]" id="txt_price_1" onkeyup="cal()" class="form-control pricefield txt_price txt_price_1 numberss text-right" title="Price"><input type="hidden" class="txt_comm txt_comm_1" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_1" class="form-control txt_final_total_1 numberss txt_final_total text-right" title="Grand Total" readonly></td></tr>'
    );
}*/


$('table').on("change", ".txt_itemtypes ", function(e) {
    var czid = $(this).attr('data-czid');
    var itemtypes = $('.txt_itemtypes_' + czid).find("option:selected").val();
    var types = $('.txt_types').find("option:selected").val();
    getComercialorNonItemsType(czid);
});
/*
$('table').on("change", ".txt_types ", function(e) {
    var czid = $(this).attr('data-czid');
    var types = $('.txt_types_' + czid).find("option:selected").val();

    getItemListing(czid);
});
*/
$('.txt_intstate').on('change', function() {

    var getintval = $(this).val();
    $('.interst').hide();
    $('.intrast').hide();

    if (getintval == 1) {
        $('.interst').show();
        $('.interst').find('input').prop("disabled", false);
        $('.intrast').find('input').prop("disabled", true);
    } else {
        $('#gst_per').val(' ');

        $('.intrast').show();
        $('.intrast').find('input').prop("disabled", false);
        $('.interst').find('input').prop("disabled", true);

    }
    cal();
});

var deleted = 0;

$('table').on("click", ".removeitems", function(e) {
    e.preventDefault();
    var rowCount = $('.itemTable >tbody >tr').length;
    if (rowCount > 1) {
        $(".txt_price_" + (rowCount - 1)).attr('readonly', false);
    } else {
        $(".txt_price_" + rowCount).attr('readonly', false);
    }
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

$('.txt_sc_no').on('change', function() {
    //var soid = $(this).children("option:selected").val();
    var soid = [];
    $(this).children("option:selected").each(function() {
        soid.push(this.value);
    });
    getSOValues(soid);
});
/*
function getTypesListing(type) {

  $.ajax({
      url: "modules/products/ajax_functions.php",
      data: {
          'mode': 'getTypesListing'
      },
      type: 'post',
      dataType: 'json',
      success: function(response) {
              $('.txt_itemtypes_'+type).html('<option selected disabled>Select</option>');
              for (var i = 0; i < response[0].length; i++) {
                  if (response[0][i].pk_types_id == '9999') {
                    //  type_tables, table_pk_id, orderid
                      $('.txt_itemtypes_'+type).append('<option value="' + response[0][i]
                          .pk_types_id + '" data-types="2" data-tables="' + response[0][i].type_tables + '" data-pkid="' + response[0][i].table_pk_id +'">' + response[0][i].types_name +' </option>');
                  } else {

                      $('.txt_itemtypes_'+type).append('<option value="' + response[0][i].pk_types_id + '" data-types="1" data-tables="' + response[0][i].type_tables +
                          '" data-pkid="' + response[0][i].table_pk_id +'">' + response[0][i].types_name +'</option>');
                  }
              }


      },
      error: function(response) {
          console.log(response);
      }
  });
}*/
function getCity(city_id) {
    $('#txt_customer_city').empty();
    $('#txt_customer_city').append('<option value="" disabled selected>SELECT CITY</option>');
    $.post("modules/sales/ajax_functions.php", {
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
            setTimeout(function() {
                $('.txt_customer_city').find('option[value="' + city_id + '"]').attr("selected", true);

            }, 1000);

        });

}
function getCostTypeListing(types) {
    var typesval = $('.txt_types').find("option:selected").val();

    $('.txt_price_type').html('<option selected disabled>SELECT </option>');

    if (typesval == 1) {
        //  type_tables, table_pk_id, orderid
        $('.txt_price_type').append(
            '<option value="1">First Copy</option><option value="2">Additional Copy</option>');
    } else {

        $('.txt_price_type').append('<option value="1">4 Color</option><option value="2">7 Color</option>');

    }

}

function getCostTypeListingEdit(pricetype) {
    var typesval = $('.txt_types').find("option:selected").val();

    $('.txt_price_type').html('<option selected disabled>SELECT </option>');

    if (typesval == 1) {
        //  type_tables, table_pk_id, orderid
        $('.txt_price_type').append(
            '<option value="1">First Copy</option><option value="2">Additional Copy</option>');
    } else {

        $('.txt_price_type').append('<option value="1">4 Color</option><option value="2">7 Color</option>');

    }
    setTimeout(function() {
        $('.txt_price_type').find('option[value="' + pricetype + '"]').attr("selected",
            true);

    }, 1000);
}

function getComercialorNonItemsType(type) {
    //alert('test');
    var typesid = $('.txt_types').find("option:selected").val();
    var itemtypeId = $('.txt_itemtypes_' + type).find("option:selected").val();
    //   var pkid = $('.txt_itemtypes_' + type).find("option:selected").attr('data-pkid');


    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getComercialorNonItemsType',
            'typesid': typesid,
            'itemtypeId': itemtypeId
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('.txt_item_' + type).html('<option selected disabled>SELECT ONE</option>');
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


function getComercialorNonItemsTypeEdit(itemid, zz) {


    var typesid = $('.txt_types').find("option:selected").val();
    var itemtypeId = $('.txt_itemtypes_' + zz).find("option:selected").val();
    //   var pkid = $('.txt_itemtypes_' + type).find("option:selected").attr('data-pkid');


    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getComercialorNonItemsType',
            'typesid': typesid,
            'itemtypeId': itemtypeId
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('.txt_item_' + zz).html('<option selected disabled>SELECT ONE</option>');
            $('.itemsdata').show();
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_items_id == '9999') {
                    //  type_tables, table_pk_id, orderid
                    $('.txt_item_' + zz).append('<option value="' + response[0][i]
                        .pk_items_id + '"  data-items="2">' + response[0][i].fk_item_id +
                        ' </option>');
                } else {

                    $('.txt_item_' + zz).append('<option value="' + response[0][i]
                        .pk_items_id + '"  data-items="1" >' + response[0][i].fk_item_id +
                        '</option>');
                }
            }
            setTimeout(function() {
                $('.txt_item_' + zz).find('option[value="' + itemid + '"]').attr("selected",
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

function getCategoryListingsEdit(proid, zz) {
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getCategoryListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {

            //  $('.txt_product_name_' + zz).chosen('destroy');
            $('.txt_category').html('<option selected >Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_cat_id == '9999') {

                    $('.txt_category').append('<option value="' + response[0][i].pk_cat_id +
                        '" data-types="2">' + response[0][i].cat_name + '  </option>');
                } else {

                    $('.txt_category').append('<option value="' + response[0][i].pk_cat_id +
                        '" data-types="1">' + response[0][i].cat_name + '</option>');
                }
            }
            setTimeout(function() {
                $('.txt_category').find('option[value="' + proid + '"]').attr("selected",
                    true);
                $('.txt_category').chosen();
                //    $('.txt_product_name_' + zz).trigger('chosen:updated');
            }, 1000);
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getTypesListingEdit(proid, zz, item_id, types) {

    //alert('test');
    if (types == 1) {
        $('.txt_itemtypes').html('<option  >Select One</option><option value="1" selected>Commercial</option>');
        getComercialorNonItemsTypeEdit(item_id, zz);

    } else {
        $.ajax({
            url: "modules/products/ajax_functions.php",
            data: {
                'mode': 'getTypesListing'
            },
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $('.txt_itemtypes_' + zz).html('<option selected disabled>Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_types_id == '9999') {
                        //  type_tables, table_pk_id, orderid
                        $('.txt_itemtypes_' + zz).append('<option value="' + response[0][i]
                            .pk_types_id + '" data-types="2" data-tables="' + response[0][i]
                            .type_tables + '" data-pkid="' + response[0][i].table_pk_id + '">' +
                            response[0][i].types_name + ' </option>');
                    } else {

                        $('.txt_itemtypes_' + zz).append('<option value="' + response[0][i].pk_types_id +
                            '" data-types="1" data-tables="' + response[0][i].type_tables +
                            '" data-pkid="' + response[0][i].table_pk_id + '">' + response[0][i]
                            .types_name + '</option>');
                    }
                }
                setTimeout(function() {
                    $('.txt_itemtypes_' + zz).find('option[value="' + proid + '"]').attr("selected",
                        true);
                    // getItemListingEdit(item_id, zz)
                    getComercialorNonItemsTypeEdit(item_id, zz);

                }, 1000);

            },
            error: function(response) {
                console.log(response);
            }
        });
    }
}



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
                $('#cus_id').val(response[0].customer_id);
                getCustomersListings(response[0].fk_customer_id);
              
                getCity(response[0].city);

                //  ,price_type,payment_type

                $('.txt_types').find('option[value="' + response[0].types + '"]').attr("selected", true);
                $('.txt_payment_type').find('option[value="' + response[0].payment_type + '"]').attr(
                    "selected", true);
                $('.txt_orientation').find('option[value="' + response[0].orientation + '"]').attr(
                    "selected", true);

                getJobOrderEdit(response[0].fk_so_id, vz, response[0].fk_customer_id);

                getCostTypeListingEdit(response[0].price_type);

                //   getAllShipmentLocationByID(response[0].shipment_from, response[0].shipment_to);
                //  $('#txt_customer_name').attr('disabled', true);
                // $('#txt_so_id').val(response[0].pk_sale_order);

                $('#txt_sono').val(response[0].sono);

                $('#txt_so_no').attr('disabled', false);
                $('#txt_so_no').val(response[0].sono);
                $('#txt_so_no').attr('disabled', true);
                $('#txt_so_no_ed').val(response[0].sono);
               // $('#txt_reference_number').val(response[0].reference_number);

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
                        '<tr><td><select class="form-control txt_product_name txt_product_name_' + vz +' chosen_required" name="txt_product_name[]" id="txt_product_name_' + vz +'" data-czid="' + vz +'" title="Product" required="" aria-required="true" readonly></select></td> <td><select class="form-control txt_category txt_category_' + vz +' chosen_required"  name="txt_category[]" id="txt_category_' + vz +'" title="Category" required="" aria-required="true" readonly></select></td><td><select class="form-control txt_itemtypes txt_itemtypes_' +
                        vz + ' chosen_required" name="txt_itemtypes[]" id="txt_itemtypes_' + vz +
                        '" title="Types" data-czid="' + vz + '" data-classids="txt_itemtypes_' + vz +
                        '" onchange="cal()" readonly></select></td><td class="itemsdata" style="display:none"><select  class="form-control txt_item  txt_item_' +
                        vz + '" name="txt_item[]" id="txt_item_' + vz + '" data-czid="' + vz +
                        '"  title="" readonly></select></td><td><input class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
                        vz + '" min="0" max="999999" id="txt_product_qty_' + vz +
                        '" onkeyup="cal()" name="txt_product_qty[]" placeholder="Quantity" title="Quantity"  value=' +
                        response[1][j].sep_qty +
                        ' readonly></td><td ><input type="text" name="txt_price[]" id="txt_price_' + vz +
                        '" onkeyup="cal()" class="form-control pricefield txt_price txt_price_' + vz +
                        ' numberss text-right" title="Price" value=' + response[1][j].sep_price +
                        ' readonly><input type="hidden" class="txt_comm txt_comm_' + vz +
                        '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
                        vz + '" class="form-control txt_grand_total_' + vz +
                        ' numberss txt_final_total text-right" title="Grand Total" value=' + response[1]
                        [j].sep_total +
                        ' readonly></td></tr>'
                        );

                   // $('.txt_price_' + response[1].length).attr("readonly", false);
                    getProductListingsEdit(response[1][j].fk_product_id,vz);
                    getCategoryListingsEdit(response[1][j].fk_category_id,vz);
                    getTypesListingEdit(response[1][j].itemtype, vz, response[1][j].fk_item_id, response[0]
                        .types);
                }

                /*
                                $('#proStatus').val(1);
                                $('#cus_id').val(response[0].fk_customer_id);
                                getCustomersListings(response[0].fk_customer_id);
                                getJobOrderEdit(response[0].fk_so_id, vz, response[0].fk_customer_id);
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
                                getProductListingsEdit(response[0].fk_product_id, response[0].fk_customer_id);
                                getCategoryListingsEdit(response[0].fk_category_id, response[0].fk_customer_id);

                                var vz = 0;
                                var regex = /(<([^>]+)>)/ig;
                                $('table .itemclone').html('');

                                for (j = 0; j < response[1].length; j++) {
                                    vz++;

                                    $('table .itemclone').append(
                                        '<tr><td><select class="form-control txt_types txt_types_' +
                                        vz + ' chosen_required" name="txt_types[]" id="txt_types_' + vz +
                                        '" title="Types" data-czid="' + vz + '" data-classids="txt_types_' + vz +
                                        '"></select><input type="hidden" name="pro_type[]" id="pro_type" class="pro_type pro_type_' +
                                        vz +
                                        '"></td><td class="itemsdata" style="display:none"><select  class="form-control txt_item  txt_item_' +
                                        vz + '" name="txt_item[]" id="txt_item_' + vz + '" data-czid="' + vz +
                                        '"  title="" ></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
                                        vz + '" min="0" max="999999" id="txt_product_qty_' + vz +
                                        '" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value=' +
                                        response[1][j].sep_qty +
                                        ' ></td> <td ><input type="text" name="txt_price[]" onkeyup="cal()" id="txt_price_' +
                                        vz +
                                        '" class="form-control pricefield txt_price txt_price_' + vz +
                                        ' numberss text-right" title="Price"  value=' + response[1][j].sep_price +
                                        ' ><input type="hidden" class="txt_comm txt_comm_' + vz +
                                        '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
                                        vz + '" class="form-control txt_final_total_' + vz +
                                        ' numberss txt_final_total text-right" title="Grand Total" value=' + response[1]
                                        [j].sep_total + ' readonly></td><td><button type="button" name="removeitems" id="removeitems" class="removeitems btn btn-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');


                                    $('.txt_price_' + response[1].length).attr("readonly", false);





                                    getTypesListingEdit(response[1][j].fk_types_id, vz, response[1][j].fk_item_id);*/

                //       getAllGradeListingEdit(response[1][j].fk_grade_id, vz, response[1][j].fk_product_id, response[0].fk_customer_id);
                //      getAllUOMListingEdit(response[1][j].fk_uom_id, vz, response[1][j].fk_product_id, response[0].fk_customer_id);


                // }

                // validatefunctions();
            }
        },
        error: function(response) {
            console.log(response);
        }

    });
}

function getJobOrderEdit(so_id, zz, cusId) {
    $.ajax({
        url: "modules/estimate/ajax_functions.php",
        data: {
            'id': cusId,
            'mode': 'getJobOrderEdit'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('#txt_sc_no').html('');
            for (var i = 0; i < response.length; i++) {
                $('#txt_sc_no').append('<option value="' + response[i].pk_sale_order + '">' + response[i]
                    .sono + '</option>');
            }
            setTimeout(function() {
                var so_idval = so_id.split('#');


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

function getProductListingsEdit(proid, zz) {
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getProductListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {

            //  $('.txt_product_name_' + zz).chosen('destroy');
            $('.txt_product_name_'+zz).html('<option selected disabled>Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_product_id == '9999') {

                    $('.txt_product_name_'+zz).append('<option value="' + response[0][i].pk_product_id +
                        '" data-types="2">' + response[0][i].product_name + '</option>');
                } else {

                    $('.txt_product_name_'+zz).append('<option value="' + response[0][i].pk_product_id +
                        '" data-types="1">' + response[0][i].product_name + ' </option>');
                }
            }
            setTimeout(function() {
                $('.txt_product_name_'+zz).find('option[value="' + proid + '"]').attr("selected",
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

function getCategoryListingsEdit(catid, type) {
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getCategoryListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {

            //  $('.txt_product_name_' + zz).chosen('destroy');
            $('.txt_category_'+type).html('<option selected >Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_cat_id == '9999') {

                    $('.txt_category_'+type).append('<option value="' + response[0][i].pk_cat_id +
                        '" data-types="2">' + response[0][i].cat_name + '  </option>');
                } else {

                    $('.txt_category_'+type).append('<option value="' + response[0][i].pk_cat_id +
                        '" data-types="1">' + response[0][i].cat_name + '</option>');
                }
            }
            setTimeout(function() {
                $('.txt_category_'+type).find('option[value="' + catid + '"]').attr("selected",
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
                $('.txt_product_name_'+type).html('');
                $('.txt_product_name_'+type).html('<option selected disabled>Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_product_id == '9999') {

                        $('.txt_product_name_'+type).append('<option value="' + response[0][i]
                            .pk_product_id + '" data-types="2">' + response[0][i].product_name +
                            '</option>');
                    } else {

                        $('.txt_product_name_'+type).append('<option value="' + response[0][i]
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
            $('.txt_category_'+type).html('');
            $('.txt_category_'+type).html('<option selected disabled>Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_product_id == '9999') {

                    $('.txt_category_'+type).append('<option value="' + response[0][i]
                        .pk_cat_id + '" data-types="2"> ' +
                        response[0][i].cat_name + '</option>');
                } else {

                    $('.txt_category_'+type).append('<option value="' + response[0][i]
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

function getTypesListing(type) {
    //alert('test');
    $.ajax({
        url: "modules/products/ajax_functions.php",
        data: {
            'mode': 'getTypesListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $('.txt_itemtypes_' + type).html('<option selected disabled>Select</option>');
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

var deleted = 0;



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


// GET SALE QUATE VALUE ADD PAGE

// GET SALE QUATE VALUE ADD PAGE
function getSOValues(soid) {
    $.ajax({
        url: "modules/estimate/ajax_functions.php",
        data: {
            'soid': soid,
            'mode': 'getSOValues'
        },
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            $("#cover").css("display", "block");
        },
        success: function(response) {
            if (soid == 0) {
                $('table .itemclone').append(
                    "<tr><td class='text-center' colspan='6'>No data available</td></tr>");
                $("#proStatus").val(0);
            } else {
                $('#proStatus').val(1);
                $('#cus_id').val(response[0].customer_id);

                $('#txt_so_id').val(response[0].soId);

                $('#txt_so_no').val(response[0].sono);
              //  $('#txt_ref').val(response[0].reference_number);

                $('#txt_pi_date').val(moment(response[0].sale_date).format('DD/MM/YYYY'));
                $('#discount_final').val(response[0].discount_final);
                $('#discount_final_amt').val(parseFloat(response[0].discount_final_amt).toFixed(2));
                $('#gst_per').val(response[0].gst_percent);
                $('#gst_total').val(parseFloat(response[0].gst_total).toFixed(2));
                $('#txt_item_total').val(parseFloat(response[0].item_total).toFixed(2));
                $('#txt_grand_total').val(parseFloat(response[0].grand_total).toFixed(2));
                $('#txt_gst_total').val(parseFloat(response[0].gst_total).toFixed(2));

                var vz = 0;
                var regex = /(<([^>]+)>)/ig;
                $('table .itemclone').html('');

                for (j = 0; j < response[1].length; j++) {
                    vz++;
                    $('table .itemclone').append(
                        '<tr><td><select class="form-control txt_product_name txt_product_name_' + vz +' chosen_required" name="txt_product_name[]" id="txt_product_name_' + vz +'" data-czid="' + vz +'" title="Product" required="" aria-required="true"></select></td> <td><select class="form-control txt_category txt_category_' + vz +' chosen_required"  name="txt_category[]" id="txt_category_' + vz +'" title="Category" required="" aria-required="true"></select></td><td><select class="form-control txt_itemtypes txt_itemtypes_' +
                        vz + ' chosen_required" name="txt_itemtypes[]" id="txt_itemtypes_' + vz +
                        '" title="Types" data-czid="' + vz + '" data-classids="txt_itemtypes_' + vz +
                        '" readonly></select><input type="hidden" name="pro_type[]" id="pro_type" class="pro_type pro_type_' +
                        vz +
                        '"></td><td class="itemsdata" style="display:none"><select  class="form-control txt_item  txt_item_' +
                        vz + '" name="txt_item[]" id="txt_item_' + vz + '" data-czid="' + vz +
                        '"  title="" readonly></select></td><td><input class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
                        vz + '" min="0" max="999999" id="txt_product_qty_' + vz +
                        '" onkeyup="cal()" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value=' +
                        response[1][j].qty +
                        ' readonly></td><td ><input type="text" name="txt_price[]" onkeyup="cal()" id="txt_price_' +
                        vz + '" class="form-control pricefield txt_price txt_price_' + vz +
                        ' numberss text-right" title="Price" value=' + response[1][j].price +
                        ' readonly><input type="hidden" class="txt_comm txt_comm_' + vz +
                        '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
                        vz + '" class="form-control txt_grand_total_' + vz +
                        ' numberss txt_final_total text-right" title="Grand Total"  readonly></td></tr>'
                    );


                    //      $('table .itemclone').append('<tr><td><button type="button" name="removeitems" id="removeitems" class="removeitems" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td><select class="form-control txt_product_name txt_product_name_' + vz + ' chosen_required" name="txt_product_name[]" id="txt_product_name_' + vz + '" title="Product Name" data-czid="1" data-classids="txt_product_name_' + vz + '"></select><input type="hidden" name="pro_type[]" id="pro_type" class="pro_type pro_type_' + vz + '"><input type="hidden" class="txt_scp_id txt_scp_id_1" name="txt_scp_id[]" id="txt_scp_id" value=""><input type="hidden" value="" name="txt_sc_noID[]" id="txt_sc_noID" class="txt_sc_noID txt_sc_noID_1"><input type="hidden" class="txt_soId txt_soId1" name="txt_soId[]" id="txt_soId" value=""></td><td><input type="text" class="form-control txt_uom txt_uom_' + vz + '" name="txt_uom[]" id="txt_uom_' + vz + '" title="Unit" value='+response[1][j].uom+' ></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_' + vz + '" min="0" max="999999" id="txt_product_qty_' + vz + '" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value='+response[1][j].qty+'></td><td ><input type="text" name="txt_price[]" id="txt_price_' + vz + '" class="form-control pricefield txt_price txt_price_' + vz + ' numberss text-right" title="Price" value='+response[1][j].price+'><input type="hidden" class="txt_comm txt_comm_' + vz + '" name="txt_comm" id="txt_comm" value=""></td><td><input placeholder="%" type="text" name="txt_cgst[]" onkeyup="cgst(' + vz + ')" id="txt_cgst_' + vz + '" class="form-control cgstfield txt_cgst class_per txt_cgst_' + vz + ' text-right" title="CGST" value='+response[1][j].sop_CGST_percentage+'><input type="text" name="txt_cgst_amt[]" onkeyup="cgst(' + vz + ')" id="txt_cgst_amt_' + vz + '" readonly class="form-control class_amt cgstfield txt_cgst_amt txt_cgst_amt_' + vz + ' text-right" title="CGST AMT" value='+response[1][j].sop_CGST_amount+'></td><td><input type="text" onkeyup="sgst(' + vz + ')" name="txt_sgst[]" id="txt_sgst_' + vz + '" class="form-control class_per sgstfield txt_sgst txt_sgst_' + vz + ' text-right" title="SGST" placeholder="%" value='+response[1][j].sop_SGST_percentage+'><input type="text" onkeyup="sgst(' + vz + ')" name="txt_sgst_amt[]" id="txt_sgst_amt_' + vz + '" readonly class="form-control class_amt sgstfield txt_sgst_amt txt_sgst_amt_' + vz + ' text-right" title="SGST_amt" value='+response[1][j].sop_SGST_amount+'></td><td><input onkeyup="igst(' + vz + ')" type="text" name="txt_igst[]" id="txt_igst_' + vz + '" class="class_per form-control igstfield txt_igst txt_igst_' + vz + ' text-right" title="IGST" placeholder="%" value='+response[1][j].sop_IGST_percentage+'><input onkeyup="igst(' + vz + ')" type="text" name="txt_igst_amt[]" id="txt_igst_amt_' + vz + '" class="class_amt form-control igstfield txt_igst_amt txt_igst_amt_' + vz + ' text-right" title="IGST AMT" value='+response[1][j].sop_IGST_amount+' readonly ></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' + vz + '" class="form-control txt_final_total_' + vz + ' numberss txt_final_total text-right" title="Grand Total" value='+response[1][j].final_total+' readonly></td></tr>');


                    if (j == 0) {

                        $('#gst_final').val(response[1][0].gst_percent);

                    }
                    $("#txt_gst_amt_final").val(response[1][0].gst_total);
                    getProductListingsEdit(response[1][j].product_id,vz);
                    getCategoryListingsEdit(response[1][j].fk_category_id,vz);
                    getTypesListingEdit(response[1][j].itemtype, vz, response[1][j].fk_item_id, response[0]
                        .types);






                    //getTypesListingEdit(response[1][j].fk_types_id, vz, response[1][j].fk_item_id);
                }


                cal();
            }
        },
        error: function(response) {
            console.log(response);
        }

    });
}
</script>