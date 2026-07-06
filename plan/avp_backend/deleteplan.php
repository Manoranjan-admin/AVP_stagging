<?php
require_once 'config.php';

// Get POST data
$data = json_decode(file_get_contents("php://input"));

if (is_null($data) || empty($data->mode)) {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
    exit;
}

// Handle based on mode
if ($data->mode === "deleteplan") {
    $pk_cp_id = intval($data->pk_cp_id); // Convert to integer to prevent SQL injection

    // Prepare the SQL statement to update visibility
    $stmt = $conn->prepare("UPDATE tbl_customer_plan_detail SET visibility = 0 WHERE pk_cp_id = ?");
    $stmt->bind_param('i', $pk_cp_id); // Bind the integer value of pk_cp_id

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "data" => 1]);
    } else {
        error_log('Failed to execute update. SQL Error: ' . $stmt->error);
        echo json_encode(["success" => false, "message" => "Failed to delete the plan. Please try again."]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid mode."]);
}
?>
