<?php

// error_reporting(E_ALL);


session_start();

include "../../includes/db_config.php";

include "../../classes/class_invoice_commornon.php";

include "../../classes/class_sale_order.php";

include("../../classes/class_estimate_commornon.php");


$obj_invoicecommornon = new Invoice_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');



$obj_estimatecommornon = new Estimate_commornon('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''. '', '');



if (isset($_POST['mode']) && $_POST['mode'] == 'addSalesInvoice') {

    //var_dump($_POST);

    //exit;
    /*
    $lastSOID = $obj_invoicecommornon->Sales_Invoice_lastinserted_id();

    $sCid = $lastSOID + 1;

    $newSQid = sprintf("%05s", $sCid);



    $previousYr = date("y", strtotime("-1 year")); //last year

    $nextYr = date('y', strtotime('+1 year'));


    $finYr = date('Y');

    $soNum = 'ORD-' . $newSQid;

    */

    $lastSOID = $obj_invoicecommornon->Sales_Invoice_last();
    $previousYr = date("y", strtotime("-1 year"));  //last year 
    $nextYr = date('y', strtotime('+1 year'));
    $year = substr(date('y'), 0, 2);
    if (date('m') < 4) {
        $finacial_year = $year;
    } else {
        $finacial_year = $year;
    }
    if (mysqli_num_rows($lastSOID) > 0) {
        $fileData = mysqli_fetch_array($lastSOID);
        $value2 = '';
        if ($row = $fileData) {

            //	echo $row['sono'];
            $value2 = $row['eno'];
            $value2 = substr($value2, 7, 11); //separating numeric part


            $sonoval = $row['eno'];
            $sonovalID = substr($sonoval, 4, 2); //separating numeric part


            if ($sonovalID != date('y')) {
                $soNum = "ORD-" . $finacial_year . "-" . sprintf('%04s', 1);
            } else {
                $value2 = $value2 + 1; //Incrementing numeric part
                $value2 = "ORD-" . $finacial_year . "-" . sprintf('%04s', $value2); //concatenating incremented value
                $soNum = $value2;
            }
        }
    } else {
        $soNum = "ORD-" . $finacial_year . "-" . sprintf('%04s', 1);
    }

    $txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);



    $so_id = $_POST['txt_sc_no'];





    $obj_invoicecommornon->seteno($soNum);

    $obj_invoicecommornon->setso_id($so_id);

    //$obj_invoicecommornon->setsono($soNum);

    $obj_invoicecommornon->setsdate(date('Y-m-d', strtotime($txt_pi_date)));

    $obj_invoicecommornon->setcustomer_id($_POST['txt_customer_name']);



    $obj_invoicecommornon->setcity($_POST['txt_customer_city']);

    $obj_invoicecommornon->setpaymenttype($_POST['txt_payment_type']);

    $obj_invoicecommornon->setremark($_POST['txt_remarks']);

    $obj_invoicecommornon->setgsttype($_POST['txt_intstate']);



    $txt_delivery_date = str_replace('/', '-', $_POST['txt_delivery_date']);

    $obj_invoicecommornon->setshipment_to(date('Y-m-d', strtotime($txt_delivery_date)));

    $obj_invoicecommornon->setreference_number($_POST['txt_state']);

    $obj_invoicecommornon->setproduct_id($_POST['txt_franchise']);

    $obj_invoicecommornon->setcustom_value($_POST['txt_streetarea']);



    //$obj_estimatecommornon->setreference_number($_POST['txt_reference_number']);

    /*$obj_estimatecommornon->setshipment_from($_POST['txt_shipment_from']);

	$obj_estimatecommornon->setshipment_to($_POST['txt_shipment_to']);

	$obj_estimatecommornon->setapproval_status($_POST['txt_approved']);*/





    $obj_invoicecommornon->setdiscount_field1($_POST['discount_field1']);

    $obj_invoicecommornon->setdiscount_final1($_POST['discount_final1']);

    $obj_invoicecommornon->setdiscount_final_amt1($_POST['discount_final_amt1']);

    $obj_invoicecommornon->setdiscount_type1($_POST['discount_type1']);

    $obj_invoicecommornon->setcaltype1($_POST['txt_cal_type1']);



    $obj_invoicecommornon->setdiscount_field2($_POST['discount_field2']);

    $obj_invoicecommornon->setdiscount_final2($_POST['discount_final2']);

    $obj_invoicecommornon->setdiscount_final_amt2($_POST['discount_final_amt2']);

    $obj_invoicecommornon->setdiscount_type2($_POST['discount_type2']);

    $obj_invoicecommornon->setcaltype2($_POST['txt_cal_type2']);



    $obj_invoicecommornon->setdiscount_field3($_POST['discount_field3']);

    $obj_invoicecommornon->setdiscount_final3($_POST['discount_final3']);

    $obj_invoicecommornon->setdiscount_final_amt3($_POST['discount_final_amt3']);

    $obj_invoicecommornon->setdiscount_type3($_POST['discount_type3']);

    $obj_invoicecommornon->setcaltype3($_POST['txt_cal_type3']);





    //  $obj_estimatecommornon->setdiscount_field4($_POST['discount_field4']);

    $obj_invoicecommornon->setdiscount_final4($_POST['discount_final4']);

    $obj_invoicecommornon->setdiscount_final_amt4($_POST['discount_final_amt4']);

    // $obj_estimatecommornon->setdiscount_type4($_POST['discount_type4']);

    //$obj_estimatecommornon->setcaltype4($_POST['txt_cal_type4']);





    // $obj_estimatecommornon->setdiscount_field5($_POST['discount_field5']);

    // $obj_estimatecommornon->setdiscount_final5($_POST['discount_final5']);

    //  $obj_estimatecommornon->setdiscount_type5($_POST['discount_type5']);

    $obj_invoicecommornon->setdiscount_final_amt5($_POST['discount_final_amt5']);



    $obj_invoicecommornon->setgrand_total($_POST['txt_grand_total']);

    /*  $gst_per = (isset($_POST['gst_per'])) ? $_POST['gst_per'] : '0';

    $gst_total = (isset($_POST['gst_total'])) ? $_POST['gst_total'] : '0';

    $obj_invoicecommornon->setgst($gst_per);

    $obj_invoicecommornon->setgst_total($gst_total);*/



    if ($_POST['txt_state'] == 33) {

        $cgst_per = (isset($_POST['cgst_per'])) ? $_POST['cgst_per'] : '0';

        $cgst_total = (isset($_POST['cgst_total'])) ? $_POST['cgst_total'] : '0';

        $obj_invoicecommornon->setcgst($cgst_per);

        $obj_invoicecommornon->setcgst_amt($cgst_total);



        $sgst_per = (isset($_POST['sgst_per'])) ? $_POST['sgst_per'] : '0';

        $sgst_total = (isset($_POST['sgst_total'])) ? $_POST['sgst_total'] : '0';

        $obj_invoicecommornon->setcgst_final($sgst_per);

        $obj_invoicecommornon->setcgst_amt_final($sgst_total);
    } else {



        $igst_per = (isset($_POST['igst_per'])) ? $_POST['igst_per'] : '0';

        $igst_total = (isset($_POST['igst_total'])) ? $_POST['igst_total'] : '0';

        $obj_invoicecommornon->setcgst($igst_per);

        $obj_invoicecommornon->setcgst_amt($igst_total);
    }

    $obj_invoicecommornon->setitem_total($_POST['txt_item_total']);



    $seid = $obj_invoicecommornon->addSalesInvoice();



    $statusPaidorder = 6;

    $statusdate = date('Y-m-d', strtotime($txt_pi_date));



    $obj_estimatecommornon->changecommPaidorder($_POST['txt_sc_no'], $statusPaidorder);

    $obj_estimatecommornon->changecommPaidorderstatus($_POST['txt_sc_no'], $statusPaidorder, $statusdate);



    //var_dump($soid);

    //exit;

    for ($i = 0; $i < count($_POST['txt_item']); $i++) {

        $obj_invoicecommornon->setpk_id($seid);

        //$obj_invoicecommornon->setso_id($soid);

        //    $obj_invoicecommornon->setproduct_id($_POST['txt_product_name'][$i]);

        $obj_invoicecommornon->setitem_id($_POST['txt_item'][$i]);

        $obj_invoicecommornon->setqty($_POST['txt_product_qty'][$i]);

        $obj_invoicecommornon->setpricetype($_POST['txt_price_type'][$i]);

        $obj_invoicecommornon->setorientation(0);

        //$obj_invoicecommornon->setorientation($_POST['txt_orientation'][$i]);

        $obj_invoicecommornon->setprice($_POST['txt_price'][$i]);

        $obj_invoicecommornon->setfinal_total($_POST['txt_final_total'][$i]);

        $status = $obj_invoicecommornon->addSalesInvoiceProduct();
    }

    $obj_invoicecommornon->updateSOStatus($so_id);

    if ($status) {

        echo json_encode($status);
    } else {

        echo json_encode(0);
    }
}



if (isset($_POST['mode']) && $_POST['mode'] == 'updateSalesInvoice') {





    $txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);

    $so_id = $_POST['txt_sc_no'];



    $obj_invoicecommornon->setso_id($so_id);

    //$obj_invoicecommornon->setsono($soNum);

    $obj_invoicecommornon->setsdate(date('Y-m-d', strtotime($txt_pi_date)));

    $obj_invoicecommornon->setcustomer_id($_POST['txt_customer_name']);



    $obj_invoicecommornon->setcity($_POST['txt_customer_city']);

    $obj_invoicecommornon->setpaymenttype($_POST['txt_payment_type']);

    $obj_invoicecommornon->setremark($_POST['txt_remarks']);

    $obj_invoicecommornon->setgsttype($_POST['txt_intstate']);



    $txt_delivery_date = str_replace('/', '-', $_POST['txt_delivery_date']);

    $obj_invoicecommornon->setshipment_to(date('Y-m-d', strtotime($txt_delivery_date)));

    $obj_invoicecommornon->setreference_number($_POST['txt_state']);

    $obj_invoicecommornon->setproduct_id($_POST['txt_franchise']);

    $obj_invoicecommornon->setcustom_value($_POST['txt_streetarea']);



    //$obj_estimatecommornon->setreference_number($_POST['txt_reference_number']);

    /*$obj_estimatecommornon->setshipment_from($_POST['txt_shipment_from']);

	$obj_estimatecommornon->setshipment_to($_POST['txt_shipment_to']);

	$obj_estimatecommornon->setapproval_status($_POST['txt_approved']);*/



    $obj_invoicecommornon->setdiscount_field1($_POST['discount_field1']);

    $obj_invoicecommornon->setdiscount_final1($_POST['discount_final1']);

    $obj_invoicecommornon->setdiscount_final_amt1($_POST['discount_final_amt1']);

    $obj_invoicecommornon->setdiscount_type1($_POST['discount_type1']);

    $obj_invoicecommornon->setcaltype1($_POST['txt_cal_type1']);



    $obj_invoicecommornon->setdiscount_field2($_POST['discount_field2']);

    $obj_invoicecommornon->setdiscount_final2($_POST['discount_final2']);

    $obj_invoicecommornon->setdiscount_final_amt2($_POST['discount_final_amt2']);

    $obj_invoicecommornon->setdiscount_type2($_POST['discount_type2']);

    $obj_invoicecommornon->setcaltype2($_POST['txt_cal_type2']);



    $obj_invoicecommornon->setdiscount_field3($_POST['discount_field3']);

    $obj_invoicecommornon->setdiscount_final3($_POST['discount_final3']);

    $obj_invoicecommornon->setdiscount_final_amt3($_POST['discount_final_amt3']);

    $obj_invoicecommornon->setdiscount_type3($_POST['discount_type3']);

    $obj_invoicecommornon->setcaltype3($_POST['txt_cal_type3']);





    //  $obj_estimatecommornon->setdiscount_field4($_POST['discount_field4']);

    $obj_invoicecommornon->setdiscount_final4($_POST['discount_final4']);

    $obj_invoicecommornon->setdiscount_final_amt4($_POST['discount_final_amt4']);

    // $obj_estimatecommornon->setdiscount_type4($_POST['discount_type4']);

    //$obj_estimatecommornon->setcaltype4($_POST['txt_cal_type4']);





    // $obj_estimatecommornon->setdiscount_field5($_POST['discount_field5']);

    // $obj_estimatecommornon->setdiscount_final5($_POST['discount_final5']);

    //  $obj_estimatecommornon->setdiscount_type5($_POST['discount_type5']);

    $obj_invoicecommornon->setdiscount_final_amt5($_POST['discount_final_amt5']);



    $obj_invoicecommornon->setgrand_total($_POST['txt_grand_total']);

    /*  $gst_per = (isset($_POST['gst_per'])) ? $_POST['gst_per'] : '0';

    $gst_total = (isset($_POST['gst_total'])) ? $_POST['gst_total'] : '0';

    $obj_invoicecommornon->setgst($gst_per);

    $obj_invoicecommornon->setgst_total($gst_total);*/



    if ($_POST['txt_state'] == 33) {

        $cgst_per = (isset($_POST['cgst_per'])) ? $_POST['cgst_per'] : '0';

        $cgst_total = (isset($_POST['cgst_total'])) ? $_POST['cgst_total'] : '0';

        $obj_invoicecommornon->setcgst($cgst_per);

        $obj_invoicecommornon->setcgst_amt($cgst_total);



        $sgst_per = (isset($_POST['sgst_per'])) ? $_POST['sgst_per'] : '0';

        $sgst_total = (isset($_POST['sgst_total'])) ? $_POST['sgst_total'] : '0';

        $obj_invoicecommornon->setcgst_final($sgst_per);

        $obj_invoicecommornon->setcgst_amt_final($sgst_total);
    } else {



        $igst_per = (isset($_POST['igst_per'])) ? $_POST['igst_per'] : '0';

        $igst_total = (isset($_POST['igst_total'])) ? $_POST['igst_total'] : '0';

        $obj_invoicecommornon->setcgst($igst_per);

        $obj_invoicecommornon->setcgst_amt($igst_total);
    }

    $obj_invoicecommornon->setitem_total($_POST['txt_item_total']);



    $seid = $obj_invoicecommornon->updateSalesInvoice($_POST['txt_se_id']);

    $obj_invoicecommornon->deleteComInvoiceProduct($_POST['txt_se_id']);



    for ($i = 0; $i < count($_POST['txt_item']); $i++) {



        $obj_invoicecommornon->setpk_id($_POST['txt_se_id']);

        //$obj_invoicecommornon->setso_id($soid);

        $obj_invoicecommornon->setitem_id($_POST['txt_item'][$i]);

        $obj_invoicecommornon->setqty($_POST['txt_product_qty'][$i]);

        $obj_invoicecommornon->setpricetype($_POST['txt_price_type'][$i]);

        $obj_invoicecommornon->setorientation(0);

        //$obj_invoicecommornon->setorientation($_POST['txt_orientation'][$i]);

        $obj_invoicecommornon->setprice($_POST['txt_price'][$i]);

        $obj_invoicecommornon->setfinal_total($_POST['txt_final_total'][$i]);

        $status = $obj_invoicecommornon->addSalesInvoiceProduct();
    }

    if ($status) {

        echo json_encode($status);
    } else {

        echo json_encode(0);
    }
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getJobOrder') {

    $obj_invoicecommornon->setcustomer_id($_POST['id']);

    // $obj_invoicecommornon->settypes($_POST['types']);

    $status = $obj_invoicecommornon->getJobOrder();

    echo json_encode($status);
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getJobOrderEdit') {

    $obj_invoicecommornon->setcustomer_id($_POST['id']);

    $obj_invoicecommornon->setso_id($_POST['so_id']);

    $status = $obj_invoicecommornon->getJobOrderEdit();

    echo json_encode($status);
}



if (isset($_POST['mode']) && $_POST['mode'] == 'listInvoice') {



    $status = $obj_invoicecommornon->listSalesInvoice();
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getSOValues') {



    $soid = $_POST['soid'];



    $getSOId = $obj_estimatecommornon->getSalesOrderById($soid);



    $datas = mysqli_fetch_array($getSOId);

    $scproduct = array();

    if (!empty($datas)) {



        $getSOProducts = $obj_estimatecommornon->getSalesOrderProductByPROId($soid);



        while ($datass = mysqli_fetch_array($getSOProducts)) {

            $sop_id = $datass['PK_ESP_ID'];

            //$obj_saleorder->setSQId($_POST['soid']);

            $getSOProduct = $obj_estimatecommornon->getSalesOrderProductById($sop_id);

            while ($data = mysqli_fetch_array($getSOProduct)) {

                $scproduct[] = $data;
            }
        }
    }



    echo json_encode(array($datas, $scproduct));
}



if (isset($_POST['mode']) && $_POST['mode'] == 'getSIEditValues') {



    $getSEId = $obj_invoicecommornon->getSalesInvoiceById($_POST['eid']);



    $datas = mysqli_fetch_array($getSEId);



    $scproduct = array();

    if (!empty($datas)) {

        $getSEProducts = $obj_invoicecommornon->getSalesInvoiceProductByPROId($_POST['eid']);



        while ($datass = mysqli_fetch_array($getSEProducts)) {



            $getSEProduct = $obj_invoicecommornon->getSalesInvoiceProductById($datass['PK_SEP_ID']);

            while ($data = mysqli_fetch_array($getSEProduct)) {

                $scproduct[] = $data;
            }
        }
    }

    echo json_encode(array($datas, $scproduct));
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getAllCities') {

    $getAllCities = $obj_invoicecommornon->getAllCities();

    while ($data = mysqli_fetch_array($getAllCities)) {

        $cities[] = $data;
    }

    echo json_encode($cities);
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getComercialorNonItemsType') {



    $getComercialItemsType = $obj_invoicecommornon->getComercialorNonItemsType();

    $getitem = array();

    while ($data = mysqli_fetch_array($getComercialItemsType)) {

        $getitem[] = $data;
    }

    echo json_encode(array($getitem));
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getCostListing') {



    $costvals = 0;



    $costval =    $obj_invoicecommornon->getCostProduct();

    $costvaldata = mysqli_fetch_array($costval);

    if ($_POST['costtype']  == 1) {

        $costvals =    $costvaldata['first_price'];
    } else if ($_POST['costtype']  == 2) {

        $costvals =    $costvaldata['second_price'];
    }



    echo json_encode($costvals);
}

mysqli_close($GLOBALS["___mysqli_ston"]);