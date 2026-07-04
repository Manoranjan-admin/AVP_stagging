<?php

require_once '../../vendor/autoload.php';

use Razorpay\Api\Api;
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();

include("../../includes/db_config.php");

include("../../classes/class_estimate_commornon.php");

include("../../classes/class_customer.php");

include("../../classes/class_product.php");
// error_reporting(E_ALL);
// ini_set('display_errors', 1);



$obj_estimatecommornon = new Estimate_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$obj_cus = new Customer('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', $GLOBALS["___mysqli_ston"]);

$obj_product = new Product('', '', '', '', '', '', '', '', '', '', '', '', '', '');

if (isset($_POST['mode']) && $_POST['mode'] == 'addEstimateNonComm') {

	// print_r($_POST['txt_itemtypes']);
	// print_r($_POST['group_id']);
	// exit;


	/*$lastSOID = $obj_estimatecommornon->EstimateNonComm_lastinserted_id();
    $sCid = $lastSOID + 1;
    $newSQid = sprintf("%05s", $sCid);

	$finYr = date('y');
    //$soNum = 'ORD-' .$finYr. ''. $newSQid;
    $soNum = 'ORD-' . $newSQid;
	*/

	$lastSOID = $obj_estimatecommornon->EstimateNonComm_last();
	/*$previousYr = date("y",strtotime("-1 year"));  //last year 
	$nextYr = date('y', strtotime('+1 year'));
	$year = substr( date('y'),0, 2);
	if ( date('m') < 4 ) {
		$finacial_year=$year;
	}
	else
	{
		$finacial_year=$year;
	}*/
	$previousYr = date("y", strtotime("-1 year"));  //last year 
	$nextYr = date('y');
	if (date('m') >= 4) {
		$finacial_year = $nextYr;
	} else {
		$finacial_year = $previousYr;
	}

	if (mysqli_num_rows($lastSOID) > 0) {
		$fileData = mysqli_fetch_array($lastSOID);
		$value2 = '';
		if ($row = $fileData) {

			//	echo $row['sono'];
			$value2 = $row['sono'];
			$value2 = substr($value2, 7, 11); //separating numeric part

			$sonoval = $row['sono'];
			$sonovalID = substr($sonoval, 4, 2); //separating numeric part


			// if($sonovalID != date('y'))
			// {
			// 	$soNum = "ORD-".$finacial_year."-". sprintf('%04s', 1);

			// }
			// else{
			$value2 = $value2 + 1; //Incrementing numeric part
			$value2 = "ORD-" . $finacial_year . "-" . sprintf('%04s', $value2); //concatenating incremented value
			$soNum = $value2;
			// }
			/*
			$value2 = $value2 + 1;//Incrementing numeric part
			$value2 = "ORD-".$finacial_year."-" . sprintf('%04s', $value2);//concatenating incremented value
			$soNum = $value2; */
		}
	} else {
		$soNum = "ORD-" . $finacial_year . "-" . sprintf('%04s', 1);
	}
	// echo $soNum;
	// exit;
	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);

	$obj_estimatecommornon->setsono($soNum);
	$obj_estimatecommornon->setsale_date(date('Y-m-d', strtotime($txt_pi_date)));
	$obj_estimatecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_estimatecommornon->setcity($_POST['txt_customer_city']);
	$obj_estimatecommornon->setpaymenttype($_POST['txt_payment_type']);
	//$obj_estimatecommornon->setdiscount_field4($_POST['txt_type_of_payment']);// types of payment
	$obj_estimatecommornon->setdiscount_field4(isset($_POST['txt_type_of_payment']) ? $_POST['txt_type_of_payment'] : null);


	$obj_estimatecommornon->setremark($_POST['txt_remarks']);
	$obj_estimatecommornon->setgsttype($_POST['txt_intstate']);

	$txt_delivery_date = str_replace('/', '-', $_POST['txt_delivery_date']);
	$obj_estimatecommornon->setshipment_to(date('Y-m-d', strtotime($txt_delivery_date)));
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
	// $obj_estimatecommornon->setdiscount_final3($_POST['discount_final3']);
	$obj_estimatecommornon->setdiscount_final3(isset($_POST['discount_final3']) ? $_POST['discount_final3'] : null);

	$obj_estimatecommornon->setdiscount_final_amt3($_POST['discount_final_amt3']);
	$obj_estimatecommornon->setdiscount_type3($_POST['discount_type3']);
	$obj_estimatecommornon->setcaltype3($_POST['txt_cal_type3']);


	//  $obj_estimatecommornon->setdiscount_field4($_POST['discount_field4']);
	// $obj_estimatecommornon->setdiscount_final4($_POST['discount_final4']);
	$obj_estimatecommornon->setdiscount_field4(isset($_POST['discount_final4']) ? $_POST['discount_final4'] : null);

	//$obj_estimatecommornon->setdiscount_final_amt4($_POST['discount_final_amt4']);
	$obj_estimatecommornon->setdiscount_field4(isset($_POST['discount_final_amt4']) ? $_POST['discount_final_amt4'] : null);

	// $obj_estimatecommornon->setdiscount_type4($_POST['discount_type4']);
	//$obj_estimatecommornon->setcaltype4($_POST['txt_cal_type4']);


	// $obj_estimatecommornon->setdiscount_field5($_POST['discount_field5']);
	// $obj_estimatecommornon->setdiscount_final5($_POST['discount_final5']);
	//  $obj_estimatecommornon->setdiscount_type5($_POST['discount_type5']);
	//$obj_estimatecommornon->setdiscount_final_amt5($_POST['discount_final_amt5']);
	$obj_estimatecommornon->setdiscount_field4(isset($_POST['discount_final_amt5']) ? $_POST['discount_final_amt5'] : null);




	//   $obj_estimatecommornon->setcaltype5($_POST['txt_cal_type5']);

	$obj_estimatecommornon->setgrand_total($_POST['txt_grand_total']);


	if ($_POST['txt_state'] == 33) {
		$cgst_per = (isset($_POST['cgst_per'])) ? $_POST['cgst_per'] : '0';
		$cgst_total = (isset($_POST['cgst_total'])) ? $_POST['cgst_total'] : '0';
		$obj_estimatecommornon->setcgst($cgst_per);
		$obj_estimatecommornon->setcgst_amt($cgst_total);

		$sgst_per = (isset($_POST['sgst_per'])) ? $_POST['sgst_per'] : '0';
		$sgst_total = (isset($_POST['sgst_total'])) ? $_POST['sgst_total'] : '0';
		$obj_estimatecommornon->setcgst_final($sgst_per);
		$obj_estimatecommornon->setcgst_amt_final($sgst_total);
	} else {

		$igst_per = (isset($_POST['igst_per'])) ? $_POST['igst_per'] : '0';
		$igst_total = (isset($_POST['igst_total'])) ? $_POST['igst_total'] : '0';
		$obj_estimatecommornon->setcgst($igst_per);
		$obj_estimatecommornon->setcgst_amt($igst_total);
	}
	/*$obj_estimatecommornon->setcgst_amt_final($_POST['txt_cgst_amt_final']);
	$obj_estimatecommornon->setsgst_amt_final($_POST['txt_sgst_amt_final']);
	$obj_estimatecommornon->setigst_amt_final($_POST['txt_igst_amt_final']);
	$obj_estimatecommornon->setgst_total($_POST['txt_gst_total']);*/
	$obj_estimatecommornon->setitem_total($_POST['txt_item_total']);
	$obj_estimatecommornon->setcus_plan_dis_amount($_POST['discount_amt']);
	$obj_estimatecommornon->setcus_plan_tot_amount($_POST['plan_dis_amt']);

	$soid = $obj_estimatecommornon->addEstimateNonComm();

	//exit;
	// $groupMap = [];       // old_group_id => new_group_id
	// $newGroupId = 0;
	for ($i = 0; $i < count($_POST['txt_itemtypes']); $i++) {
		// $oldGroupId = $_POST['group_id'][$i];

		// if (!in_array($oldGroupId, $groupMap)) {
		// 	$groupMap[] = $oldGroupId;
		// 	$newGroupId++;
		// }

		// $order_group_id = $newGroupId;

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


		$status = $obj_estimatecommornon->addEstimateNonCommProduct(["group_id" => $_POST['group_id'][$i]]);
	}
	// if ($soid) {
	// 	echo json_encode($soid);
	// } else {
	// 	echo json_encode(0);
	// }

	// if ($soid) {

	// 	$link = "http://staging.rishidhkannan.com/modules/sales/payment_noncomm.php?order_id=" . $soid;

	// 	$message = "Your order has been created.\n";
	// 	$message .= "Order No: " . $soNum . "\n";
	// 	$message .= "Amount: ₹" . $_POST['txt_grand_total'] . "\n";
	// 	$message .= "Pay here: " . $link;

	// 	$mobile = $_POST['txt_streetarea'];

	// 	$whatsapp_link = "https://wa.me/91" . $mobile . "?text=" . urlencode($message);

	// 	echo json_encode([
	// 		"soid" => $soid,
	// 		"order_no" => $soNum,
	// 		"amount" => $_POST['txt_grand_total'],
	// 		"whatsapp" => $whatsapp_link
	// 	]);
	// } else {
	// 	echo json_encode(0);
	// }
	

$keyId = "rzp_test_SSxGqhTR1IzZdx";
$keySecret = "7DqytHXPb6RgtBOLKA3NH6dh";

$api = new Api($keyId, $keySecret);

if ($soid) {

    $paymentLink = $api->paymentLink->create([
        'amount' => $_POST['txt_grand_total'] * 100,
        'currency' => 'INR',
        'description' => "Order No: " . $soNum,
        'customer' => [
            'name' => 'Customer',
            'contact' => $_POST['txt_streetarea']
        ],
        'notify' => [
            'sms' => true,
            'email' => false
        ],
        'reminder_enable' => true,
        
    ]);

    $razorpay_link = $paymentLink['short_url'];

    $message = "Your order has been created.\n";
    $message .= "Order No: " . $soNum . "\n";
    $message .= "Amount: ₹" . $_POST['txt_grand_total'] . "\n";
    $message .= "Pay here: " . $razorpay_link;

    $mobile = $_POST['txt_streetarea'];

    $whatsapp_link = "https://wa.me/91" . $mobile . "?text=" . urlencode($message);

    echo json_encode([
        "soid" => $soid,
        "order_no" => $soNum,
        "amount" => $_POST['txt_grand_total'],
        "whatsapp" => $whatsapp_link
    ]);

} else {
    echo json_encode(0);
}
}


if (isset($_POST['mode']) && $_POST['mode'] == 'updateEstimateNonComm') {

	//var_dump($_POST);
	//exit;

	$txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);

	//	$obj_estimatecommornon->setsono($soNum);
	$obj_estimatecommornon->setsale_date(date('Y-m-d', strtotime($txt_pi_date)));
	$obj_estimatecommornon->setcustomer_id($_POST['txt_customer_name']);
	$obj_estimatecommornon->setcity($_POST['txt_customer_city']);
	$obj_estimatecommornon->setpaymenttype($_POST['txt_payment_type']);
	$obj_estimatecommornon->setdiscount_field4($_POST['txt_type_of_payment'] ? $_POST['txt_type_of_payment'] : null); // types of payment

	$obj_estimatecommornon->setremark($_POST['txt_remarks']);
	$obj_estimatecommornon->setgsttype($_POST['txt_intstate']);

	$txt_delivery_date = str_replace('/', '-', $_POST['txt_delivery_date']);
	$obj_estimatecommornon->setshipment_to(date('Y-m-d', strtotime($txt_delivery_date)));
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
	// $obj_estimatecommornon->setdiscount_final3($_POST['discount_final3']);
	$obj_estimatecommornon->setdiscount_final3($_POST['discount_final3'] ? $_POST['discount_final3'] : null);

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


	if ($_POST['txt_state'] == 33) {
		$cgst_per = (isset($_POST['cgst_per'])) ? $_POST['cgst_per'] : '0';
		$cgst_total = (isset($_POST['cgst_total'])) ? $_POST['cgst_total'] : '0';
		$obj_estimatecommornon->setcgst($cgst_per);
		$obj_estimatecommornon->setcgst_amt($cgst_total);

		$sgst_per = (isset($_POST['sgst_per'])) ? $_POST['sgst_per'] : '0';
		$sgst_total = (isset($_POST['sgst_total'])) ? $_POST['sgst_total'] : '0';
		$obj_estimatecommornon->setcgst_final($sgst_per);
		$obj_estimatecommornon->setcgst_amt_final($sgst_total);
	} else {

		$igst_per = (isset($_POST['igst_per'])) ? $_POST['igst_per'] : '0';
		$igst_total = (isset($_POST['igst_total'])) ? $_POST['igst_total'] : '0';
		$obj_estimatecommornon->setcgst($igst_per);
		$obj_estimatecommornon->setcgst_amt($igst_total);
	}

	$obj_estimatecommornon->setitem_total($_POST['txt_item_total']);
	$obj_estimatecommornon->setcus_plan_dis_amount($_POST['discount_amt']);
	$obj_estimatecommornon->setcus_plan_tot_amount($_POST['plan_dis_amt']);

	$correction_status = 0;
	if (isset($_POST['correction_status'])) {
		$correction_status = $_POST['correction_status'];
	}
	$printing_status = 0;
	if (isset($_POST['printing_status'])) {
		$printing_status = $_POST['printing_status'];
	}
	$lamination_status = 0;
	if (isset($_POST['lamination_status'])) {
		$lamination_status = $_POST['lamination_status'];
	}
	$croppingandchecking_status = 0;
	if (isset($_POST['croppingandchecking_status'])) {
		$croppingandchecking_status = $_POST['croppingandchecking_status'];
	}

	$soid = $obj_estimatecommornon->updateEstimateNonComm($_POST['txt_so_id'], $correction_status, $printing_status, $lamination_status, $croppingandchecking_status);
	$obj_estimatecommornon->deleteEstimateNonCommProduct($_POST['txt_so_id']);

	// $groupMap = [];       // old_group_id => new_group_id
	// $newGroupId = 0;
	for ($i = 0; $i < count($_POST['txt_itemtypes']); $i++) {
		// $oldGroupId = $_POST['group_id'][$i];

		// if (!in_array($oldGroupId, $groupMap)) {
		// 	$groupMap[] = $oldGroupId;
		// 	$newGroupId++;
		// }

		// $order_group_id = $newGroupId;

		// // If this group_id not mapped yet, assign next number
		// if (!isset($groupMap[$oldGroupId])) {
		// 	$newGroupId++;
		// 	$groupMap[$oldGroupId] = $newGroupId;
		// }

		// $order_group_id = $groupMap[$oldGroupId];



		$obj_estimatecommornon->setfk_so_id($_POST['txt_so_id']);
		$obj_estimatecommornon->settypes_id($_POST['txt_itemtypes'][$i]);
		$obj_estimatecommornon->setitem_id($_POST['txt_item'][$i]);
		$obj_estimatecommornon->setqty($_POST['txt_product_qty'][$i]);
		$obj_estimatecommornon->setpricetype($_POST['txt_price_type'][$i]);
		$obj_estimatecommornon->setorientation($_POST['txt_orientation'][$i]);
		$obj_estimatecommornon->setprice($_POST['txt_price'][$i]);
		$obj_estimatecommornon->setfinal_total($_POST['txt_final_total'][$i]);

		$status = $obj_estimatecommornon->addEstimateNonCommProduct(["group_id" => $_POST['group_id'][$i]]);
	}
	if ($status) {
		echo json_encode($status);
	} else {
		echo json_encode(0);
	}
}
if (isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNonComm') {

	$obj_estimatecommornon->listEstimateNonComm();
}

if (isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNonCommComplete') {

	$obj_estimatecommornon->listEstimateNonCommComplete();
}

if (isset($_POST['mode']) && $_POST['mode'] == 'listEstimatenonNonCommT_O_P') {

	$obj_estimatecommornon->listEstimatenonNonCommT_O_P();
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getAllTypes') {

	$stmt = $obj_estimatecommornon->getAllTypes();

	echo json_encode(mysqli_fetch_all($stmt, MYSQLI_ASSOC));
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getSOEditValues') {


	//	$obj_estimatecommornon->setSQId($_POST['soid']);
	$getSQId = $obj_estimatecommornon->getEstimateNonCommById($_POST['soid']);
	$advanceres = $obj_estimatecommornon->getReceiptsadv($_POST['soid'], 0, 'erp_advance_noncomm');

	$datas = mysqli_fetch_array($getSQId);
	$datas['advance'] = 0;

	if ($advanceres) {
		$datas['advance'] = $advanceres;
	}
	// $datas['receipts']=0;

	// Ensure $receiptsres is defined before use
	if (!isset($receiptsres)) {
		$receiptsres = null; // Default value (could also be an empty array or other fallback)
	}

	$datas['receipts'] = 0;

	if ($receiptsres) {
		$datas['receipts'] = $receiptsres;
	}



	$bulkPay = $obj_estimatecommornon->getbulkPayment($_POST['soid'], 'erp_estimate_noncomm', 'erp_advance_bill_noncomm');

	$datas['bulkPay'] = 0;

	if ($bulkPay) {
		$datas['bulkPay'] = $bulkPay;
	}

	//	$obj_obj_estimatecommornonso->setSQId($_POST['soid']);
	$scproduct = array();
	$getSQProducts = $obj_estimatecommornon->getEstimateNonCommProductByPROId($_POST['soid']);

	while ($datass = mysqli_fetch_array($getSQProducts)) {
		//	$obj_so->setSQId($_POST['soid']);
		$getSQProduct = $obj_estimatecommornon->getEstimateNonCommProductById($datass['PK_ESP_ID']);
		while ($data = mysqli_fetch_array($getSQProduct)) {
			$scproduct[] = $data;
		}
	}

	echo json_encode(array($datas, $scproduct));
}
//Customer Listing
if (isset($_POST['mode']) && $_POST['mode'] == 'getCustomerListing') {
	$getcustomerlist = $obj_cus->getCustomerListing();
	$customer = array();
	while ($data = mysqli_fetch_array($getcustomerlist)) {
		$customer[] = $data;
	}
	echo json_encode($customer);
}
//Product Listing

if (isset($_POST['mode']) && $_POST['mode'] == 'getProductListing') {
	$getProductListing = $obj_product->getAllProducts();
	$getProduct = array();
	while ($data = mysqli_fetch_array($getProductListing)) {
		$getProduct[] = $data;
	}
	echo json_encode(array($getProduct));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getCategoryListing') {
	$getCategoryListingData = $obj_estimatecommornon->getCategoryListingData();
	$getinnersheet = array();
	while ($data = mysqli_fetch_array($getCategoryListingData)) {
		$getinnersheet[] = $data;
	}
	echo json_encode(array($getinnersheet));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getInnerSheetListing') {
	$getInnerSheetData = $obj_estimatecommornon->getInnerSheetData();
	$getinnersheet = array();
	while ($data = mysqli_fetch_array($getInnerSheetData)) {
		$getinnersheet[] = $data;
	}
	echo json_encode(array($getinnersheet));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getSpecialEffectsListing') {
	$getAllSpecialEffectsdata = $obj_estimatecommornon->getAllSpecialEffectsData();
	$getSpeicalEffects = array();
	while ($data = mysqli_fetch_array($getAllSpecialEffectsdata)) {
		$getSpeicalEffects[] = $data;
	}
	echo json_encode(array($getSpeicalEffects));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getSizeListing') {
	$getAllSizeData = $obj_estimatecommornon->getAllSizeData();
	$getsize = array();
	while ($data = mysqli_fetch_array($getAllSizeData)) {
		$getsize[] = $data;
	}
	echo json_encode(array($getsize));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getBagListing') {
	$getAllBagData = $obj_estimatecommornon->getAllBagData();
	$getbag = array();
	while ($data = mysqli_fetch_array($getAllBagData)) {
		$getbag[] = $data;
	}
	echo json_encode(array($getbag));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getBoxListing') {
	$getAllBoxData = $obj_estimatecommornon->getAllBoxData();
	$getbox = array();
	while ($data = mysqli_fetch_array($getAllBoxData)) {
		$getbox[] = $data;
	}
	echo json_encode(array($getbox));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getPadListing') {
	$getAllPadData = $obj_estimatecommornon->getAllPadData();
	$getpad = array();
	while ($data = mysqli_fetch_array($getAllPadData)) {
		$getpad[] = $data;
	}
	echo json_encode(array($getpad));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getItemListing') {
	/*	var_dump($_POST);
		exit;*/

	$getAllItemData = $obj_estimatecommornon->getAllItemData();
	$getitem = array();
	while ($data = mysqli_fetch_array($getAllItemData)) {
		$getitem[] = $data;
	}
	echo json_encode(array($getitem));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getInnersheet_id') {
	$getInnersheet_id = $obj_estimatecommornon->getInnersheet_id();
	$getInnersheet = array();
	while ($data = mysqli_fetch_array($getInnersheet_id)) {
		$getInnersheet[] = $data;
	}
	echo json_encode(array($getInnersheet));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getSOValues') {

	//	$obj_estimatecommornon->setSQId($_POST['soid']);
	$getSQId = $obj_estimatecommornon->getEstimateNonCommById($_POST['soid']);

	$datas = mysqli_fetch_array($getSQId);

	//	$obj_estimatecommornon->setSQId($_POST['soid']);
	$scproduct = array();
	$getSQProducts = $obj_estimatecommornon->getEstimateNonCommProductByPROId($_POST['soid']);

	while ($datass = mysqli_fetch_array($getSQProducts)) {
		//$obj_estimatecommornon->setSQId($_POST['soid']);

		$getSQProduct = $obj_estimatecommornon->getEstimateNonCommProductById($datass['PK_ESP_ID']);
		while ($data = mysqli_fetch_array($getSQProduct)) {
			$scproduct[] = $data;
		}
	}


	echo json_encode(array($datas, $scproduct));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getComercialorNonItemsType') {

	$getComercialItemsType = $obj_estimatecommornon->getComercialorNonItemsType();
	$getitem = array();
	while ($data = mysqli_fetch_array($getComercialItemsType)) {
		$getitem[] = $data;
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
if (isset($_POST['mode']) && $_POST['mode'] == 'getCostListing') {
	/*	var_dump($_POST);
			exit;*/
	$costvals = 0;
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

	if (mysqli_num_rows($costval)  > 0) {
		$costvaldata = mysqli_fetch_array($costval);
		if ($_POST['costtype']  == 1) {
			$costvals =	$costvaldata['first_price'];
		} else if ($_POST['costtype']  == 2) {
			$costvals =	$costvaldata['second_price'];
		}
	}
	/*}*/


	/*
			$getitem=array();
			while($data=mysqli_fetch_array($getAllItemData)) {
				$getitem[]=$data;
			}	*/
	echo json_encode($costvals);

	mysqli_close($GLOBALS["___mysqli_ston"]);
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getAllCities') {
	$getAllCities = $obj_estimatecommornon->getAllCities();
	while ($data = mysqli_fetch_array($getAllCities)) {
		$cities[] = $data;
	}
	echo json_encode($cities);
}
if (isset($_POST['mode']) && $_POST['mode'] == 'cancelNonCommRecord') {

	$InsertEstimateNonComm = $obj_estimatecommornon->InsertEstimateNonComm();


	$InsertEstimateNonCommProduct = $obj_estimatecommornon->InsertEstimateNonCommProduct();

	if ($InsertEstimateNonComm  && $InsertEstimateNonCommProduct) {
		$cancelEstimateNonComm = $obj_estimatecommornon->cancelEstimateNonComm();
		$cancelEstimateNonCommProduct = $obj_estimatecommornon->cancelEstimateNonCommProduct();
	} else {
		echo 0;
	}
	echo 1;
}

// if (isset($_POST['mode']) && $_POST['mode'] == 'cancelCommRecordtest') {

// 	$InsertEstimateNonComm = $obj_estimatecommornon->InsertEstimateNonComm();
// 	$updateReasondataNonComm = $obj_estimatecommornon->updateReasondataNonComm();

// 	$InsertEstimateNonCommProduct = $obj_estimatecommornon->InsertEstimateNonCommProduct();
// 	if ($InsertEstimateNonComm  > 0 && $InsertEstimateNonCommProduct > 0) {

// 		$cancelEstimateNonComm = $obj_estimatecommornon->cancelEstimateNonComm();
// 		$cancelEstimateNonCommProduct = $obj_estimatecommornon->cancelEstimateNonCommProduct();
// 	} else {
// 		echo 0;
// 	}
// 	echo 1;
// }
if (isset($_POST['mode']) && $_POST['mode'] == 'cancelCommRecordtest') {

    mysqli_begin_transaction($GLOBALS["___mysqli_ston"]);

    try {

        $InsertEstimateNonComm = $obj_estimatecommornon->InsertEstimateNonComm();
        $InsertEstimateNonCommProduct = $obj_estimatecommornon->InsertEstimateNonCommProduct();

        if ($InsertEstimateNonComm > 0 && $InsertEstimateNonCommProduct > 0) {

            $obj_estimatecommornon->updateReasondataNonComm();

            $cancel1 = $obj_estimatecommornon->cancelEstimateNonComm();
            $cancel2 = $obj_estimatecommornon->cancelEstimateNonCommProduct();

            if ($cancel1 && $cancel2) {
                mysqli_commit($GLOBALS["___mysqli_ston"]);
                echo 1;
            } else {
                throw new Exception("Cancel failed");
            }

        } else {
            throw new Exception("Insert failed");
        }

    } catch (Exception $e) {
    mysqli_rollback($GLOBALS["___mysqli_ston"]);
    echo "ERROR: " . $e->getMessage();
}
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getSOEditValuescancel') {



	//	$obj_estimatecommornon->setSQId($_POST['soid']);
	$getSQId = $obj_estimatecommornon->getEstimateNonCommByIdcancel($_POST['soid']);
	$advanceres = $obj_estimatecommornon->getReceiptsadv($_POST['soid'], 0, 'erp_advance_noncomm');

	$datas = mysqli_fetch_array($getSQId);
	$datas['advance'] = 0;

	if ($advanceres) {
		$datas['advance'] = $advanceres;
	}

	//	$obj_obj_estimatecommornonso->setSQId($_POST['soid']);
	$scproduct = array();
	$getSQProducts = $obj_estimatecommornon->getEstimateNonCommProductByPROIdcancel($_POST['soid']);

	while ($datass = mysqli_fetch_array($getSQProducts)) {
		//	$obj_so->setSQId($_POST['soid']);
		$getSQProduct = $obj_estimatecommornon->getEstimateNonCommProductByIdcancel($datass['PK_ESP_ID']);
		while ($data = mysqli_fetch_array($getSQProduct)) {
			$scproduct[] = $data;
		}
	}

	echo json_encode(array($datas, $scproduct));
}

if (isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNonCommCancelled') {

	$data = $obj_estimatecommornon->listEstimateNonCommCancelled();
}


if (isset($GLOBALS["___mysqli_ston"]) && $GLOBALS["___mysqli_ston"] instanceof mysqli) {
	try {
		// Check if the connection is active.
		if ($GLOBALS["___mysqli_ston"]->ping()) {
			mysqli_close($GLOBALS["___mysqli_ston"]);
		} else {
			error_log("MySQL connection is not active, cannot close.");
		}
	} catch (Throwable $e) {
		error_log("Error checking or closing MySQL connection: " . $e->getMessage());
	}
} else {
	error_log("MySQL connection object is not valid or already closed.");
}
