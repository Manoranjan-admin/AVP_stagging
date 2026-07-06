<?php
include 'config.php';  // Include your database connection file

// Ensure we receive a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
   
    $username = $input['username'] ?? '';
    $password = $input['password'] ?? '';

//    var_dump(($input));
//     exit;

    // Validate inputs
    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Username and password are required."]);
        exit;
    }

    // Query the database for the user
    $stmt = $conn->prepare("SELECT pk_user_id, username, hash_password  FROM plan_admin_master WHERE username = ?");
    $stmt->bind_param("s", $username);  // 's' is for string
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($pk_user_id, $db_username, $db_hash_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Verify the hashed password
        if (password_verify($password, $db_hash_password)) {
            //echo json_encode(["status" => "success", "message" => "Login successful", "user_id" => $pk_user_id]);
          // echo json_encode(1); 
        
          echo json_encode(["status" => "success", "user_id" => $pk_user_id ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid username or password."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Username and password are invalid. Please enter correct username and password."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
