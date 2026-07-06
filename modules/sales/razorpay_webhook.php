<?php

require_once '../../vendor/autoload.php';
include("../../includes/db_config.php");

$webhook_secret = "AVdigipress@123";

$input = file_get_contents("php://input");
$signature = $_SERVER['HTTP_X_RAZORPAY_SIGNATURE'];

$expected_signature = hash_hmac('sha256', $input, $webhook_secret);

if ($expected_signature !== $signature) {
    file_put_contents("webhook_log.txt", "Signature Failed\n", FILE_APPEND);
    exit;
}

$data = json_decode($input, true);

if ($data['event'] == "payment_link.paid") {

    $payment = $data['payload']['payment']['entity'];
    $order   = $data['payload']['order']['entity'];
    $link    = $data['payload']['payment_link']['entity'];

    $payment_id = $payment['id'];
    $order_id   = $payment['order_id'];
    $amount     = $payment['amount'] / 100;
    $status     = $payment['status'];
    $method     = $payment['method'];
    $email      = $payment['email'];
    $contact    = $payment['contact'];
    $fee        = $payment['fee'] / 100;
    $tax        = $payment['tax'] / 100;
    $vpa        = $payment['vpa'] ?? '';
    $created_at = date('Y-m-d H:i:s', $payment['created_at']);

    $order_no = $link['reference_id'];

    $res = mysqli_query($GLOBALS["___mysqli_ston"], "
        SELECT PK_ES_ID FROM erp_estimate_comm WHERE sono = '$order_no'
    ");

    $row = mysqli_fetch_assoc($res);
    $soid = $row['PK_ES_ID'] ?? 0;

    $check = mysqli_query($GLOBALS["___mysqli_ston"], "
        SELECT * FROM erp_rp_payment WHERE razorpay_payment_id = '$payment_id'
    ");

    if (mysqli_num_rows($check) == 0) {

        $insert = mysqli_query($GLOBALS["___mysqli_ston"], "
            INSERT INTO erp_rp_payment 
(soid, order_no, amount, razorpay_order_id, razorpay_payment_id, razorpay_signature, status,
 method, email, contact, fee, tax, vpa, created_at)
VALUES (
    '$soid',
    '$order_no',
    '$amount',
    '$order_id',
    '$payment_id',
    '$signature',
    '$status',
    '$method',
    '$email',
    '$contact',
    '$fee',
    '$tax',
    '$vpa',
    '$created_at'
)
        ");

        if (!$insert) {
            file_put_contents("webhook_log.txt", "DB ERROR: " . mysqli_error($GLOBALS["___mysqli_ston"]) . "\n", FILE_APPEND);
        } else {
            file_put_contents("webhook_log.txt", "INSERT SUCCESS\n", FILE_APPEND);
        }
    }
}

http_response_code(200);
