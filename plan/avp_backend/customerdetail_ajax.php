<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Fetch customer details
    $sql = "SELECT * FROM erp_customer_master";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $customerdetail = [];
        while ($row = $result->fetch_assoc()) {
            $customerdetail[] = $row; // Store each row in the array
        }
        echo json_encode($customerdetail); // Return data as JSON
    } else {
        echo json_encode(["status" => "success", "data" => []]); // Return empty array if no data found
    }

    // Fetch plans from the database
    $sql = "SELECT * FROM tbl_plan_master";
    $result = $conn->query($sql);

    $plans = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $plans[] = $row; // Store each row in the array
        }
        echo json_encode($plans);  // Return plans as JSON
    } else {
        echo json_encode([]);  // Return empty array if no data found
    }


    $sql = "SELECT * FROM tbl_customer_plan_detail tpd
INNER JOIN erp_customer_master ecm ON ecm.pk_cus_id = tpd.fk_cust_id
LEFT JOIN tbl_plan_master tpm ON tpm.pk_id = tpd.fk_plan_id
where tpd.visibility =1";
    $result = $conn->query($sql);

    $customer_plan_detail = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $customer_plan_detail[] = $row; // Store each row in the array
        }
        echo json_encode($customer_plan_detail);  // Return plans as JSON
    } else {
        echo json_encode([]);  // Return empty array if no data found
    }



} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect data from POST request
    $data = json_decode(file_get_contents("php://input"), true);

    // Validate and add customer plan details
        if (!empty($data['mode']) && $data['mode'] === "addCustomerPlan"){
        // Prepare SQL with placeholders to prevent SQL injection
        $sql = "INSERT INTO tbl_customer_plan_detail 
                (fk_cust_id,fk_plan_id, planstart_date, planend_date, choosenplan, duration, created_at, updated_at, visibility)
                VALUES (?, ?, ?,?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql); // Use prepared statement
        
        if (!$stmt) {
            echo json_encode(["status" => "error", "message" => "Preparation failed: " . $conn->error]);
            $conn->close();
            exit;
        }

        // Set parameters from JSON data
        $fk_cust_id  = $data['pk_cus_id'];   
        $plan_id = $data['pk_id'] ?? '';
        $startDate = $data['startDate'] ?? '';
        $endDate = $data['endDate'] ?? '';
        $choosePlan = $data['choosePlan'] ?? '';
        $duration = $data['duration'] ?? '';
        $createdAt = date("Y-m-d H:i:s");
        $updatedAt = date("Y-m-d H:i:s");
        $visibility = 1;

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssssssss", $fk_cust_id, $plan_id, $startDate, $endDate, $choosePlan, $duration, $createdAt, $updatedAt, $visibility);


        // Execute the prepared statement
        if ($stmt->execute()) {
            echo json_encode(1);
        } else {
            echo json_encode(["status" => "error", "message" => "Execution failed: " . $stmt->error]);
        }

        // Close the statement
        $stmt->close();
    }


} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

// Close the database connection
$conn->close();

?>
