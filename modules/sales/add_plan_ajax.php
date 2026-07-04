<?php
// Include your database configuration and connection function
include("../../includes/db_config.php");

if (isset($_POST['pk_cus_id'])) {
    // Retrieve the customer ID from the AJAX request
    $customer_id = $_POST['pk_cus_id'];

    //var_dump($_POST['customer_id']);

//     $sql = "SELECT *  
// FROM `tbl_customer_plan_detail` tcpd 
// INNER JOIN `erp_customer_master` ecm 
// ON tcpd.fk_cust_id = ecm.pk_cus_id 
// WHERE ecm.pk_cus_id = ? AND tcpd.visibility = 1";
    $sql ="SELECT *  
FROM `tbl_customer_plan_detail` tcpd 
INNER JOIN `erp_customer_master` ecm 
    ON tcpd.fk_cust_id = ecm.pk_cus_id 
INNER JOIN `tbl_plan_master` tpm
    ON tcpd.fk_plan_id = tpm.pk_id
WHERE ecm.pk_cus_id = ? AND tcpd.visibility = 1";


    // Use prepared statements to prevent SQL injection
    if ($stmt = $GLOBALS["___mysqli_ston"]->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $customer_id); // "i" for integer

        // Execute the statement
        $stmt->execute();

        // Fetch the results
        $result = $stmt->get_result();

        // Check if results were returned
        if ($result->num_rows > 0) {
            // Fetch all results as an associative array
            $data = $result->fetch_all(MYSQLI_ASSOC);

            // Return results as JSON
            echo json_encode([
                'status' => 'success',
                'data' => $data,
            ]);
        } else {
            // No data found
            echo json_encode([
                'status' => 'error',
                'message' => 'No data found for the provided customer ID.',
            ]);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Return an error if the statement cannot be prepared
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to prepare SQL statement.',
        ]);
    }
} else {
    // Return an error if no customer ID is provided
    echo json_encode([
        'status' => 'error',
        'message' => 'No customer ID provided.',
    ]);
}
?>
