<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

session_start();


include("../../includes/db_config.php");

include("../../classes/class_advance_split_pay.php");



$objAdv = new AdvanceSplitPay();

if (isset($_POST['mode']) && $_POST['mode'] == 'listAdvanceComm') {
    $objAdv->listAdvanceComm();
} else if (isset($_POST['mode']) && $_POST['mode'] == 'listAdvanceNonComm') {
    $objAdv->listAdvanceNonComm();
} else if (isset($_POST['mode']) && $_POST['mode'] == 'getestAmount') {
    $result = false;
    if ($_POST['type'] == 1) {
        $result = $objAdv->check_advamount_comm($_POST['estid']);
    } elseif ($_POST['type'] == 2) {
        $result = $objAdv->check_advamount_noncomm($_POST['estid']);
    }

    echo json_encode($result);
} else if (isset($_POST['mode']) && $_POST['mode'] == 'check_amount') {
    $result = false;
    if (empty($_POST['estimate_no'])) {
        $result = 'Select Estimate Number';
    } else {
        if ($_POST['type'] == 1) {
            $result = $objAdv->check_pending_amount_comm($_POST['estimate_no'], $_POST['adv_amount']);
        } elseif ($_POST['type'] == 2) {
            $result = $objAdv->check_pending_amount_noncomm($_POST['estimate_no'], $_POST['adv_amount']);
        }
    }

    echo json_encode($result);
} else if (isset($_POST['mode']) && $_POST['mode'] == 'addAdvancecomm') {
    $result = $objAdv->add_advance_comm($_POST);
    echo json_encode($result);
} else if (isset($_POST['mode']) && $_POST['mode'] == 'addAdvanceNonComm') {
    $result = $objAdv->add_advance_noncomm($_POST);
    echo json_encode($result);
}
