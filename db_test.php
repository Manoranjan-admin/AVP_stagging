<?php

$conn = new mysqli("localhost", "root", "", "erp-stagging-new");

if ($conn->connect_error) {
    die("DB Failed: " . $conn->connect_error);
}

echo "DB Connected Successfully";

?>