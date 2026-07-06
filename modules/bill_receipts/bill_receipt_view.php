<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
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
include "classes/class_estimate_commornon.php";

$obj_saleestimate = new Estimate_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
if ($_GET['type'] == 1) {
    $getestimate = $obj_saleestimate->getAllEstimate_comm($_GET['id']);
    $estimate_data = array();
    while ($est_rows = mysqli_fetch_array($getestimate)) {
        $estimate_data[] = $est_rows;
    }
} elseif ($_GET['type'] == 2) {
    $getestimate = $obj_saleestimate->getAllEstimate_noncomm($_GET['id']);
    $estimate_data = array();
    while ($est_rows = mysqli_fetch_array($getestimate)) {
        $estimate_data[] = $est_rows;
    }
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
                    <?php if ($_GET['type'] == 1) { ?>
                        <h1>View Bill Receipt Commercial</h1>
                    <?php } elseif ($_GET['type'] == 2) { ?>
                        <h1>View Bill Receipt NonCommercial</h1>
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">View Bill Receipt</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--  <div class="text-right mb-2">
                        <a href="print_pdf/print_report_SO.php?soid=<?php echo $_GET['id']; ?>" class="btn btn-primary"
                            target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                        <a href="print_pdf/print_report_SOW.php?soid=<?php echo $_GET['id']; ?>" class="btn btn-primary"
                            target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Print Without Cost</a>
                    </div> -->

                    <div class="card card-primary">
                        <?php if ($_GET['type'] == 1) { ?>
                            <form class="form-horizontal theme-form" id="edit_bill_commercial" novalidate="novalidate">
                            <?php } elseif ($_GET['type'] == 2) { ?>
                                <form class="form-horizontal theme-form" id="edit_bill_noncommercial" novalidate="novalidate">
                                <?php } ?>
                                <div class="card-body">
                                    <div id="stepwizard">

                                        <input type="hidden" class="form-control txt_so_id" name="txt_so_id" id="txt_so_id"
                                            value=<?php echo $_GET['id']; ?>>

                                        <div class="col-4">
                                            <!-- <div class="form-group">
                                            <label for="" class="control-label">Estimate No </label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_sono" name="txt_sono"
                                                    id="txt_sono" title="SO NO">
                                                <span class="error" id="txt_sono_error"></span>
                                            </div>
                                        </div>-->

                                            <div class="form-group">
                                                <label for="" class="control-label">Customer <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <div>
                                                        <select class="form-control txt_customer_name "
                                                            name="txt_customer_name" id="txt_customer_name" readonly="">
                                                            <option value="">Select Customer</option>
                                                            <?php
                                                            for ($i = 0; $i < count($cus_data); $i++) {
                                                            ?>
                                                                <option value="<?php echo $cus_data[$i]['pk_cus_id']; ?>">
                                                                    <?php echo $cus_data[$i]['cus_name'] . ' - (' . $cus_data[$i]['cus_code'] . ')'; ?></option>
                                                            <?php
                                                            }
                                                            ?>
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
                                                        <select class="form-control txt_estimate_name "
                                                            name="txt_estimate_name" id="txt_estimate_name" readonly="">
                                                            <option value="">Select Estimate</option>
                                                            <?php for ($i = 0; $i < count($estimate_data); $i++) { ?>
                                                                <option value="<?php echo $estimate_data[$i]['PK_ES_ID']; ?>">
                                                                    <?php echo $estimate_data[$i]['sono']; ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                    <span class="error" id="txt_estimate_name-error"></span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="" class="control-label">Date <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <input type="text" class="form-control txt_pi_date hasDatepicker valid"
                                                        name="txt_pi_date" id="txt_pi_date" placeholder="DD/MM/YYYY"
                                                        aria-invalid="false" readonly>
                                                    <span class="error" id="txt_pi_date_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-12">


                                            <div class="form-group">
                                                <label for="" class="control-label">Receipts Type <span
                                                        class="color">*</span></label>
                                                <div class="control-field">
                                                    <div>
                                                        <select class="form-control txt_payment_type "
                                                            name="txt_payment_type" id="txt_payment_type" readonly>
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
                                                <label for="" class="control-label">Receipt Amount(₹) </label>
                                                <div class="control-field">
                                                    <input class="form-control adv_amount" name="adv_amount" id="adv_amount" min="1" readonly>
                                                    <span class="error" id="txt_amount_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="control-label">Remarks </label>
                                                <div class="control-field">
                                                    <textarea class="form-control txt_remarks" name="txt_remarks" style="height: 77px !important;" id="txt_remarks" readonly></textarea>
                                                    <span class="error" id="txt_remarks_error"></span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!--  <div class="card-body">
                                <div class="tab-content">
                                    <div class="text-right">
                                       
                                    </div>

                                    <div class="table-div table-responsive">
                                        <table class="table-bordered table thead itemTable">
                                            <thead>
                                                <tr>
                                                    <th width="120">Item <span class="color"> *</span></th>
                                                    <th width="120">Quantity <span class="color"> *</span></th>
                                                    <th width="120">Price Type <span class="color"> *</span></th>
                                                    <th width="120">Orientation <span class="color"> *</span></th>
                                                    <th width="120">Price(₹) <span class="color"> *</span></th>
                                                    <th width="120">Total (₹)<span class="color"> *</span> </th>
                                                </tr>
                                            </thead>
                                            <tbody class="itemclone custom_table_width">
                                                <tr>
                                                   
                                                    <td><select class="form-control txt_item  txt_item_1"
                                                            name="txt_item[]" id="txt_item_1" data-czid="1" title=""
                                                             readonly></select></td>
                                   
                                                    <td><input
                                                            class="form-control txt_product_qty numbersOnly  txt_product_qty_1"
                                                            min="0" max="999999" id="txt_product_qty_1"
                                                            name="txt_product_qty[]" placeholder="Quantity"
                                                            title="Quantity" readonly></td>
                                                    <td><select class="form-control txt_price_type txt_price_type_1 "
                                                            data-czid="1" name="txt_price_type[]" id="txt_price_type_1"
                                                            title="Price Type" ></select></td>
                                                    <td><select class="form-control txt_orientation txt_orientation_1"
                                                            name="txt_orientation[]" id="txt_orientation_1"
                                                            title="Orientation"  readonly>
                                                            <option value="">Select Orientation</option>
                                                            <option value="1">landscape</option>
                                                            <option value="2">portrait</option>
                                                        </select></td>
                                                    <td><input type="text" name="txt_price[]" id="txt_price_1"
                                                            
                                                            class="form-control pricefield txt_price txt_price_1 numberss text-right"
                                                            title="Price"><input type="hidden"
                                                            class="txt_comm txt_comm_1" name="txt_comm" id="txt_comm"
                                                            value="" readonly></td>
                                                    <td><input type="text" name="txt_final_total[]"
                                                            id="txt_final_total_1"
                                                            class="form-control txt_final_total_1 numberss txt_final_total text-right"
                                                            title="Grand Total" readonly></td>
                                                    
                                                </tr>

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
                                                                    class="agents"><strong>Items Total(₹)</strong></label>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="txt_item_total"
                                                                    class="form-control txt_item_total pull-right w-21 text-right numberss"
                                                                    id="txt_item_total" readonly="">
                                                            </td>
                                                        </tr>


                                                    </thead>
                                                    <tbody class="totalamounts">


                                                       
                                                     
                                                  
                                                       
                                                        <tr class="apRow">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 "
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class=""
                                                                        style="    padding-right: 15px;"><input
                                                                            type="text" name="discount_field1"
                                                                            id="discount_field1" 
                                                                            class="form-control  pull-left discount_field1" readonly></label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="discount_final1"
                                                                            id="discount_final1" 
                                                                            class="form-control igst pull-left discount_final1"
                                                                            placeholder="" readonly>

                                                                        <select
                                                                            class="form-control txt_cal_type txt_cal_type1 "
                                                                            name="txt_cal_type1" id="txt_cal_type1"
                                                                            title="Calculation Type"  readonly>
                                                                            <option value="1" selected="">=</option>
                                                                            <option value="2">%</option>
                                                                        </select>
                                                                    </div>
                                                                    <select
                                                                        class="form-control discount_type1 pull-left numberss pricefieldchanges extraprices"
                                                                        name="discount_type1" id="discount_type1"
                                                                        readonly>
                                                                        <option value="1" selected="">+</option>
                                                                        <option value="2">-</option>
                                                                    </select>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="discount_final_amt1"
                                                                    class="form-control discount_final_amt1 totalcalc extrapricescomm pull-right text-right numberss"
                                                                    id="discount_final_amt1" readonly="readonly">
                                                            </td>
                                                        </tr>

                                                        <tr class="apRow">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 "
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class=""
                                                                        style="    padding-right: 15px;"><input
                                                                            type="text" name="discount_field2"
                                                                            id="discount_field2"
                                                                            class="form-control  pull-left discount_field2" readonly></label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="discount_final2"
                                                                            id="discount_final2" 
                                                                            class="form-control igst pull-left discount_final2"
                                                                            placeholder="" readonly>
                                                                        <select
                                                                            class="form-control txt_cal_type txt_cal_type2 "
                                                                            name="txt_cal_type2" id="txt_cal_type2"
                                                                            title="Calculation Type" readonly>
                                                                            <option value="1" selected="">=</option>
                                                                            <option value="2">%</option>

                                                                        </select>
                                                                    </div>
                                                                    <select
                                                                        class="form-control discount_type2 pull-left numberss pricefieldchanges extraprices"
                                                                        name="discount_type2" id="discount_type2"
                                                                        readonly>
                                                                        <option value="1" selected="">+</option>
                                                                        <option value="2">-</option>
                                                                    </select>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="discount_final_amt2"
                                                                    class="form-control discount_final_amt2 totalcalc extrapricescomm pull-right text-right numberss"
                                                                    id="discount_final_amt2" readonly="readonly">
                                                            </td>
                                                        </tr>
                                                      
                                                     
                                                        <tr class="intrast apRow" style="display:none">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 intrast"
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class="" style="padding-right: 15px;">CGST
                                                                    </label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="cgst_per" id="cgst_per"
                                                                            onkeyup="cal()"  class="form-control igst pull-left cgst_per"  placeholder="" max="100" value="9" readonly>
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-percent"></i></span>
                                                                    </div>
                                                                    <select
                                                                        class="form-control txt_cal_type_cgst pull-left numberss pricefieldchanges extraprices"
                                                                        name="txt_cal_type_cgst_"
                                                                        id="txt_cal_type_cgst" readonly>
                                                                        <option value="1" selected="">+</option>
                                                                    </select>

                                                                </span>

                                                            </td>
                                                            <td>
                                                                <span class="col-md-12 p-0 intrast"
                                                                    style="display: block;">

                                                                    <input type="text" name="cgst_total"
                                                                        class="form-control cgst_total totalcalc  pull-right text-right numberss"     id="cgst_total" readonly="readonly">
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr class="intrast apRow" style="display:none">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 "
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class="" style="    padding-right: 15px;">SGST
                                                                    </label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="sgst_per" id="sgst_per"
                                                                            onkeyup="cal()"
                                                                            class="form-control igst pull-left sgst_per"
                                                                            placeholder="" max="100" value="9" readonly>
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-percent"></i></span>
                                                                    </div>
                                                                    <select
                                                                        class="form-control txt_cal_type_sgst pull-left numberss pricefieldchanges extraprices"
                                                                        name="txt_cal_type_sgst"
                                                                        id="txt_cal_type_sgst" readonly>
                                                                        <option value="1" selected="" >+</option>
                                                                    </select>

                                                                </span>

                                                            </td>
                                                            <td>
                                                                <span class="col-md-12 p-0 "
                                                                    style="display: block;">

                                                                    <input type="text" name="sgst_total" class="form-control sgst_total totalcalc  pull-right text-right numberss" id="sgst_total" readonly="readonly"  >

                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr class="interst apRow">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 "
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class="" style="    padding-right: 15px;">IGST
                                                                    </label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="igst_per" id="igst_per"
                                                                            onkeyup="cal()"
                                                                            class="form-control igst pull-left igst_per"
                                                                            placeholder="" max="100" value="18" readonly>
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-percent"></i></span>
                                                                    </div>
                                                                    <select
                                                                        class="form-control txt_cal_type_igst pull-left numberss pricefieldchanges extraprices"
                                                                        name="txt_cal_type_igst"
                                                                        id="txt_cal_type_igst" readonly>
                                                                        <option value="1" selected="">+</option>
                                                                    </select>

                                                                </span>

                                                            </td>
                                                            <td>
                                                                <span class="col-md-12 p-0 "
                                                                    style="display: block;">

                                                                    <input type="text" name="igst_total"
                                                                        class="form-control igst_total totalcalc  pull-right text-right numberss"
                                                                        id="igst_total" readonly="readonly" >

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
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>-->
                                    <!-- /.card-body -->
                                    <!-- /.card-body -->




                                </div>
                                <div class="card-footer text-right">
                                    <span style="float: left;" class="col-md-8">
                                        <p id="advanceinfomsg" style=" text-align: center;color:#ff0000;font-size:14px"></p>
                                    </span>
                                    <span class="col-md-2">
                                        <input type="hidden" name="deleted" value="0" id="deleted" />
                                        <?php if ($_GET['type'] == 1) { ?>
                                            <input type="hidden" name="mode" value="editBillcomm" />
                                        <?php } elseif ($_GET['type'] == 2) { ?>
                                            <input type="hidden" name="mode" value="editBillNonComm" />
                                        <?php } ?>
                                        <input type="hidden" name="cus_id" id="cus_id">
                                        <input type="hidden" name="adv_id" id="adv_id" value="<?php echo $_GET['id']; ?>">
                                        <!--<button type="submit" class="btn_save btn btn-success btn-lg" onclick="cal()">Update</button></span>-->
                                </div>
                                </form>
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
    //  $('#txt_customer_name').select2();
    $('#txt_customer_name').select2();
    $('#txt_estimate_name').select2();
    $('#txt_payment_type').select2();
    $("#txt_customer_name").change(function() {
        var c_name = $('option:selected', this).val();

        changeCustomerEdit(c_name);

    });

    function changeCustomerEdit(c_name) {
        //alert($('option:selected', this).val());
        var esname = $('.txt_estimate_name').find('option:selected').val();
        console.log(esname);


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
                    //alert(response.length);
                    //alert(response[0].PK_ES_ID);
                    $("#txt_estimate_name").html('');
                    $('#txt_estimate_name').append($('<option value="">Select Estimate</option>'));
                    for (var i = 0; i < response.length; i++) {
                        $('#txt_estimate_name').append($('<option value="' + response[i].PK_ES_ID + '">' + response[i].sono + '</option>'));

                    }
                    $('.txt_estimate_name').find('option[value="' + esname + '"]').attr("selected", true);
                    $('.txt_estimate_name').trigger('changed');

                },
                error: function(response) {
                    console.log(response);
                }
            });
        } else {

        }

    }
    $('#form_sale_order_edit').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
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

    if (getQueryVariable('id')) {
        var soid = getQueryVariable('id');
        getSOEditValues(soid);
    }


    /*get sales order values edit page */
    function getSOEditValues(soid) {
        <?php if ($_GET['type'] == 1) { ?>
            $.ajax({
                url: "modules/bill_receipts/ajax_functions.php",
                data: {
                    'soid': soid,
                    'mode': 'getBillEditValues_comm'
                },
                type: 'post',
                dataType: 'json',
                beforeSend: function() {
                    $("#cover").css("display", "block");
                },
                success: function(response) {

                    $('#proStatus').val(1);
                    $('#cus_id').val(response[0].customer_id);
                    //getCustomersListings(response[0].customer_id);
                    //  ,price_type,payment_type

                    $('.txt_estimate_name').find('option[value="' + response[0].PK_ES_ID + '"]').attr("selected", true);
                    $('.txt_estimate_name').trigger('change');
                    $(".txt_estimate_name").select2({
                        disabled: 'readonly'
                    });

                    $('.txt_payment_type').find('option[value="' + response[0].payment_type + '"]').attr(
                        "selected", true);
                    $('.txt_payment_type').trigger('change');
                    $(".txt_payment_type").select2({
                        disabled: 'readonly'
                    });


                    //$('.txt_customer_name').find('option[value="' + response[0].customer_id + '"]').attr("selected", true);
                    // $('.txt_customer_name').find('option[value="' + response[0].customer_id + '"]').attr("selected", true);
                    //  $('.txt_customer_name').trigger('change');
                    $('.txt_customer_name').val(response[0].customer_id).trigger('change.select2');
                    $(".txt_customer_name").select2({
                        disabled: 'readonly'
                    });

                    //  $('.txt_customer_name').val(response[0].customer_id); // Change the value or make some change to the internal state
                    // $('.txt_customer_name').trigger('change');
                    // $('.txt_customer_name').val(response[0].customer_id).trigger('change');



                    $('#adv_amount').val(response[0].advance_amount);
                    $('#txt_remarks').val(response[0].remarks);
                    $('.txt_pi_date').val(moment(response[0].date).format('DD/MM/YYYY'));

                    // validatefunctions();

                },
                error: function(response) {
                    console.log(response);
                }

            });
        <?php } elseif ($_GET['type'] == 2) { ?>
            $.ajax({
                url: "modules/bill_receipts/ajax_functions.php",
                data: {
                    'soid': soid,
                    'mode': 'getBillEditValues_noncomm'
                },
                type: 'post',
                dataType: 'json',
                beforeSend: function() {
                    $("#cover").css("display", "block");
                },
                success: function(response) {

                    $('#proStatus').val(1);
                    $('#cus_id').val(response[0].customer_id);
                    //getCustomersListings(response[0].customer_id);
                    //  ,price_type,payment_type

                    $('.txt_estimate_name').find('option[value="' + response[0].PK_ES_ID + '"]').attr("selected", true);
                    $('.txt_estimate_name').trigger('change');
                    $(".txt_estimate_name").select2({
                        disabled: 'readonly'
                    });

                    $('.txt_payment_type').find('option[value="' + response[0].payment_type + '"]').attr(
                        "selected", true);
                    $('.txt_payment_type').trigger('change');
                    $(".txt_payment_type").select2({
                        disabled: 'readonly'
                    });

                    //$('.txt_customer_name').find('option[value="' + response[0].customer_id + '"]').attr("selected", true);
                    //  $('.txt_customer_name').val(response[0].customer_id); // Change the value or make some change to the internal state
                    // $('.txt_customer_name').trigger('change');

                    $('.txt_customer_name').val(response[0].customer_id).trigger('change.select2');
                    $(".txt_customer_name").select2({
                        disabled: 'readonly'
                    });

                    $('#adv_amount').val(response[0].advance_amount);
                    $('#txt_remarks').val(response[0].remarks);

                    $('.txt_pi_date').val(moment(response[0].date).format('DD/MM/YYYY'));

                },
                error: function(response) {
                    console.log(response);
                }

            });
        <?php } ?>

    }


    $(".nav-link").removeClass("active");
    $(".nav-item").removeClass("menu-open");
    $(".sales").addClass("menu-open");
    $(".sales_customer .nav-link").addClass("active");




    var deleted = 0;


    function cal() {
        $('#edit_bill_commercial').validate({
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
                    remote: {
                        url: "modules/bill_receipts/ajax_functions.php",
                        type: "post",
                        data: {
                            mode: "check_amount_bill_by_esid",
                            adv_amount: function() {
                                return $("#adv_amount").val();
                            },
                            estimate_no: function() {
                                return $("#txt_estimate_name option:selected").val();
                            },
                            type: <?php echo $_GET['type']; ?>
                        }
                    }
                },
                txt_estimate_name: {
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
                txt_estimate_name: {
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
                var formData = new FormData($('#edit_bill_commercial')[0]);
                $.ajax({
                    url: "modules/bill_receipts/ajax_functions.php",
                    data: formData,
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            if (response == 1) {
                                swal({
                                    title: "Success!",
                                    text: "bill has been edited successfully!.",
                                    type: "success",
                                    timer: 1000,
                                    buttons: false,
                                }).then(function() {
                                    window.location.href = "index.php?erp=88&type=1";
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
        $('#edit_bill_noncommercial').validate({
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
                    remote: {
                        url: "modules/bill_receipts/ajax_functions.php",
                        type: "post",
                        data: {
                            mode: "check_amount_bill_by_esid",
                            adv_amount: function() {
                                return $("#adv_amount").val();
                            },
                            estimate_no: function() {
                                return $("#txt_estimate_name option:selected").val();
                            },
                            type: <?php echo $_GET['type']; ?>
                        }
                    }
                },
                txt_estimate_name: {
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
                txt_estimate_name: {
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
                var formData = new FormData($('#edit_bill_noncommercial')[0]);
                $.ajax({
                    url: "modules/bill_receipts/ajax_functions.php",
                    data: formData,
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            if (response == 1) {
                                swal({
                                    title: "Success!",
                                    text: "Bill has been edited successfully!.",
                                    type: "success",
                                    timer: 1000,
                                    buttons: false,
                                }).then(function() {
                                    window.location.href = "index.php?erp=88&type=2";
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
            var estid = $('#txt_estimate_name').find('option:selected').val();
            $.ajax({
                url: "modules/bill_receipts/ajax_functions.php",
                data: {
                    'estid': estid,
                    'mode': 'getestAmount',
                    'type': <?php echo $_GET['type']; ?>
                },
                type: 'post',
                async: false,
                dataType: 'json',
                success: function(response) {
                    var remainamt = "";
                    var advamt = "";
                    if (response.advcount) {
                        remainamt = parseFloat(response.grand_total) - parseFloat(response.advcount);
                        advamt = parseFloat(response.advcount);
                        $('.adv_amount').val(remainamt);
                        $('#advanceinfomsg').append('<p class="pull-right">Advance Amount(₹): ' + advamt + '</p>');


                        // $('#adv_amount').val(advamt);

                    } else {
                        remainamt = parseFloat(response.grand_total);
                        advamt = "";
                        $('.adv_amount').val(parseFloat(remainamt));

                        $('#advanceinfomsg').append('<p class="pull-right">Advance Amount(₹): ' + remainamt + '</p>');
                        //  $('#adv_amount').val(remainamt);


                    }


                    //  advcount  ngrand_total":"944.00
                }
            });
        });
    }
</script>