<?php
//error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include("../../includes/db_config.php");

include("../../classes/class_estimate_commornon.php");

include("../../classes/class_customer.php");

include("../../classes/class_product.php");




$obj_estimatecommornon = new Estimate_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$obj_cus = new Customer('','','','','','','','','','','','','','','','','','','','','','',$GLOBALS["___mysqli_ston"]);

$obj_product = new Product('','','','','','','','','','','','','','');

if(isset($_POST['mode']) && $_POST['mode']=='addEstimateNonComm'){
	

	$lastSOID = $obj_estimatecommornon->EstimateNonComm_lastinserted_id();
    $sCid = $lastSOID + 1;
    $newSQid = sprintf("%05s", $sCid);

   /* $previousYr = date("y", strtotime("-1 year")); //last year
    $nextYr = date('y', strtotime('+1 year'));
    $year = substr(date('Y'), 0, 2);
    if (date('m') < 4) {
        $finYr = $previousYr . $year;
    } else {
        $finYr = $year . $nextYr;
    }*/
	$finYr = date('Y');
    $soNum = 'AV-' . $newSQid;
	
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
	$obj_estimatecommornon->setsono($soNum);
	$obj_estimatecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_estimatecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_estimatecommornon->setcity($_POST['txt_customer_city']);
	$obj_estimatecommornon->setpaymenttype($_POST['txt_payment_type']);
	$obj_estimatecommornon->setremark($_POST['txt_remarks']);
	$obj_estimatecommornon->setgsttype($_POST['txt_intstate']);

	$txt_delivery_date = str_replace('/', '-', $_POST['txt_delivery_date']);
	$obj_estimatecommornon->setshipment_to(date('Y-m-d',strtotime($txt_delivery_date)));
	$obj_estimatecommornon->setreference_number($_POST['txt_state']);
	$obj_estimatecommornon->setproduct_id($_POST['txt_franchise']);
	$obj_estimatecommornon->setcustom_value($_POST['txt_streetarea']);

	//$obj_estimatecommornon->setreference_number($_POST['txt_reference_number']);
	/*$obj_estimatecommornon->setshipment_from($_POST['txt_shipment_from']);
	$obj_estimatecommornon->setshipment_to($_POST['txt_shipment_to']);
	$obj_estimatecommornon->setapproval_status($_POST['txt_approved']);*/


    $obj_estimatecommornon->setdiscount_field1($_POST['discount_field1']);
    $obj_estimatecommornon->setdiscount_final1($_POST['discount_final1']);
    $obj_estimatecommornon->setdiscount_final_amt1($_POST['discount_final_amt1']);
    $obj_estimatecommornon->setdiscount_type1($_POST['discount_type1']);
    $obj_estimatecommornon->setcaltype1($_POST['txt_cal_type1']);

    $obj_estimatecommornon->setdiscount_field2($_POST['discount_field2']);
    $obj_estimatecommornon->setdiscount_final2($_POST['discount_final2']);
    $obj_estimatecommornon->setdiscount_final_amt2($_POST['discount_final_amt2']);
    $obj_estimatecommornon->setdiscount_type2($_POST['discount_type2']);
    $obj_estimatecommornon->setcaltype2($_POST['txt_cal_type2']);

    $obj_estimatecommornon->setdiscount_field3($_POST['discount_field3']);
    $obj_estimatecommornon->setdiscount_final3($_POST['discount_final3']);
    $obj_estimatecommornon->setdiscount_final_amt3($_POST['discount_final_amt3']);
    $obj_estimatecommornon->setdiscount_type3($_POST['discount_type3']);
	$obj_estimatecommornon->setcaltype3($_POST['txt_cal_type3']);


  //  $obj_estimatecommornon->setdiscount_field4($_POST['discount_field4']);
    $obj_estimatecommornon->setdiscount_final4($_POST['discount_final4']);
    $obj_estimatecommornon->setdiscount_final_amt4($_POST['discount_final_amt4']);
   // $obj_estimatecommornon->setdiscount_type4($_POST['discount_type4']);
	//$obj_estimatecommornon->setcaltype4($_POST['txt_cal_type4']);


   // $obj_estimatecommornon->setdiscount_field5($_POST['discount_field5']);
   // $obj_estimatecommornon->setdiscount_final5($_POST['discount_final5']);
  //  $obj_estimatecommornon->setdiscount_type5($_POST['discount_type5']);
  $obj_estimatecommornon->setdiscount_final_amt5($_POST['discount_final_amt5']);

	 
 //   $obj_estimatecommornon->setcaltype5($_POST['txt_cal_type5']);

	$obj_estimatecommornon->setgrand_total($_POST['txt_grand_total']);


	if($_POST['txt_state'] == 33)
	{
		$cgst_per = (isset($_POST['cgst_per']))? $_POST['cgst_per'] : '0';
		$cgst_total = (isset($_POST['cgst_total']))? $_POST['cgst_total'] : '0';
		$obj_estimatecommornon->setcgst($cgst_per);
		$obj_estimatecommornon->setcgst_amt($cgst_total);

		$sgst_per = (isset($_POST['sgst_per']))? $_POST['sgst_per'] : '0';
		$sgst_total = (isset($_POST['sgst_total']))? $_POST['sgst_total'] : '0';
		$obj_estimatecommornon->setcgst_final($sgst_per);
		$obj_estimatecommornon->setcgst_amt_final($sgst_total);
	}
	else{
		
		$igst_per = (isset($_POST['igst_per']))? $_POST['igst_per'] : '0';
		$igst_total = (isset($_POST['igst_total']))? $_POST['igst_total'] : '0';
		$obj_estimatecommornon->setcgst($igst_per);
		$obj_estimatecommornon->setcgst_amt($igst_total);
	
	}
/*$obj_estimatecommornon->setcgst_amt_final($_POST['txt_cgst_amt_final']);
	$obj_estimatecommornon->setsgst_amt_final($_POST['txt_sgst_amt_final']);
	$obj_estimatecommornon->setigst_amt_final($_POST['txt_igst_amt_final']);
	$obj_estimatecommornon->setgst_total($_POST['txt_gst_total']);*/
	$obj_estimatecommornon->setitem_total($_POST['txt_item_total']);

	$soid = $obj_estimatecommornon->addEstimateNonComm();
//exit;
//exit;
	for ($i=0; $i < count($_POST['txt_itemtypes']); $i++) { 

			$obj_estimatecommornon->setfk_so_id($soid);
		//$obj_estimatecommornon->setproduct_id($_POST['txt_product_name'][$i]);
	//	$obj_estimatecommornon->setcategory_id($_POST['txt_category'][$i]);
		//$obj_estimatecommornon->settypes($_POST['txt_types'][$i]);

		
		$obj_estimatecommornon->settypes_id($_POST['txt_itemtypes'][$i]);
		$obj_estimatecommornon->setitem_id($_POST['txt_item'][$i]);
		$obj_estimatecommornon->setqty($_POST['txt_product_qty'][$i]);
		$obj_estimatecommornon->setpricetype($_POST['txt_price_type'][$i]);
		$obj_estimatecommornon->setorientation($_POST['txt_orientation'][$i]);
		$obj_estimatecommornon->setprice($_POST['txt_price'][$i]);
		$obj_estimatecommornon->setfinal_total($_POST['txt_final_total'][$i]);
	
	
		$status = $obj_estimatecommornon->addEstimateNonCommProduct();
	}
	if($soid){
		echo json_encode($soid);
	}
	else{
		echo json_encode(0);
	}
}


if(isset($_POST['mode']) && $_POST['mode']=='updateEstimateNonComm'){

	//var_dump($_POST);
	//exit;

	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
//	$obj_estimatecommornon->setsono($soNum);
$obj_estimatecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
$obj_estimatecommornon->setcustomer_id($_POST['txt_customer_name']);
$obj_estimatecommornon->setcity($_POST['txt_customer_city']);
$obj_estimatecommornon->setpaymenttype($_POST['txt_payment_type']);
$obj_estimatecommornon->setremark($_POST['txt_remarks']);
$obj_estimatecommornon->setgsttype($_POST['txt_intstate']);

$txt_delivery_date = str_replace('/', '-', $_POST['txt_delivery_date']);
$obj_estimatecommornon->setshipment_to(date('Y-m-d',strtotime($txt_delivery_date)));
$obj_estimatecommornon->setreference_number($_POST['txt_state']);
$obj_estimatecommornon->setproduct_id($_POST['txt_franchise']);
$obj_estimatecommornon->setcustom_value($_POST['txt_streetarea']);

//$obj_estimatecommornon->setreference_number($_POST['txt_reference_number']);
/*$obj_estimatecommornon->setshipment_from($_POST['txt_shipment_from']);
$obj_estimatecommornon->setshipment_to($_POST['txt_shipment_to']);
$obj_estimatecommornon->setapproval_status($_POST['txt_approved']);*/


$obj_estimatecommornon->setdiscount_field1($_POST['discount_field1']);
$obj_estimatecommornon->setdiscount_final1($_POST['discount_final1']);
$obj_estimatecommornon->setdiscount_final_amt1($_POST['discount_final_amt1']);
$obj_estimatecommornon->setdiscount_type1($_POST['discount_type1']);
$obj_estimatecommornon->setcaltype1($_POST['txt_cal_type1']);

$obj_estimatecommornon->setdiscount_field2($_POST['discount_field2']);
$obj_estimatecommornon->setdiscount_final2($_POST['discount_final2']);
$obj_estimatecommornon->setdiscount_final_amt2($_POST['discount_final_amt2']);
$obj_estimatecommornon->setdiscount_type2($_POST['discount_type2']);
$obj_estimatecommornon->setcaltype2($_POST['txt_cal_type2']);

$obj_estimatecommornon->setdiscount_field3($_POST['discount_field3']);
$obj_estimatecommornon->setdiscount_final3($_POST['discount_final3']);
$obj_estimatecommornon->setdiscount_final_amt3($_POST['discount_final_amt3']);
$obj_estimatecommornon->setdiscount_type3($_POST['discount_type3']);
$obj_estimatecommornon->setcaltype3($_POST['txt_cal_type3']);


//  $obj_estimatecommornon->setdiscount_field4($_POST['discount_field4']);
$obj_estimatecommornon->setdiscount_final4($_POST['discount_final4']);
$obj_estimatecommornon->setdiscount_final_amt4($_POST['discount_final_amt4']);
// $obj_estimatecommornon->setdiscount_type4($_POST['discount_type4']);
//$obj_estimatecommornon->setcaltype4($_POST['txt_cal_type4']);


// $obj_estimatecommornon->setdiscount_field5($_POST['discount_field5']);
// $obj_estimatecommornon->setdiscount_final5($_POST['discount_final5']);
//  $obj_estimatecommornon->setdiscount_type5($_POST['discount_type5']);
$obj_estimatecommornon->setdiscount_final_amt5($_POST['discount_final_amt5']);

 
//   $obj_estimatecommornon->setcaltype5($_POST['txt_cal_type5']);

$obj_estimatecommornon->setgrand_total($_POST['txt_grand_total']);


if($_POST['txt_state'] == 33)
{
	$cgst_per = (isset($_POST['cgst_per']))? $_POST['cgst_per'] : '0';
	$cgst_total = (isset($_POST['cgst_total']))? $_POST['cgst_total'] : '0';
	$obj_estimatecommornon->setcgst($cgst_per);
	$obj_estimatecommornon->setcgst_amt($cgst_total);

	$sgst_per = (isset($_POST['sgst_per']))? $_POST['sgst_per'] : '0';
	$sgst_total = (isset($_POST['sgst_total']))? $_POST['sgst_total'] : '0';
	$obj_estimatecommornon->setcgst_final($sgst_per);
	$obj_estimatecommornon->setcgst_amt_final($sgst_total);
}
else{
	
	$igst_per = (isset($_POST['igst_per']))? $_POST['igst_per'] : '0';
	$igst_total = (isset($_POST['igst_total']))? $_POST['igst_total'] : '0';
	$obj_estimatecommornon->setcgst($igst_per);
	$obj_estimatecommornon->setcgst_amt($igst_total);

}

	$obj_estimatecommornon->setitem_total($_POST['txt_item_total']);
	
	$soid = $obj_estimatecommornon->updateEstimateNonComm($_POST['txt_so_id']);
	 $obj_estimatecommornon->deleteEstimateNonCommProduct($_POST['txt_so_id']);


	for ($i=0; $i < count($_POST['txt_itemtypes']); $i++) { 

		$obj_estimatecommornon->setfk_so_id($_POST['txt_so_id']);
		$obj_estimatecommornon->settypes_id($_POST['txt_itemtypes'][$i]);
		$obj_estimatecommornon->setitem_id($_POST['txt_item'][$i]);
		$obj_estimatecommornon->setqty($_POST['txt_product_qty'][$i]);
		$obj_estimatecommornon->setpricetype($_POST['txt_price_type'][$i]);
		$obj_estimatecommornon->setorientation($_POST['txt_orientation'][$i]);
		$obj_estimatecommornon->setprice($_POST['txt_price'][$i]);
		$obj_estimatecommornon->setfinal_total($_POST['txt_final_total'][$i]);
	
		$status = $obj_estimatecommornon->addEstimateNonCommProduct();
	}
	if($status){
		echo json_encode($status);
	}
	else{
		echo json_encode(0);
	}
}
	if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNonComm') {
	
        $obj_estimatecommornon->listEstimateNonComm();
    }
	
	if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNonCommComplete') {
	
        $obj_estimatecommornon->listEstimateNonCommComplete();
    }
	

	
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSOEditValues') {
		
		
	//	$obj_estimatecommornon->setSQId($_POST['soid']);
		$getSQId=$obj_estimatecommornon->getEstimateNonCommById($_POST['soid']);

		$datas= mysqli_fetch_array($getSQId);
		
	//	$obj_obj_estimatecommornonso->setSQId($_POST['soid']);
		$scproduct=array();
		$getSQProducts=$obj_estimatecommornon->getEstimateNonCommProductByPROId($_POST['soid']);

		while($datass=mysqli_fetch_array($getSQProducts)) 
		{
		//	$obj_so->setSQId($_POST['soid']);
			$getSQProduct=$obj_estimatecommornon->getEstimateNonCommProductById($datass['PK_ESP_ID']);
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
		$getCategoryListingData=$obj_estimatecommornon->getCategoryListingData();
		$getinnersheet=array();
		while($data=mysqli_fetch_array($getCategoryListingData)) {
			$getinnersheet[]=$data;
		}	
		echo json_encode(array($getinnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getInnerSheetListing') {
		$getInnerSheetData=$obj_estimatecommornon->getInnerSheetData();
		$getinnersheet=array();
		while($data=mysqli_fetch_array($getInnerSheetData)) {
			$getinnersheet[]=$data;
		}	
		echo json_encode(array($getinnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSpecialEffectsListing') {
		$getAllSpecialEffectsdata=$obj_estimatecommornon->getAllSpecialEffectsData();
		$getSpeicalEffects=array();
		while($data=mysqli_fetch_array($getAllSpecialEffectsdata)) {
			$getSpeicalEffects[]=$data;
		}	
		echo json_encode(array($getSpeicalEffects));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSizeListing') {
		$getAllSizeData=$obj_estimatecommornon->getAllSizeData();
		$getsize=array();
		while($data=mysqli_fetch_array($getAllSizeData)) {
			$getsize[]=$data;
		}	
		echo json_encode(array($getsize));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBagListing') {
		$getAllBagData=$obj_estimatecommornon->getAllBagData();
		$getbag=array();
		while($data=mysqli_fetch_array($getAllBagData)) {
			$getbag[]=$data;
		}	
		echo json_encode(array($getbag));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBoxListing') {
		$getAllBoxData=$obj_estimatecommornon->getAllBoxData();
		$getbox=array();
		while($data=mysqli_fetch_array($getAllBoxData)) {
			$getbox[]=$data;
		}	
		echo json_encode(array($getbox));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getPadListing') {
		$getAllPadData=$obj_estimatecommornon->getAllPadData();
		$getpad=array();
		while($data=mysqli_fetch_array($getAllPadData)) {
			$getpad[]=$data;
		}	
		echo json_encode(array($getpad));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getItemListing') {
	/*	var_dump($_POST);
		exit;*/
		
		$getAllItemData=$obj_estimatecommornon->getAllItemData();
		$getitem=array();
		while($data=mysqli_fetch_array($getAllItemData)) {
			$getitem[]=$data;
		}	
		echo json_encode(array($getitem));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getInnersheet_id') {
		$getInnersheet_id=$obj_estimatecommornon->getInnersheet_id();
		$getInnersheet=array();
		while($data=mysqli_fetch_array($getInnersheet_id)) {
			$getInnersheet[]=$data;
		}	
		echo json_encode(array($getInnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSOValues') {
	
	//	$obj_estimatecommornon->setSQId($_POST['soid']);
		$getSQId=$obj_estimatecommornon->getEstimateNonCommById($_POST['soid']);
	
		$datas=mysqli_fetch_array($getSQId);
		
	//	$obj_estimatecommornon->setSQId($_POST['soid']);
		$scproduct=array();
		$getSQProducts=$obj_estimatecommornon->getEstimateNonCommProductByPROId($_POST['soid']);
		
		while($datass=mysqli_fetch_array($getSQProducts)) {
			//$obj_estimatecommornon->setSQId($_POST['soid']);
			
			$getSQProduct=$obj_estimatecommornon->getEstimateNonCommProductById($datass['PK_ESP_ID']);
			while($data=mysqli_fetch_array($getSQProduct)) 
			{
				$scproduct[]=$data;	
			} 
		} 
	

		echo json_encode(array($datas,$scproduct));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getComercialorNonItemsType') {

			$getComercialItemsType=$obj_estimatecommornon->getComercialorNonItemsType();
			$getitem=array();
			while($data=mysqli_fetch_array($getComercialItemsType)) {
				$getitem[]=$data;
			}	
			echo json_encode(array($getitem));
		}
	/*if(isset($_POST['mode']) && $_POST['mode'] == 'getNonComercialItemsType') {

		$getNonComercialItemsType=$obj_estimatecommornon->getNonComercialItemsType();
		$getitem=array();
		while($data=mysqli_fetch_array($getNonComercialItemsType)) {
			$getitem[]=$data;
		}	
		echo json_encode(array($getitem));
	}*/
	if(isset($_POST['mode']) && $_POST['mode'] == 'getCostListing') {
		/*	var_dump($_POST);
			exit;*/
			$costvals =0;
			/*if($_POST['typesval'] == 1)
			{
				$costval =	$obj_estimatecommornon->getCostCommercialProduct($_POST['product_id']);
				$costvaldata = mysqli_fetch_array($costval);
				if($_POST['costtype']  == 1)
				{
				  $costvals =	$costvaldata['firstcopy_price'];
				}else if($_POST['costtype']  == 2){
					$costvals =	$costvaldata['additionalcopy_price'];

				}
				
				

			}
			else{*/
				$costval =	$obj_estimatecommornon->getCostProduct();
				$costvaldata = mysqli_fetch_array($costval);
				if($_POST['costtype']  == 1)
				{
				  $costvals =	$costvaldata['first_price'];
				}else if($_POST['costtype']  == 2){
					$costvals =	$costvaldata['second_price'];

				}
			/*}*/


			/*
			$getitem=array();
			while($data=mysqli_fetch_array($getAllItemData)) {
				$getitem[]=$data;
			}	*/
			echo json_encode($costvals);
		}
		
	if(isset($_POST['mode']) && $_POST['mode']=='getAllCities'){
		$getAllCities=$obj_estimatecommornon->getAllCities();
		while($data=mysqli_fetch_array($getAllCities)) {
			$cities[]=$data;
		}
		echo json_encode($cities);
	}
	mysqli_close($GLOBALS["___mysqli_ston"]);
	?>