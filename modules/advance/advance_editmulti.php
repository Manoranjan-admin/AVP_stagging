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

$obj_saleestimate = new Estimate_commornon('', '', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','', '', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','');
 if($_GET['type']==1){ 
$getestimate = $obj_saleestimate->getAllEstimate_comm();
$estimate_data = array();
while ($est_rows = mysqli_fetch_array($getestimate)) {
    $estimate_data[] = $est_rows;
}
 } elseif($_GET['type']==2){ 
$getestimate = $obj_saleestimate->getAllEstimate_noncomm();
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
				<?php  if($_GET['type']==1){ ?>
                    <h1>Edit Advance Commercial</h1>
				<?php } elseif($_GET['type']==2){ ?>
				 <h1>Edit Advance NonCommercial</h1>
				<?php } ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Advance</li>
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
                      <?php if($_GET['type']==1){ ?>
                        <form class="form-horizontal theme-form" id="edit_advance_commercial" novalidate="novalidate">
					  <?php } elseif($_GET['type']==2) { ?>
                        <form class="form-horizontal theme-form" id="edit_advance_noncommercial" novalidate="novalidate">
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
										<div class="form-group">
                                            <label for="" class="control-label">Estimate No <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_estimate_name "
                                                        name="txt_estimate_name" id="txt_estimate_name"
                                                        title="estimate" multiple>
                                                        <option value="">Select Estimate</option>
                                                        <?php  for ($i = 0; $i < count($estimate_data); $i++) { ?>
                                                       <option value="<?php echo $estimate_data[$i]['PK_ES_ID']; ?>">
                                                            <?php echo $estimate_data[$i]['sono']; ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <span class="error" id="txt_customer_name-error"></span>
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
                                            <label for="" class="control-label">Payment Type <span
                                                    class="color">*</span></label>
                                            <div class="control-field">
                                                <div>
                                                    <select class="form-control txt_payment_type "
                                                        name="txt_payment_type" id="txt_payment_type"
                                                        title="Payment Type" readonly>
                                                        <option value="">Select Payment Type</option>
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
                                            <label for="" class="control-label">Advance amount </label>
                                            <div class="control-field">
                                                <input class="form-control adv_amount" name="adv_amount"  id="adv_amount" ></input>
                                                <span class="error" id="txt_amount_error"></span>
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
                                   
                            </div>

                        
						
                    </div>
					<div class="card-footer text-right">
                                <input type="hidden" name="deleted" value="0" id="deleted" />
								<?php if($_GET['type']==1){ ?>
                                <input type="hidden" name="mode" value="editAdvancecommmulti" />
								<?php } elseif($_GET['type']==2){ ?>
								 <input type="hidden" name="mode" value="editAdvanceNonCommmulti" />
								   <?php } ?>
                                <input type="hidden" name="cus_id" id="cus_id">
								<input type="hidden" name="adv_id" id="adv_id" value="<?php echo $_GET['id']; ?>">
                                <button type="submit" class="btn_save btn btn-success btn-lg" onclick="cal()">Update</button>
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
.apRow .extraprices{
    width: 15%;
}

</style>
<script>
        $('#txt_estimate_name').select2();

$("#txt_customer_name").change(function() {
	 //alert($('option:selected', this).val());
        var c_name = $('option:selected', this).val();
		if(c_name != ''){
		 $.ajax({
        url: "modules/advance/ajax_functions_commercial.php",
        data: {
            'mode': 'get_estimate_by_customer',
            'customer': c_name,
			'type':<?php echo $_GET['type']; ?>
        },
        type: 'post',
        dataType: 'json',
        success: function(response) {
			//alert(response.length);
			//alert(response[0].PK_ES_ID);
			$("#txt_estimate_name").html('');
			$('#txt_estimate_name').append($('<option value="">Select Estimate</option>'));
			for(var i=0;i<=response.length;i++){
				$('#txt_estimate_name').append($('<option value="'+response[i].PK_ES_ID+'">'+response[i].sono+'</option>'));
			}
			
		   
        },
        error: function(response) {
            console.log(response);
        }
    });
		}else{
			
		}
    });
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
	<?php if($_GET['type']==1){ ?>
		$.ajax({
        url: "modules/advance/ajax_functions_commercial.php",
        data: {
            'soid': soid,
            'mode': 'getAdvanceEditValuesMulti'
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
                //getCustomersListings(response[0].customer_id);
                //  ,price_type,payment_type
                $('.txt_payment_type').find('option[value="' + response[0].payment_type + '"]').attr("selected", true);
				$('.txt_customer_name').find('option[value="' + response[0].customer_id + '"]').attr("selected", true);
				
               // $('.txt_estimate_name').find('option[value="' + response[0].fk_es_id + '"]').attr("selected", true);
               // $('.txt_estimate_name').val('[' + response[0].fk_es_id + ']').change();
               var adv_estimate = response[0].fk_es_id;
                  adv_estimate.split(',');
                  console.log(adv_estimate);
                $('.txt_estimate_name').select2().val(adv_estimate).trigger('change');

				$('#adv_amount').val(response[0].advance_amount);
				$('#txt_remarks').val(response[0].remarks);
               
            }
        },
        error: function(response) {
            console.log(response);
        }

    });
	<?php }
		elseif($_GET['type']==2){ ?>
			$.ajax({
        url: "modules/advance/ajax_functions_noncommercial.php",
        data: {
            'soid': soid,
            'mode': 'getAdvanceEditValuesMulti'
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
                //getCustomersListings(response[0].customer_id);
                //  ,price_type,payment_type
                $('.txt_payment_type').find('option[value="' + response[0].payment_type + '"]').attr("selected", true);
				$('.txt_customer_name').find('option[value="' + response[0].customer_id + '"]').attr("selected", true);
                var adv_estimate = response[0].fk_es_id;
                 var splitadv_estimate = adv_estimate.split(',');
                  console.log(splitadv_estimate);
                $('.txt_estimate_name').select2().val(splitadv_estimate).trigger('change');
                $('#adv_amount').val(response[0].advance_amount);
				$('#txt_remarks').val(response[0].remarks);
             
            }
        },
        error: function(response) {
            console.log(response);
        }

    });
		<?php }?>
    
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
    var typesid = 1;
    var itemtypeId = 1;
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
     var typesid = 1;
    var itemtypeId = 1;
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


function cal() {
	$('#edit_advance_commercial').validate({
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
		adv_amount:{
			required: true,
			remote: {
                        url: "modules/advance/ajax_functions_commercial.php",
                        type: "post",
                        data: {
							mode: "check_amount_by_esidmulti",
                            adv_amount: function() {
                            return $( "#adv_amount" ).val();  
                          },
						  estimate_no: function() {
                            return $("#txt_estimate_name option:selected" ).val(); 
                          },
						  type: <?php echo $_GET['type']; ?>
                        }
                      }
		},
		txt_estimate_name: {
		required: true
		},
		txt_remarks: {
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
		adv_amount:{
			required: 'This field is required.'
		},
		txt_estimate_name: {
			required: 'This field is required.'
		},
		txt_remarks: {
			required: 'This field is required.'
		},
		
    },
    submitHandler: function(form) {
        var formData = new FormData($('#edit_advance_commercial')[0]);
        $.ajax({
            url: "modules/advance/ajax_functions_commercial.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response) {
					if(response == 1){
                    swal({
                        title: "Success!",
                        text: "Advance has been edited successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=108&type=1";
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
$('#edit_advance_noncommercial').validate({
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
		adv_amount:{
			required: true,
			remote: {
                        url: "modules/advance/ajax_functions_commercial.php",
                        type: "post",
                        data: {
							mode: "check_amount_by_esidmulti",
                            adv_amount: function() {
                            return $( "#adv_amount" ).val();  
                          },
						  estimate_no: function() {
                            return $("#txt_estimate_name option:selected" ).val(); 
                          },
						  type: <?php echo $_GET['type']; ?>
                        }
                      }
		},
		txt_estimate_name: {
		required: true
		},
		txt_remarks: {
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
		adv_amount:{
			required: 'This field is required.'
		},
		txt_estimate_name: {
			required: 'This field is required.'
		},
		txt_remarks: {
			required: 'This field is required.'
		},
		
    },
    submitHandler: function(form) {
        var formData = new FormData($('#edit_advance_noncommercial')[0]);
        $.ajax({
            url: "modules/advance/ajax_functions_noncommercial.php",
            data: formData,
            type: 'post',
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response) {
					if(response == 1){
                    swal({
                        title: "Success!",
                        text: "Advance has been edited successfully!.",
                        type: "success",
                        timer: 1000,
                        buttons: false,
                    }).then(function() {
                        window.location.href = "index.php?erp=108&type=2";
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
        var qty = $("#txt_product_qty_"+i).val();
        if (parseFloat(qty) > 0) {
            qty = qty;

        } else {
            qty = 0;
        }

        var price = $("#txt_price_"+i).val();
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
        total_amounts += taxable_total;
        total_total_amount = total_total_amount + total_amount;
        $("#txt_final_total_" + i).val(parseFloat(total_amount).toFixed(2));
    }
    $("#txt_item_total").val(parseFloat(total_total_amount).toFixed(2));
   

    var gst = $("#gst_per").val();
    if(parseFloat(gst) > 0) {
        gst = gst;
    } else{
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
    var totalamt =0;
    var gsttype = $('.txt_intstate').find("option:selected").val();
    if(gsttype == 1)
    {
       var inclusiveGST = parseFloat(total_total_amount) - parseFloat(gst_amttot)
        //$('.txt_total').val(inclusiveGST);
        $('.txt_item_total').val(inclusiveGST);
        totalamt =parseFloat(inclusiveGST);
    }
    else{
        var exclusiveGST = parseFloat(total_total_amount) + parseFloat(gst_amttot)
        //$('.txt_total').val(exclusiveGST);
        $('.txt_item_total').val(total_total_amount);
         totalamt =parseFloat(total_total_amount);
    }
  //  var totalamt = $('.txt_total').val();
    var gst_total_final_amount = parseFloat(totalamt)+parseFloat(gst_amt) ;



    var discount_final1 = $("#discount_final_1").val();

if (parseFloat(discount_final1) > 0) {
} else {
    discount_final1 = 0;
}
var discount_final_per1 = parseFloat(discount_final1) / 100;
var discount_final_amt1 = parseFloat(discount_final_per1) * parseFloat(total_amounts);

 if (parseFloat(discount_final_amt1) > 0) {
    $("#discount_final_amt_1").val(parseFloat(discount_final_amt1).toFixed(2));
} else {
    $("#discount_final_amt_1").val("");
}
var discommper1=0.00; 
//$('.txt_field_value_comm').each(function() {
//var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
var calpers=$('.txt_cal_type_discount_final_1').val();
//var enteredamt = $(this).val();

//if(enteredamt){
    if(calpers==1){
        discommper1 += parseFloat(discount_final_amt1, 10) || 0;
    }
    if(calpers==2){
        discommper1 -= parseFloat(discount_final_amt1, 10) || 0;
    }
    var distot1 = discommper1.toFixed(2);

  //  var distot1 = discommper1.toFixed(2);
//});



var discount_final2 = $("#discount_final_2").val();

if (parseFloat(discount_final2) > 0) {
} else {
    discount_final2 = 0;
}
var discount_final_per2 = parseFloat(discount_final2) / 100;
var discount_final_amt2 = parseFloat(discount_final_per2) * parseFloat(total_amounts);

 if (parseFloat(discount_final_amt2) > 0) {
    $("#discount_final_amt_2").val(parseFloat(discount_final_amt2).toFixed(2));
} else {
    $("#discount_final_amt_2").val("");
}
//$('.txt_field_value_comm').each(function() {
//var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
var calpers=$('.txt_cal_type_discount_final_2').val();
//var enteredamt = $(this).val();
var discommper2=0.00; 

//if(enteredamt){
    if(calpers==1){
        discommper2 += parseFloat(discount_final_amt2, 10) || 0;
    }
    if(calpers==2){
        discommper2 -= parseFloat(discount_final_amt2, 10) || 0;
    }

//});
var distot2 = discommper2.toFixed(2);

var discount_final3 = $("#discount_final_3").val();

if (parseFloat(discount_final3) > 0) {
} else {
    discount_final3 = 0;
}
var discount_final_per3 = parseFloat(discount_final3) / 100;
var discount_final_amt3 = parseFloat(discount_final_per3) * parseFloat(total_amounts);

 if (parseFloat(discount_final_amt3) > 0) {
    $("#discount_final_amt_3").val(parseFloat(discount_final_amt3).toFixed(2));
} else {
    $("#discount_final_amt_3").val("");
}
//$('.txt_field_value_comm').each(function() {
//var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
var calpers3=$('.txt_cal_type_discount_final_3').val();
//var enteredamt = $(this).val();
var discommper3=0.00; 

//if(enteredamt){
    if(calpers3==1){
        discommper3 += parseFloat(discount_final_amt3, 10) || 0;
    }
    if(calpers==2){
        discommper3 -= parseFloat(discount_final_amt3, 10) || 0;
    }
    var distot3 = discommper3.toFixed(2);

  //  var distot = discommper.toFixed(2);
//});

var discount_final4 = $("#discount_final_4").val();

if (parseFloat(discount_final4) > 0) {
} else {
    discount_final4 = 0;
}
var discount_final_per4 = parseFloat(discount_final4) / 100;
var discount_final_amt4 = parseFloat(discount_final_per4) * parseFloat(total_amounts);

 if (parseFloat(discount_final_amt4) > 0) {
    $("#discount_final_amt_4").val(parseFloat(discount_final_amt4).toFixed(2));
} else {
    $("#discount_final_amt_4").val("");
}
//$('.txt_field_value_comm').each(function() {
//var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
var calpers=$('.txt_cal_type_discount_final_4').val();
//var enteredamt = $(this).val();
var discommper4=0.00; 
//if(enteredamt){
    if(calpers==1){
        discommper4 += parseFloat(discount_final_amt4, 10) || 0;
    }
    if(calpers==2){
        discommper4 -= parseFloat(discount_final_amt4, 10) || 0;
    }
    var distot4 = discommper4.toFixed(2);

   // var distot = discommper.toFixed(2);
//});

var discount_final5  = $("#discount_final_5").val();

if (parseFloat(discount_final5) > 0) {
} else {
    discount_final5 = 0;
}
var discount_final_per5 = parseFloat(discount_final5) / 100;
var discount_final_amt5 = parseFloat(discount_final_per5) * parseFloat(total_amounts);

 if (parseFloat(discount_final_amt5) > 0) {
    $("#discount_final_amt_5").val(parseFloat(discount_final_amt5).toFixed(2));
} else {
    $("#discount_final_amt_5").val("");
}
//$('.txt_field_value_comm').each(function() {
//var calpers=$(this).closest('tr').find('td .txt_cal_types_comm').val();
var calpers5=$('.txt_cal_type_discount_final_5').val();
//var enteredamt = $(this).val();
var discommper5=0.00; 

//if(enteredamt){
    if(calpers5==1){
        discommper5 += parseFloat(discount_final_amt5, 10) || 0;
    }
    if(calpers==2){
        discommper5 -= parseFloat(discount_final_amt5, 10) || 0;
    }

    var distot5 = discommper5.toFixed(2);

    var distotaamount = parseFloat(distot1) + parseFloat(distot2) + parseFloat(distot3)+ parseFloat(distot4) + parseFloat(distot5);
//});

    var grand_total = parseFloat(gst_total_final_amount) + parseFloat(distotaamount);
    $("#txt_grand_total").val(parseFloat(grand_total).toFixed(2));


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