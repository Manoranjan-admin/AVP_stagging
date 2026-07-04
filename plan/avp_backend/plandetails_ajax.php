<?php
include 'config.php';

// Collect data from POST request
$data = json_decode(file_get_contents("php://input"), true);

// Initialize response array
$response = ["status" => "error", "message" => "Invalid request"];

// Check if mode exists and validate
if (isset($data['mode'])) {
    $mode = $data['mode'];

    if ($mode === "addPlan") {
        // Check if plan_name already exists
        $planname = $data['planname'] ?? '';
        $sql_check = "SELECT COUNT(*) AS count FROM tbl_plan_master WHERE plan_name = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("s", $planname);
        $stmt_check->execute();
        $result = $stmt_check->get_result();
        $row = $result->fetch_assoc();
    
        if ($row['count'] > 0) {
            // Plan name exists
            $response = 2;
            echo json_encode($response);
            exit;
        } else {
            // Plan name does not exist, proceed with insertion
            $sql = "INSERT INTO tbl_plan_master (plan_name, plan_amount, duration, discount) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
    
            // Set parameters from JSON data
            $planamount = $data['Planamount'] ?? '';
            $duration = $data['Duration'] ?? '';
            $discount = $data['Discount'] ?? '';
    
            $stmt->bind_param("ssss", $planname, $planamount, $duration, $discount);
    
            // Execute and check
            if ($stmt->execute()) {
                $response = 1;
            } else {
                $response = ["status" => "error", "message" => "Failed to add plan"];
            }
            $stmt->close();
        }
        $stmt_check->close();
    
    } elseif ($mode === "editPlan") {
        // Edit Plan Mode
        $pk_id = intval($data['pk_id']);
        $plan_name = $data['planname'] ?? '';
        $plan_amount = floatval($data['Planamount'] ?? 0);
        $discount = floatval($data['Discount'] ?? 0);
        $duration = $data['Duration'] ?? 0;


        $exist = "SELECT plan_name FROM tbl_plan_master WHERE pk_id = $pk_id";
    
        $stmt = $conn->prepare("UPDATE tbl_plan_master SET plan_name = ?, plan_amount = ?, discount = ?, duration = ? WHERE pk_id = ?");
        $stmt->bind_param('sdddi', $plan_name, $plan_amount, $discount, $duration, $pk_id);
    
        if ($stmt->execute()) {
            $response = 1;
        } else {
            $response = ["status" => "error", "message" => "Failed to update plan"];
        }
        $stmt->close();
    }
     elseif ($mode === "deletePlan") {
        // Delete Plan Mode
        $pk_id = intval($data['pk_id']);

        $stmt = $conn->prepare("DELETE FROM tbl_plan_master WHERE pk_id = ?");
        $stmt->bind_param('i', $pk_id);

        if ($stmt->execute()) {
            $response = 1;
        } else {
            $response = ["status" => "error", "message" => "Failed to delete plan"];
        }
        $stmt->close();
    } else {
        $response = ["status" => "error", "message" => "Invalid mode"];
    }
}

// Output the final response in JSON
echo json_encode($response);

// Close the database connection
$conn->close();
exit();
?>
