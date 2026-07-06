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
                    <h1>Edit Job Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Job Order</li>
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
                                    <!-- <div class="one-half-column">
                                        <div class="form-group">
                                            <label for="" class="control-label">SO No </label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_sono" value=""
                                                    name="txt_sono" id="txt_sono" placeholder="Auto" title="SO NO"
                                                    readonly="">
                                                <span class="error" id="txt_sono_error"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="control-label">Date <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input  type="text"
                                                    class="form-control txt_pi_date hasDatepicker valid"
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
                                                        required="" aria-required="true" >
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
                                                <input  type="text"  class="form-control txt_reference_number"   name="txt_reference_number" id="txt_reference_number"  value="" placeholder="Reference Number" title="Reference Number" />
                                                <span class="error" id="txt_reference_number_error"></span>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="" class="control-label">Job Order No </label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_sono" name="txt_sono"
                                                    id="txt_sono" placeholder="Auto" title="SO NO" readonly="">
                                                <span class="error" id="txt_sono_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Customer <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_customer_name "
                                                        name="txt_customer_name" id="txt_customer_name"
                                                        title="Customer">
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

                                        <!--  <div class="form-group">
                                            <label for="" class="control-label">Types <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_types chosen_required"
                                                        name="txt_types" id="txt_types" title="Types" required=""
                                                        aria-required="true">
                                                        <option value="">Select Types</option>
                                                        <option value="1">Commercial</option>
                                                        <option value="2">Non Commercial</option>

                                                    </select>
                                                </div>
                                                <span class="error" id="txt_types-error"></span>
                                            </div>
                                        </div>-->

                                        <!--  <div class="form-group">
                                            <label for="" class="control-label">Orientation <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_orientation chosen_required"
                                                        name="txt_orientation" id="txt_orientation"
                                                        title="Orientation" required="" aria-required="true">
                                                        <option value="">Select Orientation</option>
                                                        <option value="1">landscape</option>
                                                        <option value="2">portrait</option>

                                                    </select>
                                                </div>
                                                <span class="error" id="txt_orientation-error"></span>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label for="" class="control-label">Date <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <input type="text" class="form-control txt_pi_date hasDatepicker valid"
                                                    name="txt_pi_date" id="txt_pi_date" placeholder="DD/MM/YYYY"
                                                    aria-invalid="false">
                                                <span class="error" id="txt_pi_date_error"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-4 col-md-12">
                                       

                                        <div class="form-group">
                                            <label for="" class="control-label">Payment Type <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_payment_type "
                                                        name="txt_payment_type" id="txt_payment_type"
                                                        title="Payment Type">
                                                        <option value="">Select Payment Type</option>
                                                        <option value="1">Cash</option>
                                                        <option value="2">Credit</option>

                                                    </select>
                                                </div>
                                                <span class="error" id="txt_payment_type-error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">Remarks </label>
                                            <div class="control-field">
                                                <textarea class="form-control txt_remarks" name="txt_remarks" style="height: 77px !important;" id="txt_remarks" ></textarea>
                                                <span class="error" id="txt_remarks_error"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-4 col-md-12">
                                        <div class="form-group">
                                            <label for="" class="control-label">City</label>
                                            <div class="control-field">
                                                <select
                                                    class="form-control txt_customer_city capallfields "
                                                    style=" text-transform:uppercase !important;" id="txt_customer_city"
                                                    name="txt_customer_city" 
                                                    >
                                                    <option value="" selected="" data-select2-id="4">SELECT CITY
                                                    </option>
                                                </select>

                                                <span class="error" id="txt_customer_city_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">GST Type</label>
                                            <div class="control-field">
                                                <select class="form-control txt_intstate " onchange="cal()" name="txt_intstate"
                                                    id="txt_intstate">
                                                    <option value="1" selected>Inclusive of GST</option>
                                                    <option value="2">Exclusive of GST</option>

                                                </select>
                                                <span class="error" id="txt_customer_city_error"></span>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="" class="control-label">Price Type <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_price_type chosen_required"
                                                        name="txt_price_type" id="txt_price_type"
                                                        title="Price Type" required="" aria-required="true">


                                                    </select>
                                                </div>
                                                <span class="error" id="txt_price_type-error"></span>
                                            </div>
                                        </div>-->

                                    </div>
                                    <input type="hidden" name="mode" id="mode" value="AddProduct">

                                </div>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="text-right">
                                        <span class="btn btn-sm btn-primary btn-mint mar-btm" id="additems"
                                            onclick="addrow();" style="margin-top:-40px"><i class="fa fa-plus mr-2"
                                                aria-hidden="true"></i> Add row
                                        </span>
                                    </div>

                                    <div class="table-div table-responsive">
                                        <table class="table-bordered table thead itemTable">
                                            <thead>
                                                <tr>
                                                    <th width="120">Types <span class="color"> *</span></th>
                                                    <th width="120">Item Type <span class="color"> *</span></th>
                                                    <th width="120">Item <span class="color"> *</span></th>
                                                    <th width="120">Category </th>
                                                    <th width="120">Quantity <span class="color"> *</span></th>
                                                    <th width="120">Price Type <span class="color"> *</span></th>
                                                    <th width="120">Orientation <span class="color"> *</span></th>
                                                    <th width="120">Price(₹) <span class="color"> *</span></th>
                                                    <th width="120">Total (₹)<span class="color"> *</span> </th>
                                                    <th width="5" valign="middle">#</th>
                                                </tr>
                                            </thead>
                                            <tbody class="itemclone custom_table_width">

                                                <tr>
                                                    <td><select class="form-control txt_types txt_types_1 "
                                                            name="txt_types[]" id="txt_types_1" data-czid="1"
                                                            title="Types">
                                                            <option value="">Select Types</option>
                                                            <option value="1">Commercial</option>
                                                            <option value="2">Non Commercial</option>
                                                        </select></td>
                                                    <td><select class="form-control txt_itemtypes txt_itemtypes_1 "
                                                            name="txt_itemtypes[]" id="txt_itemtypes_1"
                                                            title="Item Types" data-czid="1"
                                                            data-classids="txt_itemtypes_1"></select></td>
                                                    <td><select class="form-control txt_item  txt_item_1"
                                                            name="txt_item[]" id="txt_item_1" data-czid="1" title=""
                                                            ></select></td>
                                                    <td><select class="form-control txt_category txt_category_1 "
                                                            name="txt_category[]" id="txt_category_1" title="Category"
                                                            onkeyup="cal()"></select></td>
                                                    <td><input onkeyup="cal()"
                                                            class="form-control txt_product_qty numbersOnly  txt_product_qty_1"
                                                            min="0" max="999999" id="txt_product_qty_1"
                                                            name="txt_product_qty[]" placeholder="Quantity"
                                                            title="Quantity"></td>
                                                    <td><select class="form-control txt_price_type txt_price_type_1 "
                                                            data-czid="1" name="txt_price_type[]" id="txt_price_type_1"
                                                            title="Price Type" onkeyup="cal()"></select></td>
                                                    <td><select class="form-control txt_orientation txt_orientation_1"
                                                            name="txt_orientation[]" id="txt_orientation_1"
                                                            title="Orientation" onkeyup="cal()">
                                                            <option value="">Select Orientation</option>
                                                            <option value="1">Length</option><option value="2">Breadth </option>
                                                        </select></td>
                                                    <td><input type="text" name="txt_price[]" id="txt_price_1"
                                                            onkeyup="cal()"
                                                            class="form-control pricefield txt_price txt_price_1 numberss text-right"
                                                            title="Price"><input type="hidden"
                                                            class="txt_comm txt_comm_1" name="txt_comm" id="txt_comm"
                                                            value=""></td>
                                                    <td><input type="text" name="txt_final_total[]"
                                                            id="txt_final_total_1"
                                                            class="form-control txt_final_total_1 numberss txt_final_total text-right"
                                                            title="Grand Total" readonly></td>
                                                    <td><button type="button" name="removeitems" id="removeitems"
                                                            class="btn btn-danger removeitems" title="Delete"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </td>
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
                                                                        style="    padding-right: 15px;"><input
                                                                            type="text" name="discount_field1"
                                                                            id="discount_field1" onkeyup="cal()"
                                                                            class="form-control  pull-left discount_field1"></label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="discount_final1"
                                                                            id="discount_final1" onkeyup="cal()"
                                                                            class="form-control igst pull-left discount_final1"
                                                                            placeholder="">

                                                                        <select
                                                                            class="form-control txt_cal_type txt_cal_type1 "
                                                                            name="txt_cal_type1" id="txt_cal_type1"
                                                                            title="Calculation Type" onchange="cal()">
                                                                            <option value="1" selected="">=</option>
                                                                            <option value="2">%</option>
                                                                        </select>
                                                                    </div>
                                                                    <select
                                                                        class="form-control discount_type1 pull-left numberss pricefieldchanges extraprices"
                                                                        name="discount_type1" id="discount_type1"
                                                                        onchange="cal()">
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
                                                                            id="discount_field2" onkeyup="cal()"
                                                                            class="form-control  pull-left discount_field2"></label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="discount_final2"
                                                                            id="discount_final2" onkeyup="cal()"
                                                                            class="form-control igst pull-left discount_final2"
                                                                            placeholder="">
                                                                        <select
                                                                            class="form-control txt_cal_type txt_cal_type2 "
                                                                            name="txt_cal_type2" id="txt_cal_type2"
                                                                            title="Calculation Type"  onchange="cal()">
                                                                            <option value="1" selected="">=</option>
                                                                            <option value="2">%</option>

                                                                        </select>
                                                                    </div>
                                                                    <select
                                                                        class="form-control discount_type2 pull-left numberss pricefieldchanges extraprices"
                                                                        name="discount_type2" id="discount_type2"
                                                                        onchange="cal()">
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
                                                        <tr class="apRow">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 "
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class=""
                                                                        style="    padding-right: 15px;"><input
                                                                            type="text" name="discount_field3"
                                                                            id="discount_field3" onkeyup="cal()"
                                                                            class="form-control  pull-left discount_field3"></label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="discount_final3"
                                                                            id="discount_final3" onkeyup="cal()"
                                                                            class="form-control igst pull-left discount_final3"
                                                                            placeholder="">
                                                                        <select
                                                                            class="form-control txt_cal_type txt_cal_type3 "
                                                                            name="txt_cal_type3" id="txt_cal_type3"
                                                                            title="Calculation Type"  onchange="cal()">
                                                                            <option value="1" selected="">=</option>
                                                                            <option value="2">%</option>

                                                                        </select>
                                                                    </div>
                                                                    <select
                                                                        class="form-control discount_type3 pull-left numberss pricefieldchanges extraprices"
                                                                        name="discount_type3" id="discount_type3"
                                                                        onchange="cal()">
                                                                        <option value="1" selected="">+</option>
                                                                        <option value="2">-</option>
                                                                    </select>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="discount_final_amt3"
                                                                    class="form-control discount_final_amt3 totalcalc extrapricescomm pull-right text-right numberss"
                                                                    id="discount_final_amt3" readonly="readonly">
                                                            </td>
                                                        </tr>
                                                     
                                                        <!--  <tr class="apRow">
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
                                                                            placeholder="%" max="100">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-percent"></i></span>
                                                                    </div>
                                                                    <select
                                                                        class="form-control txt_cal_type_igst pull-left numberss pricefieldchanges extraprices"
                                                                        name="txt_cal_type_igst_final"
                                                                        id="txt_cal_type_igst_final">
                                                                        <option value="1" selected="">-</option>
                                                                    </select>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="discount_final_amt"
                                                                    class="form-control txt_field_value_comm totalcalc extrapricescomm pull-right text-right numberss"
                                                                    id="discount_final_amt" readonly="readonly" min="0"
                                                                    max="' + itemTot + '">
                                                            </td>
                                                        </tr>-->
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
                                                                            placeholder="%" max="100">
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
                                                        <tr class="apRow">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 "
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class=""
                                                                        style=" padding-right: 15px;"><input
                                                                            type="text" name="discount_field4"
                                                                            id="discount_field4" onkeyup=""
                                                                            class="form-control  pull-left discount_field4" value="Advance" readonly /></label>
                                                                    <div class="input-group btn-type w-49"
                                                                        style="margin-right: 20px !important;width: 30% !important;">
                                                                        <input type="text" name="discount_final4"
                                                                            id="discount_final4" onkeyup="calAdvance(this)"
                                                                            class="form-control igst pull-left discount_final4"
                                                                            placeholder="">
                                                                        <select
                                                                            class="form-control txt_cal_type txt_cal_type4 "
                                                                            name="txt_cal_type4" id="txt_cal_type4"
                                                                            title="Calculation Type"  onchange="cal()" readonly>
                                                                            <option value="1" selected="">=</option>

                                                                        </select>
                                                                    </div>
                                                                    <select
                                                                        class="form-control discount_type4 pull-left numberss pricefieldchanges extraprices"
                                                                        name="discount_type4" id="discount_type4"
                                                                        onchange="cal()" readonly>
                                                                        <!--<option value="1" selected="">+</option>-->
                                                                        <option value="2">-</option>
                                                                    </select>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="discount_final_amt4"
                                                                    class="form-control discount_final_amt4 totalcalc extrapricescomm pull-right text-right numberss"
                                                                    id="discount_final_amt4" readonly="readonly">
                                                            </td>
                                                        </tr>
                                                        <tr class="apRow">
                                                            <td class="text-right">
                                                                <span class="totalamounts_sec mt-10 "
                                                                    style="display: flex;align-items: center;justify-content: flex-end;">
                                                                    <label class=""
                                                                        style="    padding-right: 15px;"><input
                                                                            type="text" name="discount_field5"
                                                                            id="discount_field5" onkeyup="cal()"
                                                                            class="form-control  pull-left discount_field5"  value="Pending" readonly></label>
                                                        
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="discount_final_amt5"
                                                                    class="form-control discount_final_amt5 totalcalc extrapricescomm pull-right text-right numberss"
                                                                    id="discount_final_amt5" readonly="readonly">
                                                            </td>
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
                            <div class="card-footer text-right">
                                <input type="hidden" name="deleted" value="0" id="deleted" />
                                <input type="hidden" name="mode" value="updateSalesOrder" />
                                <input type="hidden" name="cus_id" id="cus_id">
                                <button type="submit" class="btn_save btn btn-success btn-lg">Update</button>
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
}*/

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
.apRow .extraprices{
    width: 15%;
}

</style>
<script>
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


/*
$('table').on("change", ".txt_product_name", function(e) {
    var product_id = $(this).val();
    var czid = $(this).attr("data-czid");
    $.ajax({
        url: "modules/products/ajax_functions.php",
        data: {
            'mode': 'getproduct_by_id',
            id: product_id
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response[0].length > 0) {

                cal();

            } else {

            }
        },
        error: function(response) {
            console.log(response);
        }
    });
});
*/

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
});

/*$('.txt_price_type').on("change", function(e) {
    $('.txt_product_name').find('option[value=" "]').attr("selected", true);
});*/


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
        url: "modules/sales/ajax_functions.php",
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
    

    /*} else {
        swal("Failed!", "First choose price type , Try again!", "error");
        $(this).find('option[value=" "]').attr("selected",true);
        getCostTypeListing(1);
    }*/
}


/*
$('table').on("change", ".txt_itemtypes ", function(e) {
    var czid = $(this).attr('data-czid');
    var itemtypes = $('.txt_itemtypes_' + czid).find("option:selected").val();
    var types = $('.txt_types_' + czid).find("option:selected").val();
    getComercialorNonItemsType(czid);
*/

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

/*get sales order values edit page */
function getSOEditValues(soid) {
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'soid': soid,
            'mode': 'getSOEditValues'
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
            } else {


                $('#proStatus').val(1);
                $('#cus_id').val(response[0].customer_id);
                getCustomersListings(response[0].customer_id);


                //  ,price_type,payment_type


                $('.txt_payment_type').find('option[value="' + response[0].payment_type + '"]').attr(
                    "selected", true);
                $('.txt_intstate').find('option[value="' + response[0].gst_type + '"]').attr("selected", true);

                //  $('.txt_customer_city').find('option[value="' + response[0].pk_city_id + '"]').attr("selected", true);
                getCity(response[0].city);



                //   getAllShipmentLocationByID(response[0].shipment_from, response[0].shipment_to);
                //  $('#txt_customer_name').attr('disabled', true);
                // $('#txt_so_id').val(response[0].pk_sale_order);

                $('#txt_sono').val(response[0].sono);

                $('#txt_so_no').attr('disabled', false);
                $('#txt_so_no').val(response[0].sono);
                $('#txt_so_no').attr('disabled', true);
                $('#txt_so_no_ed').val(response[0].sono);
                $('#txt_remarks').val(response[0].remark);
                //    $('#txt_customer_city').val(response[0].city);
                
                $('#txt_pi_date').val(moment(response[0].sale_date).format('DD/MM/YYYY'));
                $('#txt_item_total').val(parseFloat(response[0].item_total).toFixed(2));
                $('#gst_per').val(parseFloat(response[0].gst_percent).toFixed(2));
                $('#gst_total').val(parseFloat(response[0].gst_total).toFixed(2));
                $('#discount_field1').val(response[0].discount_field);
                $('#discount_final1').val(parseFloat(response[0].discount_final).toFixed(2));
                $('#discount_final_amt1').val(parseFloat(response[0].discount_final_amt).toFixed(2));
              //  $('#discount_type_1').val(response[0].discount_type);
                $('#discount_type1').find('option[value="' + response[0].discount_type + '"]').attr("selected", true);
                $('#txt_cal_type1').find('option[value="' + response[0].caltype1 + '"]').attr("selected", true);
                
                $('#discount_field2').val(response[0].discount_field2);
                $('#discount_final2').val(parseFloat(response[0].discount_final2).toFixed(2));
                $('#discount_final_amt2').val(parseFloat(response[0].discount_final_amt2).toFixed(2));
                $('#discount_type2').find('option[value="' + response[0].discount_type2 + '"]').attr("selected", true);
                $('#txt_cal_type2').find('option[value="' + response[0].caltype2 + '"]').attr("selected", true);

                $('#discount_field3').val(response[0].discount_field3);
                $('#discount_final3').val(parseFloat(response[0].discount_final3).toFixed(2));
                $('#discount_final_amt3').val(parseFloat(response[0].discount_final_amt3).toFixed(2));
                $('#discount_type3').find('option[value="' + response[0].discount_type3 + '"]').attr("selected", true);
                $('#txt_cal_type3').find('option[value="' + response[0].caltype3 + '"]').attr("selected", true);


             //   $('#discount_field4').val(response[0].discount_field4);
                $('#discount_final4').val(parseFloat(response[0].discount_final4).toFixed(2));
                $('#discount_final_amt4').val(parseFloat(response[0].discount_final_amt4).toFixed(2));
             /*   $('#discount_type4').find('option[value="' + response[0].discount_type4 + '"]').attr("selected", true);
                $('#txt_cal_type4').find('option[value="' + response[0].caltype4 + '"]').attr("selected", true);*/


              //  $('#discount_field5').val(response[0].discount_field5);
             /*   $('#discount_final5').val(parseFloat(response[0].discount_final5).toFixed(2));
                             $('#txt_cal_type5').find('option[value="' + response[0].caltype5 + '"]').attr("selected", true);

                $('#discount_type5').find('option[value="' + response[0].discount_type5 + '"]').attr("selected", true);*/
                $('#discount_final_amt5').val(parseFloat(response[0].discount_final_amt5).toFixed(2));

                $('#txt_grand_total').val(parseFloat(response[0].grand_total).toFixed(2));
                // $('#txt_gst_total').val(parseFloat(response[0].gst_total).toFixed(2));
                var vz = 0;
                var regex = /(<([^>]+)>)/ig;
                $('table .itemclone').html('');
                for (j = 0; j < response[1].length; j++) {
                    vz++;
                    /* $('table .itemclone').append(
                         '<tr> <td ><input type="text" name="txt_price[]" id="txt_price_' + vz +
                         '" class="form-control pricefield txt_price txt_price_' + vz +
                         ' numberss text-right" onkeyup="cal()" title="Price"  value='+response[1][j].price+' ><input type="hidden" class="txt_comm txt_comm_' + vz +
                         '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
                         vz + '" class="form-control txt_final_total_' + vz +
                         ' numberss txt_final_total text-right" title="Grand Total" value=' + response[1]
                         [j].final_total + ' readonly></td><td><select class="form-control txt_types txt_types_' +vz + ' chosen_required" name="txt_types[]" id="txt_types_' + vz +'" title="Types" data-czid="' + vz + '" data-classids="txt_types_' + vz +'" onchange="cal()"></select></td><td class="itemsdata" style="display:none"><select  class="form-control txt_item  txt_item_' + vz +'" name="txt_item[]" id="txt_item_' + vz +'" data-czid="' + vz +'"  title="" ></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
                         vz + '" min="0" max="999999" id="txt_product_qty_' + vz +
                         '" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value=' +
                         response[1][j].qty +' ></td><td class="text-center"><button type="button" name="removeitems" id="removeitems" class="removeitems btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');*/

                    // <tr><td><select class="form-control txt_types txt_types_1 " name="txt_types[]" id="txt_types_1" data-czid="1" title="Types"  > <option value="">Select Types</option><option value="1">Commercial</option><option value="2">Non Commercial</option></select></td> <td><select class="form-control txt_itemtypes txt_itemtypes_1 " name="txt_itemtypes[]" id="txt_itemtypes_1" title="Item Types" data-czid="1" data-classids="txt_itemtypes_1"></select></td><td ><select  class="form-control txt_item  txt_item_1" name="txt_item[]" id="txt_item_1" data-czid="1"  title="" onkeyup="cal()" ></select></td><td><select class="form-control txt_category txt_category_1 "  name="txt_category[]" id="txt_category_1" title="Category"  onkeyup="cal()" ></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_1" min="0" max="999999" id="txt_product_qty_1" name="txt_product_qty[]" placeholder="Quantity" title="Quantity"></td><td><select class="form-control txt_price_type txt_price_type_1 " data-czid="1"  name="txt_price_type[]" id="txt_price_type_1" title="Price Type" onkeyup="cal()" ></select></td><td><select class="form-control txt_orientation txt_orientation_1"  name="txt_orientation[]" id="txt_orientation_1" title="Orientation" onkeyup="cal()" ><option value="">Select Orientation</option><option value="1">landscape</option><option value="2">portrait</option></select></td><td ><input type="text" name="txt_price[]" id="txt_price_1" onkeyup="cal()" class="form-control pricefield txt_price txt_price_1 numberss text-right" title="Price"><input type="hidden" class="txt_comm txt_comm_1" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_1" class="form-control txt_final_total_1 numberss txt_final_total text-right" title="Grand Total" readonly></td><td><button type="button" name="removeitems" id="removeitems" class="btn btn-danger removeitems" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>
                    $('table .itemclone').append(
                        '<tr><td><select class="form-control txt_types txt_types_' + vz +
                        ' " name="txt_types[]" id="txt_types_' + vz + '" data-czid="' + vz +
                        '" title="Types"  > <option value="">Select Types</option><option value="1">Commercial</option><option value="2">Non Commercial</option></select></td><td><select class="form-control txt_itemtypes txt_itemtypes_' +
                        vz + ' " name="txt_itemtypes[]" id="txt_itemtypes_' + vz +
                        '" title="Types" data-czid="' + vz + '" data-classids="txt_itemtypes_' + vz +
                        '" onchange="cal()"></select></td><td class="itemsdata" style="display:none"><select  class="form-control txt_item  txt_item_' +
                        vz + '" name="txt_item[]" id="txt_item_' + vz + '" data-czid="' + vz +
                        '"  title="" ></select></td><td><select class="form-control txt_category txt_category_' +
                        vz + ' "  name="txt_category[]" id="txt_category_' + vz +
                        '" title="Category" required="" aria-required="true"></select></td><td><input class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
                        vz + '" min="0" max="999999" id="txt_product_qty_' + vz +
                        '" onkeyup="cal()" name="txt_product_qty[]" placeholder="Quantity" title="Quantity"  value=' +
                        response[1][j].qty +
                        '></td><td><select class="form-control txt_price_type txt_price_type_' + vz +
                        ' " data-czid="' + vz + '"  name="txt_price_type[]" id="txt_price_type_' + vz +
                        '" title="Price Type" onkeyup="cal()" ></select></td><td><select class="form-control txt_orientation txt_orientation_' +
                        vz + '"  name="txt_orientation[]" id="txt_orientation_' + vz +
                        '" title="Orientation" onkeyup="cal()" ><option value="">Select Orientation</option><option value="1">Length</option><option value="2">Breadth </option></select></td><td ><input type="text" name="txt_price[]" id="txt_price_' +
                        vz + '" onkeyup="cal()" class="form-control pricefield txt_price txt_price_' +
                        vz + ' numberss text-right" title="Price" value=' + response[1][j].price +
                        '><input type="hidden" class="txt_comm txt_comm_' + vz +
                        '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
                        vz + '" class="form-control txt_grand_total_' + vz +
                        ' numberss txt_final_total text-right" title="Grand Total" value=' + response[1]
                        [j].final_total +
                        ' readonly></td><td><button type="button" name="removeitems" id="removeitems" class="btn btn-danger removeitems" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>' );

                   // $('.txt_price_' + response[1].length).attr("readonly", false);
                    $('.txt_types_' + vz).find('option[value="' + response[1][j].types + '"]').attr("selected", true);
                    $('.txt_orientation_' + vz).find('option[value="' + response[1][j].orientation + '"]')
                        .attr(
                            "selected", true);
                    getCostTypeListingEdit(response[1][j].price_type, vz);

                    //fk_items_id,itemtype

                    /* if(response[0].types == 1)
                     {
                     $('.txt_itemtypes').html('<option selected >Select One</option><option value="1">Commercial</option>');

                     }
                     else{
                     getTypesListing(1);
                     }*/
                    // getProductListingsEdit(response[1][j].product_id, vz);

                    if (response[1][j].types == 2) {
                        if (response[1][j].itemtype == 7) {
                            //    getCategoryListing(czid);
                            getCategoryListingsEdit(response[1][j].fk_category_id, vz);

                        } else {
                            $('.txt_category_' + vz).html('<option selected >None</option>');
                        }
                    } else {
                        $('.txt_category_' + vz).html('<option selected >None</option>');
                    }

                    getTypesListingEdit(response[1][j].itemtype, vz, response[1][j].fk_items_id, response[1]
                        [j].types);

                    /*   getInnerSheetListingEdit(response[1][j].fk_innersheet_id, vz);
                       getSpecialEffectsListingEdit(response[1][j].fk_specialeffects_id, vz);
                       getSizeListingEdit(response[1][j].fk_size_id, vz);*/
                    //       getAllGradeListingEdit(response[1][j].fk_grade_id, vz, response[1][j].fk_product_id, response[0].fk_customer_id);
                    //      getAllUOMListingEdit(response[1][j].fk_uom_id, vz, response[1][j].fk_product_id, response[0].fk_customer_id);


                }

                // validatefunctions();
            }
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
                $('.txt_category_' + zz).find('option[value="' + proid + '"]').attr("selected",
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

function getComercialorNonItemsType(type) {
    //alert('test');
    var typesid = $('.txt_types_' + type).find("option:selected").val();
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

function getCostTypeListing(types) {
    var typesval = $('.txt_types_' + types).find("option:selected").val();

    $('.txt_price_type_' + types).html('<option selected disabled>SELECT </option>');

    if (typesval == 1) {
        //  type_tables, table_pk_id, orderid
        $('.txt_price_type_' + types).append(
            '<option value="1">First Copy</option><option value="2">Additional Copy</option>');
    } else {

        $('.txt_price_type_' + types).append('<option value="1">4 Color</option><option value="2">7 Color</option>');

    }

}

function getCostTypeListingEdit(pricetype, zz) {
    var typesval = $('.txt_types_' + zz).find("option:selected").val();

    $('.txt_price_type_' + zz).html('<option selected disabled>SELECT </option>');

    if (typesval == 1) {
        //  type_tables, table_pk_id, orderid
        $('.txt_price_type_' + zz).append(
            '<option value="1">First Copy</option><option value="2">Additional Copy</option>');
    } else {

        $('.txt_price_type_' + zz).append('<option value="1">4 Color</option><option value="2">7 Color</option>');

    }
    setTimeout(function() {
        $('.txt_price_type_' + zz).find('option[value="' + pricetype + '"]').attr("selected",
            true);

    }, 1000);
}
/*
function getTypesListingEdit(proid, zz,item_id) {
    //alert('test');
    $.ajax({
        url: "modules/products/ajax_functions.php",
        data: {
            'mode': 'getTypesListing'
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
                $('.txt_types_'+zz).html('<option selected disabled>Select</option>');
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].pk_types_id == '9999') {
                      //  type_tables, table_pk_id, orderid
                        $('.txt_types_'+zz).append('<option value="' + response[0][i]
                            .pk_types_id + '" data-types="2" data-tables="' + response[0][i].type_tables + '" data-pkid="' + response[0][i].table_pk_id +'">' + response[0][i].types_name +' </option>');
                    } else {

                        $('.txt_types_'+zz).append('<option value="' + response[0][i].pk_types_id + '" data-types="1" data-tables="' + response[0][i].type_tables +
                            '" data-pkid="' + response[0][i].table_pk_id +'">' + response[0][i].types_name +'</option>');
                    }
                }

                setTimeout(function() {
                $('.txt_types_'+zz).find('option[value="' + proid + '"]').attr("selected",
                    true);
                    getItemListingEdit(item_id, zz)

               //   $('.txt_product_name_' + zz).chosen();
               //    $('.txt_product_name_' + zz).trigger('chosen:updated');
            }, 1000);

        },
        error: function(response) {
            console.log(response);
        }
    });
}*/



function getComercialorNonItemsTypeEdit(itemid, typesid, zz) {
    //   var typesid = $('.txt_types_'+ zz).find("option:selected").val();
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
/*
function getItemListingEdit(proid, type) {
    //alert('test');
    var valid = $('.txt_types_' + type).find("option:selected").val();
    var tables = $('.txt_types_' + type).find("option:selected").attr('data-tables');
    var pkid = $('.txt_types_' + type).find("option:selected").attr('data-pkid');


    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: {
            'mode': 'getItemListing','valid':valid,'tables':tables,'pkid':pkid
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
                $('.txt_item_'+type).html('<option selected disabled>SELECT '+tables+'</option>');
                $('.itemsdata').show();
                for (var i = 0; i < response[0].length; i++) {
                    if (response[0][i].id == '9999') {
                      //  type_tables, table_pk_id, orderid
                        $('.txt_item_'+type).append('<option value="' + response[0][i]
                            .id + '" data-cost="' + response[0][i].cost + '" data-items="2">' + response[0][i].name +
                            ' </option>');
                    } else {

                        $('.txt_item_'+type).append('<option value="' + response[0][i]
                            .id + '" data-cost="' + response[0][i].cost + '" data-items="1" >' + response[0][i].name +
                            '</option>');
                    }
                }
                setTimeout(function() {
                $('.txt_item_'+type).find('option[value="' + proid + '"]').attr("selected",
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
*/

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

function getTypesListingEdit(proid, zz, item_id, types) {
    //alert('test');
    if (types == 1) {
        $('.txt_itemtypes').html('<option  >Select One</option><option value="1" selected>Product</option>');
        getComercialorNonItemsTypeEdit(item_id, types, zz);

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
                    getComercialorNonItemsTypeEdit(item_id, types, zz);

                }, 1000);

            },
            error: function(response) {
                console.log(response);
            }
        });
    }
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

$(".nav-link").removeClass("active");
$(".nav-item").removeClass("menu-open");
$(".sales").addClass("menu-open");
$(".sales_customer .nav-link").addClass("active");



function addrow() {
    var cusId = $('#txt_customer_name').val();
    var tcont = $('tbody.itemclone tr').length;
    console.log("length = " + tcont)
    var deleted = $('#deleted').val();
    console.log("deleted = " + deleted)
    zz = parseInt(tcont) + 1 + parseInt(deleted);
    $('table .itemclone').append('<tr><td><select class="form-control txt_types txt_types_' + zz +
        ' " name="txt_types[]" id="txt_types_' + zz + '" data-czid="' + zz +
        '" title="Types"  > <option value="">Select Types</option><option value="1">Commercial</option><option value="2">Non Commercial</option></select></td> <td><select class="form-control txt_itemtypes txt_itemtypes_' +
        zz + ' " name="txt_itemtypes[]" id="txt_itemtypes_' + zz + '" title="Item Types" data-czid="' + zz +
        '" data-classids="txt_itemtypes_' + zz +
        '" onchange="cal()"></select></td><td ><select  class="form-control txt_item  txt_item_' + zz +
        '" name="txt_item[]" id="txt_item_' + zz + '" data-czid="' + zz +
        '"  title="" ></select></td><td><select class="form-control txt_category txt_category_' + zz +
        ' "  name="txt_category[]" id="txt_category_' + zz +
        '" title="Category"  ></select></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
        zz + '" min="0" max="999999" id="txt_product_qty_' + zz +
        '" name="txt_product_qty[]" placeholder="Quantity" title="Quantity"></td><td><select class="form-control txt_price_type txt_price_type_' +
        zz + ' " data-czid="' + zz + '"  name="txt_price_type[]" id="txt_price_type_' + zz +
        '" title="Price Type" onchange="cal()"></select></td><td><select class="form-control txt_orientation txt_orientation_' +
        zz + '"  name="txt_orientation[]" id="txt_orientation_' + zz +
        '" title="Orientation"  ><option value="">Select Orientation</option><option value="1">Length</option><option value="2">Breadth </option></select></td><td ><input type="text" name="txt_price[]" id="txt_price_' +
        zz + '" onkeyup="cal()" class="form-control pricefield txt_price txt_price_' + zz +
        ' numberss text-right" title="Price"><input type="hidden" class="txt_comm txt_comm_' + zz +
        '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
        zz + '" class="form-control txt_final_total_' + zz +
        ' numberss txt_final_total text-right" title="Grand Total" readonly></td><td><button type="button" name="removeitems" id="removeitems" class="btn btn-danger removeitems" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>'
    );
    /* $('table .itemclone').append(
         '<tr><td><select class="form-control txt_types txt_types_' +zz + ' chosen_required" name="txt_types[]" id="txt_types_' + zz +'" title="Types" data-czid="' + zz + '" data-classids="txt_types_' + zz +'" onchange="cal()"></select></td><td class="itemsdata" style="display:none"><select  class="form-control txt_item  txt_item_' + zz +'" name="txt_item[]" id="txt_item_' + zz +'" data-czid="' + zz +'"  title="" ></select></td><td><input class="form-control txt_product_qty numbersOnly  txt_product_qty_' +
         zz + '" min="0" max="999999" id="txt_product_qty_' + zz +'" onkeyup="cal()" name="txt_product_qty[]" placeholder="Quantity" title="Quantity"></td><td ><input type="text" name="txt_price[]" id="txt_price_' +
         zz + '"  onkeyup="cal()" class="form-control pricefield txt_price txt_price_' + zz +
         ' numberss text-right" title="Price"><input type="hidden" class="txt_comm txt_comm_' + zz +
         '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' +
         zz + '" class="form-control txt_grand_total_' + zz +
         ' numberss txt_final_total text-right" title="Grand Total" readonly></td><td class="text-center"><button type="button" name="removeitems" id="removeitems" class="removeitems btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');*/
    // getTypesListing(zz);

    //  getProductListing(zz);
   // getCategoryListing(zz);

   
    var types = $('.txt_types_' + zz).find("option:selected").val();
    $('.txt_price_type_' + zz).trigger('change');
    if (types == 2) {
        getTypesListing(zz);
    } else {
        $('.txt_itemtypes_' + zz).html('<option selected >Select One</option><option value="1">Product</option>');
    }
    /* getProductListing(zz);
     getCategoryListing(zz);
     getInnerSheetListing(zz);
     getSpecialEffectsListing(zz);
     getSizeListing(zz);*/
    //validatefunctions();

   // $(".txt_price_" + (zz - 1)).attr('readonly', true);
}

var deleted = 0;

$('table').on("click", ".removeitems", function(e) {
    e.preventDefault();
    var rowCount = $('.itemTable >tbody >tr').length;
   /* if (rowCount > 1) {
        $(".txt_price_" + (rowCount - 1)).attr('readonly', false);
    } else {
        $(".txt_price_" + rowCount).attr('readonly', false);
    }*/
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
        /*GST Calculation*/
        /*$('#cgst_final').val(0);
        $('#sgst_final').val(0);
        $('#cgst_final').val(0);*/
        var cusId = $('#txt_customer_name').val();

        var prodid = $('.txt_product_name').val();
        //var prodDetail = productDetail(prodid,cusId);

        //if($('#cgst_final').val()==''|| $('#sgst_final').val()=='' || $('#igst_final').val()=='')
        //  {
        /*if(prodDetail)
        {

          var gstDetail= getGstDetail(prodDetail.hsn);
          if(gstDetail)
          {
          $('#cgst_final').val(gstDetail[0].cgst_percent);

          $('#sgst_final').val(gstDetail[0].sgst_percent);

          $('#igst_final').val(gstDetail[0].igst_percent);
            }
        }*/
        deleted++;
        $('#deleted').val(deleted)
        cal()
        // calculateSCitems();
    }
    //calculateSCitems();
});
function calAdvance(e)
{
    var grandtotal = $('#txt_grand_total').val();
    var advance = $('#discount_final4').val();
    $('#discount_final_amt4').val(parseFloat(advance).toFixed(2));
    var pendamt = 0;
   if( parseFloat(advance) > 0)
   {
    pendamt =  parseFloat(grandtotal) - parseFloat(advance);
   }
   else{
    pendamt =  parseFloat(grandtotal);
   }
    $('#discount_final_amt5').val(parseFloat(pendamt).toFixed(2));
}

function cal() {
    var deleted = $('#deleted').val();
    var rowCount = $('.itemTable >tbody >tr').length;
    var total_length = parseFloat(rowCount) + parseFloat(deleted);
    var total_total_amount = 0;
    var total_amount = 0;
    var gst_amttot = 0;
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


    var gst = $("#gst_per").val();
    if (parseFloat(gst) > 0) {
        gst = gst;
    } else {
        gst = 0;
    }
    var gst_per = parseFloat(gst) / 100;
    var gst_amt = parseFloat(gst_per) * (parseFloat(total_amounts));
    if (parseFloat(gst_amt) > 0) {
        $("#gst_total").val(parseFloat(gst_amt).toFixed(2));
        gst_amttot = gst_amttot + parseFloat(gst_amt);
    } else {
        $("#gst_total").val("");
    }
    var totalamt = 0;
    var gsttype = $('.txt_intstate').find("option:selected").val();
    if (gsttype == 1) {
        var inclusiveGST = parseFloat(total_total_amount) - parseFloat(gst_amttot)
        //$('.txt_total').val(inclusiveGST);
        $('.txt_item_total').val(inclusiveGST);
        totalamt = parseFloat(inclusiveGST);
    } else {
        var exclusiveGST = parseFloat(total_total_amount) + parseFloat(gst_amttot)
        //$('.txt_total').val(exclusiveGST);
        $('.txt_item_total').val(total_total_amount);
        totalamt = parseFloat(total_total_amount);
    }
    //  var totalamt = $('.txt_total').val();
    var gst_total_final_amount = parseFloat(totalamt) + parseFloat(gst_amt);



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

    var distotaamount = parseFloat(distot1) + parseFloat(distot2) + parseFloat(distot3) + parseFloat(distot4) +
        parseFloat(distot5);
    //});

    var grand_total = parseFloat(gst_total_final_amount) + parseFloat(distotaamount);
    $("#txt_grand_total").val(parseFloat(grand_total).toFixed(2));
    calAdvance();

    // var grand_total = parseFloat(gst_total_final_amount) ;
    //$("#txt_grand_total").val(parseFloat(grand_total).toFixed(2));
}

/*
$('.txt_intstate').on('change', function() {

    var getintval = $(this).val();
    $('.interst').hide();
    $('.intrast').hide();

    if (getintval == 2) {
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
});*/


$('table').on("change", ".txt_item", function(e) {
    var czid = $(this).attr("data-czid");

    var costval = $('.txt_item_' + czid).find("option:selected").attr("data-cost");
    //  var spcost = $('.txt_specialeffects_' + czid).find("option:selected").attr("data-secost");
    //   var sizecost = $('.txt_size_' + czid).find("option:selected").attr("data-sizecost");



    var totcost = parseFloat(costval);


    if (totcost) {
        $('.txt_price_' + czid).val(totcost);
    } else {
        $('.txt_price_' + czid).val(0);

    }

    cal();

});

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
/*
$('table').on("change", ".txt_innersheet,.txt_specialeffects,.txt_size", function(e) {
    var czid = $(this).attr("data-czid");
    var incost = $('.txt_innersheet_'+czid).find("option:selected").attr("data-cost");
    var spcost = $('.txt_specialeffects_'+czid).find("option:selected").attr("data-secost");
    var sizecost = $('.txt_size_'+czid).find("option:selected").attr("data-sizecost");

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
    $('.txt_price_'+czid).val(totcost);
    cal();

});*/
</script>