<?php
require_once '../../vendor/autoload.php';
include("../../includes/db_config.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$keyId = "rzp_test_SSxGqhTR1IzZdx";
$keySecret = "7DqytHXPb6RgtBOLKA3NH6dh";

$api = new Api($keyId, $keySecret);

$soid = $_POST['soid'];
$order_no = $_POST['order_no'];
$amount = $_POST['amount'];

$attributes = [
    'razorpay_order_id' => $_POST['razorpay_order_id'],
    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
    'razorpay_signature' => $_POST['razorpay_signature']
];

try {
    $api->utility->verifyPaymentSignature($attributes);

    mysqli_query($GLOBALS["___mysqli_ston"], "
        INSERT INTO erp_rp_payment 
        (soid, order_no, amount, razorpay_order_id, razorpay_payment_id, razorpay_signature, status)
        VALUES (
            '$soid',
            '$order_no',
            '$amount',
            '" . $attributes['razorpay_order_id'] . "',
            '" . $attributes['razorpay_payment_id'] . "',
            '" . $attributes['razorpay_signature'] . "',
            'success'
        )
    ");

    echo json_encode(["status" => "success"]);
} catch (SignatureVerificationError $e) {

    mysqli_query($GLOBALS["___mysqli_ston"], "
        INSERT INTO erp_rp_payment 
        (soid, order_no, amount, razorpay_order_id, razorpay_payment_id, razorpay_signature, status)
        VALUES (
            '$soid',
            '$order_no',
            '$amount',
            '" . $attributes['razorpay_order_id'] . "',
            '" . $attributes['razorpay_payment_id'] . "',
            '" . $attributes['razorpay_signature'] . "',
            'failed'
        )
    ");

    echo json_encode(["status" => "failed"]);
}
