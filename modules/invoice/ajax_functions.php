<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);



session_start();

include "../../includes/db_config.php";

include "../../classes/class_sales_invoice.php";

include "../../classes/class_sale_order.php";



$obj_saleestimate = new Sales_Invoice('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');



$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');



if (isset($_POST['mode']) && $_POST['mode'] == 'addSalesInvoice') {

    //var_dump($_POST);

    //exit;

    $lastSOID = $obj_saleestimate->Sales_Invoice_lastinserted_id();

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

    $finYr = date('Y');

    $soNum = 'AV/' . $finYr . '/' . $newSQid;



    $txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);



    $so_id = $_POST['txt_sc_no'];





    $obj_saleestimate->seteno($soNum);

    $obj_saleestimate->setso_id($so_id);

    //$obj_saleestimate->setsono($soNum);

    $obj_saleestimate->setsdate(date('Y-m-d', strtotime($txt_pi_date)));

    $obj_saleestimate->setcustomer_id($_POST['txt_customer_name']);





    $obj_saleestimate->setpaymenttype($_POST['txt_payment_type']);

    $obj_saleestimate->setremark($_POST['txt_remarks']);



    // $obj_saleestimate->setreference_number($_POST['txt_reference_number']);

    $obj_saleestimate->setcity($_POST['txt_customer_city']);



    $obj_saleestimate->setdiscount_field1($_POST['discount_field1']);

    $obj_saleestimate->setdiscount_final1($_POST['discount_final1']);

    $obj_saleestimate->setdiscount_final_amt1($_POST['discount_final_amt1']);

    $obj_saleestimate->setdiscount_type1($_POST['discount_type1']);

    $obj_saleestimate->setcaltype1($_POST['txt_cal_type1']);



    $obj_saleestimate->setdiscount_field2($_POST['discount_field2']);

    $obj_saleestimate->setdiscount_final2($_POST['discount_final2']);

    $obj_saleestimate->setdiscount_final_amt2($_POST['discount_final_amt2']);

    $obj_saleestimate->setdiscount_type2($_POST['discount_type2']);

    $obj_saleestimate->setcaltype2($_POST['txt_cal_type2']);



    $obj_saleestimate->setdiscount_field3($_POST['discount_field3']);

    $obj_saleestimate->setdiscount_final3($_POST['discount_final3']);

    $obj_saleestimate->setdiscount_final_amt3($_POST['discount_final_amt3']);

    $obj_saleestimate->setdiscount_type3($_POST['discount_type3']);

    $obj_saleestimate->setcaltype3($_POST['txt_cal_type3']);





    $obj_saleestimate->setdiscount_field4($_POST['discount_field4']);

    $obj_saleestimate->setdiscount_final4($_POST['discount_final4']);

    $obj_saleestimate->setdiscount_final_amt4($_POST['discount_final_amt4']);

    $obj_saleestimate->setdiscount_type4($_POST['discount_type4']);

    $obj_saleestimate->setcaltype4($_POST['txt_cal_type4']);





    $obj_saleestimate->setdiscount_field5($_POST['discount_field5']);

    $obj_saleestimate->setdiscount_final5($_POST['discount_final5']);

    $obj_saleestimate->setdiscount_final_amt5($_POST['discount_final_amt5']);

    $obj_saleestimate->setdiscount_type5($_POST['discount_type5']);

    $obj_saleestimate->setcaltype5($_POST['txt_cal_type5']);



    $obj_saleestimate->setgrand_total($_POST['txt_grand_total']);

    $gst_per = (isset($_POST['gst_per'])) ? $_POST['gst_per'] : '0';

    $gst_total = (isset($_POST['gst_total'])) ? $_POST['gst_total'] : '0';

    $obj_saleestimate->setgst($gst_per);

    $obj_saleestimate->setgst_total($gst_total);

    $obj_saleestimate->setitem_total($_POST['txt_item_total']);



    $seid = $obj_saleestimate->addSalesInvoice();



    $statusPaidorder = ($_POST['txt_payment_type'] == 1) ? 8 : '';

    $statusdate = date('Y-m-d', strtotime($txt_pi_date));



    $obj_saleorder->changePaidorder($_POST['txt_sc_no'], $statusPaidorder);

    $obj_saleorder->changePaidorderstatus($_POST['txt_sc_no'], $statusPaidorder, $statusdate);



    //var_dump($soid);

    //exit;

    for ($i = 0; $i < count($_POST['txt_itemtypes']); $i++) {

        $obj_saleestimate->setpk_id($seid);

        //$obj_saleestimate->setso_id($soid);

        //    $obj_saleestimate->setproduct_id($_POST['txt_product_name'][$i]);

        $obj_saleestimate->settypes($_POST['txt_types'][$i]);

        $obj_saleestimate->settypes_id($_POST['txt_itemtypes'][$i]);

        $obj_saleestimate->setitem_id($_POST['txt_item'][$i]);

        $obj_saleestimate->setcategory_id($_POST['txt_category'][$i]);

        $obj_saleestimate->setqty($_POST['txt_product_qty'][$i]);

        $obj_saleestimate->setpricetype($_POST['txt_price_type'][$i]);

        $obj_saleestimate->setorientation($_POST['txt_orientation'][$i]);

        $obj_saleestimate->setprice($_POST['txt_price'][$i]);

        $obj_saleestimate->setfinal_total($_POST['txt_final_total'][$i]);



        $status = $obj_saleestimate->addSalesInvoiceProduct();
    }

    $obj_saleestimate->updateSOStatus($so_id);

    if ($status) {

        echo json_encode($status);
    } else {

        echo json_encode(0);
    }
}



if (isset($_POST['mode']) && $_POST['mode'] == 'updateSalesInvoice') {





    $txt_pi_date = str_replace('/', '-', $_POST['txt_pi_date']);

    $so_id = $_POST['txt_sc_no'];



    $obj_saleestimate->setso_id($so_id);

    //$obj_saleestimate->setsono($soNum);

    $obj_saleestimate->setsdate(date('Y-m-d', strtotime($txt_pi_date)));

    $obj_saleestimate->setcustomer_id($_POST['txt_customer_name']);

    $obj_saleestimate->settypes($_POST['txt_types']);

    //  $obj_saleestimate->setreference_number($_POST['txt_reference_number']);

    $obj_saleestimate->setcity($_POST['txt_customer_city']);

    $obj_saleestimate->setpaymenttype($_POST['txt_payment_type']);

    $obj_saleestimate->setremark($_POST['txt_remarks']);



    $obj_saleestimate->setdiscount_field1($_POST['discount_field1']);

    $obj_saleestimate->setdiscount_final1($_POST['discount_final1']);

    $obj_saleestimate->setdiscount_final_amt1($_POST['discount_final_amt1']);

    $obj_saleestimate->setdiscount_type1($_POST['discount_type1']);

    $obj_saleestimate->setcaltype1($_POST['txt_cal_type1']);



    $obj_saleestimate->setdiscount_field2($_POST['discount_field2']);

    $obj_saleestimate->setdiscount_final2($_POST['discount_final2']);

    $obj_saleestimate->setdiscount_final_amt2($_POST['discount_final_amt2']);

    $obj_saleestimate->setdiscount_type2($_POST['discount_type2']);

    $obj_saleestimate->setcaltype2($_POST['txt_cal_type2']);



    $obj_saleestimate->setdiscount_field3($_POST['discount_field3']);

    $obj_saleestimate->setdiscount_final3($_POST['discount_final3']);

    $obj_saleestimate->setdiscount_final_amt3($_POST['discount_final_amt3']);

    $obj_saleestimate->setdiscount_type3($_POST['discount_type3']);

    $obj_saleestimate->setcaltype3($_POST['txt_cal_type3']);





    $obj_saleestimate->setdiscount_field4($_POST['discount_field4']);

    $obj_saleestimate->setdiscount_final4($_POST['discount_final4']);

    $obj_saleestimate->setdiscount_final_amt4($_POST['discount_final_amt4']);

    $obj_saleestimate->setdiscount_type4($_POST['discount_type4']);

    $obj_saleestimate->setcaltype4($_POST['txt_cal_type4']);





    $obj_saleestimate->setdiscount_field5($_POST['discount_field5']);

    $obj_saleestimate->setdiscount_final5($_POST['discount_final5']);

    $obj_saleestimate->setdiscount_final_amt5($_POST['discount_final_amt5']);

    $obj_saleestimate->setdiscount_type5($_POST['discount_type5']);

    $obj_saleestimate->setcaltype5($_POST['txt_cal_type5']);



    $obj_saleestimate->setgrand_total($_POST['txt_grand_total']);

    $gst_per = (isset($_POST['gst_per'])) ? $_POST['gst_per'] : '0';

    $gst_total = (isset($_POST['gst_total'])) ? $_POST['gst_total'] : '0';

    $obj_saleestimate->setgst($gst_per);

    $obj_saleestimate->setgst_total($gst_total);

    $obj_saleestimate->setitem_total($_POST['txt_item_total']);



    $seid = $obj_saleestimate->updateSalesInvoice($_POST['txt_se_id']);

    $obj_saleestimate->deleteSalesInvoiceProduct($_POST['txt_se_id']);



    for ($i = 0; $i < count($_POST['txt_itemtypes']); $i++) {



        $obj_saleestimate->setpk_id($_POST['txt_se_id']);

        //$obj_saleestimate->setso_id($soid);

        $obj_saleestimate->settypes($_POST['txt_types'][$i]);

        $obj_saleestimate->settypes_id($_POST['txt_itemtypes'][$i]);

        $obj_saleestimate->setitem_id($_POST['txt_item'][$i]);

        $obj_saleestimate->setcategory_id($_POST['txt_category'][$i]);

        $obj_saleestimate->setqty($_POST['txt_product_qty'][$i]);

        $obj_saleestimate->setpricetype($_POST['txt_price_type'][$i]);

        $obj_saleestimate->setorientation($_POST['txt_orientation'][$i]);

        $obj_saleestimate->setprice($_POST['txt_price'][$i]);

        $obj_saleestimate->setfinal_total($_POST['txt_final_total'][$i]);

        $status = $obj_saleestimate->addSalesInvoiceProduct();
    }

    if ($status) {

        echo json_encode($status);
    } else {

        echo json_encode(0);
    }
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getJobOrder') {

    $obj_saleestimate->setcustomer_id($_POST['id']);

    // $obj_saleestimate->settypes($_POST['types']);

    $status = $obj_saleestimate->getJobOrder();

    echo json_encode($status);
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getJobOrderEdit') {

    $obj_saleestimate->setcustomer_id($_POST['id']);

    $status = $obj_saleestimate->getJobOrderEdit();

    echo json_encode($status);
}

if (isset($_POST['mode']) && $_POST['mode'] == 'listInvoice') {



    $status = $obj_saleestimate->listSalesInvoice();
}

if (isset($_POST['mode']) && $_POST['mode'] == 'getSOValues') {



    $soid = $_POST['soid'];



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



if (isset($_POST['mode']) && $_POST['mode'] == 'getSIEditValues') {



    $getSEId = $obj_saleestimate->getSalesInvoiceById($_POST['eid']);



    $datas = mysqli_fetch_array($getSEId);



    $scproduct = array();

    if (!empty($datas)) {

        $getSEProducts = $obj_saleestimate->getSalesInvoiceProductByPROId($_POST['eid']);



        while ($datass = mysqli_fetch_array($getSEProducts)) {



            $getSEProduct = $obj_saleestimate->getSalesInvoiceProductById($datass['PK_SEP_ID']);

            while ($data = mysqli_fetch_array($getSEProduct)) {

                $scproduct[] = $data;
            }
        }
    }

    echo json_encode(array($datas, $scproduct));
}

mysqli_close($GLOBALS["___mysqli_ston"]);