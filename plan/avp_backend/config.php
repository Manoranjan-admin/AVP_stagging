<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type"); // Add this line
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}


// Database connection parameters
$servername = "localhost"; 
$username = "rishidhstag";        
$password = "eG#8wzAoONcOK@D";           
$dbname = "rishidhkannan_staging"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//echo"connected"



?>