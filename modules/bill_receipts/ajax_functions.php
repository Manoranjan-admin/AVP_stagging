<?php
//error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
include("../../includes/db_config.php");
include("../../classes/class_advance_commornon.php");
include("../../classes/class_customer.php");
include("../../classes/class_product.php");

$obj_advancecommornon = new Advance_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$obj_cus = new Customer('','','','','','','','','','','','','','','','','','','','','','',$GLOBALS["___mysqli_ston"]);
$obj_product = new Product('','','','','','','','','','','','','','');

if(isset($_POST['mode']) && $_POST['mode']=='addAdvancecomm'){
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));
//	$obj_advancecommornon->setsono($soNum);
	$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_advancecommornon->setremark($_POST['txt_remarks']);
	$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);
	
	$result = $obj_advancecommornon->add_advance_comm($ad_date);
	echo json_encode($result);
	
}
if(isset($_POST['mode']) && $_POST['mode']=='addBillcomm'){
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));
//	$obj_advancecommornon->setsono($soNum);
	$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_advancecommornon->setremark($_POST['txt_remarks']);
	$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);
	
	$result = $obj_advancecommornon->add_bill_comm($ad_date);
	if($result == 1)
	{
		$result2 = $obj_advancecommornon->update_estimate_comm();
	}
	echo json_encode($result);
	
}
if(isset($_POST['mode']) && $_POST['mode']=='addBillNonComm'){

	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));
//	$obj_advancecommornon->setsono($soNum);
	$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_advancecommornon->setremark($_POST['txt_remarks']);
	$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);
	
	$result = $obj_advancecommornon->add_bill_noncomm($ad_date);
	if($result == 1)
	{
		$result2 = $obj_advancecommornon->update_estimate_noncomm();
	}
	echo json_encode($result);
	
}
if(isset($_POST['mode']) && $_POST['mode']=='check_amount_bill'){
if($_POST['estimate_no'] == "Select Estimate"){
	$result='Select Estimate Number';
}else{
	if($_POST['type']==1){
  $result = $obj_advancecommornon->check_pending_amount_comm_bill($_POST['estimate_no'],$_POST['adv_amount']);
	}elseif($_POST['type']==2){
		$result = $obj_advancecommornon->check_pending_amount_noncomm_bill($_POST['estimate_no'],$_POST['adv_amount']);
	}
}
echo json_encode($result);
	
}
if(isset($_POST['mode']) && $_POST['mode']=='check_amount_bill_by_esid'){
if($_POST['estimate_no'] == "Select Estimate"){
	$result='Select Estimate Number';
}else{
	if($_POST['type']==1){
  $result = $obj_advancecommornon->check_pending_amount_comm_bill_by_esid($_POST['estimate_no'],$_POST['adv_amount']);
	}elseif($_POST['type']==2){
		$result = $obj_advancecommornon->check_pending_amount_noncomm_bill_by_esid($_POST['estimate_no'],$_POST['adv_amount']);
	}
}
echo json_encode($result);
	
}
if(isset($_POST['mode']) && $_POST['mode']=='editBillcomm'){
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));
//	$obj_advancecommornon->setsono($soNum);
	$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_advancecommornon->setremark($_POST['txt_remarks']);
	$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);
	
	$result = $obj_advancecommornon->edit_bill_comm($ad_date);
	echo json_encode($result);
	
}
if(isset($_POST['mode']) && $_POST['mode']=='editBillNonComm'){

	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
	$ad_date = date('Y-m-d',strtotime($txt_pi_date));
//	$obj_advancecommornon->setsono($soNum);
	$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_advancecommornon->setremark($_POST['txt_remarks']);
	$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);
	
	$result = $obj_advancecommornon->edit_bill_noncomm($ad_date);
	echo json_encode($result);
	
}


if(isset($_POST['mode']) && $_POST['mode']=='updateEstimateComm'){

	

	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
	
//	$obj_advancecommornon->setsono($soNum);
	$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
	$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
//	$obj_advancecommornon->setreference_number($_POST['txt_reference_number']);
	$obj_advancecommornon->setcity($_POST['txt_customer_city']);
	$obj_advancecommornon->setremark($_POST['txt_remarks']);
	$obj_advancecommornon->setgsttype($_POST['txt_intstate']);

	$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);
	$discount_field1 =(isset($_POST['discount_field1']))? $_POST['discount_field1'] : '0';
	$discount_final_amt1 = (isset($_POST['discount_final_amt1']))? $_POST['discount_final_amt1'] : '0';
	$discount_type1 = (isset($_POST['discount_type1']))? $_POST['discount_type1'] : '0';
	$txt_cal_type1 = (isset($_POST['txt_cal_type1']))? $_POST['txt_cal_type1'] : '0';
	$discount_field2 = (isset($_POST['discount_field2']))? $_POST['discount_field2'] : '0';
	$discount_final2 = (isset($_POST['discount_final2']))? $_POST['discount_final2'] : '0';
	$discount_final_amt2 = (isset($_POST['discount_final_amt2']))? $_POST['discount_final_amt2'] : '0';
	$discount_type2 = (isset($_POST['discount_type2']))? $_POST['discount_type2'] : '0';
	$txt_cal_type2 = (isset($_POST['txt_cal_type2']))? $_POST['txt_cal_type2'] : '0';
	$discount_field3 = (isset($_POST['discount_field3']))? $_POST['discount_field3'] : '0';
	$discount_final3 = (isset($_POST['discount_final3']))? $_POST['discount_final3'] : '0';
	$discount_final_amt3 = (isset($_POST['discount_final_amt3']))? $_POST['discount_final_amt3'] : '0';
	$discount_type3 = (isset($_POST['discount_type3']))? $_POST['discount_type3'] : '0';
	$txt_cal_type3 = (isset($_POST['txt_cal_type3']))? $_POST['txt_cal_type3'] : '0';
	$discount_final4 = (isset($_POST['discount_final4']))? $_POST['discount_final4'] : '0';
	$discount_final_amt4 = (isset($_POST['discount_final_amt4']))? $_POST['discount_final_amt4'] : '0';
	$discount_final_amt5 = (isset($_POST['discount_final_amt5']))? $_POST['discount_final_amt5'] : '0';

   
    $obj_advancecommornon->setdiscount_final1($discount_final1);
    $obj_advancecommornon->setdiscount_final_amt1($discount_final_amt1);
    $obj_advancecommornon->setdiscount_type1($discount_type1);
    $obj_advancecommornon->setcaltype1($txt_cal_type1);

    $obj_advancecommornon->setdiscount_field2($discount_field2);
    $obj_advancecommornon->setdiscount_final2($discount_final2);
    $obj_advancecommornon->setdiscount_final_amt2($discount_final_amt2);
    $obj_advancecommornon->setdiscount_type2($discount_type2);
    $obj_advancecommornon->setcaltype2($txt_cal_type2);

    $obj_advancecommornon->setdiscount_field3($discount_field3);
    $obj_advancecommornon->setdiscount_final3($discount_final3);
    $obj_advancecommornon->setdiscount_final_amt3($discount_final_amt3);
    $obj_advancecommornon->setdiscount_type3($discount_type3);
	$obj_advancecommornon->setcaltype3($txt_cal_type3);


  //  $obj_advancecommornon->setdiscount_field4($_POST['discount_field4']);
  $obj_advancecommornon->setdiscount_final4($discount_final4);
  $obj_advancecommornon->setdiscount_final_amt4($discount_final_amt4);
 // $obj_advancecommornon->setdiscount_type4($_POST['discount_type4']);
  //$obj_advancecommornon->setcaltype4($_POST['txt_cal_type4']);


 // $obj_advancecommornon->setdiscount_field5($_POST['discount_field5']);
 // $obj_advancecommornon->setdiscount_final5($_POST['discount_final5']);
//  $obj_advancecommornon->setdiscount_type5($_POST['discount_type5']);
	$obj_advancecommornon->setdiscount_final_amt5($_POST['discount_final_amt5']);
   

	$obj_advancecommornon->setgrand_total($_POST['txt_grand_total']);


	if($_POST['txt_state'] == 33)
	{
		$cgst_per = (isset($_POST['cgst_per']))? $_POST['cgst_per'] : '0';
		$cgst_total = (isset($_POST['cgst_total']))? $_POST['cgst_total'] : '0';
		$obj_advancecommornon->setcgst($cgst_per);
		$obj_advancecommornon->setcgst_amt($cgst_total);

		$sgst_per = (isset($_POST['sgst_per']))? $_POST['sgst_per'] : '0';
		$sgst_total = (isset($_POST['sgst_total']))? $_POST['sgst_total'] : '0';
		$obj_advancecommornon->setcgst_final($sgst_per);
		$obj_advancecommornon->setcgst_amt_final($sgst_total);
	}
	else{
		
		$igst_per = (isset($_POST['igst_per']))? $_POST['igst_per'] : '0';
		$igst_total = (isset($_POST['igst_total']))? $_POST['igst_total'] : '0';
		$obj_advancecommornon->setcgst($igst_per);
		$obj_advancecommornon->setcgst_amt($igst_total);
	
	}
	
	/*
	$gst_per = (isset($_POST['gst_per']))? $_POST['gst_per'] : '0';
	$gst_total = (isset($_POST['gst_total']))? $_POST['gst_total'] : '0';
	$obj_advancecommornon->setcgst($gst_per);
	$obj_advancecommornon->setcgst_amt($gst_total);*/

	$obj_advancecommornon->setitem_total($_POST['txt_item_total']);
	
	$soid = $obj_advancecommornon->updateEstimateComm($_POST['txt_so_id']);
	 $obj_advancecommornon->deleteEstimateCommProduct($_POST['txt_so_id']);


	for ($i=0; $i < count($_POST['txt_item']); $i++) { 

		$obj_advancecommornon->setfk_so_id($_POST['txt_so_id']);
	/*	$obj_advancecommornon->setproduct_id($_POST['txt_product_name'][$i]);
		$obj_advancecommornon->setcategory_id($_POST['txt_category'][$i]);
		$obj_advancecommornon->settypes_id($_POST['txt_itemtypes'][$i]);
		$obj_advancecommornon->setitem_id($_POST['txt_item'][$i]);
		$obj_advancecommornon->setqty($_POST['txt_product_qty'][$i]);
		$obj_advancecommornon->setprice($_POST['txt_price'][$i]);
		$obj_advancecommornon->setfinal_total($_POST['txt_final_total'][$i]);*/
		$obj_advancecommornon->setitem_id($_POST['txt_item'][$i]);
	//	$obj_advancecommornon->setcategory_id($_POST['txt_category'][$i]);
		$obj_advancecommornon->setqty($_POST['txt_product_qty'][$i]);
		$obj_advancecommornon->setpricetype($_POST['txt_price_type'][$i]);
		$obj_advancecommornon->setorientation($_POST['txt_orientation'][$i]);
		$obj_advancecommornon->setprice($_POST['txt_price'][$i]);
		$obj_advancecommornon->setfinal_total($_POST['txt_final_total'][$i]);
		$status = $obj_advancecommornon->addEstimateCommProduct();
	}
	if($status){
		echo json_encode($status);
	}
	else{
		echo json_encode(0);
	}
}
	if(isset($_POST['mode']) && $_POST['mode'] == 'listBillComm') {
		

        $obj_advancecommornon->listBillComm();
    }
	if(isset($_POST['mode']) && $_POST['mode'] == 'listBillNonComm') {

        $obj_advancecommornon->listBillNonComm();
    }

	
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBillEditValues_comm') {
		$id=$_POST['soid'];
		
		$get_data=$obj_advancecommornon->get_edit_bill_details($id);
		$bill=array();

		while($datass=mysqli_fetch_array($get_data)) 
		{	
				$bill[]=$datass;	
			
		} 
		
		echo json_encode($bill);
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBillEditValues_noncomm') {
		$id=$_POST['soid'];
		
		$get_data=$obj_advancecommornon->get_edit_bill_details_non_comm($id);
		$bill=array();

		while($datass=mysqli_fetch_array($get_data)) 
		{	
				$bill[]=$datass;	
			
		} 
		
		echo json_encode($bill);
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
		$getCategoryListingData=$obj_advancecommornon->getCategoryListingData();
		$getinnersheet=array();
		while($data=mysqli_fetch_array($getCategoryListingData)) {
			$getinnersheet[]=$data;
		}	
		echo json_encode(array($getinnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getInnerSheetListing') {
		$getInnerSheetData=$obj_advancecommornon->getInnerSheetData();
		$getinnersheet=array();
		while($data=mysqli_fetch_array($getInnerSheetData)) {
			$getinnersheet[]=$data;
		}	
		echo json_encode(array($getinnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSpecialEffectsListing') {
		$getAllSpecialEffectsdata=$obj_advancecommornon->getAllSpecialEffectsData();
		$getSpeicalEffects=array();
		while($data=mysqli_fetch_array($getAllSpecialEffectsdata)) {
			$getSpeicalEffects[]=$data;
		}	
		echo json_encode(array($getSpeicalEffects));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSizeListing') {
		$getAllSizeData=$obj_advancecommornon->getAllSizeData();
		$getsize=array();
		while($data=mysqli_fetch_array($getAllSizeData)) {
			$getsize[]=$data;
		}	
		echo json_encode(array($getsize));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBagListing') {
		$getAllBagData=$obj_advancecommornon->getAllBagData();
		$getbag=array();
		while($data=mysqli_fetch_array($getAllBagData)) {
			$getbag[]=$data;
		}	
		echo json_encode(array($getbag));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBoxListing') {
		$getAllBoxData=$obj_advancecommornon->getAllBoxData();
		$getbox=array();
		while($data=mysqli_fetch_array($getAllBoxData)) {
			$getbox[]=$data;
		}	
		echo json_encode(array($getbox));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getPadListing') {
		$getAllPadData=$obj_advancecommornon->getAllPadData();
		$getpad=array();
		while($data=mysqli_fetch_array($getAllPadData)) {
			$getpad[]=$data;
		}	
		echo json_encode(array($getpad));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getItemListing') {
		/*	var_dump($_POST);
		exit;*/
		
		$getAllItemData=$obj_advancecommornon->getAllItemData();
		$getitem=array();
		while($data=mysqli_fetch_array($getAllItemData)) {
			$getitem[]=$data;
		}	
		echo json_encode(array($getitem));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getInnersheet_id') {
		$getInnersheet_id=$obj_advancecommornon->getInnersheet_id();
		$getInnersheet=array();
		while($data=mysqli_fetch_array($getInnersheet_id)) {
			$getInnersheet[]=$data;
		}	
		echo json_encode(array($getInnersheet));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getSOValues') {
		
		//	$obj_advancecommornon->setSQId($_POST['soid']);
		$getSQId=$obj_advancecommornon->getSalesQuotesById($_POST['soid']);
		
		$datas=mysqli_fetch_array($getSQId);
		
		//	$obj_advancecommornon->setSQId($_POST['soid']);
		$scproduct=array();
		$getSQProducts=$obj_advancecommornon->getSalesQuotesProductByPROId($_POST['soid']);
		
		while($datass=$getSQProducts->fetch()) {
			//$obj_advancecommornon->setSQId($_POST['soid']);
			$getSQProduct=$obj_advancecommornon->getSalesQuotesProductById($datass['pk_sqp_product_ID']);
			while($data=mysqli_fetch_array($getSQProduct)) {
				$scproduct[]=$data;	
			}
		} 
	

		echo json_encode(array($datas,$scproduct));
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getComercialorNonItemsType') {

			$getComercialItemsType=$obj_advancecommornon->getComercialorNonItemsType();
			$getitem=array();
			while($data=mysqli_fetch_array($getComercialItemsType)) {
				$getitem[]=$data;
			}	
			echo json_encode(array($getitem));
		}
		/*if(isset($_POST['mode']) && $_POST['mode'] == 'getNonComercialItemsType') {

		$getNonComercialItemsType=$obj_advancecommornon->getNonComercialItemsType();
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
				$costval =	$obj_advancecommornon->getCostCommercialProduct($_POST['product_id']);
				$costvaldata = mysqli_fetch_array($costval);
				if($_POST['costtype']  == 1)
				{
				  $costvals =	$costvaldata['firstcopy_price'];
				}else if($_POST['costtype']  == 2){
					$costvals =	$costvaldata['additionalcopy_price'];

				}
				
				

			}
			else{*/
				$costval =	$obj_advancecommornon->getCostProduct();
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
		$getAllCities=$obj_advancecommornon->getAllCities();
		while($data=mysqli_fetch_array($getAllCities)) {
			$cities[]=$data;
		}
		echo json_encode($cities);
	}

	/*Multiple Bill */


	if(isset($_POST['mode']) && $_POST['mode']=='addBillcommMulti'){

		
		$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
		
		$ad_date = date('Y-m-d',strtotime($txt_pi_date));
	
		
		$result = $obj_advancecommornon->add_bill_commmulti($ad_date);
		echo json_encode($result);
		
	}

	if(isset($_POST['mode']) && $_POST['mode']=='addBillNonCommMulti'){
		

	
		$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
		$ad_date = date('Y-m-d',strtotime($txt_pi_date));
	
		$result = $obj_advancecommornon->add_bill_noncommmulti($ad_date);
		echo json_encode($result);
		
	}
	if(isset($_POST['mode']) && $_POST['mode']=='check_amount_billmulti'){
		if($_POST['estimate_no'] == "Select Estimate"){
			$result='Select Estimate Number';
		}else{
			if($_POST['type']==1){
		$result = $obj_advancecommornon->check_pending_amount_comm_billmulti($_POST['estimate_no'],$_POST['adv_amount']);
			}elseif($_POST['type']==2){
				$result = $obj_advancecommornon->check_pending_amount_noncomm_billmulti($_POST['estimate_no'],$_POST['adv_amount']);
			}
		}
		echo json_encode($result);
		
	}
	if(isset($_POST['mode']) && $_POST['mode']=='check_amount_bill_by_esidmulti'){
	if($_POST['estimate_no'] == "Select Estimate"){
		$result='Select Estimate Number';
	}else{
		if($_POST['type']==1){
	  $result = $obj_advancecommornon->check_pending_amount_comm_bill_by_esidmulti($_POST['estimate_no'],$_POST['adv_amount']);
		}elseif($_POST['type']==2){
			$result = $obj_advancecommornon->check_pending_amount_noncomm_bill_by_esidmulti($_POST['estimate_no'],$_POST['adv_amount']);
		}
	}
	echo json_encode($result);
		
	}
	if(isset($_POST['mode']) && $_POST['mode']=='editBillcommMulti'){
		$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
		
		$ad_date = date('Y-m-d',strtotime($txt_pi_date));
	//	$obj_advancecommornon->setsono($soNum);
		$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
		$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
		$obj_advancecommornon->setremark($_POST['txt_remarks']);
		$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);
		
		$result = $obj_advancecommornon->edit_bill_commmulti($ad_date);
		echo json_encode($result);
		
	}
	if(isset($_POST['mode']) && $_POST['mode']=='editBillNonCommMulti'){
	
		$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
		
		$ad_date = date('Y-m-d',strtotime($txt_pi_date));
	//	$obj_advancecommornon->setsono($soNum);
		$obj_advancecommornon->setsale_date(date('Y-m-d',strtotime($txt_pi_date)));
		$obj_advancecommornon->setcustomer_id($_POST['txt_customer_name']);
		$obj_advancecommornon->setremark($_POST['txt_remarks']);
		$obj_advancecommornon->setpaymenttype($_POST['txt_payment_type']);
		
		$result = $obj_advancecommornon->edit_bill_noncommmulti($ad_date);
		echo json_encode($result);
		
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'listBillCommMulti') {
		

        $obj_advancecommornon->listBillCommMulti();
    }
	if(isset($_POST['mode']) && $_POST['mode'] == 'listBillNonCommMulti') {

        $obj_advancecommornon->listBillNonCommMulti();
    }

	
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBillEditValues_commmulti') {
		$id=$_POST['soid'];
		
		$get_data=$obj_advancecommornon->get_edit_bill_detailsmulti($id);
		$bill=array();

		while($datass=mysqli_fetch_array($get_data)) 
		{	
				$bill[]=$datass;	
			
		} 
		
		echo json_encode($bill);
	}
	if(isset($_POST['mode']) && $_POST['mode'] == 'getBillEditValues_noncommmulti') {
		$id=$_POST['soid'];
		
		$get_data=$obj_advancecommornon->get_edit_bill_details_non_commmulti($id);
		$bill=array();

		while($datass=mysqli_fetch_array($get_data)) 
		{	
				$bill[]=$datass;	
			
		} 
		
		echo json_encode($bill);
	}
	if(isset($_POST['mode']) && $_POST['mode']=='getestAmount'){
	
		if($_POST['type']==1){
	  $result = $obj_advancecommornon->check_billamount_comm($_POST['estid']);
		}elseif($_POST['type']==2){
			$result = $obj_advancecommornon->check_billamount_noncomm($_POST['estid']);
		}
	
	echo json_encode($result);
}
if(isset($_POST['mode']) && $_POST['mode']=='check_statusdelived'){
	if($_POST['estid'] == "Select Estimate"){
		$result= 'false';
	}else{
		if($_POST['type']==1){
	  $result = $obj_advancecommornon->check_status_delived_comm_bil($_POST['estid']);
		}elseif($_POST['type']==2){
			$result = $obj_advancecommornon->check_status_delived_noncomm_bil($_POST['estid']);
		}
	}
	echo json_encode($result);
		
	}
mysqli_close($GLOBALS["___mysqli_ston"]);
	?>