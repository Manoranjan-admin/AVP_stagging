<?php

include 'config.php'; // Include your database configuration file

// SQL Query to get records with today's date in the planend_date
//$sql = "SELECT * FROM tbl_customer_plan_detail WHERE DATE(planend_date) = CURRENT_DATE()";
//$sql = "SELECT * FROM tbl_customer_plan_detail tcpd INNER JOIN erp_customer_master ecm ON tcpd.fk_cust_id = ecm.pk_cus_id WHERE planend_date = CURRENT_DATE";
$sql = "SELECT * FROM tbl_customer_plan_detail tcpd INNER JOIN erp_customer_master ecm ON tcpd.fk_cust_id = ecm.pk_cus_id";

// Execute the query
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Add each row to the data array
    }
    echo json_encode($data); // Output the results as JSON
} else {
    echo json_encode([]); // Output empty array if no results found
}

?>
