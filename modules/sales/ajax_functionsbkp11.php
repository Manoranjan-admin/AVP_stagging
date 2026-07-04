<?php
//error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include("../../includes/db_config.php");

include("../../classes/class_sale_order.php");

include("../../classes/class_customer.php");

include("../../classes/class_product.php");




$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$obj_cus = new Customer('','','','','','','','','','','','','','','','','','','','','','',$GLOBALS["___mysqli_ston"]);

$obj_product = new Product('','','','','','','','','','','','','','');

if(isset($_POST['mode']) && $_POST['mode']=='addSalesOrder'){


	$lastSOID = $obj_saleorder->Sales_order_lastinserted_id();
    $sCid = $lastSOID + 1;
    $newSQid = sprintf("%05s", $sCid);

    $previousYr = date("y", strtotime("-1 year")); //last year
    $nextYr = date('y', strtotime('+1 year'));
    $year = substr(date('Y'), 0, 2);
    if (date('m') < 4) {
        $finYr = $previousYr . $year;
    } else {
        $finYr = $year . $nextYr;
    }
    $soNum = 'ERPSO/' . $finYr . '/' . $newSQid;
	
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	

	$obj_saleorder->setsono($soNum);
	$obj_saleorder->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_saleorder->setcustomer_id($_POST['txt_customer_name']);
	$obj_saleorder->setreference_number($_POST['txt_reference_number']);
	/*$obj_saleorder->setshipment_from($_POST['txt_shipment_from']);
	$obj_saleorder->setshipment_to($_POST['txt_shipment_to']);
	$obj_saleorder->setapproval_status($_POST['txt_approved']);*/
	$obj_saleorder->setproduct_id($_POST['txt_product_name']);
	$obj_saleorder->setcategory_id($_POST['txt_category']);
	$obj_saleorder->settypes_id($_POST['txt_types']);
	//var_dump('hi');
	//exit;
	$obj_saleorder->setpaymenttype($_POST['txt_payment_type']);
	
	
	$obj_saleorder->setdiscount_final(0);
	$obj_saleorder->setdiscount_final_amt(0);
	$obj_saleorder->setgrand_total($_POST['txt_grand_total']);
	$gst_per = (isset($_POST['gst_per']))? $_POST['gst_per'] : '0';
	$gst_total = (isset($_POST['gst_total']))? $_POST['gst_total'] : '0';
	$obj_saleorder->setcgst($gst_per);
	$obj_saleorder->setcgst_amt($gst_total);
/*$obj_saleorder->setcgst_amt_final($_POST['txt_cgst_amt_final']);
	$obj_saleorder->setsgst_amt_final($_POST['txt_sgst_amt_final']);
	$obj_saleorder->setigst_amt_final($_POST['txt_igst_amt_final']);
	$obj_saleorder->setgst_total($_POST['txt_gst_total']);*/
	$obj_saleorder->setitem_total($_POST['txt_item_total']);

	$soid = $obj_saleorder->addSalesOrder();
//exit;
//var_dump($soid);
//exit;
	for ($i=0; $i < count($_POST['txt_items']); $i++) { 
			$obj_saleorder->setfk_so_id($soid);
			
			
		$obj_saleorder->setitems_id($_POST['txt_items'][$i]);
		$obj_saleorder->setcosttype($_POST['txt_costtype'][$i]);
		$obj_saleorder->setqty($_POST['txt_product_qty'][$i]);
		$obj_saleorder->setprice($_POST['txt_price'][$i]);
		$obj_saleorder->setfinal_total($_POST['txt_final_total'][$i]);
	
	
		$status = $obj_saleorder->addSalesOrderProduct();
	}
	if($status){
		echo json_encode($status);
	}
	else{
		echo json_encode(0);
	}
}


if(isset($_POST['mode']) && $_POST['mode']=='updateSalesOrder'){

	

	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
//	$obj_saleorder->setsono($soNum);
	$obj_saleorder->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_saleorder->setcustomer_id($_POST['txt_customer_name']);
	$obj_saleorder->setreference_number($_POST['txt_reference_number']);
	$obj_saleorder->setproduct_id($_POST['txt_product_name']);
	$obj_saleorder->setcategory_id($_POST['txt_category']);
	$obj_saleorder->setdiscount_final(0);
	$obj_saleorder->setdiscount_final_amt(0);
	$obj_saleorder->setgrand_total($_POST['txt_grand_total']);
	$gst_per = (isset($_POST['gst_per']))? $_POST['gst_per'] : '0';
	$gst_total = (isset($_POST['gst_total']))? $_POST['gst_total'] : '0';
	$obj_saleorder->setcgst($gst_per);
	$obj_saleorder->setcgst_amt($gst_total);

	$obj_saleorder->setitem_total($_POST['txt_item_total']);
	
	$soid = $obj_saleorder->updateSalesOrder($_POST['txt_so_id']);
	 $obj_saleorder->deleteSalesOrderProduct($_POST['txt_so_id']);

	 for ($i=0; $i < count($_POST['txt_items']); $i++) { 
		$obj_saleorder->setfk_so_id($_POST['txt_so_id']);
		$obj_saleorder->settypes_id($_POST['txt_items'][$i]);
		$obj_saleorder->setitem_id($_POST['txt_costtype'][$i]);
		$obj_saleorder->setqty($_POST['txt_product_qty'][$i]);
		$obj_saleorder->setprice($_POST['txt_price'][$i]);
		$obj_saleorder->setfinal_total($_POST['txt_final_total'][$i]);
		$status = $obj_saleorder->addSalesOrderProduct();
	}
	
	if($status){
		echo json_encode($status);
	}
	else{
		echo json_encode(0);
	}
}
/*
if(isset($_POST['mode']) && $_POST['mode']=='updateSalesOrder'){
	
	$txt_product_name = array();
	$txt_product_name = $_POST['txt_product_name'];

	$txt_uom = array();
	$txt_uom = $_POST['txt_uom'];

	$txt_product_qty = array();
	$txt_product_qty = $_POST['txt_product_qty'];

	$txt_price = array();
	$txt_price = $_POST['txt_price'];

	$txt_total = array();
	$txt_total = $_POST['txt_total'];

	$txt_cgst = array();
	$txt_cgst = $_POST['txt_cgst'];

	$txt_cgst_amt = array();
	$txt_cgst_amt = $_POST['txt_cgst_amt'];

	$txt_sgst = array();
	$txt_sgst = $_POST['txt_sgst'];

	$txt_sgst_amt = array();
	$txt_sgst_amt = $_POST['txt_sgst_amt'];

	$txt_igst = array();
	$txt_igst = $_POST['txt_igst'];

	$txt_igst_amt = array();
	$txt_igst_amt = $_POST['txt_igst_amt'];

	$txt_final_total = array();
	$txt_final_total = $_POST['txt_final_total'];

	//$lastID = 1;
	$obj_saleorder->setsono($_POST['txt_sono']);
	$lastID = $obj_saleorder->Sales_order_detele($_POST['sono_id']);
	//exit;
	for ($i=0; $i < count($txt_product_name); $i++) { 
		$obj_saleorder->setsono($_POST['txt_sono']);
		$obj_saleorder->setsale_date(date('Y-m-d',strtotime($_POST['txt_pi_date'])));
		$obj_saleorder->setcustomer_id($_POST['txt_customer_name']);
		$obj_saleorder->setreference_number($_POST['txt_reference_number']);
		$obj_saleorder->setshipment_from($_POST['txt_shipment_from']);
		$obj_saleorder->setshipment_to($_POST['txt_shipment_to']);
		$obj_saleorder->setapproval_status($_POST['txt_approved']);
		$obj_saleorder->setproduct_id($txt_product_name[$i]);
		$obj_saleorder->setuom($txt_uom[$i]);
		$obj_saleorder->setqty($txt_product_qty[$i]);
		$obj_saleorder->setprice($txt_price[$i]);
		$obj_saleorder->settotal($txt_total[$i]);
		$obj_saleorder->setcgst($txt_cgst[$i]);
		$obj_saleorder->setcgst_amt($txt_cgst_amt[$i]);
		$obj_saleorder->setsgst($txt_sgst[$i]);
		$obj_saleorder->setsgst_amt($txt_sgst_amt[$i]);
		$obj_saleorder->setigst($txt_igst[$i]);
		$obj_saleorder->setigst_amt($txt_igst_amt[$i]);
		$obj_saleorder->setfinal_total($txt_final_total[$i]);
		$obj_saleorder->setitem_total($_POST['txt_item_total']);
		$obj_saleorder->setcgst_final($_POST['cgst_final']);
		$obj_saleorder->setcgst_amt_final($_POST['txt_cgst_amt_final']);
		$obj_saleorder->setsgst_final($_POST['sgst_final']);
		$obj_saleorder->setsgst_amt_final($_POST['txt_sgst_amt_final']);
		$obj_saleorder->setigst_final($_POST['igst_final']);
		$obj_saleorder->setigst_amt_final($_POST['txt_igst_amt_final']);
		$obj_saleorder->setgst_total($_POST['txt_gst_total']);
		$obj_saleorder->setdiscount_final($_POST['discount_final']);
		$obj_saleorder->setdiscount_final_amt($_POST['discount_final_amt']);
		$obj_saleorder->setgrand_total($_POST['txt_grand_total']);
		$status = $obj_saleorder->Sales_order_update($_POST['sono_id']);
	}
	if($status){
		echo json_encode($status);
	}
	else{
		echo json_encode(0);
	}
}*/
	/*if(isset($_POST['mode']) && $_POST['mode']=='getCustomerSalesConfirmation'){
	$obj_saleorder->setcustomer_id($_POST['id']);
	$status = $obj_saleorder->get_sale_approval_ids();
	echo json_encode($status);
	}*/
	if(isset($_POST['mode']) && $_POST['mode'] == 'listSalesOrder') {
	
        $obj_saleorder->listSalesOrder();
    }
	if(isset($_POST['mode']) && $_POST['mode'] == 'listSalesOrderApprove') {
	
        $obj_saleorder->listSalesOrderApprove();
    }
	if(isset($_POST['mode']) && $_POST['mode'] == 'listSalesOrderCancel') {
	
        $obj_saleorder->listSalesOrderCancel();
    }

	
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSOEditValues') {
		
		
	//	$obj_saleorder->setSQId($_POST['soid']);
		$getSQId=$obj_saleorder->getSalesOrderById($_POST['soid']);

		$datas= mysqli_fetch_array($getSQId);
		
	//	$obj_obj_saleorderso->setSQId($_POST['soid']);
		$scproduct=array();
		$getSQProducts=$obj_saleorder->getSalesOrderProductByPROId($_POST['soid']);

		while($datass=mysqli_fetch_array($getSQProducts)) 
		{
		//	$obj_so->setSQId($_POST['soid']);
			$getSQProduct=$obj_saleorder->getSalesOrderProductById($datass['pk_sop_id']);
			while($data=mysqli_fetch_array($getSQProduct)) 
			{
				$scproduct[]=$data;	
			} 
			
		} 
		
		echo json_encode(array($datas,$scproduct));
	}
	//Customer Listing
	if(isset($_POST['mode']) && $_POST['mode'] == 'getCustomerListing') {
		$getcustomerlist=$obj_cus->getCustomerListing();
		$customer=array();	
		while($data= mysqli_fetch_array($getcustomerlist)) {
			$customer[]=$data;
		}
		echo json_encode($customer);
	}
	//Product Listing
	
	if(isset($_POST['mode']) && $_POST['mode'] == 'getProductListing') {
		$getProductListing=$obj_product->getAllProducts();
		$getProduct=array();
		while($data=mysqli_fetch_array($getProductListing)) {
			$getProduct[]=$data;
		}	
		echo json_encode(array($getProduct));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getCategoryListing') {
		$getCategoryListingData=$obj_saleorder->getCategoryListingData();
		$getinnersheet=array();
		while($data=mysqli_fetch_array($getCategoryListingData)) {
			$getinnersheet[]=$data;
		}	
		echo json_encode(array($getinnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getInnerSheetListing') {
		$getInnerSheetData=$obj_saleorder->getInnerSheetData();
		$getinnersheet=array();
		while($data=mysqli_fetch_array($getInnerSheetData)) {
			$getinnersheet[]=$data;
		}	
		echo json_encode(array($getinnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSpecialEffectsListing') {
		$getAllSpecialEffectsdata=$obj_saleorder->getAllSpecialEffectsData();
		$getSpeicalEffects=array();
		while($data=mysqli_fetch_array($getAllSpecialEffectsdata)) {
			$getSpeicalEffects[]=$data;
		}	
		echo json_encode(array($getSpeicalEffects));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSizeListing') {
		$getAllSizeData=$obj_saleorder->getAllSizeData();
		$getsize=array();
		while($data=mysqli_fetch_array($getAllSizeData)) {
			$getsize[]=$data;
		}	
		echo json_encode(array($getsize));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBagListing') {
		$getAllBagData=$obj_saleorder->getAllBagData();
		$getbag=array();
		while($data=mysqli_fetch_array($getAllBagData)) {
			$getbag[]=$data;
		}	
		echo json_encode(array($getbag));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBoxListing') {
		$getAllBoxData=$obj_saleorder->getAllBoxData();
		$getbox=array();
		while($data=mysqli_fetch_array($getAllBoxData)) {
			$getbox[]=$data;
		}	
		echo json_encode(array($getbox));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getPadListing') {
		$getAllPadData=$obj_saleorder->getAllPadData();
		$getpad=array();
		while($data=mysqli_fetch_array($getAllPadData)) {
			$getpad[]=$data;
		}	
		echo json_encode(array($getpad));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getItemListing') {
	/*	var_dump($_POST);
		exit;*/
		
		$getAllItemData=$obj_saleorder->getAllItemData();
		$getitem=array();
		while($data=mysqli_fetch_array($getAllItemData)) {
			$getitem[]=$data;
		}	
		echo json_encode(array($getitem));
	}

	if(isset($_POST['mode']) && $_POST['mode'] == 'getInnersheet_id') {
		$getInnersheet_id=$obj_saleorder->getInnersheet_id();
		$getInnersheet=array();
		while($data=mysqli_fetch_array($getInnersheet_id)) {
			$getInnersheet[]=$data;
		}	
		echo json_encode(array($getInnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSOValues') {
		
	//	$obj_saleorder->setSQId($_POST['soid']);
		$getSQId=$obj_saleorder->getSalesQuotesById($_POST['soid']);
		
		$datas=mysqli_fetch_array($getSQId);
		
	//	$obj_saleorder->setSQId($_POST['soid']);
		$scproduct=array();
		$getSQProducts=$obj_saleorder->getSalesQuotesProductByPROId($_POST['soid']);
		
		while($datass=$getSQProducts->fetch()) {
			//$obj_saleorder->setSQId($_POST['soid']);
			$getSQProduct=$obj_saleorder->getSalesQuotesProductById($datass['pk_sqp_product_ID']);
			while($data=mysqli_fetch_array($getSQProduct)) {
				$scproduct[]=$data;	
			}
		} 
	

		echo json_encode(array($datas,$scproduct));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getItemsListing') {
		/*	var_dump($_POST);
			exit;*/
			
			$getAllItemData=$obj_saleorder->getAllItemsData();
			$getitem=array();
			while($data=mysqli_fetch_array($getAllItemData)) {
				$getitem[]=$data;
			}	
			echo json_encode(array($getitem));
		}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getCostListing') {
		/*	var_dump($_POST);
			exit;*/
			$costvals =0;
			if($_POST['typesval'] == 1)
			{
				$costval =	$obj_saleorder->getCostCommercialProduct($_POST['product_id']);
				$costvaldata = mysqli_fetch_array($costval);
				if($_POST['costtype']  == 1)
				{
				  $costvals =	$costvaldata['firstcopy_price'];
				}else if($_POST['costtype']  == 2){
					$costvals =	$costvaldata['additionalcopy_price'];

				}
				
				

			}
			else{
				$costval =	$obj_saleorder->getCostNonCommercialProduct($_POST['product_id']);
				$costvaldata = mysqli_fetch_array($costval);
				if($_POST['costtype']  == 1)
				{
				  $costvals =	$costvaldata['4color_price'];
				}else if($_POST['costtype']  == 2){
					$costvals =	$costvaldata['7color_price'];

				}
			}


			/*
			$getitem=array();
			while($data=mysqli_fetch_array($getAllItemData)) {
				$getitem[]=$data;
			}	*/
			echo json_encode($costvals);
		}
		mysqli_close($GLOBALS["___mysqli_ston"]);
	?>