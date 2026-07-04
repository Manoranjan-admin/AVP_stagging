<?php
include 'config.php';

// Fetch plan details
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

$conn->close();
?>
