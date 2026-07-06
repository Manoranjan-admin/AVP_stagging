<?php
//error_reporting(E_ALL);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include "../../includes/db_config.php";

include "../../classes/class_sale_order_report.php";


$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


if (isset($_POST['mode']) && $_POST['mode'] == 'filterCustomerCreditOrder') {

    $status = $obj_saleorder->filterCustomerCreditOrder();
}
if (isset($_POST['mode']) && $_POST['mode'] == 'singlecustomerreport') {


    $status = $obj_saleorder->singlecustomerreport();
}
if (isset($_POST['mode']) && $_POST['mode'] == 'singlecustomerreport_by_id') {


    $status = $obj_saleorder->singlecustomerreport_by_id();
}
mysqli_close($GLOBALS["___mysqli_ston"]);
?>