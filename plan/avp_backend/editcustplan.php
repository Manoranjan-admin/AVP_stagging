<?php
include 'config.php';


    // Decode the incoming JSON data
    $data = json_decode(file_get_contents("php://input"), true);

   // var_dump($data);

    // Check if mode is set to 'editPlan'
    if (!empty($data['mode']) && $data['mode'] === 'editPlan') {
        // Retrieve data from JSON payload

        // var_dump($data);
        // exit;
        $pk_cp_id = $data['pk_cp_id'];
        $pk_cus_id = $data['pk_cus_id']; // Retrieve pk_cus_id from form data
        $plan_id = $data['pk_id']; // Retrieve pk_cus_id from form data
        $customerName = $data['customerName'];
        $choosePlan = $data['choosePlan'];
        $startDate = $data['startDate'];
        $duration = $data['duration'];
        $endDate = $data['endDate'];

        //var_dump($pk_cus_id);

        // Ensure connection exists
        if ($conn) {
            // Update query
            $query = "UPDATE tbl_customer_plan_detail 
                      SET fk_cust_id = ?, 
                          fk_plan_id = ?,                         
                          choosenplan = ?, 
                          planstart_date = ?, 
                          duration = ?, 
                          planend_date = ? 
                      WHERE pk_cp_id = ?";

            $stmt = $conn->prepare($query);
            if (!$stmt) {
                echo json_encode(['status' => 'error', 'message' => 'Preparation failed: ' . $conn->error]);
                $conn->close();
                exit;
            }

            $stmt->bind_param("ssssssi",$pk_cus_id ,$plan_id,$choosePlan, $startDate, $duration, $endDate, $pk_cp_id);

            // Execute the query
            if ($stmt->execute()) {
                echo json_encode(1);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to update plan: ' . $stmt->error]);
            }

            // Close the statement
            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid mode or data']);
    }

// Close the database connection
$conn->close();


?>