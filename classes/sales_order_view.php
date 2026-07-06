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
include("classes/class_customer.php");
$obj_cus = new Customer('','','','','','','','','','','','','','','','','','','','','','',$GLOBALS["___mysqli_ston"]);
$getcustomer = $obj_cus->getAllCustomer();
$cus_data=array();
while($cus_rows=mysqli_fetch_array($getcustomer)) {
  $cus_data[]=$cus_rows;
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
            <h1>Sales Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Sales Order</li>
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
          <a href="print_pdf/print_report_SO.php?soid=<?php echo $_GET['id']; ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Print</a>

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
                      <div class="one-half-column">
                        <div class="form-group">
                            <label for="" class="control-label">SO No </label>
                            <div class="control-field">
                              <input type="text" class="form-control txt_sono" value="" name="txt_sono" id="txt_sono" placeholder="Auto" title="SO NO" readonly="">
                              <span class="error" id="txt_sono_error"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Date <span class="color">*</span></label>
                            <div class="control-field">
                              <input readonly type="text" class="form-control txt_pi_date hasDatepicker valid" name="txt_pi_date" id="txt_pi_date" placeholder="DD/MM/YYYY" required="" aria-required="true" aria-invalid="false" value="">
                              <span class="error" id="txt_pi_date_error"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Customer <span class="color">*</span></label>
                            <div class="control-field">
                              <div>
                              <select class="form-control txt_customer_name chosen_required"
                                                        name="txt_customer_name" id="txt_customer_name" title="Customer"
                                                        required="" aria-required="true" readonly>
                                                        <option value="">Select Customer</option>
</select>
                                  
                              </div>
                              <span class="error" id="txt_customer_name-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Reference Number </label>
                            <div class="control-field">
                              <input  type="text"  class="form-control txt_reference_number" name="txt_reference_number" id="txt_reference_number" placeholder="Reference Number" title="Reference Number" value="" >
                              <span class="error" id="txt_reference_number_error"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Shipment (From / To) </label>
                            <div class="control-field" style="display: flex;">
                              <input readonly type="text" value="" class="form-control txt_shipment_from" name="txt_shipment_from" id="txt_shipment_from" placeholder="Shipment From" title="Shipment From">
                              <input readonly type="text" value="" class="form-control txt_shipment_to" name="txt_shipment_to" id="txt_shipment_to" placeholder="Shipment To" title="Shipment To">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Status </label>
                            <div class="control-field">
                              <input readonly id="txt_approved"  class="magic-checkbox " type="checkbox" name="txt_approved" value="1">
                              <label for="txt_approved" title="Approved">APPROVED</label>
                              <input readonly id="txt_cancelled" class="magic-checkbox " type="checkbox" name="txt_approved" value="2">
                              <label for="txt_cancelled" title="cancelled">CANCELLED</label>
                            </div>
                            
                        </div>



                      </div>
                    
                  </div>
                </div>

                <div class="card-body">
                  <div class="tab-content">
                      <div class="text-right">
                    
                        <!-- <span class="btn btn-xs btn-mint mar-btm" id="additems" onclick="addrow();">Add row 
                      </span> -->
                    </div>
                      <div class="table-div table-responsive">
                                <table class="table-bordered table thead itemTable">
                          <thead>
                            <tr>
                              <th width="5" valign="middle">#</th>
                              <th width="120">Item Name<span class="color"> *</span></th>
                              <th width="120">UOM <span class="color"> *</span></th>
                              <th width="120">Quantity <span class="color">*</span></th>
                              <th width="120">Price(₹) <span class="color">*</span></th>
                              <th width="120">Taxable Total(₹) <span class="color"> *</span></th>
                              <th width="120">CGST <span class="color"> *</span></th>
                              <th width="120">SGST <span class="color"> *</span></th>
                              <th width="120">IGST <span class="color"> *</span></th>
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
                          <table class="table-bordered table thead amountdetails" width="100%" cellspacing="0" cellpadding="0">
                            <thead>
                            <tr>
                                <td class="text-right">
                                  <label style="margin-top: 6px;" class="agents"><strong>Items Total(₹)</strong></label>
                                </td>
                                <td>
                                  <input type="text" readonly name="txt_item_total" value="" class="form-control txt_item_total pull-right w-21 text-right numberss" id="txt_item_total" readonly="">
                                </td>
                                <!-- <td></td> -->
                              </tr>
                              
                             <!--  <tr>
                                <td>  <input type="radio" name="txt_intstate" class="form-control txt_intstate pull-right w-21 text-right numberss" id="txt_interstate" style="width: 17px;" checked="" value="1"><label for="txt_interstate" style="padding: 11px;">Intra State</label><br>
                                <input type="radio" name="txt_intstate" class="form-control txt_intstate pull-right w-21 text-right numberss" id="txt_intrastate" style="width: 17px;" value="2"><label for="txt_intrastate" style="padding: 11px;">Inter State</label>
                                </td>
                                <td></td>
                                <td></td>
                              </tr> -->
                            
                            </thead>
                            <tbody class="totalamounts">
                            <tr>
                                <td class="text-right">
                                  <div class="gstcol mt-10">
                                    <span class="totalamounts_sec interst">
                                      <label class="">CGST</label>
                                      
                                    </span>
                                    <span class="totalamounts_sec mt-10 interst">
                                        <label class="">SGST</label>
                                     
                                    </span>
                                    <span class="totalamounts_sec mt-10 intrast">
                                        <label class="">IGST</label>
                                      
                                    </span>
                                  </div>
                                <label style="margin-top: 6px;" class="agents"><strong>GST Total(₹)</strong></label>
                              </td>
                                <td>
                                  <div class="gstcol mt-10">
                                      <span class="col-md-12 p-0 interst">
                                        <input readonly type="text" value="" name="txt_cgst_amt_final" class="form-control  totalcalc extraprices pull-right text-right numbersOnly" id="txt_cgst_amt_final" readonly="">
                                      </span>
                                      <span class="col-md-12 mt-10 p-0 interst">
                                        <input readonly type="text" value="" name="txt_sgst_amt_final" class="form-control totalcalc extraprices  pull-right text-right numbersOnly" id="txt_sgst_amt_final" readonly="">
                                      </span>
                                      <span class="col-md-12  p-0 intrast">
                                        <input readonly type="text" value="" name="txt_igst_amt_final" class="form-control totalcalc extraprices  pull-right text-right numbersOnly" id="txt_igst_amt_final" readonly="">
                                      </span>
                                  </div>
                                  <input readonly style="margin-top: 6px;" value="" type="text" name="txt_gst_total" class="form-control txt_gst_total pull-right w-21 text-right numberss" id="txt_gst_total" readonly="">
                                </td>
                                <!-- <td width="2%">
                                  <button type="button" class="btn btn-primary btn-plus pull-left addextraitemscomm"><i class="fa fa-plus" aria-hidden="true"></i></button> 
                                </td> -->
                              </tr>

                              <tr class="apRow">
                                  <td class="text-right">
                                      <span class="totalamounts_sec mt-10 intrast" style="display: flex;align-items: center;justify-content: flex-end;">
                                          <label class="" style="    padding-right: 15px;">DISCOUNT</label>
                                          <div class="input-group btn-type w-49" style="margin-right: 20px !important;width: 65% !important;">
                                            <input readonly type="text" value="" name="discount_final" id="discount_final" onkeyup="cal()" class="form-control igst pull-left discount_final_1" placeholder="%" max="100">
                                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                          </div>
                                          <select readonly class="form-control txt_cal_type_igst pull-left numberss pricefieldchanges extraprices" name="txt_cal_type_igst_final" id="txt_cal_type_igst_final">
                                          <option value="1" selected="">-</option>
                                          <!-- <option value="2">-</option> -->
                                          </select>
                                      </span>
                                    </td>
                                    <td>
                                      <input readonly type="text" value="" name="discount_final_amt" class="form-control txt_field_value_comm totalcalc extrapricescomm pull-right text-right numberss" id="discount_final_amt" readonly="readonly" min="0" max="' + itemTot + '">
                                    </td>
                                </tr>
                              <tr>
                                <td align="right">
                                  <label for="" class="control-label text-right gtotal"> <strong>Grand Total(₹)</strong></label>
                                </td>
                                <td class="text-right">
                                  <input readonly type="text" value="" name="txt_grand_total" class="form-control txt_grand_total pull-right w-21 text-right" id="txt_grand_total" readonly="">
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
.colum_split{
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
#txt_cal_type_cgst_final, #txt_cal_type_sgst_final, #txt_cal_type_igst_final {
    width: 15% !important;
    height: 32px !important;
    margin-left: 10px !important;
}
input[type="checkbox"], input[type="radio"] {
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
.class_per{
      text-align: center !important;
    width: 20%;
    float: left;
}
.class_amt{
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
        var soid = getQueryVariable('id');
        getSOEditValues(soid);
    }
  /*get sales order values edit page */
function getSOEditValues(soid) {
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: { 'soid': soid, 'mode': 'getSOEditValues' },
        type: 'post',
        dataType: 'json',
        beforeSend: function() { $("#cover").css("display", "block"); },
        success: function(response) {
            if (soid == 0) {
                $('table .itemclone').append("<tr><td class='text-center' colspan='6'>No data available</td></tr>");
            } else {

	/*
pk_sale_order sono sales_no sale_date customer_id reference_number shipment_from shipment_to item_total cgst_amt_final sgst_amt_final
igst_amt_final gst_total discount_final discount_final_amt grand_total temrs remark custom_label custom_type custom_value approval_status visibility status*/
console.log(response);

                $('#proStatus').val(1);
                $('#cus_id').val(response[0].customer_id);
                getCustomersListings(response[0].customer_id);
             //   getAllShipmentLocationByID(response[0].shipment_from, response[0].shipment_to);
                $('#txt_customer_name').attr('disabled', true);
                $('#txt_so_id').val(response[0].pk_sale_order);
              
                $('#txt_so_no').attr('disabled', false);
                $('#txt_so_no').val(response[0].sono);
                $('#txt_so_no').attr('disabled', true);
                $('#txt_so_no_ed').val(response[0].sono);
                $('#txt_reference_number').val(response[0].reference_number);
                $('#txt_shipment_from').val(response[0].shipment_from);
                $('#txt_shipment_to').val(response[0].shipment_to);
                $('#txt_pi_date').val(moment(response[0].sale_date).format('DD/MM/YYYY'));
                $('#txt_item_total').val(parseFloat(response[0].item_total).toFixed(2));
                $('#txt_grand_total').val(Math.round(parseFloat(response[0].grand_total).toFixed(2)));
                $('#txt_gst_total').val(parseFloat(response[0].gst_total).toFixed(2));
     /*           approval_status: "0"
cgst_amt_final: "8680.00"
custom_label: ""
custom_type: "0"
custom_value: "0.00"
customer_id: "8"
discount_final: "7.00"
discount_final_amt: "10025.40"
grand_total: "133194.60"
gst_total: "17360.00"
igst_amt_final: "0.00"
item_total: "0.00"
pk_sale_order: "3"
reference_number: ""
remark: ""
sale_date: "2021-09-15"
sales_no: ""
sgst_amt_final: "8680.00"
shipment_from: ""
shipment_to: ""
sono: "ERPSO/2022/00002"
status: "1"
temrs: ""
*/
               // var vhnd = getQueryVariable('hnd');
              //  var vmnu = getQueryVariable('mnu');
              
             /*   if ((vhnd == pageEdit) && (vmnu == menuID)) {
                    $("#txt_approved").prop("disabled", false);
                }*/
            /*    if (response[0].so_status_id == 2 && (getQueryVariable('hnd') == pageEdit || getQueryVariable('hnd') == pageView)) {
                    $('#txt_approved').attr('checked', true);
                }*/

                var vz = 0;
                var regex = /(<([^>]+)>)/ig;
                $('table .itemclone').html('');

                for (j = 0; j < response[1].length; j++) {
                    vz++;
               
                   /*pk_sop_id fk_so_id product_id uom qty price sop_CGST_percentage sop_CGST_amount sop_SGST_percentage sop_SGST_amount sop_IGST_percentage sop_IGST_amount final_total status created_on taxable_total*/
                  
                   console.log(response[1]);


                    $('table .itemclone').append('<tr><td><button type="button" name="removeitems" id="removeitems" class="removeitems" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td><select class="form-control txt_product_name txt_product_name_' + vz + ' chosen_required" name="txt_product_name[]" id="txt_product_name_' + vz + '" title="Product Name" data-czid="1" data-classids="txt_product_name_' + vz + '"></select><input type="hidden" name="pro_type[]" id="pro_type" class="pro_type pro_type_' + vz + '"></td><td><input type="text" class="form-control txt_uom txt_uom_' + vz + '" name="txt_uom[]" id="txt_uom_' + vz + '" title="Unit" value='+response[1][j].uom+' ></td><td><input onkeyup="cal()"  class="form-control txt_product_qty numbersOnly  txt_product_qty_' + vz + '" min="0" max="999999" id="txt_product_qty_' + vz + '" name="txt_product_qty[]" placeholder="Quantity" title="Quantity" value='+response[1][j].qty+'></td><td ><input type="text" name="txt_price[]" id="txt_price_' + vz + '" class="form-control pricefield txt_price txt_price_' + vz + ' numberss text-right" title="Price" value='+response[1][j].price+'><input type="hidden" class="txt_comm txt_comm_' + vz + '" name="txt_comm" id="txt_comm" value=""></td><td ><input type="text" name="txt_total[]" id="txt_total_' + vz + '" class="form-control txt_total_' + vz + ' numberss txt_total text-right" title="Total" value='+response[1][j].taxable_total+' readonly></td><td><input placeholder="%" type="text" name="txt_cgst[]" onkeyup="cgst(' + vz + ')" id="txt_cgst_' + vz + '" class="form-control cgstfield txt_cgst class_per txt_cgst_' + vz + ' text-right" title="CGST" value='+response[1][j].sop_CGST_percentage+'><input type="text" name="txt_cgst_amt[]" onkeyup="cgst(' + vz + ')" id="txt_cgst_amt_' + vz + '" readonly class="form-control class_amt cgstfield txt_cgst_amt txt_cgst_amt_' + vz + ' text-right" title="CGST AMT" value='+response[1][j].sop_CGST_amount+'></td><td><input type="text" onkeyup="sgst(' + vz + ')" name="txt_sgst[]" id="txt_sgst_' + vz + '" class="form-control class_per sgstfield txt_sgst txt_sgst_' + vz + ' text-right" title="SGST" placeholder="%" value='+response[1][j].sop_SGST_percentage+'><input type="text" onkeyup="sgst(' + vz + ')" name="txt_sgst_amt[]" id="txt_sgst_amt_' + vz + '" readonly class="form-control class_amt sgstfield txt_sgst_amt txt_sgst_amt_' + vz + ' text-right" title="SGST_amt" value='+response[1][j].sop_SGST_amount+'></td><td><input onkeyup="igst(' + vz + ')" type="text" name="txt_igst[]" id="txt_igst_' + vz + '" class="class_per form-control igstfield txt_igst txt_igst_' + vz + ' text-right" title="IGST" placeholder="%" value='+response[1][j].sop_IGST_percentage+'><input onkeyup="igst(' + vz + ')" type="text" name="txt_igst_amt[]" id="txt_igst_amt_' + vz + '" class="class_amt form-control igstfield txt_igst_amt txt_igst_amt_' + vz + ' text-right" title="IGST AMT" value='+response[1][j].sop_IGST_amount+' readonly ></td><td ><input type="text" name="txt_final_total[]" id="txt_final_total_' + vz + '" class="form-control txt_final_total_' + vz + ' numberss txt_final_total text-right" title="Grand Total" value='+response[1][j].final_total+' readonly></td></tr>');
                    
              
					$('.txt_price_'+response[1].length).attr("readonly",false);
                    if (j == 0) {
                                           
                        $('#cgst_final').val(response[1][0].sop_CGST_percentage);	
                        $('#sgst_final').val(response[1][0].sop_SGST_percentage);	
                        $('#igst_final').val(response[1][0].sop_IGST_percentage);		
                    }
                        $("#txt_cgst_amt_final").val(response[1][0].sop_CGST_amount);
                        $("#txt_sgst_amt_final").val(response[1][0].sop_SGST_amount);
                        $("#txt_igst_amt_final").val(response[1][0].sop_IGST_amount);

                  //      $('#tcs_per').val(response[1][0].sop_TCS_percentage);	
                   //     $("#tcs_final").val(response[1][0].sop_TCS_amount);
                        
                    // $('.txt_cal_type_cgst' + vz).val(response[1][j].sop_CGST_type);
                    // $('.txt_cal_type_sgst' + vz).val(response[1][j].sop_SGST_type);
                    // $('.txt_cal_type_igst' + vz).val(response[1][j].sop_IGST_type);

                  /*  if ((vhnd == pageView) && (vmnu == menuID)) {
                        $(".firsttr").remove();
                    }*/

                 getProductListingsEdit(response[1][j].product_id, vz, response[0].customer_id);
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
//GET CUSTOMER EDIT PAGE
function getCustomersListings(cusid) {
    var cusid = cusid;
    $.ajax({
        url: "modules/sales/ajax_functions.php",
        data: { 'mode': 'getCustomerListing' },
        type: 'post',
        dataType: 'json',
        success: function(response) {
          //  $('#txt_customer_name').chosen('destroy');
            $('.txt_customer_name').html('');
            $('.txt_customer_name').append('<option value="">Select Customer</option>');
            for (var i = 0; i < response.length; i++) {
                $('.txt_customer_name').append('<option value="' + response[i].pk_cus_id + '">' + response[i].cus_name + '</option>');
            }
            setTimeout(function() {
                $('#txt_customer_name').find('option[value="' + cusid + '"]').attr("selected", true);
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
        data: { 'mode': 'getProductListing'},
        type: 'post',
        dataType: 'json',
        success: function(response) {

         //   $('.txt_product_name_' + zz).chosen('destroy');
            $('.txt_product_name_' + zz).html('<option selected disabled>Select</option>');
            for (var i = 0; i < response[0].length; i++) {
                if (response[0][i].pk_product_id == '9999') {

                    $('.txt_product_name_' + zz).append('<option value="' + response[0][i].pk_product_id + '" data-types="2">' + response[0][i].product_name	 + '</option>');
                } else {

                    $('.txt_product_name_' + zz).append('<option value="' + response[0][i].pk_product_id + '" data-types="1">' + response[0][i].product_name	 + '</option>');
                }
            }
            setTimeout(function() {
                $('.txt_product_name_' + zz).find('option[value="' + proid + '"]').attr("selected", true);
              //  $('.txt_product_name_' + zz).chosen();
             //   $('.txt_product_name_' + zz).trigger('chosen:updated');
            }, 1000);
        },
        error: function(response) {
            console.log(response);
        }
    });
}


  </script>