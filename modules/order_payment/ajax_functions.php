<?php
//error_reporting(E_ALL);

session_start();
include "../../includes/db_config.php";
include "../../classes/class_sale_order_report.php";


$obj_saleorder_report = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


if (isset($_POST['mode']) && $_POST['mode'] == 'insertOrderPayment') {
    

    $txt_date = str_replace('/', '-', $_POST['txt_date']);


    $obj_saleorder_report->setsono( $_POST['txt_invoice_no']);
    $obj_saleorder_report->setcgst_amt($_POST['txt_total_amount']);
   // $obj_saleorder_report->setsgst($_POST['txt_advance_amount']);
    $obj_saleorder_report->setcustomer_id($_POST['txt_cusID']);
    $obj_saleorder_report->setfk_so_id($_POST['txt_soID']);
    $obj_saleorder_report->setsgst_amt($_POST['txt_remain_amount']);
    $obj_saleorder_report->setigst_amt($_POST['txt_paying_amount']);
    $obj_saleorder_report->setreference_number( $_POST['txt_createdby']);
    $obj_saleorder_report->setremark( $_POST['txt_comments']);
    $obj_saleorder_report->setsale_date(date('Y-m-d',strtotime($txt_date)));
    $getSEId = $obj_saleorder_report->insertOrderPayment();
     
   // var_dump($_POST);
  //  exit;
    echo 1;
}
if (isset($_POST['mode']) && $_POST['mode'] == 'OrderStatusTable') {

    $status = $obj_saleorder_report->OrderStatusTable();
}

mysqli_close($GLOBALS["___mysqli_ston"]);
?>