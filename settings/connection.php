<?php

$conn = new mysqli('localhost', 'root', '', 'weather');

// Database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
