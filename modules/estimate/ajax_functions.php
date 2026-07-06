<?php
//error_reporting(E_ALL);

session_start();
include "../../includes/db_config.php";
include "../../classes/class_sale_estimate.php";
include "../../classes/class_sale_order.php";
include "../../classes/class_sales_invoice.php";

$obj_saleestimate = new Estimate('', '', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$obj_saleinvoice = new Sales_Invoice('', '', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

if (isset($_POST['mode']) && $_POST['mode'] == 'addSalesEstimate') {
    $lastSOID = $obj_saleestimate->Sales_Estimate_lastinserted_id();
    $sCid = $lastSOID + 1;
    $newSQid = sprintf("%05s", $sCid);

    $previousYr = date("y", strtotime("-1 year")); //last year
    $nextYr = date('y', strtotime('+1 year'));
   /* $year = substr(date('Y'), 0, 2);
    if (date('m') < 4) {
        $finYr = $previousYr . $year;
    } else {
        $finYr = $year . $nextYr;
    }*/
   // $soNum = 'ERPSE/' . $finYr . '/' . $newSQid;
    $finYr = date('Y');
    $soNum = 'AV/' . $finYr . '/' . $newSQid;
    $txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);

    $so_id = implode('#', $_POST['txt_sc_no']);

    $obj_saleestimate->seteno($soNum);
    $obj_saleestimate->setso_id($so_id);
    //$obj_saleestimate->setsono($soNum);
    $obj_saleestimate->setsdate(date('Y-m-d', strtotime($txt_pi_date)));
    $obj_saleestimate->setcustomer_id($_POST['txt_customer_name']);
    $obj_saleestimate->setorientation($_POST['txt_orientation']);
	$obj_saleestimate->settypes($_POST['txt_types']);
	$obj_saleestimate->setpaymenttype($_POST['txt_payment_type']);
	$obj_saleestimate->setpricetype($_POST['txt_price_type']);
    $obj_saleestimate->setcity($_POST['txt_customer_city']);
    $obj_saleestimate->setdiscount_final($_POST['discount_final']);
    $obj_saleestimate->setdiscount_final_amt($_POST['discount_final_amt']);
    $obj_saleestimate->setgrand_total($_POST['txt_grand_total']);
    $gst_per = (isset($_POST['gst_per'])) ? $_POST['gst_per'] : '0';
    $gst_total = (isset($_POST['gst_total'])) ? $_POST['gst_total'] : '0';
    $obj_saleestimate->setgst($gst_per);
    $obj_saleestimate->setgst_total($gst_total);
    $obj_saleestimate->setitem_total($_POST['txt_item_total']);



/*$obj_saleorder->setcgst_amt_final($_POST['txt_cgst_amt_final']);
	$obj_saleorder->setsgst_amt_final($_POST['txt_sgst_amt_final']);
	$obj_saleorder->setigst_amt_final($_POST['txt_igst_amt_final']);
	$obj_saleorder->setgst_total($_POST['txt_gst_total']);*/


    $seid = $obj_saleestimate->addSalesEstimate();

//var_dump($soid);
    //exit;
    for ($i = 0; $i < count($_POST['txt_itemtypes']); $i++) {
        $obj_saleestimate->setpk_id($seid);
        //$obj_saleestimate->setso_id($soid);
        $obj_saleestimate->setproduct_id($_POST['txt_product_name'][$i]);
        $obj_saleestimate->setcategory_id($_POST['txt_category'][$i]);
        $obj_saleestimate->settypes_id($_POST['txt_itemtypes'][$i]);
		$obj_saleestimate->setitem_id($_POST['txt_item'][$i]);

        $obj_saleestimate->setqty($_POST['txt_product_qty'][$i]);
        $obj_saleestimate->setprice($_POST['txt_price'][$i]);
        $obj_saleestimate->setfinal_total($_POST['txt_final_total'][$i]);

        $status = $obj_saleestimate->addSalesEstimateProduct();
    }
    $soid = implode(',', $_POST['txt_sc_no']);

    $obj_saleestimate->updateSOStatus($so_id);
    if ($status) {
       

        echo json_encode($status);
    } else {
        echo json_encode(0);
    }
}

if (isset($_POST['mode']) && $_POST['mode'] == 'updateSalesEstimate') {


    $txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);
    $so_id = implode('#', $_POST['txt_sc_no']);

	$obj_saleestimate->setso_id($so_id);
    //$obj_saleestimate->setsono($soNum);
    $obj_saleestimate->setsdate(date('Y-m-d', strtotime($txt_pi_date)));
    $obj_saleestimate->setcustomer_id($_POST['txt_customer_name']);

    $obj_saleestimate->setorientation($_POST['txt_orientation']);
	$obj_saleestimate->settypes($_POST['txt_types']);
	$obj_saleestimate->setpaymenttype($_POST['txt_payment_type']);
	$obj_saleestimate->setpricetype($_POST['txt_price_type']);
   // $obj_saleestimate->setreference_number($_POST['txt_reference_number']);
   $obj_saleestimate->setcity($_POST['txt_customer_city']);

    $obj_saleestimate->setdiscount_final($_POST['discount_final']);
    $obj_saleestimate->setdiscount_final_amt($_POST['discount_final_amt']);
    $obj_saleestimate->setgrand_total($_POST['txt_grand_total']);
    $gst_per = (isset($_POST['gst_per'])) ? $_POST['gst_per'] : '0';
    $gst_total = (isset($_POST['gst_total'])) ? $_POST['gst_total'] : '0';
    $obj_saleestimate->setgst($gst_per);
    $obj_saleestimate->setgst_total($gst_total);
    $obj_saleestimate->setitem_total($_POST['txt_item_total']);

    $seid = $obj_saleestimate->updateSalesEstimate($_POST['txt_se_id']);
    $obj_saleestimate->deleteSalesEstimateProduct($_POST['txt_se_id']);

    for ($i = 0; $i < count($_POST['txt_itemtypes']); $i++) {

		$obj_saleestimate->setpk_id($_POST['txt_se_id']);
        $obj_saleestimate->setproduct_id($_POST['txt_product_name'][$i]);
        $obj_saleestimate->setcategory_id($_POST['txt_category'][$i]);
        $obj_saleestimate->settypes_id($_POST['txt_itemtypes'][$i]);
		$obj_saleestimate->setitem_id($_POST['txt_item'][$i]);
        //$obj_saleestimate->setso_id($soid);
        $obj_saleestimate->setqty($_POST['txt_product_qty'][$i]);
        $obj_saleestimate->setprice($_POST['txt_price'][$i]);
        $obj_saleestimate->setfinal_total($_POST['txt_final_total'][$i]);
        $status = $obj_saleestimate->addSalesEstimateProduct();
    }
    if ($status) {
        echo json_encode($status);
    } else {
        echo json_encode(0);
    }
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getJobOrder') {
    $obj_saleestimate->setcustomer_id($_POST['id']);
    $obj_saleestimate->settypes($_POST['types']);

    $status = $obj_saleestimate->getJobOrder();
    echo json_encode($status);
}
if (isset($_POST['mode']) && $_POST['mode'] == 'getJobOrderEdit') {
    $obj_saleestimate->setcustomer_id($_POST['id']);
    $obj_saleestimate->settypes($_POST['types']);
    $status = $obj_saleestimate->getJobOrderEdit();
    echo json_encode($status);
}
if (isset($_POST['mode']) && $_POST['mode'] == 'listEstimate') {

    $status = $obj_saleestimate->listSalesEstimate();
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getSOValues') {

    $soid = implode(',', $_POST['soid']);

    $getSOId = $obj_saleorder->getSalesOrderById($soid);

    $datas = mysqli_fetch_array($getSOId);
    $scproduct = array();
    if (!empty($datas)) {

        $getSOProducts = $obj_saleorder->getSalesOrderProductByPROId($soid);

        while ($datass = mysqli_fetch_array($getSOProducts)) {
            $sop_id = $datass['pk_sop_id'];
            //$obj_saleorder->setSQId($_POST['soid']);
            $getSOProduct = $obj_saleorder->getSalesOrderProductById($sop_id);
            while ($data = mysqli_fetch_array($getSOProduct)) {
                $scproduct[] = $data;
            }
        }
    }

    echo json_encode(array($datas, $scproduct));
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getSEEditValues') {

    $getSEId = $obj_saleestimate->getSalesEstimateById($_POST['eid']);

    $datas = mysqli_fetch_array($getSEId);

    $scproduct = array();
    if (!empty($datas)) {
        $getSEProducts = $obj_saleestimate->getSalesEstimateProductByPROId($_POST['eid']);

        while ($datass = mysqli_fetch_array($getSEProducts)) {
            
            $getSEProduct = $obj_saleestimate->getSalesEstimateProductById($datass['PK_SEP_ID']);
            while ($data = mysqli_fetch_array($getSEProduct)) {
                $scproduct[] = $data;
            }

        }
    }
    echo json_encode(array($datas, $scproduct));
}
if (isset($_POST['mode']) && $_POST['mode'] == 'createtoInvoice') {

    $lastSOID = $obj_saleinvoice->Sales_Invoice_lastinserted_id();
    $sCid = $lastSOID + 1;
    $newSQid = sprintf("%05s", $sCid);

    $previousYr = date("y", strtotime("-1 year")); //last year
    $nextYr = date('y', strtotime('+1 year'));
   /* $year = substr(date('Y'), 0, 2);
    if (date('m') < 4) {
        $finYr = $previousYr . $year;
    } else {
        $finYr = $year . $nextYr;
    }
    $soNum = 'ERPSI/' . $finYr . '/' . $newSQid;
*/
    $finYr = date('Y');
    $soNum = 'AV/' . $finYr . '/' . $newSQid;

    $txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);

    $so_id = implode('#', $_POST['txt_sc_no']);
    $obj_saleestimate->seteno($soNum);
    $obj_saleestimate->setpk_id($_POST['id']);

    $SIId = $obj_saleestimate->createtoInvoice();
     $obj_saleestimate->changeEstimateStatus();
    
    $obj_saleestimate->setso_id($SIId);
   $status = $obj_saleestimate->createtoInvoiceProduct();

   if ($status) {
    echo json_encode($status);
} else {
    echo json_encode(0);
}
}

mysqli_close($GLOBALS["___mysqli_ston"]);
?>