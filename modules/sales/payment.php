<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../vendor/autoload.php';

use Razorpay\Api\Api;

$keyId = "rzp_test_SSxGqhTR1IzZdx";
$keySecret = "7DqytHXPb6RgtBOLKA3NH6dh";

$api = new Api($keyId, $keySecret);

$soid = $_GET['order_id'] ?? 0;

include("../../includes/db_config.php");

$query = mysqli_query(
    $GLOBALS["___mysqli_ston"],
    "SELECT sono, grand_total FROM erp_estimate_comm WHERE PK_ES_ID='$soid'"
);

$row = mysqli_fetch_assoc($query);

if (!$row) {
    die("Invalid Order ID");
}

$order_no = $row['sono'];
$amount = $row['grand_total'];

$orderData = [
    'receipt' => $order_no,
    'amount' => $amount * 100,
    'currency' => 'INR'
];

$razorpayOrder = $api->order->create($orderData);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial;
            background: #f5f5f5;
        }

        .card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        button {
            background: #3399cc;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Order Payment</h2>
        <p><strong>Order No:</strong> <?php echo $order_no; ?></p>
        <p><strong>Amount:</strong> ₹<?php echo $amount; ?></p>
        <br>
        <button id="payBtn">Pay Now</button>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        document.getElementById('payBtn').onclick = function() {

            var options = {
                key: "<?php echo $keyId; ?>",
                amount: "<?php echo $amount * 100; ?>",
                currency: "INR",
                name: "Your Company",
                description: "Order Payment",
                order_id: "<?php echo $razorpayOrder['id']; ?>",
                handler: function(response) {
                    fetch("verify_payment.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: new URLSearchParams({
                                razorpay_order_id: "<?php echo $razorpayOrder['id']; ?>",
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_signature: response.razorpay_signature,
                                soid: "<?php echo $soid; ?>",
                                order_no: "<?php echo $order_no; ?>",
                                amount: "<?php echo $amount; ?>"
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "success") {
                                // window.location.href = "http://staging.rishidhkannan.com/index.php?erp=12&typ=1&mnu=18";
                                window.location.href = "http://localhost/AVP/index.php?erp=12&typ=1&mnu=18";
                            } else {
                                // window.location.href = "http://staging.rishidhkannan.com/index.php?erp=12&typ=1&mnu=18";
                                window.location.href = "http://localhost/AVP/index.php?erp=12&typ=1&mnu=18";
                            }
                        });
                },

                modal: {
                    ondismiss: function() {
                        // window.location.href = "http://staging.rishidhkannan.com/index.php?erp=12&typ=1&mnu=18";
                        window.location.href = "http://localhost/AVP/index.php?erp=12&typ=1&mnu=18";
                    }
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        }
    </script>

</body>

</html>