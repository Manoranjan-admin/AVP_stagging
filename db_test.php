<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "erp-stagging-new";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

echo "DB Connected Successfully";

?>