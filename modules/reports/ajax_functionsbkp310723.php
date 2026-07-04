<?php
//error_reporting(E_ALL);
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
session_start();
include("../../includes/db_config.php");
include("../../classes/class_report.php");
$obj_saleorder = new Report('', '');
if(isset($_POST['mode']) && $_POST['mode'] == 'collection_summary_report') {
    $com_outstanding=0;
    $noncom_outstanding=0;
    $fdate=str_replace('/', '-', $_POST['fromDate']);
    $fromDateval = date('Y-m-d', strtotime($fdate));
    $tdate=str_replace('/', '-', $_POST['toDate']);
    $toDateval = date('Y-m-d', strtotime($tdate));
    //$fromDateval = date('Y-m-d', strtotime($_POST['fromDate']));
    //$toDateval = date('Y-m-d', strtotime($_POST['toDate']));
    $grant_total= $obj_saleorder->collection_summary_grant_total($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"]);
    $cash_total= $obj_saleorder->collection_summary_cash_total($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $upi_total= $obj_saleorder->collection_summary_upi_total($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $bank_total= $obj_saleorder->collection_summary_bank_total($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $credit_total= $obj_saleorder->collection_summary_credit_total($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $cheque_total= $obj_saleorder->collection_summary_cheque_total($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $grant_total1= $obj_saleorder->collection_summary_grant_total_non($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"]);
    $cash_total1= $obj_saleorder->collection_summary_cash_total_non($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $upi_total1= $obj_saleorder->collection_summary_upi_total_non($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $bank_total1= $obj_saleorder->collection_summary_bank_total_non($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $credit_total1= $obj_saleorder->collection_summary_credit_total_non($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $cheque_total1= $obj_saleorder->collection_summary_cheque_total_non($fromDateval,$toDateval,$_POST["txt_customer_name"],$_POST["txt_franchise_name"],$_POST['txt_receipt_type']);
    $com_outstanding=$grant_total-($cash_total+$upi_total+$bank_total+$credit_total+$cheque_total);
    $noncom_outstanding=$grant_total1-($cash_total1+$upi_total1+$bank_total1+$credit_total1+$cheque_total1);
    //$data = array("grant_total" =>$grant_total, "cash_total" =>$cash_total, "upi_total" =>$upi_total,  "bank_total" =>$bank_total, "credit_total" =>$credit_total, "cheque_total" =>$cheque_total, "com_outstanding" =>number_format($com_outstanding, 2), "non_grant_total" =>$grant_total1, "non_cash_total" =>$cash_total1, "non_upi_total" =>$upi_total1,  "non_bank_total" =>$bank_total1, "non_credit_total" =>$credit_total1, "non_cheque_total" =>$cheque_total1, "noncom_outstanding" =>number_format($noncom_outstanding, 2));
    $data = array("grant_total" =>number_format($grant_total, 2), "cash_total" =>number_format($cash_total, 2), "upi_total" =>number_format($upi_total, 2),  "bank_total" =>number_format($bank_total, 2), "credit_total" =>number_format($credit_total, 2), "cheque_total" =>number_format($cheque_total, 2), "com_outstanding" =>number_format($com_outstanding, 2), "non_grant_total" =>number_format($grant_total1, 2), "non_cash_total" =>number_format($cash_total1, 2), "non_upi_total" =>number_format($upi_total1, 2),  "non_bank_total" =>number_format($bank_total1, 2), "non_credit_total" =>number_format($credit_total1, 2), "non_cheque_total" =>number_format($cheque_total1, 2), "noncom_outstanding" =>number_format($noncom_outstanding, 2));
    echo json_encode($data);
}
if(isset($_POST['mode']) && $_POST['mode'] == 'collection_report') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->commercial_collection_report();
        //$a=$obj_saleorder->commercial_collection_report();
        //echo $a;
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->noncommercial_collection_report();
        //$b=$obj_saleorder->noncommercial_collection_report();
        //echo $b;
    }

}
if(isset($_POST['mode']) && $_POST['mode'] == 'listPeriodicalReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommPeriodicalReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommPeriodicalReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listCustomerReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommCustomerReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommCustomerReport();
    }
}


if(isset($_POST['mode']) && $_POST['mode'] == 'listProductReport') {


    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommProductReport();
    }
    else if($_POST['typ'] == 2)
    {
     
        $obj_saleorder->listNonCommProductReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateComminprogress') {
    $obj_saleorder->listEstimateComminprogress();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateCommcomplete') {
    $obj_saleorder->listEstimateCommcomplete();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNoninprogress') {
    $obj_saleorder->listEstimateNoninprogress();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateNoncomplete') {
    $obj_saleorder->listEstimateNoncomplete();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listInvoiceCommcomplete') {
    $obj_saleorder->listInvoiceCommcomplete();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listInvoiceNoncomplete') {
    $obj_saleorder->listInvoiceNoncomplete();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listFranchiseReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommFranchiseReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommFranchiseReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listDeliveredReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommDeliveredReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommDeliveredReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listBulkPaymentReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommBulkPaymentReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommBulkPaymentReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateCash') {
    $tableestimate ="";
    $tableinvoice ="";
    if($_POST['typ'] == 1)
    {
        $tableestimate = ESTIMATE_COMM;
        $tableinvoice = INVOICE_COMM;
    }
    else if($_POST['typ'] == 2)
    {
        $tableestimate = ESTIMATE_NONCOMM;
        $tableinvoice = INVOICE_NONCOMM;
    }
    $obj_saleorder->listEstimateCash($tableestimate,$tableinvoice);
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateCredit') {
    $tableestimate ="";
    $tableinvoice ="";
    if($_POST['typ'] == 1)
    {
        $tableestimate = ESTIMATE_COMM;
        $tableinvoice = INVOICE_COMM;
    }
    else if($_POST['typ'] == 2)
    {
        $tableestimate = ESTIMATE_NONCOMM;
        $tableinvoice = INVOICE_NONCOMM;

    }
    $obj_saleorder->listEstimateCredit($tableestimate,$tableinvoice);
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateCancellationCommReport') {



    $obj_saleorder->listEstimateCancellationCommReport();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEstimateCancellationNonCommReport') {
    $obj_saleorder->listEstimateCancellationNonCommReport();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listCustomerReporttest') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommCustomerReporttest();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommCustomerReporttest();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listPaidReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommPaidReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommPaidReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listNotPaidReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommNotPaidReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommNotpaidReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listCommOutstandingReport') {

    $obj_saleorder->listCommOutstandingReport();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listNoncommOutstandingReport') {

    $obj_saleorder->listNoncommOutstandingReport();
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listBulkOrderByReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommBulkOrderByReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommBulkOrderByReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listEODReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommEODReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommEODReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listOutstandingReceiptsReport') {
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommOutstandingReceiptsReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommOutstandingReceiptsReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'getCategoryListing') {

    $getComercialItemsType=$obj_saleorder->getCategoryListing();
    $getitem=array();
    while($data=mysqli_fetch_array($getComercialItemsType)) {
        $getitem[]=$data;
    }	
    echo json_encode(array($getitem));
}
if(isset($_POST['mode']) && $_POST['mode'] == 'listGlobalSearchReport') {
  
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->listCommGlobalSearchReport();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->listNonCommGlobalSearchReport();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'getAllTotalAmount') {
  
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->getCommAllTotalAmount();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->getNonCommAllTotalAmount();
    }
}
if(isset($_POST['mode']) && $_POST['mode'] == 'getAllTotalAmountGlobal') {
  
    if($_POST['typ'] == 1)
    {
        $obj_saleorder->getCommAllTotalAmountGlobal();
    }
    else if($_POST['typ'] == 2)
    {
        $obj_saleorder->getNonCommAllTotalAmountGlobal();
    }
}
	mysqli_close($GLOBALS["___mysqli_ston"]);
?>