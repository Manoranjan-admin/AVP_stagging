<?php
//error_reporting(E_ALL);

session_start();
include "../../includes/db_config.php";
include "../../classes/class_sale_order_report.php";


$obj_saleorder = new Sale_order('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


if (isset($_POST['mode']) && $_POST['mode'] == 'filterlistSalesOrder') {

    $status = $obj_saleorder->filterlistSalesOrder();
}

mysqli_close($GLOBALS["___mysqli_ston"]);
?>